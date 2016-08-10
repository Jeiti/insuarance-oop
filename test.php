<?php

define("ERROR_LEVEL", E_ALL|E_STRICT);
ini_set("error_reporting",E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('vendor/php-activerecord/php-activerecord/ActiveRecord.php');
ActiveRecord\Config::initialize(function($cfg){
    $cfg->set_model_directory('models');
    $cfg->set_connections(array('development' => 'mysql://root:123@localhost/insuarance'));
});

/*# create Tito
$user = User::create(array('name' => 'Tito', 'state' => 'VA'));

# read Tito
$user = User::find_by_name('Tito');

# update Tito
$user->name = 'Tito Jr';
$user->save();

# delete Tito
$user->delete();*/



# create Tito
//$news = News::create(["title"=>"news", "content"=>"123"]);
$news = News::find(35);
echo $news->title;

//TODO: потренироваться с CRUD для новостей
//TODO: подключить php-activerecord к нашему framework

//TODO: front-controller нужен для работы с контроллерами
//TODO: smarty - нужен для работы с view
//TODO: php-activerecord нужен для работы с models
//TODO: если самому писать mvc-framework то нужно использовать шаблоны проектирования