<?php

use Dompdf\Dompdf;
require_once '../dompdf/autoload.inc.php';

session_start();
include_once("conexao.php");

//instanciar a classe dompdf
$dompdf = new Dompdf();

        foreach($_SESSION['carrinho'] as $id => $qtd){
            $sql = "SELECT * FROM tb_produto WHERE cd_produto= '$id'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);

            $nome = $row['nm_produto'];
            $sub = number_format ($row['vl_preco'] * $qtd , 2,',','.');
            $total += $sub;
            $total = number_format ($total , 2,',','.');
        }
        $array = array("planta 1","planta 2","planta 3");
$dompdf->loadHtml('

    <h1> Comprovante de Compra </h1>
    <p> PDF com os produtos comprados  </p>
    <b> Produtos: </b>
    <br>
    '.$array[0].' <br> '.$array[1].'<br>'.$array[2].'
    <br><br><br>
    <b>Preço Total: </b> R$ '.$total.'
    
');

//renderização do html
$dompdf->render();

//gerar a saída do documento PDF
$dompdf->stream(
    "comprovante.pdf", //nome do arquivo pdf gerado
    array(
        "Attachment"=>false
    )
);
?>