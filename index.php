<?php
require_once "config.php";
require_once "core/views.php";

$routes = explode('/', $_SERVER['REQUEST_URI']);

$controller_name = "Main";
$action_name = "index";


if (!empty($routes[1])){
    $controller_name = $routes[1];
}

if(!empty($routes[2])){
    $action_name = strstr(strtolower($routes[2]), '?', true);
}

try {
    $filename = "controllers/".strtolower($controller_name).".php";

    if (file_exists($filename)){
        require_once $filename;
    } else {
        throw new Exception("File not found: ".$filename);
    }


    $className = "App\controllers\\".ucfirst($controller_name);

    if(class_exists($className)){
        $controller = new $className();
    } else {
        throw new Exception("Controller not found: ". $className);
    }

    if(method_exists($controller, $action_name)){
        $controller->$action_name();
    } else {
        throw new Exception("Method not found: ". $action_name);
    }

} catch (Exception $e){
    require_once "errors/404.php";
//    echo $e->getMessage();
}





