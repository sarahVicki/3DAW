<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Calculadora</title>
	</head>
	<body>
		<h1>Calculadora</h1>
		<form action="calculadora.php" method="GET">
		operador 1: <input type="text" name="op1"> + <br/>
		operador 2: <input type="text" name="op2"> + <br/>
		<input type="submit" value="soma">

	<?php
		$v1 = $_GET["op1"];
		$v2 = $_GET["op2"];
		$result = $v1 + $v2;
		echo "<h1> $result </h1>";

		switch (operacao) {
		case 1: $result = $v1 + $v2;
		break; 
		case 2: $result = $v1 - $v2;
		break; 
		case 3: $result = $v1 * $v2;
		break; 
		case 4: $result = $v1 / $v2;
		break; 
		}
	?>
	</body>
</html>