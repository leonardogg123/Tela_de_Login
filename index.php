<?php
session_start();

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$cliente = new Usuario($db);

if(isset($_POST['logar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if($cliente->logar($nome, $senha)){
        $_SESSION['nome'] = $nome;

        header("Location: dashboard.php");
        exit();

    }else{
        print "<script> alert ('Credenciais invalidas')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="formulario">
<div class="login">
    <h1>Tela de Login</h1><br>
<form method="POST">
    <label for="nome">Nome de usuario</label>
    <input type="text" name="nome" placeholder="Coloque seu nome" required>
    <label for="Senha">Senha</label>
    <input type="password" name="senha" placeholder="Coloque sua Senha" minlength="8" required>

    <button type="submit" name="logar">Logar</button>
</form>    
    <a href="cadastrar.php">Clique aqui para criar uma conta</a>
</body>
</html>