<!-- HEADER -->
<?php include('header.php'); ?>

<body>
  <?php include('navbar.php'); ?>
  <a href="../index.php"> VOLTAR </a>
  <br>
  <a href="carrinho.php"> CARRINHO </a>
  <?php
  session_start();
  include_once("../php/conexao.php");

  $sql = "SELECT * FROM tb_produto";
  $result = mysqli_query($mysqli, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    echo '<h2>' . $row['nm_produto'] . '</h2>';
    echo 'Preço: R$ ' . number_format($row['vl_preco'], 2, ',', '.') . '<br>';
    echo '<img src="../img/planta.jpg"> <br>';
    echo '<a href="carrinho.php?acao=add&id=' . $row['cd_produto'] . '">Comprar</a>';
    echo '<br> <hr>';
  }
  ?>

</body>

</html>