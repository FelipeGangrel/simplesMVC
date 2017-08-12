<?php

// 1 . rota
$route = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

$controllerName = $route[1];
$methodName = $route[2];
$param = $route[3] ?? null;

$controllerName = ucfirst($controllerName)."Controller";
$controllerPath = "Controllers/" . $controllerName . ".php";


if(file_exists($controllerPath)){

    require_once $controllerPath;
    
    $controller = new $controllerName();

    if(!method_exists($controller, $methodName)){
        require_once 'Controllers/ErrorController.php';
        $errorController = new ErrorController();
        $message = "<b>ERRO!</b> O método <b>$methodName</b> não fui definido em <b>$controllerName</b>";
        die($errorController->showError($message));
    }
    
    if($param){
        $controller->$methodName($param);
    }else{
        $controller->$methodName();
    }

}else{
    
    require_once 'Controllers/ErrorController.php';
    $errorController = new ErrorController();
    $message = "<b>ERRO!</b> O controller <b>$controllerName</b> não existe em <b>$controllerPath</b>";
    die($errorController->showError($message));

}