<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Fornecedor;
use app\models\service\Service;
use app\models\dao\Fornecedor as FornecedorModel;

class FornecedorController extends Controller
{
   private $id_usuario;
   private $campo = "id";
   private $tabela = "fornecedores";
   private $FornecedorModel;

   public function __construct()
   {
      $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
      $fornecedor = new FornecedorModel();
      $this->FornecedorModel = $fornecedor;
   }
   public function index()
   {
      $dados['listaFornecedor'] = $this->FornecedorModel->lista_id($this->id_usuario);
      $dados["view"]       = "fornecedor/index";
      $this->load("template", $dados);
   }
   public function novo()
   {
      $dados["view"]       = "fornecedor/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {
      $dados['fornecedor'] = Service::get($this->tabela, $this->campo, $id);
      $dados["view"]       = "fornecedor/editar";
      $this->load("template", $dados);
   }
   public function salvar()
   {
      $fornecedor = new \stdClass();
      $fornecedor->id = $_POST['id'];
      $fornecedor->nome = $_POST['nome'];
      $fornecedor->id_usuario = $this->id_usuario;

      Flash::setForm($fornecedor);
      if (Fornecedor::salvar($fornecedor, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "fornecedor/index");
      } else {
         if (!$fornecedor) {
            $this->redirect(URL_BASE . "fornecedor/novo");
         } else {
            $this->redirect(URL_BASE . "fornecedor/editar");
         }
      }
   }
   public function excluir()
   {
      $fornecedor = new \stdClass();
      $fornecedor->id = $_POST['id'];
      Service::excluir($this->tabela, $this->campo, $fornecedor->id);
      $this->redirect(URL_BASE . "fornecedor/index");
   }
}
