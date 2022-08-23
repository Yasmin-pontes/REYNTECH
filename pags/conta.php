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

    <?php
        session_start();
        include_once("../php/conexao.php");
        if (isset($_POST['email_a'])) {
            Alterar_email($email, $email_a); 
        }
    ?>


            <label>Alterar e-mail</label>
            <input type="text" name="email_a" placeholder="Alterar e-mail">
<br>
            <button type="submit" value="submit"> Alterar </button>
<br>
<a href="home.php"> Voltar </a>

</body>
</html>