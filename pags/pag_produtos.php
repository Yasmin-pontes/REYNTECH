<!-- HEADER -->
<?php include('header.php'); ?>
<link rel="stylesheet" href="../css/estilo.css">

<body>
  <?php include('navbar.php'); ?>
  <a href="../index.php"> VOLTAR </a>
  <br>
  <a href="carrinho.php"> CARRINHO </a>

  <h1 class="titulo text-center">Produtos</h1>

  <div class="container">
    <div class="row">
      <?php
      session_start();
      include_once("../php/conexao.php");

      $sql = "SELECT * FROM tb_produto";
      $result = mysqli_query($mysqli, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col mb-5"><div class="card bg-white" style="width: 18rem;">';
        echo '<img  class="card-img-top" src="../img/planta.jpg"> <br>';
        echo '<div class="card-body">'
          . $row['nm_produto'] .
          '<br>Preço: R$' . number_format($row['vl_preco'], 2, ',', '.') .
          '</div>';
        echo '<div class="text-center mb-4"><a class="btn-comprar" href="carrinho.php?acao=add&id=' . $row['cd_produto'] . '">Comprar</a></div>';
        echo '</div></div>';
      }
      ?>
    </div>
  </div>

  <?php include('footer.php'); ?>

</body>

</html>