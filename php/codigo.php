<?php
include('conexao.php');

// LOGIN //
if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        ?> <script> alert('Preencha seu email') </script>
        <p> <a href="login.php">Voltar</a> </p> 
        <?php
        
    } else if(strlen($_POST['senha']) == 0) {
        ?> <script> alert('Preencha sua senha') </script>
        <p> <a href="login.php">Voltar</a> </p> 
        <?php
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
                
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../pags/home.php");

        } else {
            ?> <script> alert('Falha ao logar! E-mail ou senha incorretos') </script>
            <p> <a href="login.php">Voltar</a> </p> 
            <?php
        }

    }

}
?>