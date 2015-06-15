<?php

namespace Base\Model;

abstract class AbstractModel
{
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public abstract function toArray();
}