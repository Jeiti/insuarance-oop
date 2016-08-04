<?php
namespace app\controllers;
use framework\Controller;
use main\WebApplication;
use app\views\FeedbackView;
use app\models\FeedbackModel;
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
        echo "Ваш запрос успешно отправлен";
        sleep(2);
        header("location:/index.php");
    }
}

//TODO: Сделать схемы и реализацию кода, слева uml, справа код
