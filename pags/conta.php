<!-- HEADER -->
<?php include('header.php'); ?>

<body>
    
<h1>Entre</h1>

    <h3>Segurança</h3>
	    <form method="POST">

            <label>Alterar e-mail</label> <br>
            <input type="text" name="email_a" placeholder="Alterar e-mail">
<br>
            <button name="c_gmail" onclick="Alterar_email($email, $email_a)"> Alterar </button>
<br><br>
            <label>Adicionar e-mail</label> <br>
            <input type="text" name="email_add" placeholder="Adicionar e-mail">
<br>
            <button name="add_email" onclick="Add_email($email, $email_add)"> Adicionar </button>
<br><br>
            <label>Alterar senha</label> <br>
            <input type="text" name="senha" placeholder="Senha atual"> <br>
            <input type="text" name="a_senha" placeholder="Nova senha"> <br>
            <input type="text" name="con_senha" placeholder="Confirmar senha">
<br>
            <button name="c_pass" onclick="Alterar_senha($email, $a_senha, $senha, $con_senha)"> Alterar </button>
<br><br>

<a href="home.php"> Voltar </a>
</body>
<?php
    session_start();
    include_once("../php/conexao.php");

    //ALTERAR E-MAIL
        if(isset($_POST["c_gmail"])){
            Alterar_email($email, $email_a);
        }
    
    //ADD E-MAIL
        if (isset($_POST["add_email"])) {
            Add_email($email, $email_add); 
        }
    
    //ALTERAR SENHA
        if (isset($_POST["c_pass"])) {
            Alterar_senha($email, $a_senha, $senha, $con_senha); 
        }
    ?>
</html>