<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Find</title>
</head>
<body>
<h1>Find</h1>
<?php
if($object != null)
{
	$objectId = $object->getId();
	$objectClass = $object->getClassName();
	echo "<h2>$objectClass</h2><br />";
	echo "<h2>$objectId</h2><br />";
	echo "<tr>";
	foreach ($object->toArray() as $variableName => $variableValue)
	{
		echo "<td>$variableName</td>";
		echo "<td>$variableValue</td>";
	}
	echo "</tr>";
	echo "<br />";
	echo '<a href=http://' . SITE_NAME . "CarroController" . "/update/$objectId>Update</a><br />";
	echo '<a href=http://' . SITE_NAME . "CarroController" . "/delete/$objectId>Delete</a><br />";
}
else
{
	echo "<h2>Nenhum objeto encontrado</h2>";
}
?>
</body>
</html>


