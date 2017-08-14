<?php namespace Libs;

class App
{
    protected $routes;
    protected $uri;


    protected $controllersLocation = "\App\\Controllers\\";

     public function __construct()
    {   
        $this->routes = [];
        $this->uri = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

    
        // 1 . rota
        /* $this->route = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

        $controllerName = $route[1];
        $methodName = $route[2];
        $param = $route[3] ?? null;

        $controllerName = ucfirst($controllerName)."Controller";
        $controllerPath = "../app/Controllers/" . $controllerName . ".php";

        if(file_exists($controllerPath)){

            require_once $controllerPath;
            
            $controller = new $controllerName();

            if(!method_exists($controller, $methodName)){
                require_once '../app/Controllers/ErrorController.php';
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
            
            require_once '../app/Controllers/ErrorController.php';
            $errorController = new ErrorController();
            $message = "<b>ERRO!</b> O controller <b>$controllerName</b> não existe em <b>$controllerPath</b>";
            die($errorController->showError($message));

        } */

    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function addRoute(string $url, string $controllerAndMethod){
        $this->routes[] = [$url => $controllerAndMethod];
        return $this;
    }

    public function getControllerAndMethod(string $controllerAndMethod)
    {
        list($controller, $method) = explode("@", $controllerAndMethod);

        return [
            'controller' => $this->controllersLocation . $controller,
            'method' => $method,
        ];    
    }

    public function start()
    {
        $uriCount = count($this->uri);
        if($uriCount === 1){
            foreach($this->getRoutes() as $route){
                if(key($route) === '/'){
                    $controllerAndMethod = $route[key($route)];
                    $array = $this->getControllerAndMethod($controllerAndMethod);
                    $controller = $array['controller'];
                    $method = $array['method'];
                    $controller = new $controller();
                    $controller->$method();
                }
            }
        }else{
            
            for($i = 1, $uri = []; $i < $uriCount; $i++ ){
                $uri[] = $this->uri[$i];
            }

            $uri = implode("/",$uri);
            echo $uri;

            foreach($this->getRoutes() as $route){

                $params = [];
                preg_match_all('/\{([^}]+)\}/', key($route), $params);

                echo "<pre>";
                print_r($params);
                echo "</pre>";

                if( key($route) == $uri || 
                    key($route) == "/$uri" ||
                    key($route) == "$uri/" ||
                    key($route) == "/$uri/"
                    
                    ){

                    $controllerAndMethod = $route[key($route)];
                    $array = $this->getControllerAndMethod($controllerAndMethod);
                    $controller = $array['controller'];
                    $method = $array['method'];
                    $controller = new $controller();
                    $controller->$method();
                }
            }
        }
    }

    



    
}