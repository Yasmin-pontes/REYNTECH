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

<center>
<form method="post">
    <h2> Confirme seu email</h2>
    <input type="email" name="email" id="email" required>
    <br>👇<br>👉<input type="button" value="Enviar Email" onclick="sendEmail()" />👈<br>👆
</form>
</center> 
<script>
  function sendEmail() {
  var email = document.getElementById("email"). value;
  var mensagem = "http://localhost:81/REYNTECH/php/confirmar.php?h=";
  var cod = email;

	  Email.send({
	  Host : "smtp.elasticemail.com",
	  Username : "raylla.l.silva@gmail.com",
	  Password : "B1EA8D7A4303C4BE5D0D454BB6955285CE15",
	  To : email,
	  From : "raylla.l.silva@gmail.com",
	  Subject : "REYNTECH",
	  Body :"Clique aqui para confirmar seu email " + mensagem + cod
	  }).then(
	    message => alert("Verifique seu email --- Pode cair na caixa de spam")
	  );
  }
</script>    
</body>
</html>