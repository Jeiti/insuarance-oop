<?php

require_once ("View.php");
require_once ("Model.php");

class Controller
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view=new View();
        $this->model=new Model();
    }

    public function actionIndex(){
        $array = $this->model->all();
        $this->view->showLayout($array);
    }

    public function actionNew(){
        echo "new";
    }
}