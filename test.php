<?php
//включить отображение ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//конец включить отображение ошибок

//подключение autoload
require ("config.inc");
//конец подключение autoload

$controller = new TestController(); //создается новый экземпляр класса TestController() в котором
//подключается TestView() и TestModel() автоматически

//реализация маршрутизации
$action=(isset($_GET['action']))?$_GET['action']:"index";//получаем - какую страницу выбрал пользователь

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
//TODO:Полная связка - article.php, создать для неё контроллер, модель, таблицу и представление.
//TODO:Т.е. выводить на экран список всех статей из БД