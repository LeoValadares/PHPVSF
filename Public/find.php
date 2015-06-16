<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find</title>
</head>
<body>
    <?php
        $objectId = $object->getId();
        $objectClass = $object->getClassName();
        echo "<h2>$objectClass</h2><br />";
        echo "<h2>$objectId</h2><br />";
        echo "<tr>";
        foreach($object->toArray() as $variableName => $variableValue)
        {
            echo "<td>$variableName</td>";
            echo "<td>$variableValue</td>";
        }
        echo"</tr>";
    ?>
</body>
</html>


