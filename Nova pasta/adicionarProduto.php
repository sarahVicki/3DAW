<?php

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "mercado";

    $conn = new mysqli($servidor,$username,$senha,$database);

    if($conn->connect_error){

        die("Conexao falhou, avise o administrador do sistema");
    }

    $comandoSQL = "INSERT INTO produtos (id,nome,valor) VALUES ('$id','$nome','$valor')";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado);
    echo $retorno;
    
?>