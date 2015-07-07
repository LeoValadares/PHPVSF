<?php

require_once __DIR__ . "/../../configuration.php";
require_once PATH . "/Base/Model/AbstractModel.php";

class Carro extends AbstractModel
{
    private $modelo;

    public function getClassName()
    {
        return __CLASS__;
    }

    public function toArray()
    {
        return ["modelo" => $this->modelo];
    }
}