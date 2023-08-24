<?php
session_start();

if(!isset($_SESSION['nome'])){ 
    header("Location: index.php");
    exit();
}

$nome = $_SESSION['nome']; 

if(isset($_POST['atualizar'])){

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
<div class="formulario">
    <div class="login">
    <h1>Painel de controle</h1>
    <p>Seja bem-vindo <?php echo $nome; ?></p><br>

<form method="POST">
    <label for="nome">Novo nome</label>
    <input type="text" name="novo_nome" placeholder="Novo nome" value="<?php echo $nome; ?>">

    <label for="email">Novo e-mail</label>
    <input type="email" name="novo_email" placeholder="Novo e-mail">

    <label for="senha">Nova senha</label>
    <input type="password" name="nova_senha" placeholder="Nova senha">

    <button type="submit" name="atualizar">Atualizar</button>
</form>

    <a href="logout.php">Sair</a>
</body>
</html>
