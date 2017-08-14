<?php namespace Core;

use \Buki\Router;

class App
{   
    protected $router = null;
    protected $controllersNamespace = "\\App\\Controllers\\";

    public function __construct()
    {
        $this->router = new Router();
    }


    public function route(string $verb, string $url, string $controllerAndMethod, $params = null)
    {

        list($controller, $method) = explode("@", $controllerAndMethod);
        $controllerName = $this->controllersNamespace.$controller;

        $verb = "{$verb}";

        $r = new \ReflectionMethod($controllerName, $method);
        $params = $r->getParameters();

        die(var_dump($params));

        $this->router->$verb("{$url}", function($id) use ($controllerName, $method){

            $controller = new $controllerName();
            $controller->$method();
            

        });
    }

    public function run(){
        $this->router->run();
    }

}