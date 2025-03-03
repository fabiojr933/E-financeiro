<?php

namespace app\controllers;

use app\core\Controller;


class PagamentoController extends Controller
{
   public function index()
   {      
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
      $dados["view"]       = "pagamento/editar";
      $this->load("template", $dados);
   }
}
