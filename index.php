<?php
use framework\FrontController;
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

echo "index";
FrontController::start();

//TODO: Разобраться с выводом ошибки при вызове http://www.insuarance_oop.loc/news/new
//TODO: разобраться с ошибкой Fatal error: Class 'NewsController' not found in /home/evgen/www/insuarance_oop/framework/FrontController.php on line 23