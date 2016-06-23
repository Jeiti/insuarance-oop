<?php

//set_error_handler('Controller::handlerException',ERROR_LEVEL);

class Controller
{
    protected $view;
    protected $model;

    public static function handlerException($num, $message, $file, $line){
        throw new InsuaranceException($message, $num, $file, $line);
    }

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
        try{
            $this->model->create(array_merge($_POST,$_FILES['picture']));//TODO: заменить на $params (в скобках)
            echo "OK";

        }
        catch(SqlException $_e){
            echo $_e->getMessage();
        }
    }
}