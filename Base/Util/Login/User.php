<?php

class User extends AbstractModel
{
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $user_type;

    public function getClassName()
    {
        return __CLASS__;
    }

    public function toArray()
    {
        // TODO: Implement toArray() method.
    }
}