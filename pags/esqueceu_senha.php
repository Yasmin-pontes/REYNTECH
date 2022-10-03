<?php include('header.php'); ?>

<body>

<?php include('navbar.php'); ?> 

<center>
<form class="mt-5" method="post">
    <h2> Confirme seu email</h2>
    <input type="email" name="email" id="email" required><br>
    <br>👇<br>👉<button class="btn btn-outline-success" type="button" onclick="sendEmail()">Enviar</button>👈<br>👆
</form>
</center> 
<script>
  function sendEmail() {
  var email = document.getElementById("email"). value;
  var mensagem = "http://localhost:81/REYNTECH/pags/troca_senha.php?h=";
  var cod = email;

	  Email.send({
	  Host : "smtp.elasticemail.com",
	  Username : "raylla.l.silva@gmail.com",
	  Password : "B1EA8D7A4303C4BE5D0D454BB6955285CE15",
	  To : email,
	  From : "raylla.l.silva@gmail.com",
	  Subject : "REYNTECH",
	  Body :"Clique aqui para alterar sua senha " + mensagem + cod
	  }).then(
	    message => alert("Verifique seu email --- Pode cair na caixa de spam")
	  );
  }
</script>    
</body>
</html>