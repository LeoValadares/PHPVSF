<?php

require_once PATH . "/Base/Util/Login/User.php";
require_once PATH . "/Base/Mapper/ModelMapper.php";
require_once PATH . "/Base/Util/Database/PDOAdapter.php";

class UserMapper extends ModelMapper
{
    public function __construct()
    {
        $databaseAdapter = new PDOAdapter(new ReflectionClass("user"), DB_FQDN, DB_USER, DB_PASSWORD);
        parent::__construct("user", $databaseAdapter);
    }

    public function verifyUser(array $parameters = array())
    {
        $login_result = parent::findAll($parameters);
        if(count($login_result) == 0 || count($login_result) > 1)
        {
            return null;
        }
        else
        {
            return $login_result[0];
        }

    }
} 