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
      <form action="alterar.php" method="POST">
        <h2>Alterar Aluno</h2>
        Matricula Original: <input type="text" name="mat">
        <br><br>
        Matricula nova: <input type="text" name="matricula1">
        <br><br>
        Nome novo: <input type="text" name="nome1">
        <br><br>
        Disciplina: <input type="text" name="disc">
        <br><br>
        <input type="submit" value="Alterar Aluno">
      </form>
      <div>
        <h2>Outras opções</h2>
        <a href="incluir.php">Incluir Aluno</a><br>
        <a href="buscar.php">Buscar Aluno</a><br>
        <a href="listarTodos.php">Listar Alunos</a><br>
        <a href="excluir.php">Excluir Aluno</a><br>
      </div>
    </section>
    <br>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST')  
      {
        $nome1 = $_POST["nome1"];
        $matricula1 = $_POST["matricula1"];
        $mat = $_POST["mat"];
        $disc = $_POST["disc"];
        
        $matricula = "";
    		$disciplina = "";
    		$nome = "";
    
        $arquivoAlunoIn = fopen("alunos.txt", "r");
        $arquivo = fopen("alunos2.txt", "w");
      
        $x = 0;
    		$linhas[] = fgets($arquivoAlunoIn);
    
        while (!feof($arquivoAlunoIn)) {
        
    			$linhas[] = fgets($arquivoAlunoIn);
    			$colunaDados = explode(";", $linhas[$x]);
          
    			$nome = $colunaDados[0];
    			$matricula = $colunaDados[1];
    			$disciplina = $colunaDados[2];
          
          if ($mat==$matricula)
          {
            $matricula = $matricula1;
            $nome = $nome1;
            $disciplina = $disc;
          }
          
          $linha = $nome . ";" . $matricula . ";" . $disciplina;
          fwrite($arquivo,$linha);
          
    			$x++;
        }
        fclose($arquivoAlunoIn);
        fclose($arquivo);
    
        $arquivoAlunoIn = fopen("alunos.txt", "w");
        $arquivo = fopen("alunos2.txt", "r");
    
        copy("alunos2.txt","alunos.txt");
    
        fclose($arquivoAlunoIn);
        fclose($arquivo);
      }
      unlink("alunos2.txt");  
    ?>
  </body>
</html>
