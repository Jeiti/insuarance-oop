<?php

function handlerException($num, $message, $file, $line){
    throw new InsuaranceException($message, $num, $file, $line);
}
set_error_handler('handlerException',ERROR_LEVEL);

abstract class Controller
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
        $this->view->showLayout()  ;
    }

    public function actionCreate(){
        try{
            $this->model->create(array_merge(WebApplication::$params,$_FILES['picture']));
            echo "OK";
        }
        catch(SqlException $_e){
            echo $_e->getMessage();
        }
    }
}