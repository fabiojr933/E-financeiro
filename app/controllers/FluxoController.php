<?php

namespace app\controllers;

use app\core\Controller;


class FluxoController extends Controller
{
   public function index()
   {      
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
      $dados["view"]       = "fluxo/editar";
      $this->load("template", $dados);
   }
}
