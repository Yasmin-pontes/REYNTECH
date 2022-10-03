<?php include('../pags/header.php'); ?>
<link rel="stylesheet" href="../css/estilo.css">

<body class="fundo-admin">

	<div class="container">
		<div class="row">

			<form method="POST">

				<?php
				session_start();
				include_once("../php/conexao.php");
				if (isset($_POST['user_adm'])) {
					LoginAdmin($_POST['user_adm'], $_POST['senha_adm']);
				}
				?>

				<section>
					<div class="container mt-5 pt-5">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-8 col-lg-6 m-auto">
								<div class="card border-0">
									<div class="card-body shadow-lg">
										<a href="../index.php"><button type="button" class="btn-close" aria-label="Close"></button></a>
										<img class="rounded mx-auto d-block" src="../assets/cactu.gif" alt="Logo" height="120px" width="150px">
										<form action="php/login.php" method="POST">
											<div class="form-group">
												<input type="text" class="form-control my-3 py-2 input-bloco" name="user_adm" placeholder="Admin" required autofocus />
											</div>
											<div class="form-group">
												<input type="password" class="form-control my-3 py-2 input-bloco" name="senha_adm" placeholder="Senha" required autofocus />
											</div>
											<div class="text-center mt-3">
												<button type="submit" class="btn btn-outline-success px-5 input-focus-color-success">Entrar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
			</form>
		</div>
	</div>


</body>

</html>