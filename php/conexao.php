<?php

$usuario = 'root';
$senha = 'usbw';
$database = 't';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

// FUNÇÃO DE LOGIN

function Login($email, $senha) {
	$sql = 'SELECT * FROM tb_usuario WHERE email="' . $email . '"';
	$sql .= ' AND senha ="' . $senha . '"';
	$res = $GLOBALS['mysqli']->query($sql);

    if ($res->num_rows > 0) { //ENCONTROU O ALUNO
		$usuario = $res->fetch_array(); //array com os dados
		//armazenando dados da sessão
		$_SESSION['email'] = $usuario['email'];
		$_SESSION['senha'] = $usuario['senha'];
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