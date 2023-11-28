<?php

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $sala = $_POST["sala"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "concurso";

    $conn = new mysqli($servidor,$username,$senha,$database);

    if($conn->connect_error){

        die("Conexao falhou, avise o administrador do sistema");
    }

    $comandoSQL = "INSERT INTO fiscais (nome,cpf,sala) VALUES ('$nome','$cpf','$sala')";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado);
    echo $retorno;

?>
