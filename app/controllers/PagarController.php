<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\dao\Fluxo as FluxoModel;
use app\models\dao\Nembro as NembroModel;
use app\models\dao\Pagamento as PagamentoModel;
use app\models\dao\Carteira as CarteirasModel;
use app\models\dao\Cartoes as CartoesModel;
use app\models\dao\pagar as PagarModel;
use app\models\dao\Fornecedor as FornecedorModel;
use app\models\service\Service;
use DateTime;
use TCPDF;

require_once('vendor/autoload.php');

class PagarController extends Controller
{
    private $id_usuario;
    private $campo = "id";
    private $tabela = "contas_pagar";
    private $FluxoModel;
    private $NembroModel;
    private $pagamentoModel;
    private $carteiraModel;
    private $cartoesModel;
    private $pagarModel;
    private $fornecedorModel;

    public function __construct()
    {
        $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
        $fluxo = new FluxoModel();
        $this->FluxoModel = $fluxo;

        $nembro = new NembroModel();
        $this->NembroModel = $nembro;

        $pagamento = new PagamentoModel();
        $this->pagamentoModel = $pagamento;

        $carteira = new CarteirasModel();
        $this->carteiraModel = $carteira;

        $cartao = new CartoesModel();
        $this->cartoesModel = $cartao;

        $pagar = new PagarModel();
        $this->pagarModel = $pagar;

        $fornecedor = new FornecedorModel();
        $this->fornecedorModel = $fornecedor;
    }

    public function index()
    {
        $dados['listaContasPagar'] = $this->pagarModel->lista_contas_pagar($this->id_usuario);
        $dados["view"]       = "pagar/index";
        $this->load("template", $dados);
    }

    public function deletar()
    {
        $dados['listaContasPagar'] = $this->pagarModel->lista_contas_pagar_delete($this->id_usuario);
        $dados["view"]       = "pagar/excluir";
        $this->load("template", $dados);
    }

    public function cancelamento()
    {
        $dados['listaContasPaga'] = $this->pagarModel->lista_contas_pagar_pagas($this->id_usuario);
        $dados["view"]       = "pagar/cancelamento";
        $this->load("template", $dados);
    }

    public function novo()
    {
        $dados["fluxo_saida"] = $this->FluxoModel->lista_saida($this->id_usuario);
        $dados["fluxo_nembro"] = $this->NembroModel->lista_id($this->id_usuario);
        $dados["fluxo_fornecedor"] = $this->fornecedorModel->lista_id($this->id_usuario);
        $dados["view"]       = "pagar/novo";
        $this->load("template", $dados);
    }
    public function salvar()
    {
        $valor                               =  $_POST['valor'];
        $valor = str_replace(',', '.', preg_replace('/[^\d,]/', '',  $valor));
        $pagar = new \stdClass();
        $pagar->descricao               = $_POST['descricao'];
        $pagar->valor                   =  $valor;
        $pagar->vencimento              = $_POST['vencimento'];
        $pagar->observacao              = $_POST['observacao'];
        $pagar->id_nembro               = $_POST['id_nembro'];
        $pagar->id_fornecedor           = $_POST['id_fornecedor'];
        $pagar->id_fluxo_financeiro     = $_POST['id_fluxo_financeiro'];
        $pagar->id_usuario              = $this->id_usuario;   //print_r($pagar); exit;
        $this->pagarModel->salvar_pagar($pagar);
        $this->redirect(URL_BASE . 'pagar/index');
    }

    public function excluir()
    {
        $pagar = new \stdClass();
        $pagar->id = $_POST['id'];
        Service::excluir($this->tabela, $this->campo, $pagar->id);
        $this->redirect(URL_BASE . "pagar/deletar");
    }

    public function baixa()
    {
        $dados["fluxo_saida"] = $this->FluxoModel->lista_saida($this->id_usuario);
        $dados['listaContasPagarPendente'] = $this->pagarModel->lista_contas_pagar_pendente($this->id_usuario);
        $dados["fluxo_pagamento"] = $this->pagamentoModel->lista_id($this->id_usuario);
        $dados["fluxo_carteira"] = $this->carteiraModel->lista_id($this->id_usuario);
        $dados["fluxo_cartao"] = $this->cartoesModel->lista_id($this->id_usuario);
        $dados["view"]       = "pagar/baixa";
        $this->load("template", $dados);
    }

    public function pagamento()
    {
        $dataAtual = new DateTime();
        $pagar = new \stdClass();
        $pagar->id                       = $_POST['id'] ?? null;
        $pagar->pago_em                  = $dataAtual->format('Y-m-d');
        $pagar->valor_pago               = $_POST['valor_pago'] ?? null;
        $pagar->id_condicao_pagamento    = $_POST['id_condicao_pagamento'] ?? null;
        $pagar->id_carteira              = $_POST['id_carteira'] ?? null;
        $pagar->id_cartao                = $_POST['id_cartao'] ?? null;
        $pagar->id_usuario               = $this->id_usuario ?? null;
        $pagar->pago                     = 1;
        $this->pagarModel->pagamento($pagar);
        $this->redirect(URL_BASE . 'pagar/baixa');
    }

    public function volta_pendente()
    {
        $pagar = new \stdClass();
        $pagar->id                       = $_POST['id'] ?? null;
        $pagar->valor_pago               =  null;
        $pagar->id_condicao_pagamento    =  null;
        $pagar->id_carteira              =  null;
        $pagar->id_cartao                =  null;
        $pagar->id_usuario               = $this->id_usuario ?? null;
        $pagar->pago                     = 0;
        $pagar->pago_em                  = null;
        $this->pagarModel->pagamento($pagar);
        $this->redirect(URL_BASE . 'pagar/cancelamento');
    }

    public function impressao($id)
    {
        $pag =  $this->pagarModel->id_pagar($this->id_usuario, $id);
        $vencimento = date('d/m/Y', strtotime($pag->vencimento));
        $criado_em = date('d/m/Y H:i:s', strtotime($pag->criado_em));
        $pag->pago = $pag->pago == 1 ? 'Pago' : 'Pendente';


        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->AddPage();

        // Cabeçalho
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'FOX SISTEMAS', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 5, 'CNPJ: XX.XXX.XXX/XXXX-XX', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Telefone: (66) 99953-9490', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Email: fabiojr933@gmail.com', 0, 1, 'C');
        $pdf->Ln(5);

        // Dados do Pedido
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(0, 6, "Titulo: $pag->id", 0, 1);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 6, "Data Lançamento: $criado_em", 0, 1);
        $pdf->Cell(0, 6, "Data Vencimento: $vencimento", 0, 1);
        $pdf->Cell(0, 6, "Observação: $pag->observacao", 0, 1);
        $pdf->Ln(5);

        // Tabela de Itens
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(20, 6, 'Tipo', 1);
        $pdf->Cell(30, 6, 'Nembro', 1);
        $pdf->Cell(30, 6, 'Status', 1);
        $pdf->Cell(40, 6, 'Cond. pagamento', 1);
        $pdf->Cell(70, 6, 'Fluxo financeiro', 1);
        $pdf->Ln();

        // Itens
        $items = [
            ['A Pagar', $pag->nembro, $pag->valor, $pag->pago, $pag->fluxo_financeiro]
        ];

        $pdf->SetFont('helvetica', '', 10);
        foreach ($items as $item) {
            $pdf->Cell(20, 6, $item[0], 1);
            $pdf->Cell(30, 6, $item[1], 1);
            $pdf->Cell(30, 6, "R$: " . number_format((float) $item[2], 2, ',', '.'), 1);
            $pdf->Cell(40, 6, $item[3], 1);
            $pdf->Cell(70, 6, $item[4], 1);
            $pdf->Ln();
        }

        $pdf->Ln(5);
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(160, 6, 'Total Líquido:', 1);
        $pdf->Cell(30, 6, "R$: " . number_format((float) $item[2], 2, ',', '.'), 1, 0, 'R');

        $pdf->Output('relatorio.pdf', 'I');
    }
}
