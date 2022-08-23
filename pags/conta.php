<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta</title>
</head>
<body>
    
<h1>Entre</h1>

    <h3>Segurança</h3>
	    <form method="POST">

            <label>Alterar e-mail</label>
            <input type="text" name="email_a" placeholder="Alterar e-mail">
<br>
            <button name="c_gmail" onclick="Alterar_email($email, $email_a)"> Alterar </button>
<br>
<br>    
            <label>Alterar senha</label>
            <input type="text" name="a_senha" placeholder="Alterar senha">
<br>
            <button name="c_pass" onclick="Alterar_senha($email, $a_senha)"> Alterar </button>

<br>
<a href="home.php"> Voltar </a>
</body>
<?php
    session_start();
    include_once("../php/conexao.php");

        if(isset($_POST["c_gmail"])){
            Alterar_email($email, $email_a);
        }
        if (isset($_POST["c_pass"])) {
            Alterar_senha($email, $a_senha); 
        }
    ?>
</html>