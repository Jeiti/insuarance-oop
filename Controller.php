<?php

class Controller
{
    protected $view;
    protected $model;

    function __construct()
    {
        $this->view=new View();
        $this->model=new Model();
    }

    public function actionIndex(){
        $array = $this->model->all();
        $this->view->showLayout($array);
    }
    
    public function actionShow(){
        $data = $this->model->find($_GET['id']);
        $this->view->showLayout($data);
    }
    
    public function actionNew(){
        //$data = $this->model->create($_POST["hotnews"]);
        $this->view->showNewForm()  ;
    }
}