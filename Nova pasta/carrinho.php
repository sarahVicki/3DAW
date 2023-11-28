<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Carrinho</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>Meu carrinho</h1>
    <div class="botoes">
        <button class="btn01" onclick='window.location.href = "produto.html"'>Voltar</button>
    </div>

    <section>

        <div class="formulario">
            <form action="" method="POST" id="form" style="display: none;">
        
            ID: <br><input type="text" name="id" id="id"><br><br>
        
            Nome: <br><input type="text" name="nome" id="nome"><br><br>
        
            Valor: <br><input type="number" name="valor" id="valor"><br><br>
            <div class="btn02">
                <input type="button" value="Alterar" id="Alterar" style="display: none;" onclick="AlterarProduto()">
                <button onclick="RecolherForm()">Cancelar</button>
            </div>
            </form>
        </div>
        
        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password ="";
                    $database = "mercado";

                    // criando a conexão
                    $connection = new mysqli($servername, $username, $password, $database);

                    // checando a conexão
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }

                    // ler todas as colunas da tabela
                    $sql = "SELECT * FROM carrinho";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }

                    // lendo os dados de cada linha
                    while($linha = $result->fetch_assoc()) {
                       echo " 
                       <tr>
                       <td>$linha[id]</td>
                       <td>$linha[nome]</td>
                       <td>$linha[valor]</td>
                       <td>
                           <a  href='/Nova Pasta/alterarProduto.php?id=$linha[id]'>Editar</a>
                           <a  href='/Nova Pasta/excluirCarrinho.php?id=$linha[id]'>Deletar</a>
                       </td>
                   </tr>
                   "; 
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>