<?php

require_once "Util/PDOAdapter.php";
require_once "carro.php";

$rc = new ReflectionClass("carro");
$pdo = new PDOAdapter($rc, "mysql:host=127.0.0.1;dbname=pdotest", "root");
$pdo->connect();
//$consulta = ["modelo" => "500"];
//$pdo->select("carro", $consulta);
//$pdo->execute([":modelo" => "500"]);
$pdo->delete("carro");
print_r($pdo->countAffectedRows());
//$pdo->execute(array("id" => "3", "modelo" => "Picanto"));
//var_dump($pdo->fetchAll());
$pdo->disconnect();

