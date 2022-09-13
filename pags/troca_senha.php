<html>
    <center>
    <title> Trocar Senha </title>
    <form method="POST">
        <input type="text" name="senha" placeholder="Senha">
        <input type="submit" value="CONFIRMAR">
    </form>
    </center>
</html>


<?php
include_once("../php/conexao.php");
$h = $_GET['h'];
$senha = $_POST['senha'];

if (isset($_POST['senha'])){
    if(!empty($h)){

        $sql = 'UPDATE tb_usuario SET ds_senha ="'. $senha .'" WHERE ds_email = "'. $h .'";';
        $res = $GLOBALS['mysqli']->query($sql);

        echo "SENHA ALTERADA <br>";
        echo "<a href='../index.php'> Logar </a>";
    }
}

?>
