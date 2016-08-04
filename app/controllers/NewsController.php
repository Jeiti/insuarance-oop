<?php
namespace app\controllers;
use framework\Controller;
use app\views\NewsView;
use app\views\NewsAddView;
use app\models\NewsModel;
use framework\MySqlSubd;
use main\WebApplication;
class NewsController extends Controller{

    function __construct(){
        $this->view=new NewsView();
        $this->model=new NewsModel(MySqlSubd::createInstance(DBNAME, DBHOSTNAME, DBUSER, DBPASSWORD));
    }

    public function actionNew(){
        $this->view=new NewsAddView();
        $this->view->showLayout();
    }
    
    public function actionIndex(){
        $array = $this->model->all();
        $this->view->showLayout($array);
    }
    
    public function actionShow(){
        $data = $this->model->find(WebApplication::$params['id']);
        $this->view->showLayout($data);
    }
}