<?php

namespace app\controllers;

use app\core\Controller;


class NembroController extends Controller
{
   public function index()
   {      
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
      $dados["view"]       = "nembro/editar";
      $this->load("template", $dados);
   }
}
