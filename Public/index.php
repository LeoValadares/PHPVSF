<?php

require_once __DIR__ . "/../configuration.php";

//auto imports all public controllers so they can be created when needed
foreach(glob(PATH . "/Public/Controllers/*.php") as $filename)
{
    require_once($filename);
}

//starts session if not started
if (!session_start())
{
    echo "SESSION STARTED";
}
else
{
    echo session_id();
}

//explodes the url in the slash into an array
$params = explode("/", $_GET['path']);

$selectedController = ($params[0] == null) ? "index" : $params[0];
$selectedMethod = ($params[1] == null) ? "home" : $params[1];

// removes the controller name and function from the array
$params = array_splice($params, 2);
//creates a controller of the specified type;
$executingController = new $selectedController();

//calls the controller's function without any parameters
if(count($params) == 0)
{
    $executingController->$selectedMethod();
}
//calls the controller's function with one parameter
else if(count($params) == 1)
{
    $executingController->$selectedMethod($params[0]);
}
//tries to transform the rest of the url into an associative array and passes to the controller's function
else if(count($params) % 2 == 0)
{
    //the array that will receive the rest of the url as an associative array
    $associativeControllerParameters = array();
    //reads the parameters from the url in pairs and transform them in a key => value pair
    for($i = 0; $i < count($params); $i += 2)
    {
        $associativeControllerParameters += [$params[$i] => $params[$i+1]];
    }
    $executingController->$selectedMethod($associativeControllerParameters);
}
//url couldn't be transformed into an associative array and the request is terminated with an error
else
{
    throw new HttpMalformedURLException();
}
