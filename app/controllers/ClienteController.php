<?php

namespace app\controllers;

use app\core\Controller;


class ClienteController extends Controller
{
   public function index()
   {      
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
      $dados["view"]       = "cliente/editar";
      $this->load("template", $dados);
   }
}
