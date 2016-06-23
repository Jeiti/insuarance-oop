<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

$controller = new NewsController();

$arr = (isset($_GET))?$_GET:$_POST;

print_r($arr);

$action = (isset($_GET['action'])?$_GET['action']:"index");

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
//TODO: добавить InsuaranceException и сделать, что бы все ошибки php приводили к выбросу этого исключения
//TODO: отнаследовать SqlException от InsuaranceException
//TODO: найти решение чтобы можно было передвать данные и через $_GET и через $_POST