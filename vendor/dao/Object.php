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
    
    /*public function __get($name)
    {
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
        throw new \Exception('Getting unknown method: ' .$getter);
    }
    
    public function __set($name, $value)
    {
        $setter = 'set' . $name;
        if (method_exists($this, $setter)) {
            $this->$setter($value);
            return;
        }
    }*/
    
    public function __isset($name)
    {
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            return $this->$getter() !== null;
        }
        return false;
    }
}