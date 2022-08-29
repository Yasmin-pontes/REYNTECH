<?php
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
        header('Location: ../pags/home.php');
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
	$img = 1;

	$sql = 'INSERT INTO tb_usuario (cd_usuario, nm_usuario, dt_ingresso, ds_email, ds_email_recuperacao, ds_senha, nr_celular, id_imagem_usuario) 
	VALUES (null, "'. $nome .'", NOW(), "' . $email . '", null , "' . $senha . '", "' . $celular . '", "' . $img . '");';
	$res = $GLOBALS['mysqli']->query($sql);

    if ($res) {
		//Cadastrado
		header('Location: ../pags/login.php');
	} else {
		echo "error";
		//erro ao cadastrar
	}
}

// FIM FUNÇÃO DE CADASTRAR


// FUNÇÃO DE ALTERAR EMAIL
function Alterar_email($email, $email_a){

	$email_a = $_POST['email_a'];
	$email = $_SESSION['email'];

	$sql = 'UPDATE tb_usuario SET ds_email ="'. $email_a .'" WHERE ds_email = "'. $email .'";';
	$res = $GLOBALS['mysqli']->query($sql);
	
	if ($res) {
		//Alterado
		?> <script> alert("E-mail Alterado -- Reinicie a sessão ") </script> <?php
		echo "<script>window.location = '../index.php'</script>";
	} else {
		//Erro
		?> <script> alert("ERRO") </script> <?php
	}
}    
// FIM DA FUNÇÃO DE ALTERAR EMAIL

// FUNÇÃO DE FUNÇÃO DE ADD EMAIl
function Add_email($email, $email_add){

	$email_add = $_POST['email_add'];
	$email = $_SESSION['email'];

	$sql = 'UPDATE tb_usuario SET ds_email_recuperacao ="'. $email_add .'" WHERE ds_email = "'. $email .'";';
	$res = $GLOBALS['mysqli']->query($sql);
	
	if ($res) {
		//Alterado
		?> <script> alert("E-mail Adicionado") </script> <?php
	} else {
		//Erro
		?> <script> alert("ERRO") </script> <?php
	}
}    
// FIM DA FUNÇÃO DE ADD EMAIl


// FUNÇÃO DE ALTERAR SENHA
function Alterar_senha($email, $a_senha, $senha){

	$a_senha = $_POST['a_senha'];
	$email = $_SESSION['email'];
	$senha = $_POST['senha'];
	$con_senha = $_POST['con_senha'];

	$sql = 'SELECT * FROM tb_usuario WHERE ds_email="' . $email . '"';
	$sql .= ' AND ds_senha ="' . $senha . '"';
	$res = $GLOBALS['mysqli']->query($sql);

	if ($res->num_rows > 0) {


		if ($con_senha == $a_senha){
			$sql = 'UPDATE tb_usuario SET ds_senha ="'. $a_senha .'" WHERE ds_email = "'. $email .'";';
			$res = $GLOBALS['mysqli']->query($sql);

			if ($res) {
				//Alterado
				?> <script> alert("Senha Alterada") </script> <?php
			}else{
				//Erro
				?> <script> alert("ERRO") </script> <?php
			}
		}else{
			//Senhas Diferentes
			?> 
			<style>
				#senha2 {
					border-color: red;
				}
			</style> <?php
		}
	}else{
		//Senha Incorreta
		?> <script> alert("Senha Incorreta") </script> <?php
	} 
}
// FIM DA FUNÇÃO DE ALTERAR SENHA
