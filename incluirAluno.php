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
  </head>
  <body>
    <h1>Criar Novo Aluno</h1>
    <form action="index.php" method="POST">
        Nome: <input type="text" name="nome">
        <br><br>
        Matrícula: <input type="text" name="matricula">
        <br><br>
        Disciplina: <input type="text" name="disciplina">
        <br><br>
        <input type="submit" value="Criar Novo Aluno">
    </form>
    <p><?php echo $msg ?></p>
    <br>
  </body>
</html>
