<html>
    <head>
        <title>calculadora</title>
    </head>
    <body>
        <h1>calculadora</h1>
        <form action="teste.php" method="GET">
        operador 1: <input type="text" name="op1"><br>
        operador 2: <input type="text" name="op2">
        <br>
       
        <form action="teste.php"><br>

        <input type="radio"  name="valor" value="soma">
        <label for="soma">soma</label><br>

        <input type="radio"  name="valor" value="subtracao">
        <label for="subtracao">subtracao</label><br>

        <input type="radio"  name="valor" value="multiplicacao">
        <label for="multiplicacao">multiplicacao</label><br>

        <input type="radio"  name="valor" value="divisao">
        <label for="divisao">divisao</label><br>
        <br><br>

        <input type="submit" value="calcular">
        </form>

  <?php
    $v1 = $_GET["op1"];
    $v2 = $_GET["op2"];

    $valor= $_GET["valor"];

    switch($valor){

      case "soma":
            $result = $v1+$v2;
            break;

      case "subtracao":
            $result = $v1-$v2;
            break;

      case "multiplicacao":
            $result = $v1*$v2;
            break;

      case "divisao": 
            $result = $v1/$v2;
            break;
    }
    echo "<h1>Resuldado: $result </h1>";
           
    ?>
  </body>
</html>
