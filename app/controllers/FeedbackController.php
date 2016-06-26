<?php

class FeedbackController extends Controller
{
    function __construct()
    {
        $this->view=new FeedbackView();
        $this->model=new FeedbackModel();
    }
    public function actionIndex(){
        $this->view->showLayout($data=[]);
    }

    public function actionCreate()
    {
        $data = WebApplication::$params;
        $res = $this->model->create($data);
        echo $res;
    }
}