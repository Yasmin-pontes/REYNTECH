<?php include('../pags/header.php'); ?>
<link rel="stylesheet" href="../css/estilo.css">

<body>

        <div class="container">
                <div class="row">
                        <div class="col-6">
                                <header>
                                        <h1>Registre sua conta</h1>
                                </header>
                                <form method="POST">
                                        <?php
                                        session_start();
                                        include_once("../php/conexao.php");
                                        if (isset($_POST['nome'], $_POST['email'], $_POST['celular'], $_POST['codigo'], $_POST['senha'], $_POST['c_senha'])) {
                                                Cadastrar($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['celular']);
                                        }
                                        ?>
                                        <input class="form-control mb-2" type="text" name="nome" placeholder="Nome" required>
                                        <input class="form-control mb-2" id="email" type="email" name="email" placeholder="E-mail" required>
                                        <input class="form-control mb-2" type="number" name="celular" placeholder="Celular" required>
                                        <input class="form-control mb-2" type="number" name="codigo" placeholder="Código de Verificação">
                                        <button class="btn btn-outline-primary btn-sm mb-2"> Enviar Código </button>
                                        <input class="form-control mb-2" type="password" id="senha1" name="senha" placeholder="Senha" required>
                                        <input class="form-control mb-2" type="password" id="senha2" onchange="senhaDiff()" name="c_senha" placeholder="Confirmar Senha" required>
                                        <span class="erro-pass" style="color:red;"></span>

                                        <button type="submit" class="btn btn-outline-primary btn-sm"> Confirmar </button>


                                        <a href="../index.php"> Voltar </a>

                                </form>

                                <script>
                                    function senhaDiff() {
                                        var senha1 = document.getElementById("senha1").value;
                                        var senha2 = document.getElementById("senha2").value;
                                        
                                        if (senha2 != senha1) {
                                                document.getElementById('senha2').style.borderColor = 'red';
                                                document.getElementById('senha2').style.color = 'red';
                                        } else {
                                                document.getElementById('senha2').style.borderColor = 'green';
                                                document.getElementById('senha2').style.color = 'green';
                                        }
                                    }
                                </script>
                        </div>
                </div>
        </div>

</body>

</html>