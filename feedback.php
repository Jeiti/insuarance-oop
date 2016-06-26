<?php
header("Content-type:text/html; charset=utf-8");
ini_set("error_reporting", E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require ("config.inc");

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