<?php

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "mercado";

    // cria a conexão
    $connection = new mysqli($servidor,$username,$senha,$database);

    // verifica a conexão
    if($connection->connect_error){

        die("Conexao falhou, avise o administrador do sistema");
    }

    if ($_SERVER['REQUEST_METHOD']=='POST') { 

        $id = $_POST["id"];
        
        $sql = "INSERT INTO carrinho (id,nome,valor) SELECT id, nome, valor FROM produtos WHERE id=$id";
        $resultado = $connection->query($sql);
        $retorno=json_encode($resultado);
        echo $retorno;

    }

    if (isset($_GET["id"])) {
    
        $id = $_GET["id"];
        $sql = "INSERT INTO carrinho (id,nome,valor) SELECT id, nome, valor FROM produtos WHERE id=$id";
        $resultado = $connection->query($sql);
        $retorno=json_encode($resultado);
        echo $retorno;
    }

    header("location: /Nova Pasta/produto.html");
    exit;
    
?>