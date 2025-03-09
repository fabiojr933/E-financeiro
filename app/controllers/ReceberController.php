<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\dao\Fluxo as FluxoModel;
use app\models\dao\Nembro as NembroModel;
use app\models\dao\Pagamento as PagamentoModel;
use app\models\dao\Carteira as CarteirasModel;
use app\models\dao\Cartoes as CartoesModel;
use app\models\dao\Receber as ReceberModel;
use app\models\dao\Cliente as ClienteModel;
use app\models\service\Service;
use DateTime;
use TCPDF;

require_once('vendor/autoload.php');

class ReceberController extends Controller
{
    private $id_usuario;
    private $campo = "id";
    private $tabela = "contas_receber";
    private $FluxoModel;
    private $NembroModel;
    private $pagamentoModel;
    private $carteiraModel;
    private $cartoesModel;
    private $ReceberModel;
    private $clienteModel;

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

        $receber = new ReceberModel();
        $this->ReceberModel = $receber;

        $cliente = new ClienteModel();
        $this->clienteModel = $cliente;
    }

    public function index()
    {
        $dados['listaContasReceber'] = $this->ReceberModel->lista_contas_receber($this->id_usuario);
        $dados["view"]       = "receber/index";
        $this->load("template", $dados);
    }

    public function deletar()
    {
        $dados['listaContasReceber'] = $this->ReceberModel->lista_contas_receber_delete($this->id_usuario);
        $dados["view"]       = "receber/excluir";
        $this->load("template", $dados);
    }

    public function cancelamento()
    {
        $dados['listaContasRecebidas'] = $this->ReceberModel->lista_contas_receber_pagas($this->id_usuario);
        $dados["view"]       = "receber/cancelamento";
        $this->load("template", $dados);
    }

    public function novo()
    {
        $dados["fluxo_entrada"] = $this->FluxoModel->lista_entrada($this->id_usuario);
        $dados["fluxo_nembro"] = $this->NembroModel->lista_id($this->id_usuario);
        $dados["fluxo_cliente"] = $this->clienteModel->lista_id($this->id_usuario);
        $dados["view"]       = "receber/novo";
        $this->load("template", $dados);
    }
    public function salvar()
    {
        $valor                               =  $_POST['valor'];
        $valor = str_replace(',', '.', preg_replace('/[^\d,]/', '',  $valor));
        $receber = new \stdClass();
        $receber->descricao               = $_POST['descricao'];
        $receber->valor                   =  $valor;
        $receber->vencimento              = $_POST['vencimento'];
        $receber->observacao              = $_POST['observacao'];
        $receber->id_nembro               = $_POST['id_nembro'];
        $receber->id_cliente           = $_POST['id_cliente'];
        $receber->id_fluxo_financeiro     = $_POST['id_fluxo_financeiro'];
        $receber->id_usuario              = $this->id_usuario;   //print_r($Receber); exit;
        $this->ReceberModel->salvar_receber($receber);
        $this->redirect(URL_BASE . 'receber/index');
    }

    public function excluir()
    {
        $receber = new \stdClass();
        $receber->id = $_POST['id'];
        Service::excluir($this->tabela, $this->campo, $receber->id);
        $this->redirect(URL_BASE . "receber/deletar");
    }

    public function baixa()
    {
        $dados["fluxo_saida"] = $this->FluxoModel->lista_saida($this->id_usuario);
        $dados['listaContasReceberPendente'] = $this->ReceberModel->lista_contas_receber_pendente($this->id_usuario);
        $dados["fluxo_pagamento"] = $this->pagamentoModel->lista_id($this->id_usuario);
        $dados["fluxo_carteira"] = $this->carteiraModel->lista_id($this->id_usuario);
        $dados["fluxo_cartao"] = $this->cartoesModel->lista_id($this->id_usuario);
        $dados["view"]       = "receber/baixa";
        $this->load("template", $dados);
    }

    public function recebimento()
    {
        $dataAtual = new DateTime();
        $receber = new \stdClass();
        $receber->pago_em                  = $dataAtual->format('Y-m-d');
        $receber->id                       = $_POST['id'] ?? null;
        $receber->valor_pago               = $_POST['valor_pago'] ?? null;
        $receber->id_condicao_pagamento    = $_POST['id_condicao_pagamento'] ?? null;
        $receber->id_carteira              = $_POST['id_carteira'] ?? null;
        $receber->id_cartao                = $_POST['id_cartao'] ?? null;
        $receber->id_usuario               = $this->id_usuario ?? null;
        $receber->pago                     = 1;
      
       
        $this->ReceberModel->recebimento($receber);
        $this->redirect(URL_BASE . 'receber/baixa');
    }

    public function volta_pendente()
    {
        $receber = new \stdClass();
        $receber->id                       = $_POST['id'] ?? null;
        $receber->valor_pago               =  null;
        $receber->id_condicao_pagamento    =  null;
        $receber->id_carteira              =  null;
        $receber->id_cartao                =  null;
        $receber->id_usuario               = $this->id_usuario ?? null;
        $receber->pago                     = 0;
        $receber->pago_em                  = null;
        $this->ReceberModel->recebimento($receber);
        $this->redirect(URL_BASE . 'receber/cancelamento');
    }

    public function impressao($id)
    {
        $pag =  $this->ReceberModel->id_Receber($this->id_usuario, $id);
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
            ['A Receber', $pag->nembro, $pag->valor, $pag->pago, $pag->fluxo_financeiro]
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
