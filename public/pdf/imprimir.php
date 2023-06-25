<?php
require __DIR__.'/vendor/autoload.php';
include_once("../../config/funcoes.php");

use Dompdf\Dompdf;

$umFavorito = [];

if( isset($_POST["imprimir_pdf"])) {
  
  $favoritoID = $_POST["favorito_id"];
  $umFavorito = umRegistroFavorito($userID, $favoritoID);
 
  $dompdf = new Dompdf();

  ob_start();
  include "impressao.php";
  $html = ob_get_clean();
  $dompdf->loadHtml($html);
  $dompdf->render();

  $output = $dompdf->output();
  header('Content-Type: application/pdf');
  $dompdf->stream($umFavorito["receitas_fa"], ['Attachment' => false]);
}









?>