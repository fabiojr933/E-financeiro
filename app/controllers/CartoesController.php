<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Cartoes;
use app\models\service\Service;
use app\models\dao\Cartoes as CartoesModel;

class CartoesController extends Controller
{
   private $id_usuario;
   private $campo = "id";
   private $tabela = "cartoes";
   private $cartoesModel;

   public function __construct()
   {
      $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
      $cartao = new CartoesModel();
      $this->cartoesModel = $cartao;
   }

   public function index()
   {     
      $dados['listaCartoes'] = $this->cartoesModel->lista_id($this->id_usuario); 
      $dados["view"]       = "cartoes/index";
      $this->load("template", $dados);
   }
   public function novo()
   {      
      $dados["view"]       = "cartoes/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {      
      $dados['cartoes'] = Service::get($this->tabela, $this->campo, $id);
      $dados["view"]       = "cartoes/editar";
      $this->load("template", $dados);
   }
   public function salvar()
   {
      $cartao = new \stdClass();
      $cartao->id = $_POST['id'];
      $cartao->titular = $_POST['titular'];
      $cartao->nome = $_POST['nome'];
      $cartao->tipo = $_POST['tipo'];
      $cartao->id_usuario = $this->id_usuario;

     
      Flash::setForm($cartao);
      if (Cartoes::salvar($cartao, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "cartoes/index");
      } else {
         if (!$cartao) {
            $this->redirect(URL_BASE . "cartoes/novo");
         } else {
            $this->redirect(URL_BASE . "cartoes/editar");
         }
      }
   }
   public function excluir()
   {
      $cartao = new \stdClass();
      $cartao->id = $_POST['id'];
      Service::excluir($this->tabela, $this->campo, $cartao->id);
      $this->redirect(URL_BASE . "cartoes/index");
   }
}
