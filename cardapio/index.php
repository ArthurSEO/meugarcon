<?php 
require_once("..\_connect.php");

$autenticado = false;

if ($_POST) {

	$numero_mesa = $_POST['mesa'];

	$rs = $pdo->query("SELECT * FROM mesa WHERE numero=$numero_mesa");

	if (!$rs) {
		print_r($pdo->errorInfo());
	}

	foreach ($rs as $registro) {
		if ($registro['numero'] == $numero_mesa) {
			$status = $registro['status'];
			$autenticado = true;			

		}
	}

	if ($autenticado) {
		session_start();
		$_SESSION['mesa']['numero'] = $numero_mesa;
		$_SESSION['mesa']['status'] = $status;
		echo "<script type='text/javascript'>alert('Redirecionado');</script>";
		echo "<script type='text/javascript'>window.location.href = 'cardapio.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('Mesa não cadastrada');</script>";
		echo "<script type='text/javascript'>window.location.href = 'index.php'</script>";		
	}
	
	//action="cardapio.php"
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Meu Garçon</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
</head>
<body>
	<div class="loginbox">
		<form method="post">
			<ul>
				<li><input type="text" class="text" placeholder="Mesa" name="mesa"/></li>				
				<li><input type="submit" class="button" value="Entrar"/></li>
			</ul>
		</form>
	</div>
</body>
</html>