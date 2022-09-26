<?php
session_start();
include_once("../php/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
</head>
    <?php
        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = array();
        }

        //ADD PRODUTO

        if(isset($_GET['acao'])){
            //ADD CARRINHO

            if($_GET['acao'] == 'add'){
                $id = intval($_GET['id']);
                if(!isset($_SESSION['carrinho'] [$id])){
                    $_SESSION['carrinho'] [$id] = 1;
                }else{
                    $_SESSION['carrinho'] [$id] += 1;
                }
            }

            //REMOVER CARRINHO
            if($_GET['acao'] == 'del'){ 
                $id = intval($_GET['id']);
                if(isset($_SESSION['carrinho'] [$id])){
                    unset($_SESSION['carrinho'] [$id]);
                }
            }

            //ALTERAR QUANTIDADE
            if($_GET['acao'] == 'up'){
                if(is_array($_POST['prod'])){
                    foreach($_POST['prod'] as $id => $qtd){
                        $id = intval($id);
                        $qtd = intval($qtd);
                        if(!empty($qtd)|| $qtd <> 0){
                            $_SESSION['carrinho'] [$id] = $qtd;
                        }else{
                            unset($_SESSION['carrinho'] [$id]);
                        }
                    }
                }
            }

        }
       

    ?>
<body>
    <table>
        <caption>Carrinho de Compras</caption>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Subtotal</th>
                <th>Remover</th>
            </tr>
        </thead>
            <form action="?acao=up" method="POSt">
        <tfoot>
            <tr>
                <td colspan="5"><input type="submit" value="Atualizar Carrinho"></td>
            </tr>
            <td colspan="5"><a href="pag_produtos.php">Continuar Comprando</a></td>
        </tfoot>
        <tbody>
                <?php
                    if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5"> Não há produto no carrinho </td></tr>';
                    }else{
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                            $sql = "SELECT * FROM tb_produto WHERE cd_produto= '$id'";
                            $result = mysqli_query($mysqli, $sql);

                            $row = mysqli_fetch_assoc($result);

                            $nome = $row['nm_produto'];
                            $valor = number_format ($row['vl_preco'] , 2,',','.');
                            $sub = number_format ($row['vl_preco'] * $qtd , 2,',','.');
                            $total += $sub; 

                            echo '<tr>
                                    <td>'.$nome.'</td>
                                    <td> <input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'"> </td>
                                    <td>R$ '.$valor.'</td>
                                    <td>R$ '.$sub.'</td>
                                    <td><a href="?acao=del&id='.$row['cd_produto'].'"> Remover <a/></td>
                                  </tr>';
                        }
                    } 
                    $total = number_format ($total , 2,',','.');
                    echo '<tr>
                            <td colspan="4"> Total </td>
                            <td>R$ '.$total.'</td>
                          <tr>';
                ?>
        </tbody>
            </form>
    </table>
    
</body>
<style>
table, tr, td, caption {
  border:1px solid black;
}
</style>
</html>