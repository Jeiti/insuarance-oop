<?php
define("DBHOSTNAME", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "123");
define("DBBDNAME", "insuarance");
define("NEWSPERPAGE", "3");//сколько новостей выводить на странице
define("OUTPUTNEWS", "5");//сколько кнопок пагинации выводить
define("DEBUG", false);//development-разработка или production-использование

if(DEBUG){
    define("ERROR_LEVEL", E_ALL|E_STRICT);
}
else{
    define("ERROR_LEVEL", E_ALL & ~E_NOTICE);
}





function __autoload($_classname){
    require_once ($_classname . ".php");
}