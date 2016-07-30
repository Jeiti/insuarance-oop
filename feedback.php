<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

$controller = new FeedbackController();

WebApplication::$params = array_merge($_GET,$_POST);

$action = (isset(WebApplication::$params['action'])?WebApplication::$params['action']:'index');

switch ($action){
    case "new":
        $controller->actionIndex();
        break;
    case "create":
        $controller->actionCreate();
        break;
}

//TODO: Напомнить про фронт-контроллер