<?php

class User extends AbstractModel
{
    private $loginName;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $userType;

    public function getClassName()
    {
        return __CLASS__;
    }

    public function toArray()
    {
        return ['login_name' => $this->loginName, 'first_name' => $this->firstName, 'last_name' => $this->lastName, 'email' => $this->email, 'password' =>
            $this->password, 'user_type' => $this->userType];
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getLoginName()
    {
        return $this->loginName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }
}