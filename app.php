<?php

require_once "configuration.php";
require_once "carro.php";
require_once PATH . "/View/GenericView.php";
require_once PATH . "/Presenter/ModelMapper.php";
require_once PATH . "/Util/PDOAdapter.php";

$pdoAdapter = new PDOAdapter(new ReflectionClass("carro"), "mysql:host=127.0.0.1;dbname=pdotest", "root");
$modelMapper = new ModelMapper("carro", $pdoAdapter);
$genericView = new GenericView($modelMapper);
$genericView->findAll(["modelo" => "corvette"]);
