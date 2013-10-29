<?php 

//require_once('config.php');

define('SERVER_ROOT', 'C:\xampp\xampp\htdocs\ultra-lite-mvc');
define('SITE_ROOT' , 'http://localhost.com/ultra-lite-mvc/');


//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = explode('&' , $request);

$request_vars = array();
foreach ($parsed as $argument)
{
    //split GET vars along '=' symbol to separate variable, values
    list($variable , $value) = split('=' , $argument);
    $request_vars[$variable] = $value;
}

$c = array_shift($request_vars);
$m = array_shift($request_vars);

//compute the path to the file
$controller_file = SERVER_ROOT . '/controller/' . $c . '.php';

//get target
if (file_exists($controller_file))
{
    include_once($controller_file);

    //instantiate the appropriate class
    if (class_exists($c))
    {
        $controller = new $c();
        
        if(method_exists($controller, $m)){
        	$controller->$m($request_vars);
        }else{
        	die('undefined method');
        }
    }
    else
    {
        die('controller class does not exist!');
    }
}
else{
    //can't find the file in 'controllers'! 
    die('controller does not exist!');
}

?>