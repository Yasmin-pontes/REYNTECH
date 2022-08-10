<?php
session_start();
include('conexao.php');

        $email_r = $_POST['email_r'];

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email_r'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
             ?> <script> alert('E-mail ja registrado') </script>
            <p> <a href="registro.php">Voltar</a> </p> 
            <?php

            $usuario = $sql_query->fetch_assoc(); 

        } else {
            $nome = $_POST['nome'];
            $email_r = $_POST['email_r'];
            $senha = $_POST['senha'];
            $celular = $_POST['celular'];

            $sql = "insert into usuarios (nome, email, senha, celular) values ('$nome', '$email_r', '$senha', '$celular')";
            $salvar = mysqli_query($mysqli, $sql);
        
            ?> <script> alert('E-mail registrado com sucesso') </script>
            <p> <a href="login.php">Voltar</a> </p> 
            <?php
        }
session_destroy();
?>