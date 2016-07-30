<?php

/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 28.06.16
 * Time: 8:05
 */
class IndexController extends Controller
{
    function __construct()
    {
        $this->view=new IndexView();
        $this->model=new IndexModel();
    }

    public function actionIndex(){
        $array = $this->model->all();
        $this->view->showLayout($array);
    }
}