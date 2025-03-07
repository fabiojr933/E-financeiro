<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Cliente;
use app\models\service\Service;
use app\models\dao\Cliente as ClienteModel;

class ClienteController extends Controller
{
   private $id_usuario;
   private $campo = "id";
   private $tabela = "Clientes";
   private $ClienteModel;

   public function __construct()
   {
      $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
      $cliente = new ClienteModel();
      $this->ClienteModel = $cliente;
   }
   public function index()
   {
      $dados['listaCliente'] = $this->ClienteModel->lista_id($this->id_usuario);
      $dados["view"]       = "cliente/index";
      $this->load("template", $dados);
   }
   public function novo()
   {
      $dados["view"]       = "cliente/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {
      $dados['cliente'] = Service::get($this->tabela, $this->campo, $id);
      $dados["view"]       = "cliente/editar";
      $this->load("template", $dados);
   }
   public function salvar()
   {
      $cliente = new \stdClass();
      $cliente->id = $_POST['id'];
      $cliente->nome = $_POST['nome'];
      $cliente->id_usuario = $this->id_usuario;

      Flash::setForm($cliente);
      if (Cliente::salvar($cliente, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "cliente/index");
      } else {
         if (!$cliente) {
            $this->redirect(URL_BASE . "cliente/novo");
         } else {
            $this->redirect(URL_BASE . "cliente/editar");
         }
      }
   }
   public function excluir()
   {
      $Cliente = new \stdClass();
      $Cliente->id = $_POST['id'];
      Service::excluir($this->tabela, $this->campo, $Cliente->id);
      $this->redirect(URL_BASE . "cliente/index");
   }
}
