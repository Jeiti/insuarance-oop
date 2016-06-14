<?php
/*включить отображение ошибок*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/*включить отображение ошибок*/

require ("config.inc");
$controller = new TestController();
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
//TODO:Полная связка - article.php, создать для неё контроллер, модель, таблицу и представление. Т.е. выводить на экран список всех статей из БД