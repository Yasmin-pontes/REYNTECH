<?php
include_once('../../php/conexao.php');

extract($_POST);

if (isset($_POST['nomeProdutoSend']) && isset($_POST['valorProdutoSend']) && isset($_POST['descricaoProdutoSend']) && isset($_POST['qtdProdutoSend']) && isset($_POST['categoriaProdutoSend']) && isset($_POST['imagemProdutoSend'])) {
    $sql = "INSERT INTO tb_produto (cd_produto, nm_produto, vl_preco, ds_produto, qtd_produto, id_categoria, id_imagem_produto)
    VALUES (null, '$nomeProdutoSend', '$valorProdutoSend', '$descricaoProdutoSend', '$qtdProdutoSend', '$categoriaProdutoSend', '$imagemProdutoSend')";

    $res = mysqli_query($mysqli, $sql);
}

?>