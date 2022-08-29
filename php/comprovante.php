<?php

use Dompdf\Dompdf;
require_once '../dompdf/autoload.inc.php';

//instanciar a classe dompdf
$dompdf = new Dompdf();

$teste = "TESTEEEEEEEEEEE";

$dompdf->loadHtml('
    <h1> GERADOR DE PDF EM PHP </h1>
    <p> VAMOS LA PRIMEIRO TESTE DO GERADOR  </p>
    <p> o que é isso ?  -->  '. $teste .'</p>
');

//renderização do html
$dompdf->render();

//gerar a saída do documento PDF
$dompdf->stream(
    "teste.pdf", //nome do arquivo pdf gerado
    array(
        "Attachment"=>false
    )
);
?>