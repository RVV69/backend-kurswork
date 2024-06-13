<?php

namespace core;

use controllers\MainController;

class Core
{
    private static $instance = null;
    public $app;
    private function __construct()
    {
        $this->app = [];
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function Initialize()
    {
    }

    public function Run()
    {
       if (isset($_GET['route']) == 'null'|| !isset($_GET['route'])) {
            $route = "main";
            $pathToMain = __DIR__ . '/../view/Main/index.php';
            $tpl = new Template($pathToMain);
            $html = $tpl->getHTML();
            echo $html;
        }
        $route = isset($_GET['route']);
        $routeParts = explode('/', $route);
        $moduleName = array_shift($routeParts);
        $actionName = array_shift($routeParts);

        if (empty($moduleName)) {
            $moduleName = "main";
        }
        if (empty($actionName)) {
            $actionName = "index";
        }
        $this->app["moduleName"] = $moduleName;
        $this->app["actionName"] = $actionName;
        $controllerName = "\\controllers\\" . ucfirst($moduleName) . 'Controller';
        $controllerActionName = $actionName . 'Action';

        $statusCode = 200;
        if (class_exists($controllerName)) {
            $controller = new $controllerName();

            if (method_exists($controller, $controllerActionName)) {
                $html = $controller->$controllerActionName();
            } else {
                $statusCode = 404;
            }
        } 
        
        else {
            $statusCode = 404;
        }

        $statusCodeType = intval($statusCode/100);

        if($statusCodeType == 4 || $statusCodeType == 5) {
            $maincontroller = new MainController();
            $maincontroller ->errorAction($statusCode);
        }  
    }
}
