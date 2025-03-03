<?php

namespace app\controllers;

use app\core\Controller;


class ContaController extends Controller
{
   public function index()
   {      
      $dados["view"]       = "conta/index";
      $this->load("template", $dados);
   }
   public function novo()
   {      
      $dados["view"]       = "conta/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {      
      $dados["view"]       = "conta/editar";
      $this->load("template", $dados);
   }
}
