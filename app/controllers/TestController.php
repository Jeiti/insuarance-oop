<?php

class TestController
{
    private $view;
    private $model;
    
    public function __construct()
    {
/*        $this->view = new TestView();
        $this->model = new TestModel();*/
    }
    
    public  function actionIndex(){
/*        $data = $this->model->all();
        $this->view->showLayout($data);*/
        echo "ok";
    }
}