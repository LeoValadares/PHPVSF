<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Find</title>
</head>
<body>
<h1>Find All</h1>
<?php
if (count($objects) > 0)
{
	$objectClass = $objects[0]->getClassName();
	echo "<h2>$objectClass</h2><br />";
	echo "<table>";
	foreach ($objects as $object)
	{
		echo "<tr>";

		$objectId = $object->getId();
		foreach ($object->toArray() as $variableName => $variableValue)
		{
			echo "<td>$objectId</td>";
			echo "<td>$variableName</td>";
			echo "<td>$variableValue</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}
else
{
	echo "<h2>Nenhum objeto encontrado</h2>";
}
?>
</body>
</html>
