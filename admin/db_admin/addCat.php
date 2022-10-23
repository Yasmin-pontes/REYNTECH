<?php
include_once('../../php/conexao.php');

extract($_POST);

if (isset($_POST['addCatSend'])) {
    $sql = "INSERT INTO tb_categoria (cd_categoria, nm_categoria)
    VALUES (null, '$addCatSend')";

    $res = mysqli_query($mysqli, $sql);
}

?>