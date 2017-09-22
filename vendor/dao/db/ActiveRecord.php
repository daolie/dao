<?php
namespace vendor\dao\db;

use vendor\dao\Dao;

class ActiveRecord extends Model{
    
    public function __construct()
    {
        parent::__construct(Dao::$app->db);
    }
    
}