<?php

require_once __DIR__ . "configuration.php";
require_once PATH . "carro.php";
require_once PATH . "/View/GenericView.php";
require_once PATH . "/Mapper/ModelMapper.php";
require_once PATH . "/Util/PDOAdapter.php";

$pdoAdapter = new PDOAdapter(new ReflectionClass("carro"), "mysql:host=127.0.0.1;dbname=pdotest", "root");
$modelMapper = new ModelMapper("carro", $pdoAdapter);
$genericView = new GenericView($modelMapper);
$genericView->findAll(["modelo" => "corvette"]);
