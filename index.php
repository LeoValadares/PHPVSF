<?php

require_once __DIR__ . "/configuration.php";
require_once PATH . "/View/GenericView.php";
require_once PATH . "/carro.php";
require_once PATH . "/Mapper/ModelMapper.php";
require_once PATH . "/Util/PDOAdapter.php";


$params = explode("/", $_GET['path']);

$pdoAdapter = new PDOAdapter(new ReflectionClass("carro"), "mysql:host=127.0.0.1;dbname=pdotest", "root");
$modelMapper = new ModelMapper("carro", $pdoAdapter);

$selectedController = ($params[0] == null) ? "index" : $params[0];
$selectedMethod = ($params[1] == null) ? "home" : $params[1];

// removes the controller name and function from the array
$params = array_splice($params, 2);
//creates a controller of the specified type;
$executingController = new $selectedController($modelMapper);

if(count($params) == 0)
{
    $executingController->$selectedMethod();
}
else if(count($params) == 1)
{
    $executingController->$selectedMethod($params[0]);
}
else if(count($params) % 2 == 0)
{
    $associativeControllerParameters = array();
    for($i = 0; $i < count($params); $i += 2)
    {
        $associativeControllerParameters += [$params[$i] => $params[$i+1]];
    }
    $executingController->$selectedMethod($associativeControllerParameters);
}
else
{
    throw new HttpMalformedURLException();
}
