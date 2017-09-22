<?php
namespace app\controller;

use app\model\Order;
use components\BaseController;
use vendor\dao\Dao;

class SiteController extends BaseController{
    
    public function actionIndex(){
        echo 'defoult-index';
    }
    
    public function actionPage(){
        echo Dao::$app->controller,'-',Dao::$app->action;exit;
        $model = new Order();
        $model->find();
    }
    
    public function actionView(){
        echo 'view';
    }
}