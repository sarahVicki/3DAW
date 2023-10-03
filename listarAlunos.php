<?php

  $matricula = "";
	$disciplina = "";
	$nome = "";
	
  $arquivoAlunoIn = fopen("alunos.txt", "r") or die("erro ao abrir arquivo");
  $x = 0;
	$linhas[] = fgets($arquivoAlunoIn);
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h1>Lista de Alunos</h1>
    <table>
      <tr>
      <th>Nome</th>
      <th>Matrícula</th>
      <th>Disciplina</th>
      </tr>
    <?php
      while (!feof($arquivoAlunoIn)) {
			 $linhas[] = fgets($arquivoAlunoIn);
			 $colunaDados = explode(";", $linhas[$x]);
			 $nome = $colunaDados[0];
			 $matricula = $colunaDados[1];
			 $disciplina = $colunaDados[2];
          echo "<tr>";
          echo "<td>" . $nome . "</td>";
          echo "<td>" . $matricula . "</td>";
          echo "<td>" . $disciplina . "</td>";
          echo "</tr>";
			 $x++;  
      }
      fclose($arquivoAlunoIn);
    ?>
    </table>
  </body>
</html>
