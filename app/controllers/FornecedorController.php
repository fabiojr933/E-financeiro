<?php

namespace app\controllers;

use app\core\Controller;
use TCPDF;

require_once('vendor/autoload.php');

class FornecedorController extends Controller
{
   public function index()
   {
      $dados["view"]       = "fornecedor/index";
      $this->load("template", $dados);
   }
   public function novo()
   {
      $dados["view"]       = "fornecedor/novo";
      $this->load("template", $dados);
   }
   public function editar($id)
   {
      $dados["view"]       = "fornecedor/editar";
      $this->load("template", $dados);
   }

   
   public function teste()
   {
      $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
      $pdf->SetMargins(10, 10, 10);
      $pdf->SetAutoPageBreak(true, 10);
      $pdf->AddPage();

      // Cabeçalho
      $pdf->SetFont('helvetica', 'B', 12);
      $pdf->Cell(0, 10, 'SOL MAQUINAS', 0, 1, 'C');
      $pdf->SetFont('helvetica', '', 10);
      $pdf->Cell(0, 5, 'CNPJ: 08.862.647/0001-34', 0, 1, 'C');
      $pdf->Cell(0, 5, 'Telefone: (66) 3552-4480', 0, 1, 'C');
      $pdf->Cell(0, 5, 'Email: solmaquina@hotmail.com', 0, 1, 'C');
      $pdf->Ln(5);

      // Dados do Pedido
      $pdf->SetFont('helvetica', 'B', 10);
      $pdf->Cell(0, 6, 'PEDIDO: 0231910', 0, 1);
      $pdf->SetFont('helvetica', '', 10);
      $pdf->Cell(0, 6, 'Data Efetivada: 11/01/2022 10:42:40', 0, 1);
      $pdf->Cell(0, 6, 'Cliente: 00336 - PEDRO SARTORI FILHO', 0, 1);
      $pdf->Cell(0, 6, 'Telefone: (66) 9602-0791', 0, 1);
      $pdf->Cell(0, 6, 'Endereco: LINHA 27, COMUNIDADE SAO CRISTOVAO - MT', 0, 1);
      $pdf->Ln(5);

      // Tabela de Itens
      $pdf->SetFont('helvetica', 'B', 10);
      $pdf->Cell(30, 6, 'Código', 1);
      $pdf->Cell(80, 6, 'Descrição', 1);
      $pdf->Cell(20, 6, 'Qtd', 1);
      $pdf->Cell(30, 6, 'Unitário', 1);
      $pdf->Cell(30, 6, 'Líquido', 1);
      $pdf->Ln();

      // Itens
      $items = [
         ['011002', 'ANEL VITON', 2, 41.55, 78.95],
         ['004561', 'PORCA PINHAO LATERAL D6', 2, 28.51, 54.17],
         ['008639', 'COLA SILICONE CINZA THREEBOND 85G', 1, 36.89, 35.05],
      ];

      $pdf->SetFont('helvetica', '', 10);
      foreach ($items as $item) {
         $pdf->Cell(30, 6, $item[0], 1);
         $pdf->Cell(80, 6, $item[1], 1);
         $pdf->Cell(20, 6, $item[2], 1, 0, 'C');
         $pdf->Cell(30, 6, number_format($item[3], 2, ',', '.'), 1, 0, 'R');
         $pdf->Cell(30, 6, number_format($item[4], 2, ',', '.'), 1, 0, 'R');
         $pdf->Ln();
      }

      $pdf->Ln(5);
      $pdf->SetFont('helvetica', 'B', 10);
      $pdf->Cell(160, 6, 'Total Líquido:', 1);
      $pdf->Cell(30, 6, '168,17', 1, 0, 'R');

      $pdf->Output('relatorio.pdf', 'I');
   }
}
