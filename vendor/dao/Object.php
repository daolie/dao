<?php
namespace vendor\dao;

class Object {
    
    public function __construct($config = [])
    {
        if (!empty($config)) {
            Dao::configure($this, $config);
        }
        $this->init();
    }
    
    public function init(){
        
    }
}