<html>

<body>
    <form method="POST" enctype="multipart/form-data">

        <?php
        if (isset($_FILES['img_produto'])) {
            $img_produto = $_FILES['img_produto'];

            if ($img_produto['error']) {
                die("Falha ao enviar o arquivo.");
            }

            if ($img_produto['size'] > 3097152) {
                die("Arquivo muito grande. Max.: 2MB");
            }

            $pasta = "arquivos/";
            $nomeDaImg = $img_produto['name'];
            $novoNomeDaImg = uniqid();
            $extensao = strtolower(pathinfo($nomeDaImg,PATHINFO_EXTENSION));

            if ($extensao != "jpg" && $extensao != "png") {
                die("Tipo de arquivo não suportado.");
            }

            $tudo_certo = move_uploaded_file($img_produto["tmp_name"], $pasta . $novoNomeDaImg . "." . $extensao);

            if ($tudo_certo) {
                echo "Arquivo enviado com sucesso!";
            } else {
                echo "Falha ao enviar o arquivo.";
            }
        }
        ?>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="imagemProduto" name="img_produto">
            <label for="imagemProduto" class="label-file rounded-start">Selecione uma Imagem</label>
            <input type="text" class="form-control input-file" value="Nenhum arquivo selecionado" disabled>
        </div>

        <button value="submit">SIM</button>
    </form>
</body>

</html>