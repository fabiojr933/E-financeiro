<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Nembro;
use app\models\service\Service;
use app\models\dao\Nembro as NembrosModel;

class NembroController extends Controller
{
   private $id_usuario;
   private $campo = "id";
   private $tabela = "nembros";
   private $nembrosModel;

   public function __construct()
   {
      $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
      $nembros = new NembrosModel();
      $this->nembrosModel = $nembros;
   }
   public function index()
   {
      $dados['listaNembro'] = $this->nembrosModel->lista_id($this->id_usuario);
      $dados["view"]       = "nembro/index";
      $this->load("template", $dados);
   }
   public function novo()
   {
      $dados["view"]       = "nembro/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {
      $dados['nembro'] = Service::get($this->tabela, $this->campo, $id);
      $dados["view"]       = "nembro/editar";
      $this->load("template", $dados);
   }
   public function salvar()
   {
      $nembros = new \stdClass();
      $nembros->id = $_POST['id'];
      $nembros->nome = $_POST['nome'];
      $nembros->id_usuario = $this->id_usuario;

      Flash::setForm($nembros);
      if (Nembro::salvar($nembros, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "nembro/index");
      } else {
         if (!$nembros) {
            $this->redirect(URL_BASE . "nembro/novo");
         } else {
            $this->redirect(URL_BASE . "nembro/editar");
         }
      }
   }
   public function excluir()
   {
      $nembros = new \stdClass();
      $nembros->id = $_POST['id'];
      Service::excluir($this->tabela, $this->campo, $nembros->id);
      $this->redirect(URL_BASE . "nembro/index");
   }
}
