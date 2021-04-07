<?php 

include '../database/bd.php';

$objBD = new bd();

if (!empty($_POST['valor'])) {
    $result = $objBD->search($_POST);
} else {
    //select * from tb_usuario
    $result = $objBD->select();
}

//var_dump($objBD->connection());

   
    
    if (!empty($_GET['id'])){
        $objBD -> remove($_GET['id']);
        header("location:UsuarioList.php");
    }


?>
<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset = "UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Listagem de Usuários</h4>
    <form action="UsuarioList.php" method="post">
        <input type="text" name="valor" id="">

        <select name="tipo" id="">
            <option value="nome">Nome</option>
            <option value="cpf">CPF</option>
            <option value="telefone">Telefone</option>
        </select>
        <input type="submit" value="Buscar">
    </form>
    <a href = '../index.php'>Voltar</a>
    <a href = './usuarioForm.php'>Cadastrar</a>

    <table>
    <th>ID</th>
    <th>Nome</th>
    <th>Telefone</th>
    <th>CPF</th>
    <th>Ação</th>
    <?php
    foreach($result as $item){
        $item = (object) $item;
        echo "
        <tr>
        <td>".$item->id."</td>
        <td>".$item->nome."</td>
        <td>".$item->telefone."</td>
        <td>".$item->cpf."</td>
        <td><a href = 'usuarioForm.php?id=". $item->id."'>Editar</a></td>
        <td><a href='UsuarioList.php?id=" . $item->id 
        . "' onclick=\"return confirm('Deseja realmente remover o registro?'); \"  >Remover</a> </td>
        </tr>";
    }
    ?>
    </table>

</body>
</html>