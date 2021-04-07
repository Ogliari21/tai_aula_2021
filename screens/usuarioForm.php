<?php

include '../database/bd.php';

$objBD = new bd();

if (!empty($_POST['nome'])) {
    $dados = [
        "id" => $_POST['id'],
        "nome" => $_POST['nome'], "telefone" => $_POST['telefone'],
        "cpf" => $_POST['cpf']
    ];

    if (!empty($_POST['id'])) {
        $objBD->update($dados);
    } else {
        $objBD->insert($dados);
    }

   
    header("location:usuarioList.php");
}elseif(!empty($_GET['id'])){
    $result = $objBD->find($_GET['id']);
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
<h3>Formulário</h3>
    <form action="usuarioForm.php" method="post">
        <input type="hidden" name="id" value="<?php echo !empty($result->id)
        ? $result-> id : ""; ?>"><br>
        <label for="">Nome</label>
        <input type="text" name="nome" id="" value="<?php echo !empty($result->nome)
        ? $result->nome : ""; ?>"><br>

        <label for="">Telefone</label>
        <input type="text" name="telefone" id="" value="<?php echo !empty($result->telefone)
        ? $result->telefone : ""; ?>" required><br>

        <label for="">CPF</label>
        <input type="text" name="cpf" id="" value="<?php echo !empty($result->cpf)
        ? $result-> cpf : ""; ?>" required><br>
        <input type="submit" value="Salvar">
        <a href="./UsuarioList.php">Voltar</a>
    </form>
</body>
</html>