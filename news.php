<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

$controller = new NewsController();

$action = (isset($_GET['action'])?$_GET['action']:"index");

switch ($action){
    case "show":
        $controller->actionShow();
        break;
    case 'new':
        $controller->actionNew();
        break;
}