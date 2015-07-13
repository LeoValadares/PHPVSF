<?php

require_once __DIR__ . "/../../configuration.php";
require_once PATH . "/Base/Model/AbstractModel.php";

class Carro extends AbstractModel
{
    private $modelo;

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getClassName()
    {
        return __CLASS__;
    }

    public function toArray()
    {
        return ["modelo" => $this->modelo];
    }
}