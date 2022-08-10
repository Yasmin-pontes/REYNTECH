<?php
session_start();
$usuario = 'root';
$senha = 'usbw';
$database = 'db_msgarden';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

// FUNÇÃO DE LOGIN

function Login($email, $senha) {
    
	$sql = 'SELECT * FROM tb_usuario WHERE ds_email="' . $email . '"';
	$sql .= ' AND ds_senha ="' . $senha . '"';
	$res = $GLOBALS['mysqli']->query($sql);

    if ($res->num_rows > 0) { //ENCONTROU O USUÁRIO
		$usuario = $res->fetch_array(); //array com os dados
		//armazenando dados da sessão
		$_SESSION['email'] = $usuario['ds_email'];
		$_SESSION['senha'] = $usuario['ds_senha'];
        header('Location: home.php');
    } else {
        ?>
        <script>
            alert("Usuário invalido.");
        </script>
        <?php
    }
}

// FIM DA FUNÇÃO DE LOGIN

// FUNÇÃO DE CADASTRAR

function Cadastrar($nome, $email, $senha, $celular) {
    $r_email = "bn@bn";
	$ingresso = "2000-12-12";

	$sql = 'INSERT INTO tb_usuario (cd_usuario, nm_usuario, dt_ingresso, ds_email, ds_email_recuperacao, ds_senha, nr_celular) VALUES (null, ';
	$sql .= '"' . $nome . '",';
	$sql .= '"' . $ingresso . '",';
	$sql .= '"' . $email . '",';
	$sql .= '"' . $r_email . '",';
    $sql .= '"' . $senha . '",';
    $sql .= '"' . $celular . '",';
	$res = $GLOBALS['mysqli']->query($sql);

    if ($res) {
		//Cadastrado

		?><script>alert("Cadastrado com sucesso!\n>Login liberado.");
		header('Location: login.php');</script> <?php
	} else {
		echo $sql;
		//erro ao cadastrar
		
		
		//volta();
	}
}