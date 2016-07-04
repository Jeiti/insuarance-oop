<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

$controller = new IndexController();
/*реализация маршрутизации*/
$action=(isset($_GET['action']))?$_GET['action']:"index";
switch ($action){
    case "index":
        $controller->actionIndex();
        break;
    case "new":
        $controller->actionNew();
        break;
    default:
        $controller->actionIndex();
}