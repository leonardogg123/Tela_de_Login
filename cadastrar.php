<?php
    require_once('classes/usuario.php'); 
    require_once('conexao/conexao.php');

    $database=new Conexao();
    $db=$database->getConnection();
    $usuario=new Usuario($db);

    if(isset($_POST['cadastrar'])){
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $senha=$_POST['senha'];
        $confSenha=$_POST['confSenha'];
        
        if($usuario->cadastrar($nome,$email,$senha,$confSenha)){
            echo"Cadastro realizado com sucesso";
        }else{
            echo"Erro ao cadastrar!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela de Cadastro</title>
</head>
<body>
    <div class="formulario">
    <div class="login">
    <h1>Tela de Cadastro</h1><br>
    <form method="POST">
        <label for="">Nome de usuario</label>
        <input type="text" name="nome" placeholder="Insira o nome de usuario" required>
        <label for="">E-mail</label>
        <input type="email" name="email" placeholder="Insira um E-mail" required>
        <label for="">Senha</label>
        <input type="password" name="senha" placeholder="Insira uma senha" minlength="8" required>
        <label for="">Confirmar senha</label>
        <input type="password" name="confSenha" placeholder="Confirme sua senha" minlength="8" required>
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    <a href="index.php">Voltar para a tela de login</a>
</body>
</html>
