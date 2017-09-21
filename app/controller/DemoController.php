<?php
namespace app\controller;

class DemoController{
    public function actionIndex(){
        var_dump($_GET);exit;
        echo 'index3w';
    }
    public function actionPage(){
        var_dump($_GET);exit;
        echo 'page';
    }
    public function actionView(){
        var_dump($_GET);exit;
        echo 'view';
    }
}