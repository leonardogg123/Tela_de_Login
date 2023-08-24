<?php

include_once('conexao/conexao.php');

$db = new Database();

class Crud{
    private $conn;
    private $table_name = "cliente";

    public function __construct($db){
        $this->conn = $db;
    }

    //função para (C)riar meu registros

public function create($postValues){
    $modelo = $postValues['nome'];
    $marca = $postValues['email'];
    $placa = $postValues['senha'];
    $cor = $postValues['confirmar_senha'];

    $query = "INSERT INTO ". $this->table_name . " (nome, email, senha, confirmar_senha) VALUES (?,?,?,?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1,$nome);
    $stmt->bindParam(2,$email);
    $stmt->bindParam(3,$senha);
    $stmt->bindParam(4,$confirmar_senha);


    $rows = $this->read();
    if($stmt->execute()){
        print "<script>alert('Cadastro Ok!')</script>";
        print "<script> location.href='?action=read'; </script>";
        return true;
    }else{
        return false;
    }
}

//função para ler os registros

public function read(){
    $query = "SELECT * FROM ". $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

//funcao atualizar registros
public function update($postValues){
    $id = $postValues['id'];
    $modelo = $postValues['nome'];
    $marca = $postValues['email'];
    $placa = $postValues['senha'];
    $cor = $postValues['confirmar_senha'];


    if(empty($id) || empty($nome) || empty($email) || empty($senha) || empty($confirmar_senha)){
        return false;
    }

    $query = "UPDATE ". $this->table_name . " SET nome = ?, email = ?, senha = ?, confirmar_senha = ?, WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1,$nome);
    $stmt->bindParam(2,$email);
    $stmt->bindParam(3,$senha);
    $stmt->bindParam(4,$confirmar_senha);
    $stmt->bindParam(5,$id);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

    //funcao para pegar os registros do banco e inserir no formulario
}
    public function readOne($id){
        $query = "SELECT * FROM ". $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //funcao para apagar os registros 
    public function delete($id){
        $query = "DELETE FROM ". $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$id);
        if($stmt->execute()){
                return true;
        }else{
            return false;
        }
    }

}


?>