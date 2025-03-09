<?php

namespace app\controllers;

use app\core\Controller;
use DateTime;
use app\models\dao\Home as HomeModel;

class HomeController extends Controller
{

   private $id_usuario;
   private $HomeModel;

   public function __construct()
   {
      $this->id_usuario = $_SESSION[SESSION_LOGIN]['id_usuario'];
      $home = new HomeModel();
      $this->HomeModel = $home;
   }

   public function index()
   {

      // Verifica se os parâmetros existem antes de acessá-los
      $data_inicio = $_GET['data_inicio'] ?? null;
      $data_final = $_GET['data_final'] ?? null;

      $dataAtual = new DateTime();
      $ano = $dataAtual->format('Y');
      $mes = $dataAtual->format('m');
      $datasMes = self::obterDatasMes($ano, $mes);

      // Se os parâmetros não forem passados, usa os valores padrão
      if (empty($data_inicio) || empty($data_final)) {
         $data_inicio = $datasMes['inicial'];
         $data_final = $datasMes['final'];
      }

      $data = [
         'data_inicio' => $data_inicio,
         'data_final'  => $data_final,
      ];

      $Total_entrada = $this->HomeModel->EntradaData($data_inicio, $data_final, $this->id_usuario);
      $Total_saida = $this->HomeModel->SaidaData($data_inicio, $data_final, $this->id_usuario);
      $Total_contas_a_receber = $this->HomeModel->contas_a_receber_data($data_inicio, $data_final, $this->id_usuario);
      $Total_contas_recebida = $this->HomeModel->contas_a_recebidas_data($data_inicio, $data_final, $this->id_usuario);
      $Total_contas_a_pagar = $this->HomeModel->contas_a_pagar_data($data_inicio, $data_final, $this->id_usuario);
      $Total_contas_pagas = $this->HomeModel->contas_pagas_data($data_inicio, $data_final, $this->id_usuario);

      $dados['Total_Entrada'] = $Total_entrada;
      $dados['Total_Saida'] = $Total_saida;
      $dados['Total_contas_a_receber'] = $Total_contas_a_receber;
      $dados['Total_contas_recebida'] = $Total_contas_recebida;
      $dados['Total_contas_a_pagar'] = $Total_contas_a_pagar;
      $dados['Total_contas_pagas'] = $Total_contas_pagas;
      $dados['data'] = $data;
      $dados["view"] = "home";
      $this->load("template", $dados);
   }

   function obterDatasMes($ano, $mes)
   {
      $dataInicial = new DateTime("$ano-$mes-01");
      $ultimoDia = $dataInicial->format('t');
      $dataFinal = new DateTime("$ano-$mes-$ultimoDia");

      return [
         'inicial' => $dataInicial->format('Y-m-d'),
         'final' => $dataFinal->format('Y-m-d'),
      ];
   }
}
