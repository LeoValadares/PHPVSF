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
        return ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email, 'password' =>
            $this->password, 'user_type' => $this->user_type];
    }
}