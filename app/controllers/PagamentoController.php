<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Pagamento;
use app\models\service\Service;
use app\models\dao\Pagamento as PagamentoModel;

class PagamentoController extends Controller
{
   private $id_usuario;
   private $campo = "id";
   private $tabela = "condicoes_pagamento";
   private $pagamentoModel;

   public function __construct()
   {
      $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
      $pagamento = new PagamentoModel();
      $this->pagamentoModel = $pagamento;
   }

   public function index()
   {
      $dados['listaPagamento'] = $this->pagamentoModel->lista_id($this->id_usuario);
      $dados["view"]       = "pagamento/index";
      $this->load("template", $dados);
   }
   public function novo()
   {     
      $dados["view"]       = "pagamento/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {
      $dados['pagamento'] = Service::get($this->tabela, $this->campo, $id);
      $dados["view"]       = "pagamento/editar";
      $this->load("template", $dados);
   }
   public function salvar()
   {
      $pagamento = new \stdClass();
      $pagamento->id = $_POST['id'];
      $pagamento->nome = $_POST['nome'];
      $pagamento->id_usuario = $this->id_usuario;
    
      Flash::setForm($pagamento);
      if (Pagamento::salvar($pagamento, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "pagamento/index");
      } else {
         if (!$pagamento) {
            $this->redirect(URL_BASE . "pagamento/novo");
         } else {
            $this->redirect(URL_BASE . "pagamento/editar");
         }
      }
   }
   public function excluir()
   {
      $pagamento = new \stdClass();
      $pagamento->id = $_POST['id'];
      Service::excluir($this->tabela, $this->campo, $pagamento->id);
      $this->redirect(URL_BASE . "pagamento/index");
   }
}
