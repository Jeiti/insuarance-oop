<?php
define("DBHOSTNAME", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "123");
define("DBBDNAME", "insuarance");
define("NEWSPERPAGE", "3");//сколько новостей выводить на странице
define("OUTPUTNEWS", "5");//сколько кнопок пагинации выводить

function __autoload($_classname){
    require_once ($_classname . ".php");
}