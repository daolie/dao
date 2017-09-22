<?php
namespace console\controller;

class DemoController{
    
    public function actionIndex(){
        echo 'index3w';
    }
    
    public function actionPage(){
        echo 'page';
    }
    
    public function actionView(){
        var_dump($_GET);exit;
        echo 'view';
    }
}