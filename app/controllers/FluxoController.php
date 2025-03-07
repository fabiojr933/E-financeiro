<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Fluxo;
use app\models\service\Service;
use app\models\dao\Fluxo as FluxoModel;

class FluxoController extends Controller
{
   private $id_usuario;
   private $campo = "id";
   private $tabela = "fluxo_financeiro";
   private $FluxoModel;

   public function __construct()
   {
      $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
      $fluxo = new FluxoModel();
      $this->FluxoModel = $fluxo;
   }
   public function index()
   {
      $dados['listaFluxo'] =  $this->FluxoModel->lista_id($this->id_usuario);    
      $dados["view"]       = "fluxo/index";
      $this->load("template", $dados);
   }
   public function novo()
   {
      $dados["view"]       = "fluxo/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {
      $dados['fluxo'] = Service::get($this->tabela, $this->campo, $id);
      $dados["view"]       = "fluxo/editar";
      $this->load("template", $dados);
   }
   public function salvar()
   {
      $fluxo = new \stdClass();
      $fluxo->id = $_POST['id'];
      $fluxo->nome = $_POST['nome'];
      $fluxo->tipo = $_POST['tipo'];
      $fluxo->id_usuario = $this->id_usuario;

      Flash::setForm($fluxo);
      if (Fluxo::salvar($fluxo, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "fluxo/index");
      } else {
         if (!$fluxo) {
            $this->redirect(URL_BASE . "fluxo/novo");
         } else {
            $this->redirect(URL_BASE . "fluxo/editar");
         }
      }
   }
   public function excluir()
   {
      $fluxo = new \stdClass();
      $fluxo->id = $_POST['id'];
      Service::excluir($this->tabela, $this->campo, $fluxo->id);
      $this->redirect(URL_BASE . "fluxo/index");
   }
}
