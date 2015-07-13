<?php
/**
 * Created by PhpStorm.
 * User: Leonardo
 * Date: 07/07/2015
 * Time: 05:02
 */

class index
{
    function home()
    {
        $pageName = __CLASS__;
        include(PATH . "/Public/Views/home.php");
    }
} 