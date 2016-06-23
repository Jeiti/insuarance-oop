<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

$controller = new NewsController();

$params = array_merge($_GET,$_POST);

$action = (isset($params['action'])?$params['action']:"index");

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
//TODO: сделать класс WebApplication в котором реализовать $params как свойство статическое или экземпляра класса