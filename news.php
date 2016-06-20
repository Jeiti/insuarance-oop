<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

$controller = new NewsController();

$action = (isset($_GET['action'])?$_GET['action']:"index");

switch ($action){
    case "show":
        $controller->actionShow();
}

//TODO: реализовать создание новости (вывести форму new_add без добавления в БД)
/*if(!$link){
    echo mysqli_error($link);
}
else{

    if(!$res){
        echo mysqli_error($link);
    }
    else{

        echo "
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <img class=\"img-rounded\" alt=\"Bootstrap Image Preview\" src= /img/news_img/$row[picture]>
                </div>
                <div class=\"col-md-8\">
                    <p>$row[date_time]</p>
                    <h2>$row[title]</h2>
                    <p>$row[content]</p>
                </div>
            </div>
        </div>";
    }
}

require_once ("footer.php");*/