<?php
include '../../php/conexao.php';

if (isset($_POST['updateid'])) {
    $prduto_id = $_POST['updateid'];

    $sql = "SELECT * FROM tb_produto WHERE cd_produto=$prduto_id";
    $result = mysqli_query($mysqli, $sql);
    $response = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status']=200;
    $response['messege']="Inválido";
}

// Editar query
if (isset($_POST['hiddendata'])) {
    $uniqueid = $_POST['hiddendata'];
    $cdProduto = $_POST['cdProduto'];
    $nomeProduto = $_POST['nomeProdutoAlter'];
    $valorProduto = $_POST['valorProdutoAlter'];
    $descricaoProduto = $_POST['descricaoProdutoAlter'];
    $qtdProduto = $_POST['qtdProdutoAlter'];
    $categoriaProduto = $_POST['categoriaProdutoAlter'];
    $imagemProduto = $_POST['imagemProdutoAlter'];

    $sql = "UPDATE tb_produto SET cd_prpduto='$cdProduto', vl_preco='$valorProduto', ds_produto='$descricaoProduto', qtd_produto='$qtdProduto', id_categoria='$categoriaProduto', id_imagem_produto='$imagemProduto' WHERE cd_produto=$uniqueid";
    $result = mysqli_query($mysqli, $sql);
}