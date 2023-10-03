<?php

  $arq = fopen("alunos.txt","r") or die("erro ao abrir arquivo");
  $arqaux = fopen("arquivoAux.txt","w") or die("erro ao criar arquivo");

  $x = 0;
  $linhas[] = fgets($arq);

  if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $mat = $_POST["matricula"];
    $nome = "";
    $matricula = "";
    $disciplina = "";

    while (!feof($arq)){
      
      $linhas[] = fgets($arq);
	    $colunaDados = explode(";", $linhas[$x]);
      
      $nome = $colunaDados[0];
      $matricula = $colunaDados[1];
      $disciplina = $colunaDados[2];
  
      if ($mat != $matricula){
        $linha = $nome . ";" . $matricula . ";" . $disciplina . "\n";
        fwrite($arqaux,$linha);
      }
      $x++;
    }
    
    fclose($arq);
    fclose($arqaux);
    
    $arq = fopen("alunos.txt","w") or die("erro ao abrir arquivo");
    $arqaux = fopen("arquivoAux.txt","r") or die("erro ao criar arquivo");

    copy("arquivoAux.txt","alunos.txt");

    fclose($arq);
    fclose($arqaux);
  }
  unlink('arquivoAux.txt');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Aluno</title>
      
</head>
  
<body>
  <section>
    <form action="excluir.php" method="POST">
      <h2>Excluir Aluno</h2>
      Matricula: <input type="text" name="matricula">
      <br><br>
      <input type="submit" value="Excluir Aluno">
    </form>
    <div>
      <h2>Outras opções</h2>
      <a href="alterar.php">Alterar Aluno</a><br>
      <a href="incluir.php">Incluir Aluno</a><br>
      <a href="listarTodos">Listar Alunos</a><br>
      <a href="buscar.php">Buscar Aluno</a><br>
    </div>
  </section>

  </body>
</html>

<?php

  $arq = fopen("alunos.txt","r") or die("erro ao abrir arquivo");
  $arqaux = fopen("arquivoAux.txt","w") or die("erro ao criar arquivo");

  $x = 0;
  $linhas[] = fgets($arq);

  if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $mat = $_POST["matricula"];
    $nome = "";
    $matricula = "";
    $disciplina = "";

    while (!feof($arq)){
      
      $linhas[] = fgets($arq);
	    $colunaDados = explode(";", $linhas[$x]);
      
      $nome = $colunaDados[0];
      $matricula = $colunaDados[1];
      $disciplina = $colunaDados[2];
  
      if ($mat != $matricula){
        $linha = $nome . ";" . $matricula . ";" . $disciplina . "\n";
        fwrite($arqaux,$linha);
      }
      $x++;
    }
    
    fclose($arq);
    fclose($arqaux);
    
    $arq = fopen("alunos.txt","w") or die("erro ao abrir arquivo");
    $arqaux = fopen("arquivoAux.txt","r") or die("erro ao criar arquivo");

    copy("arquivoAux.txt","alunos.txt");

    fclose($arq);
    fclose($arqaux);
  }
  unlink('arquivoAux.txt');

  ?>
