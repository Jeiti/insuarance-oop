<?php
namespace framework;
require_once ("/home/evgen/www/insuarance_oop/app/controllers/NewsController.php");
use app\controllers\NewsController;
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
        echo "</br>";
        echo $controllerName;
        echo "</br>";
        echo $actionName;
        echo "</br>";

        $controller = new $controllerName;
        $controller->$actionName();
    }
}