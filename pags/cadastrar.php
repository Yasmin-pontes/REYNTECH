<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/estilo.css">
    
    <title>Registro</title>
</head>
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

                                        <input class="form-control" type="text" name="nome" placeholder="Nome" require>
                                        <input class="form-control" type="email" name="email" placeholder="E-mail" require>
                                        <input class="form-control" type="number" name="celular" placeholder="Celular" require>
                                        <input class="form-control" type="number" name="codigo" placeholder="Código de Verificação">  
                                        <button class="btn btn-outline-primary btn-sm"> Enviar Código </button>    
                                        <input class="form-control" type="password" name="senha" placeholder="Senha" require>
                                        <input class="form-control" type="password" name="c_senha" placeholder="Confirmar Senha" require>
                                        <button type="submit" class="btn btn-outline-primary btn-sm"> Confirmar </button>
                                        <a href="../index.php"> Voltar </a>
                                </form>
                        </div>
                </div>
        </div>

</body>
</html>