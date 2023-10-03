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
        justify-content: space-around;
        
      }
      
      a {
        color: black;
        text-decoration: none;
      }
      
    </style>

  </head>
  <body>
    <section>
      <form action="buscar.php" method="POST">
        <h2>Buscar Aluno</h2>
        Matricula: <input type="text" name="mat">
        <br><br>
          
        <input type="submit" value="Buscar Aluno">
      </form>
      <div>
        <h2>Outras opções</h2>
        <a href="alterar.php">Alterar Aluno</a><br>
        <a href="incluir.php">Incluir Aluno</a><br>
        <a href="listarTodos">Listar Alunos</a><br>
        <a href="excluir.php">Excluir Aluno</a><br>
      </div>
    </section>
    <br>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')  
  {
    $matriculaBusca = $_POST["mat"];
    $nome = "";
    $matricula = "";
    $disciplina = "";
    
    $arquivoAlunoIn = fopen("alunos.txt", "r");
    $x = 0;
		$linhas[] = fgets($arquivoAlunoIn);
    
    while (!feof($arquivoAlunoIn)) {
			
      $linhas[] = fgets($arquivoAlunoIn);
			$colunaDados = explode(";", $linhas[$x]);
      
			$nome = $colunaDados[0];
			$matricula = $colunaDados[1];
			$disciplina = $colunaDados[2];
    
      if ($matriculaBusca==$matricula){
        echo $linhas[$x];
        echo "Se encontra na lista";
      }
      
			$x++;
    }  
    fclose($arquivoAlunoIn);
  }
  
?>

</body>
</html>
