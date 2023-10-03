<?php
  $msg = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST')  
  {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $disciplina = $_POST["disciplina"];
  
    $msg = "";
    
    echo "nome: " . $nome . " matricula: " . $matricula . " disciplina: " . $disciplina;
    
    $arqDisc = fopen("alunos.txt","a") or die("erro ao criar arquivo");
    
    $linha = "nome;matricula;disciplina\n";
    
    $linha = $nome . ";" . $matricula . ";" . $disciplina . "\n";
    
    fwrite($arqDisc,$linha);

    fclose($arqDisc);
    
    $msg = "Deu tudo certo!!!"; 
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
        background-color: rgb(241, 236, 221);
        font-family: Arial, Helvetica, sans-serif;
      }
      
      section{
          display: flex;
          justify-content: space-around;
          width: 100%;
      }
      
      form {
        background-color: white;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-top: 5px;
        padding-bottom: 15px;
        padding-left: 20px;
        width: 50%;
        border-radius: 5%;
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
      }

      div {
        width: 30%;
        display: grid;
        justify-content: center;
      }
      
      a {
        color: black;
        text-decoration: none;
      }
      
    </style>
  </head>
  <body>
    <section>
      <form action="incluir.php" method="POST">
        <h2>Incluir Aluno</h2>
        Nome: <input type="text" name="nome" placeholder="Maria"><br><br>
        Matrícula: <input type="text" name="matricula" placeholder="1234"><br><br>
        Disciplina: <input type="text" name="disciplina" placeholder="3daw"><br><br>
        <input type="submit" value="Incluir Aluno">
      </form>
      <div>
        <h2>Outras opções</h2>
        <a href="alterar.php">Alterar Aluno</a><br>
        <a href="buscar.php">Buscar Aluno</a><br>
        <a href="listarTodos">Listar Alunos</a><br>
        <a href="excluir.php">Excluir Aluno</a><br>
      </div>
    </section>
  </body>
</html>