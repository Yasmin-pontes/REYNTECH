<?php
include_once("conexao.php");
$h = $_GET['h'];

if(!empty($h)){
    $sql = 'UPDATE tb_usuario SET status = "1" WHERE ds_email = "'. $h .'";';
	$res = $GLOBALS['mysqli']->query($sql);

    echo "<h1>CADASTRO CONFIRMADO</h1>";
};

?>