<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>ADM</h2>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#produtos">Produtos</button>
  <br><br>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#curiosidades">Curiosidades</button>
  <br><br>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#">Usuários</button>

  <!-- Modal Primeira Página -->
    <!-- Parte Produtos -->
  <div class="modal fade" id="produtos" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Produtos</h4>
        </div>
        <div class="modal-body">
          <input type="text" name="pesquisar" placeholder="PESQUISAR"><br>
          <a data-toggle="modal" data-target="#modal_produto">ADICIONAR</a><br>
          <a data-toggle="modal" data-target="#">EXCLUIR</a><br>
          <a data-toggle="modal" data-target="#">FILTRO</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Fim da Parte Produtos -->
   <!-- Parte Curiosidades -->
  <div class="modal fade" id="curiosidades" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Produtos</h4>
        </div>
        <div class="modal-body">
          <input type="text" name="pesquisar" placeholder="PESQUISAR"><br>
          <a data-toggle="modal" data-target="#modal_curiosidade">ADICIONAR</a><br>
          <a data-toggle="modal" data-target="#">EXCLUIR</a><br>
          <a data-toggle="modal" data-target="#">FILTRO</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
   <!--Fim da Parte Curiosidades -->
 <!-- Modal Fim da Primeira Página -->

 <!-- Modal Página de ADD Produto -->
  <div class="modal fade" id="modal_produto" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar Produto</h4>
        </div>
        <div class="modal-body">
        <form method="POST">
            <input type="text" name="nome_p" placeholder="Nome do Produto" required>
            <br>
            <input type="number" name="preco" placeholder="Preço" required>
            <br>
            <select name="categorias">
                <option value="cat1">Categorias exemplo 1</option>
                <option value="cat2">Categorias exemplo 2</option>
                <option value="cat3">Categorias exemplo 3</option>
            </select>
            <br>
            <input type="text" name="descricao" placeholder="Descrição do Produto" required>
            <br>
            <label>Imagem principal do produto</label>
            <input type="file" name="img" required>
            <br>
            <p>Imagens adicionais</p>
            <input type="file" name="img_add1">
            <input type="file" name="img_add2">
            <input type="file" name="img_add3">
       
        </div>
        <div class="modal-footer">
            <button  class="btn btn-default" name="c_produtos" onclick="Produtos_ADD($_POST['nome_p'], $_POST['preco'], $_POST['categorias'], $_POST['descricao'], $_POST['img'])"> Salvar </button> </form>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
   <!-- fim do modal produtos -->

 <!-- Modal Página de ADD Curiosidades -->
 <div class="modal fade" id="modal_curiosidade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar Curiosidades</h4>
        </div>
        <div class="modal-body">
        <form method="POST">
            <input type="text" name="nome_c" placeholder="Nome da Curiosidade" required>
            <br>
            <select name="categorias">
                <option value="cat1">Categorias exemplo 1</option>
                <option value="cat2">Categorias exemplo 2</option>
                <option value="cat3">Categorias exemplo 3</option>
            </select>
            <br>
            <input type="text" name="descricao" placeholder="Descrição do Produto" required>
            <br>
            <label>Imagem principal do produto</label>
            <input type="file" name="img" required>
        </div>
        <div class="modal-footer">
            <button  class="btn btn-default" name="c_curiosidades" onclick="Curiosidades_ADD($_POST['nome_c'], $_POST['categorias'], $_POST['descricao'], $_POST['img'])"> Salvar </button> </form>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
   <!-- fim do modal curiosidades -->

</div>
</body>
</html>

<?php
    session_start();
    include_once("../php/conexao.php");
    
    //PRODUTOS
    if (isset($_POST['c_produtos'])){
      Produtos_ADD($_POST['nome_p'], $_POST['preco'], $_POST['categorias'], $_POST['descricao'], $_POST['img']);
    }
    //Curiosidades
    if (isset($_POST['c_curiosidades'])){
      Curiosidades_ADD($_POST['nome_c'], $_POST['categorias'], $_POST['descricao'], $_POST['img']);
    }
            
?>  