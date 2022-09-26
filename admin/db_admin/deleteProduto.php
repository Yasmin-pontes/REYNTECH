<?php
include '../../php/conexao.php';

if (isset($_POST['deletesend'])) {
    $unique = $_POST['deletesend'];

    $sql = "DELETE FROM tb_produto WHERE cd_produto=$unique";
    $result = mysqli_query($mysqli, $sql);
}

?>