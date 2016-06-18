<?php

class NewsController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new NewsModel();
        $this->view = new NewsView();
    }
    
    public function actionShow(){
        $data = $this->model->find($_GET['id']);
        $this->view->showLayout($data);
    }
}