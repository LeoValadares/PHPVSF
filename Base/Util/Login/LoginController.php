<?php

require_once PATH . "/Base/Controller/IControllerInterface.php";
require_once PATH . "/Base/Util/Login/UserMapper.php";
require_once PATH . "/Base/Util/Login/User.php";

class LoginController
{
    /**
     * This function checks if the user is authenticated. If it is authenticated the execution flow continues without
     * interruption; but if the user isn't authenticated it redirects to a login page.
     */
    public function login()
    {
        $_SESSION['lastPage'] = $_SERVER['REQUEST_URI'];

        if(empty($_SESSION['login']))
        {
            header("Location: http://" . SITE_NAME . __CLASS__ . "/userAuth");
        }
    }

    public function userAuth()
    {
        if (empty($_POST['email']) || empty($_POST['password']))
        {
            include PATH . "/Public/Views/login.php";
        }
        else
        {
            $userMapper = new UserMapper();
            $userCredential = $userMapper->verifyUser(['email' => $_POST['email'], 'password' => hash(HASH_ENCRYPTION, $_POST['password'])]);

            if ($userCredential == null)
            {
                header("Location: http://" . SITE_NAME . __CLASS__ . "/" . __METHOD__);
            }
            else
            {
                $_SESSION['login'] = $userCredential;
            }

            $lastPage = $_SESSION['lastPage'];
            unset($_SESSION['lastPage']);
            header("Location: " . $lastPage);
        }
    }

    public function logout()
    {
        session_destroy();
    }
}