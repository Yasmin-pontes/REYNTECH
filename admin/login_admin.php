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

	<title>ADM</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<h1>Acesse sua conta de ADM</h1>

			<h3>Entre</h3>
			<form method="POST">

				<?php
					session_start();
		 			include_once("../php/conexao.php");
	 				if (isset($_POST['user_adm'])) {
						LoginAdmin($_POST['user_adm'], $_POST['senha_adm']);
					}
				?>
				
				<div class="row">
					<div class="col-lg-12 no-pdd">
						<div class="sn-field">
							<input type="text" name="user_adm" placeholder="User">
							<i class="la la-user"></i>
						</div>
						<!--sn-field end-->
					</div>
					<div class="col-lg-12 no-pdd">
						<div class="sn-field">
							<input type="password" name="senha_adm" placeholder="Senha">
							<i class="la la-lock"></i>
						</div>
					</div>
<br><br>
					<div class="col-lg-12 no-pdd">
						<button type="submit" value="submit">Entrar</button>
						<br>
						<a href="../index.php"> Voltar </a>
					</div>
				</div>
			</form>
		</div>
	</div>
	

</body>
</html>