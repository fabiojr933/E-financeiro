<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Service;
use app\models\service\Usuario as ServiceUsuario;

class LoginController extends Controller
{
   private $campo = "id";
   private $tabela = "usuarios";

   public function index()
   {
      $dados["view"]       = "login";
      $this->load("login", $dados);
   }
   public function cadastrar()
   {
      $dados["view"]       = "login/cadastrar";
      $this->load("cadastrar", $dados);
   }

   public function salvar()
   {
      $usuario = new \stdClass();
      $usuario->nome       = $_POST['nome'];
      $usuario->email      = $_POST['email'];
      $usuario->senha_hash = md5($_POST['senha_hash']);
      $usuario->telefone   = $_POST['telefone'];


      Flash::setForm($usuario);
      if (ServiceUsuario::salvar($usuario, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "login");
      } else {
         $this->redirect(URL_BASE . "login/cadastrar");
      }
   }

   public function logar()
   {
      $email       = $_POST["email"];
      $senha_hash = md5($_POST["senha_hash"]);

      Flash::setForm($_POST);
      if (Service::logar("email", $email, $senha_hash, $this->tabela)) {
       
         $this->redirect(URL_BASE . "");
      } else {
         $this->redirect(URL_BASE . "login");
      }
   }

   public function sair()
   {
      session_unset();
      header("location: " . URL_BASE . 'home');
   }
}
