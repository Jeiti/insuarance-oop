<?php
define("DBHOSTNAME", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "123");
define("DBBDNAME", "insuarance");
define("NEWSPERPAGE", "3");//сколько новостей выводить на странице
define("OUTPUTNEWS", "5");//сколько кнопок пагинации выводить
define("DEBUG", true);//development-разработка или production-использование

if(DEBUG){
    define("ERROR_LEVEL", E_ALL|E_STRICT);
    ini_set("error_reporting",E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
}
else{
    define("ERROR_LEVEL", E_ALL & ~E_NOTICE);
}

/*function __autoload($_classname){
    require_once ($_classname . ".php");
}*/

function frameworkAutoload($className)
{
    $fileName = $_SERVER['DOCUMENT_ROOT']."/framework/$className.php";
    if (file_exists($fileName)) {
        require_once ($fileName);
    }
}
spl_autoload_register('frameworkAutoload');

function controllersAutoload($className)
{
    $fileName = $_SERVER['DOCUMENT_ROOT']."./app/controllers/$className.php";
    if (file_exists($fileName)) {
        require_once ($fileName);
    }
}
spl_autoload_register('controllersAutoload');

function modelsAutoload($className)
{
    $fileName = $_SERVER['DOCUMENT_ROOT']."./app/models/$className.php";
    if (file_exists($fileName)) {
        require_once ($fileName);
    }
}
spl_autoload_register('modelsAutoload');

function viewsAutoload($className)
{
    $fileName = $_SERVER['DOCUMENT_ROOT']."./app/views/$className.php";
    if (file_exists($fileName)) {
        require_once ($fileName);
    }
}
spl_autoload_register('viewsAutoload');

function filesAutoload($className)
{
    $fileName = $_SERVER['DOCUMENT_ROOT']."/$className.php";
    if (file_exists($fileName)) {
        require_once ($fileName);
    }
}
spl_autoload_register('filesAutoload');