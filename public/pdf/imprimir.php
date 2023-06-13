<?php
require __DIR__.'/vendor/autoload.php';
include_once("../../config/funcoes.php");

use Dompdf\Dompdf;
use Dompdf\Options;

$onlyFavorito = [];

if( isset($_POST["imprimir_pdf"])) {
  $favoritoID = $_POST["favorito_id"];
  $onlyFavorito = umRegistroFavorito($userID, $favoritoID);
  // Carregar HTML para renderizar
  // $html = "<html><body><h1>". $onlyFavorito["nome"] . "</h1></body></html>";
  $dompdf = new Dompdf();
  // $dompdf->loadHtml($html);
  // $dompdf->loadHtml(file_get_contents('impressao.php'));
  ob_start();
  include "impressao.php";
  $html = ob_get_clean();
  $dompdf->loadHtml($html);
  // Renderizar HTML para PDF
  $dompdf->render();

  $output = $dompdf->output();
  header('Content-Type: application/pdf');
  // echo $output;
  // Saída do PDF
  $dompdf->stream($onlyFavorito["receitas_fa"], ['Attachment' => false]);
  // $dompdf->stream('nome_do_arquivo.pdf');
  // $dompdf->output('imprimir.php', 'F');
}









?>