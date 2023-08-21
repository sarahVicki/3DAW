<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Calculadora</title>
	</head>
	<body>
		<h1>Calculadora - soma</h1>
		<form action="teste.php" method="GET">
		operador 1: <input type="text" name="op1"> + <br/>
		operador 2: <input type="text" name="op2"> + <br/>
		<input type="submit" value="soma">

	<?php
		$v1 = $_GET["op1"];
		$v2 = $_GET["op2"];
		$result = $v1 + $v2;
		echo "<h1> $result </h1>";
	?>
	</body>
</html>