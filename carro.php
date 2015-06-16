<?php

require_once __DIR__ . "/configuration.php";
require_once PATH . "/Model/AbstractModel.php";

class carro extends AbstractModel
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