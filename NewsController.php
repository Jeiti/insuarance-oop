<?php

class NewsController extends Controller{

    function __construct(){
        $this->view=new NewsView();
        $this->model=new NewsModel();
    }

    public function actionNew(){
        $this->view=new NewsAddView();
        $this->view->showLayout();
    }
}