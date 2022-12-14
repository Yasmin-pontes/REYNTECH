<!-- HEADER -->

<style>
  body {
    overflow-x: hidden !important;
  }
</style>

<?php
session_start();
include_once("../php/conexao.php");
include('../pags/header.php');


if (isset($_POST['displaySend'])) {
    $container='<div class="row row-cols-1 row-cols-md-3 p-5">';

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
          <div class="card" style="width: 22rem;">
            
            <img src="../img/fundoHome.jpg" class="card-img-top" alt="...">
            <div class="card-body body-representante-admin">
                <h5 class="card-title">'.$nm_produto.'</h5>
                <p class="card-text"><b>Código:</b> '.$cd_produto.'</p>
                <p class="card-text"><b>Nome:</b> '.$nm_produto.'</p>
                <p class="card-text"><b>Valor:</b> R$ '.number_format("$vl_preco",2,",",".").'</p>
                <p class="card-text"><b>Descrição:</b> '.$ds_produto.'</p>
                <p class="card-text"><b>Quantidade:</b> '.$qtd_produto.'</p>';  

                $sql = "SELECT nm_categoria FROM tb_categoria WHERE cd_categoria=$id_categoria";
                $res = mysqli_query($mysqli, $sql);
                
                while ($row = mysqli_fetch_assoc($res)) {
                    $row['nm_categoria'];
                
                $container .= '
                <p class="card-text"><b>Categoria:</b> '.$row['nm_categoria'].'</p>'; 
                };

                $container .= '
                <button class="btn btn-success" onclick="GetDetails('.$cd_produto.')">Editar</button>
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