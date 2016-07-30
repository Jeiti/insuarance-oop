<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

$controller = new NewsController();

WebApplication::$params = array_merge($_GET,$_POST);

$action = (isset(WebApplication::$params['action'])?WebApplication::$params['action']:"index");

switch ($action){
    case 'show':
        $controller->actionShow();
        break;
    case 'new':
        $controller->actionNew();
        break;
    case 'create':
        $controller->actionCreate();
        break;
}