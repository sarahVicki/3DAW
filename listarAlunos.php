<?php
    $matricula = "";
		$disciplina = "";
		$nome = "";
		$msg = "";
        $arquivoAlunoIn = fopen("alunos.txt", "r") or die("erro ao criar arquivo");
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

<br>
  <p><?php echo $msg ?></p>

</body>
</html>
