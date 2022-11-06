<?php

session_start();
include_once("../php/conexao.php");
include('../pags/header.php');

?>

<body>
    <link rel="stylesheet" href="css/estilo_adm.css">
    <a href="../index.php">Voltar</a>

    <h3 class='my-3 mx-3'>Produtos</h3>

    <!-- Modal de Cadastro -->
    <form method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Cadastrar Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="px-4">
                            <div class="row g-4">
                                <div class="col-md py-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nomeProduto" placeholder="Rosa">
                                        <label for="nomeProduto">Nome do Produto</label>
                                    </div>
                                </div>

                                <div class="col-md py-2">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="valorProduto" placeholder="R$10,00">
                                        <label for="valorProduto">Valor do Produto</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row g-4">
                                <div class="col-md py-2">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Bela rosa..." id="descricaoProduto"></textarea>
                                        <label for="descricaoProduto">Descrição do Produto</label>
                                    </div>
                                </div>

                                <div class="col-md py-2">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="qtdProduto" placeholder="3">
                                        <label for="qtdProduto">Quantidade do Produto</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md py-2">
                                    <div class="input-group">
                                        <select class="form-select py-3" onchange="adicionarCategoria()">
                                            <option selected>Categoria do Produto</option>

                                            <?php
                                            $sql = "SELECT * FROM tb_categoria";
                                            $res = mysqli_query($mysqli, $sql);

                                            while ($row = mysqli_fetch_assoc($res)) {
                                                echo "<option id='categoriaProduto' value='" . $row['cd_categoria'] . "'>" . $row['cd_categoria'] . "- " . $row['nm_categoria'] . "</option>";
                                            };
                                            ?>

                                        </select>

                                        <script>
                                            $(document).ready(function() {
                                                $("#btn").click(function() {
                                                    $("#addCat").toggleClass("add_Categoria");
                                                    $("#btn").toggleClass("add_Categoria_btn");
                                                });
                                            });
                                        </script>

                                        <button class="btn btn-outline-secondary add_Categoria_btn" id="btn" type="button">Add</button>
                                        <input type="text" id="addCat" class="form-control add_Categoria" placeholder="Adicionar Categoria" onchange="addCat()">

                                    </div>
                                </div>

                                <div class="col-md py-2">

                                    <?php
                                    if (isset($_FILES['img_produto'])) {

                                        $img_produto = $_FILES['img_produto'];

                                        if ($img_produto['error']) {
                                            ?><script>alert("Falha ao enviar o arquivo.");</script><?php
                                            exit();
                                        }

                                        if ($img_produto['size'] > 3097152) {
                                            ?><script>alert("Arquivo muito grande. Max.: 2MB");</script><?php
                                            exit();
                                        }

                                        $pasta = "arquivos/";
                                        $nomeDaImg = $img_produto['name'];
                                        $novoNomeDaImg = uniqid();
                                        $extensao = strtolower(pathinfo($nomeDaImg, PATHINFO_EXTENSION));

                                        if ($extensao != "jpg" && $extensao != "jpeg" && $extensao != "png") {
                                            ?><script>alert("Tipo de arquivo não suportado.");</script><?php
                                            exit();
                                        }
                                        $path = $pasta . $novoNomeDaImg . "." . $extensao;
                                        $tudo_certo = move_uploaded_file($img_produto["tmp_name"], $path);

                                        if ($tudo_certo) { 
                                            ?><script>alert("Arquivo enviado com sucesso!");</script><?php
                                        } else {
                                            ?><script>alert("Falha ao enviar o arquivo.");</script><?php
                                        }
                                    } 
                                    ?>

                                    <script>
                                        $(document).ready(function() {
                                            $("#imagemProduto").change(function() {
                                                var nomeImg = $('#imagemProduto').val();
                                                $("#status-input").val("Arquivo selecionado: " + nomeImg);
                                            });
                                        });

                                        var imagemProdutoNovo = "<?php echo $path; ?>";
                                    </script>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="imagemProdutoNovo" value="<?php echo $path; ?>" hidden>
                                        <input type="file" class="form-control" id="imagemProduto" name="img_produto">
                                        <label for="imagemProduto" class="label-file rounded-start">Selecione uma Imagem</label>
                                        <input type="text" class="form-control input-file" id="status-input" value="Arquivo não selecionado" disabled>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" onclick="addProduto()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <a class="btn btn-dark mb-3 mx-3" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Adicionar Produto</a>
    <!-- Fim do Modal de Cadastro -->




    <!-- Modal de Edição -->
    <div class="modal fade" id="updateModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
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
    <!-- Fim do Modal de Edição -->


    <div id="displayAdmin"></div>


    <?php include('../pags/footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        var categoriaProdutoAdd;

        $(document).ready(function() {
            displayData();
        });

        // Exibir Categoria
        function adicionarCategoria() {
            categoriaProdutoAdd = $(".form-select option:checked").val();
        }

        // Exibir display
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

        // Adicionar categoria
        if ($('#addCat').val() != null) {
            function addCat() {
                var addCat = $('#addCat').val();

                $.ajax({
                    url: 'db_admin/addCat.php',
                    type: 'post',
                    data: {
                        addCatSend: addCat,
                    },
                    success: function(data, status) {
                        $(document).change(function() {
                            displayData();
                        });
                    }
                });
            }
        }

        // Adição de Produto
        function addProduto() {
            var nomeProdutoAdd = $('#nomeProduto').val();
            var valorProdutoAdd = $('#valorProduto').val();
            var descricaoProdutoAdd = $('#descricaoProduto').val();
            var qtdProdutoAdd = $('#qtdProduto').val();
            var imagemProdutoNovoAdd = imagemProdutoNovo;

            $.ajax({
                url: 'db_admin/addProduto.php',
                type: 'post',
                data: {

                    nomeProdutoSend: nomeProdutoAdd,
                    valorProdutoSend: valorProdutoAdd,
                    descricaoProdutoSend: descricaoProdutoAdd,
                    qtdProdutoSend: qtdProdutoAdd,
                    categoriaProdutoSend: categoriaProdutoAdd,
                    imagemProdutoNovoSend: imagemProdutoNovoAdd,

                },
                success: function(data, status) {
                    //console.log(status);
                    displayData();
                }
            });
            window.location.reload(true);
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
            var nomeProdutoAlter = $('#nomeProdutoAlter').val();
            var valorProdutoAlter = $('#valorProdutoAlter').val();
            var descricaoProdutoAlter = $('#descricaoProdutoAlter').val();
            var qtdProdutoAlter = $('#qtdProdutoAlter').val();
            var categoriaProdutoAlter = $('#categoriaProdutoAlter').val();
            var imagemProdutoAlter = $('#imagemProdutoAlter').val();
            var hiddendata = $('#hiddendata').val();

            $.post('db_admin/updateProduto.php', {
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