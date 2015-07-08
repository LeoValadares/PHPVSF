<?php

require_once __DIR__ . "/configuration.php";
require_once PATH . "/Carro.php";
require_once PATH . "/Controller/CarroController.php";
require_once PATH . "/Mapper/ModelMapper.php";
require_once PATH . "/Util/PDOAdapter.php";

$pdoAdapter = new PDOAdapter(new ReflectionClass("carro"), "mysql:host=127.0.0.1;dbname=pdotest", "root");
$modelMapper = new ModelMapper("carro", $pdoAdapter);
$genericView = new GenericController($modelMapper);
$genericView->findAll(["modelo" => "corvette"]);
