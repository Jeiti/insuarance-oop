<?php
namespace app\controllers;
use framework\Controller;
use app\views\IndexView;
use app\models\IndexModel;
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