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
       
        $dados["view"]       = "pagar/index";
        $this->load("template", $dados);
    }

    public function cancelamento()
    {
      
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
        $this->redirect(URL_BASE . "pagar/cancelamento");
    }
   
}
