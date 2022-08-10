<?php
session_start();
include_once('conexao.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	header('Location: ../index.php');
}
?>