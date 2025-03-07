<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\dao\Fluxo as FluxoModel;
use app\models\dao\Nembro as NembroModel;
use app\models\dao\Pagamento as PagamentoModel;
use app\models\dao\Carteira as CarteirasModel;
use app\models\dao\Cartoes as CartoesModel;
use app\models\dao\Lancamento as LancamentoModel;
use app\models\service\Service;
use TCPDF;

require_once('vendor/autoload.php');

class LancamentoController extends Controller
{
    private $id_usuario;
    private $campo = "id";
    private $tabela = "lancamentos";
    private $FluxoModel;
    private $NembroModel;
    private $pagamentoModel;
    private $carteiraModel;
    private $cartoesModel;
    private $LancamentoModel;

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

        $lancamento = new LancamentoModel();
        $this->LancamentoModel = $lancamento;
    }

    public function index()
    {
        $dados['listaLancamento'] =  $this->LancamentoModel->lista_lancamento($this->id_usuario);
        $dados["view"]       = "lancamento/index";
        $this->load("template", $dados);
    }

    public function cancelamento()
    {
        $dados['listaLancamento'] =  $this->LancamentoModel->lista_lancamento($this->id_usuario);
        $dados["view"]       = "lancamento/cancelamento";
        $this->load("template", $dados);
    }

    public function novo()
    {
        $dados["fluxo_saida"] = $this->FluxoModel->lista_saida($this->id_usuario);
        $dados["fluxo_entrada"] = $this->FluxoModel->lista_entrada($this->id_usuario);
        $dados["fluxo_nembro"] = $this->NembroModel->lista_id($this->id_usuario);
        $dados["fluxo_pagamento"] = $this->pagamentoModel->lista_id($this->id_usuario);
        $dados["fluxo_carteira"] = $this->carteiraModel->lista_id($this->id_usuario);
        $dados["fluxo_cartao"] = $this->cartoesModel->lista_id($this->id_usuario);
        $dados["view"]       = "lancamento/novo";
        $this->load("template", $dados);
    }
    public function salvar()
    {
        $valor                               =  $_POST['valor'];
        $valor = str_replace(',', '.', preg_replace('/[^\d,]/', '',  $valor));
        $lancamento = new \stdClass();
        $lancamento->descricao               = $_POST['descricao'];
        $lancamento->valor                   =  $valor;
        $lancamento->data_pag                = $_POST['data_pag'];
        $lancamento->tipo                    = $_POST['tipo'];
        $lancamento->observacao              = $_POST['observacao'];
        $lancamento->id_nembro               = $_POST['id_nembro'];
        $lancamento->id_carteira             = $_POST['id_carteira'];
        $lancamento->id_cartao               = $_POST['id_cartao'];
        $lancamento->id_condicoes_pagamento  = $_POST['id_condicoes_pagamento'];
        $lancamento->id_fluxo_financeiro     = $_POST['id_fluxo_financeiro'];
        $lancamento->id_usuario              = $this->id_usuario;
        $this->LancamentoModel->salvar_lanc($lancamento);
        $this->redirect(URL_BASE . 'lancamento/index');
    }

    public function excluir()
    {
        $lancamento = new \stdClass();
        $lancamento->id = $_POST['id'];
        Service::excluir($this->tabela, $this->campo, $lancamento->id);
        $this->redirect(URL_BASE . "lancamento/cancelamento");
    }
    public function impressao($id)
    {
        $lanc =  $this->LancamentoModel->id_lancamento($this->id_usuario, $id);
        $data_pag = date('d/m/Y', strtotime($lanc->data_pag));
        $data_lanc = date('d/m/Y H:i:s', strtotime($lanc->criado_em));



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
        $pdf->Cell(0, 6, "LANÇAMENTO: $lanc->id", 0, 1);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 6, "Data Lançamento: $data_lanc", 0, 1);
        $pdf->Cell(0, 6, "Data Pagamento: $data_pag", 0, 1);
        $pdf->Cell(0, 6, "Observação: $lanc->observacao", 0, 1);
        $pdf->Ln(5);

        // Tabela de Itens
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(20, 6, 'Tipo', 1);
        $pdf->Cell(30, 6, 'Nembro', 1);
        $pdf->Cell(30, 6, 'Valor', 1);      
        $pdf->Cell(40, 6, 'Cond. pagamento', 1);
        $pdf->Cell(70, 6, 'Fluxo financeiro', 1);
        $pdf->Ln();

        // Itens
        $items = [
            [$lanc->tipo, $lanc->nembro, $lanc->valor, $lanc->condicoes_pagamento, $lanc->fluxo_financeiro]         
        ];

        $pdf->SetFont('helvetica', '', 10);
        foreach ($items as $item) {
            $pdf->Cell(20, 6, $item[0], 1);
            $pdf->Cell(30, 6, $item[1], 1);
            $pdf->Cell(30, 6, "R$: ".number_format((float) $item[2], 2, ',', '.'), 1);
            $pdf->Cell(40, 6, $item[3], 1);            
            $pdf->Cell(70, 6, $item[4], 1);
            $pdf->Ln();
        }

        $pdf->Ln(5);
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(160, 6, 'Total Líquido:', 1);
        $pdf->Cell(30, 6, "R$: ". number_format((float) $item[2], 2, ',', '.'), 1, 0, 'R');

        $pdf->Output('relatorio.pdf', 'I');
    }
}
