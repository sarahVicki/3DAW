<?php
    $id = $_POST["id"];
    $upc = "";
    $nome = "";
    $valor = 0.0;

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "mercado";
    $conn = new mysqli($servidor,$username,$senha,$database);

    if($conn->connect_error){

       die("Conexao falhou, avise o administrador do sistema");
    }
    
    $comandoSQL = "DELETE FROM `carrinho` WHERE id=$id";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado, JSON_UNESCAPED_UNICODE);
    echo $retorno;
?>