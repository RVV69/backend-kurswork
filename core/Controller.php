<?php

namespace core;

class Controller{
    protected $viewPath;
    public function __construct(){
        $moduleName = \core\Core::getInstance() -> app['moduleName'];
        $actionName = \core\Core::getInstance() -> app['actionName'];
        $this->viewPath = "view/{$moduleName}/{$actionName}.php";
    }
}