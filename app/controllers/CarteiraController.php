<?php

namespace app\controllers;

use app\core\Controller;


class CarteiraController extends Controller
{
   public function index()
   {      
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
      $dados["view"]       = "carteira/editar";
      $this->load("template", $dados);
   }
}
