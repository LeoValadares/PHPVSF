<?php
require_once __DIR__ . '/../../configuration.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Find</title>
</head>
<body>
<h1>Update</h1>
<?php
if ($object != null)
{
	$className = $object->getClassName();
	$id = $object->getId();

	echo "<h2>$className id: $id</h2>";

	$objectParameters = $object->toArray();

	echo '<form method="post" action="http://' . SITE_NAME . 'CarroController/update/' . $id . '">';
	echo '<input type="hidden" name="id" value="' . $id . '">';
	foreach ($objectParameters as $key => $value)
	{
		echo '<label for="' . $key . '">' . $key . ':</label>';
		echo '<input type="text" name="' . $key . '" value="' . $value . '">';
	}
	echo '<input type="submit" value="Submit">';
}
else
{
	echo "<h2>Nenhum objeto encontrado</h2>";
}
?>
</body>
</html>