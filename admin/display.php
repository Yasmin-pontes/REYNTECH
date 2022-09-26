<!-- HEADER -->
<?php
session_start();
include_once("../php/conexao.php");
include('../pags/header.php');


if (isset($_POST['displaySend'])) {
    $container='<div class="row row-cols-1 row-cols-md-2">';

    $sql = "SELECT * FROM tb_produto";
    $result = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $cd_produto = $row['cd_produto'];
        $nm_produto = $row['nm_produto'];
        $vl_preco = $row['vl_preco'];
        $ds_produto = $row['ds_produto'];
        $qtd_produto = $row['qtd_produto'];
        $id_categoria = $row['id_categoria'];
        $id_imagem_produto = $row['id_imagem_produto'];
        $container .= '
        <div class="col mb-4">
          <div class="card">
            <div class="card-header header-representante-admin">'.$nm_produto.'</div>
            <div class="card-body body-representante-admin">
                <p class="card-text"><b>Código:</b> '.$cd_produto.'</p>
                <p class="card-text"><b>Nome:</b> '.$nm_produto.'</p>
                <p class="card-text"><b>Valor:</b> '.$vl_preco.'</p>
                <p class="card-text"><b>Descrição:</b> '.$ds_produto.'</p>
                <p class="card-text"><b>Quantidade:</b> '.$qtd_produto.'</p>
                <p class="card-text"><b>Categoria:</b>'.$id_categoria.'</p>
                <p class="card-text"><b>Imagem:</b>'.$id_imagem_produto.'</p>
                <button class="btn btn-secondary" onclick="GetDetails('.$cd_produto.')">Editar</button>
                <button class="btn btn-dark" onclick="deleteProduto('.$cd_produto.')">Deletar</button>
              </div>
            </div>
          </div>
        ';
    }

    
    $container .= '</div>';

    echo $container;
}?>

</body>
</html>