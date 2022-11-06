<?php
include_once('../../php/conexao.php');

extract($_POST);

if (isset($_POST['nomeProdutoSend']) && isset($_POST['valorProdutoSend']) && isset($_POST['descricaoProdutoSend']) && isset($_POST['qtdProdutoSend']) && isset($_POST['imagemProdutoNovoSend']) && isset($_POST['categoriaProdutoSend'])) {
    $sql = "INSERT INTO tb_produto (cd_produto, nm_produto, vl_preco, ds_produto, qtd_produto, ft_produto_principal, id_categoria)
    VALUES (null, '$nomeProdutoSend', '$valorProdutoSend', '$descricaoProdutoSend', '$qtdProdutoSend', '$imagemProdutoNovoSend', '$categoriaProdutoSend')";

    $res = mysqli_query($mysqli, $sql);
}

?>