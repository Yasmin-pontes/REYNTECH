<?php

session_start();
include_once("../php/conexao.php");
include('../pags/header.php');

?>

<body>

  <!-- Modal de Cadastro -->
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nomeProduto">Nome do Produto</label>
            <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
          </div>
          <div class="form-group">
            <label for="valorProduto">Valor</label>
            <input type="number" class="form-control" id="valorProduto" placeholder="Valor">
          </div>
          <div class="form-group">
            <label for="descricaoProduto">Descrição</label>
            <input type="text" class="form-control" id="descricaoProduto" placeholder="Descrição">
          </div>
          <div class="form-group">
            <label for="qtdProduto">Quantidade</label>
            <input type="text" class="form-control" id="qtdProduto" placeholder="Quantidade">
          </div>
          <div class="form-group">
            <label for="categoriaProduto">Categoria</label>
            <input type="number" class="form-control" id="categoriaProduto" placeholder="Categoria">
          </div>
          <div class="form-group">
            <label for="imagemProduto">Imagem</label>
            <input type="text" class="form-control" id="imagemProduto" placeholder="Imagem">
          </div>
          <div class="modal-footer mx-auto mt-3">
            <button type="button" class="btn btn-dark" onclick="addProduto()">Salvar</button>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Hide this modal and show the first with the button below.
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
        </div>
      </div>
    </div>
  </div>
  <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
  <!-- Fim do Modal de Cadastro -->




  <!-- Modal de Edição -->
  <div class="modal fade" id="updateModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nomeProduto">Nome do Produto</label>
            <input type="text" class="form-control" id="nomeProdutoAlter" placeholder="Nome do Produto">
          </div>
          <div class="form-group">
            <label for="valorProduto">Valor</label>
            <input type="number" class="form-control" id="valorProdutoAlter" placeholder="Valor">
          </div>
          <div class="form-group">
            <label for="descricaoProduto">Descrição</label>
            <input type="text" class="form-control" id="descricaoProdutoAlter" placeholder="Descrição">
          </div>
          <div class="form-group">
            <label for="qtdProduto">Quantidade</label>
            <input type="text" class="form-control" id="qtdProdutoAlter" placeholder="Quantidade">
          </div>
          <div class="form-group">
            <label for="categoriaProduto">Categoria</label>
            <input type="number" class="form-control" id="categoriaProdutoAlter" placeholder="Categoria">
          </div>
          <div class="form-group">
            <label for="imagemProduto">Imagem</label>
            <input type="text" class="form-control" id="imagemProdutoAlter" placeholder="Imagem">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" onclick="updateDetails()">Alterar</button>
            <input type="hidden" id="hiddendata">
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Hide this modal and show the first with the button below.
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
        </div>
      </div>
    </div>
  </div>
  <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
  <!-- Fim do Modal de Edição -->





  <div id="displayAdmin"></div>





  <footer class="text-center mt-5 bg-dark text-white">
    Metstars - 2022
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      displayData();
    });

    function displayData() {
      var displayData = "true";

      $.ajax({
        url: 'display.php',
        type: 'post',
        data: {
          displaySend: displayData
        },
        success: function(data, status) {
          $('#displayAdmin').html(data);
        }
      });
    }

    // Adição de Produto
    function addProduto() {
      var nomeProdutoAdd = $('#nomeProduto').val();
      var valorProdutoAdd = $('#valorProduto').val();
      var descricaoProdutoAdd = $('#descricaoProduto').val();
      var qtdProdutoAdd = $('#qtdProduto').val();
      var categoriaProdutoAdd = $('#categoriaProduto').val();
      var imagemProdutoAdd = $('#imagemProduto').val();

      $.ajax({
        url: 'db_admin/addProduto.php',
        type: 'post',
        data: {

          nomeProdutoSend: nomeProdutoAdd,
          valorProdutoSend: valorProdutoAdd,
          descricaoProdutoSend: descricaoProdutoAdd,
          qtdProdutoSend: qtdProdutoAdd,
          categoriaProdutoSend: categoriaProdutoAdd,
          imagemProdutoSend: imagemProdutoAdd,

        },
        success: function(data, status) {
          //console.log(status);
          displayData();
        }
      });
    }


    // Deleção do Produto
    function deleteProduto(deleteid) {
      $.ajax({
        url: 'db_admin/deleteProduto.php',
        type: 'post',
        data: {
          deletesend: deleteid
        },
        success: function(data, status) {
          displayData();
        }
      });
    }


    // Alteração de Produto
    function GetDetails(updateid) {
      $('#hiddendata').val(updateid);
      $.post('db_admin/updateProduto.php', {
        updateid: updateid
      }, function(data, status) {
        var produto = JSON.parse(data);
        $('#cdProduto').val(produto.cd_produto);
        $('#nomeProdutoAlter').val(produto.nm_produto);
        $('#valorProdutoAlter').val(produto.vl_preco);
        $('#descricaoProdutoAlter').val(produto.ds_produto);
        $('#qtdProdutoAlter').val(produto.qtd_produto);
        $('#categoriaProdutoAlter').val(produto.id_categoria);
        $('#imagemProdutoAlter').val(produto.id_imagem_produto);
      });

      $('#updateModal').modal('show');
    }

    //Eevento onclick do EDITAR 
    function updateDetails() {
      var cdProduto = $('#cdProduto').val();
      var nomeProdutoAlter = $('#nomeProdutoAlter').val();
      var valorProdutoAlter = $('#valorProdutoAlter').val();
      var descricaoProdutoAlter = $('#descricaoProdutoAlter').val();
      var qtdProdutoAlter = $('#qtdProdutoAlter').val();
      var categoriaProdutoAlter = $('#categoriaProdutoAlter').val();
      var imagemProdutoAlter = $('#imagemProdutoAlter').val();
      var hiddendata = $('#hiddendata').val();

      $.post('db_admin/updateProduto.php', {
        cdProduto : cdProduto,
        nomeProdutoAlter: nomeProdutoAlter,
        valorProdutoAlter: valorProdutoAlter,
        descricaoProdutoAlter: descricaoProdutoAlter,
        qtdProdutoAlter: qtdProdutoAlter,
        categoriaProdutoAlter: categoriaProdutoAlter,
        imagemProdutoAlter: imagemProdutoAlter,
        hiddendata: hiddendata,
      }, function(data, status) {
        $('#updateModal').modal('hide');
        displayData();
      });
    }
  </script>
</body>

</html>