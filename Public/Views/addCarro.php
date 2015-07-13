<?php
require_once __DIR__ . '/../../configuration.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Adicionar Carro</title>
</head>
<body>
<h1>Adicionar Carro</h1>
<br/>

<div id="box">
	<form method="post" action="<?php echo 'http://' . SITE_NAME . 'CarroController/save'; ?>">
		<label for="modelo">Modelo:</label>
		<input type="text" name="modelo">
		<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>