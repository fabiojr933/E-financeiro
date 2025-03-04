<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Carteira;
use app\models\service\Service;
use app\models\dao\Carteira as CarteirasModel;

class CarteiraController extends Controller
{
   private $id_usuario;
   private $campo = "id";
   private $tabela = "carteiras";
   private $carteiraModel;


   public function __construct()
   {
      $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
      $carteira = new CarteirasModel();
      $this->carteiraModel = $carteira;
   }

   public function index()
   {
      $dados['listaCarteira'] = $this->carteiraModel->lista_id($this->id_usuario);
      $dados["view"]       = "carteira/index";
      $this->load("template", $dados);
   }
   public function novo()
   {
      $dados["view"]       = "carteira/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {
      $dados['carteira'] = Service::get($this->tabela, $this->campo, $id);
      $dados["view"]       = "carteira/editar";
      $this->load("template", $dados);
   }
   public function salvar()
   {
      $carteira = new \stdClass();
      $carteira->id = $_POST['id'];
      $carteira->nome = $_POST['nome'];
      $carteira->id_usuario = $this->id_usuario;

      Flash::setForm($carteira);
      if (Carteira::salvar($carteira, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "carteira/index");
      } else {
         if (!$carteira) {
            $this->redirect(URL_BASE . "carteira/novo");
         } else {
            $this->redirect(URL_BASE . "carteira/editar");
         }
      }
   }
   public function excluir()
   {
      $carteira = new \stdClass();
      $carteira->id = $_POST['id'];
      Service::excluir($this->tabela, $this->campo, $carteira->id);
      $this->redirect(URL_BASE . "carteira/index");
   }
}
