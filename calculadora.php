<html>
    <head>
        <title>calculadora</title>
    </head>
    <body>
        <h1>calculadora</h1>

        <form action="index.php" method="GET">
                operador 1: <input type="text" name="op1"><br>
                operador 2: <input type="text" name="op2">
                <br>
        <form action="index.php"><br>

        <input type="radio"  name="valor" value="1">
        <label for="1">soma</label><br>

        <input type="radio"  name="valor" value="2">
        <label for="2">subtracao</label><br>

        <input type="radio"  name="valor" value="3">
        <label for="3">multiplicacao</label><br>

        <input type="radio"  name="valor" value="4">
        <label for="4">divisao</label><br>

        <input type="radio"  name="valor" value="5">
        <label for="5">seno</label><br>

        <input type="radio"  name="valor" value="6">
        <label for="6">cosseno</label><br>

        <input type="radio"  name="valor" value="7">
        <label for="7">tangente</label><br>

        <input type="radio"  name="valor" value="8">
        <label for="8">elevado</label><br>

        <input type="radio"  name="valor" value="9">
        <label for="9">raiz</label><br>
        <br><br>

        <input type="submit" value="calcular">
        </form>

   
    <?php 
            $v1= $_GET["op1"];
            $v2= $_GET["op2"];
            $valor= $_GET["valor"];

            function soma ($arg1, $arg2){
                return $arg1 + $arg2;
            }
            
            function sub ($arg1, $arg2){
                return $arg1 - $arg2;
            }

            function mult ($arg1, $arg2){
                return $arg1 * $arg2;
            }
            
            function div ($arg1, $arg2){
                return $arg1 / $arg2;
            }
               
 
            switch ($valor){
                case 1: $result = soma ($v1, $v2);
                    break;
                case 2: $result = sub ($v1, $v2);
                    break;
                case 3: $result = mult ($v1, $v2);
                    break;
                case 4: $result = div ($v1, $v2);
                    break;
                case 5: $result = sin ($v1);
                    break;
                case 6: $result = cos ($v1);
                    break;
                case 7: $result = tan ($v1);
                    break;
                case 8: $result = pow ($v1, $v2);
                    break;
                case 9: $result = sqrt($v1);
                    break;
            }

            echo "<h1> Resultado: $result </h1>";
    ?> 
    </body>
</html>