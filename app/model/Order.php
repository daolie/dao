<?php
namespace app\model;

use components\BaseModel;

class Order extends BaseModel{
    
    public static function tableName(){
        return 'order';
    }
    
    
    public function find(){
        $model = $this->select(self::tableName(), ["customer_id","id"], ["name" => '相机']);
        var_dump($model);exit;
    }
}