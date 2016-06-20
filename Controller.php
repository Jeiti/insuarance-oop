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
        $this->view->showNewForm()  ;
    }
    public function actionCreate(){
        if($this->model->create($_GET)){
            echo "OK";
        }
        else{
            echo $this->model->error();
        }
    }
}