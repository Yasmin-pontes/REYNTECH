<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sendEmail</title>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body>
<?php
session_start();
include_once('conexao.php');

$_SESSION['email'] = $email;

echo $_SESSION['email'];

?>

<script>
  function sendEmail() {
	Email.send({
	Host : "smtp.elasticemail.com",
	Username : "raylla.l.silva@gmail.com",
	Password : "B1EA8D7A4303C4BE5D0D454BB6955285CE15",
	To : $email,
	From : "raylla.l.silva@gmail.com",
	Subject : "REYNTECH",
	Body : "Você ganhou R$100 <br> clique aqui para pegar: clonacartão.com"
	}).then(
	  message => alert("Email enviado com sucesso 👁👄👁")
	);
  }
</script>    
<center>
    👁👄👁<br>👇<br>
<form method="post">
    👉<input type="button" value="Enviar Email" 
        onclick="sendEmail()" />👈
        <br>👆
</form>
</center>
</body>
</html>