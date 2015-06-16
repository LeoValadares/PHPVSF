<?php

abstract class AbstractModel
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }
    public abstract function getClassName();
    public abstract function toArray();
}