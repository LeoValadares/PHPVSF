<?php

require_once __DIR__ . "/configuration.php";
require_once PATH . "/View/GenericView.php";
require_once PATH . "/carro.php";
require_once PATH . "/Presenter/ModelMapper.php";
require_once PATH . "/Util/PDOAdapter.php";


$request = str_replace("/" . BASE_DIRECTORY, "", $_SERVER['REQUEST_URI']);
$params = explode("/", $request);


$pdoAdapter = new PDOAdapter(new ReflectionClass("carro"), "mysql:host=127.0.0.1;dbname=pdotest", "root");
$modelMapper = new ModelMapper("carro", $pdoAdapter);

$class = new $params[0]($modelMapper);
$class->$params[1]($params[2]);