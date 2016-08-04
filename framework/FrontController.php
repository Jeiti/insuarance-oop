<?php
namespace framework;
class FrontController

{
    public static function start() {
        $f=new FrontController;
        /*$f->actionIndex();*/
        $routs = explode("/", $_SERVER['REQUEST_URI']);
        if (!empty($routs[1])) $controllerName = $routs[1];
        if (!empty($routs[2])) $actionName = $routs[2];
        $controllerName = ucfirst(strtolower($controllerName));
        $actionName = ucfirst(strtolower($actionName));
        $controllerName .= 'Controller';
        $actionName = 'action'.$actionName;
        $controller = new $controllerName;
        $controller->$actionName();
    }
}