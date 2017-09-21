<?php
namespace vendor\dao;

class Dao
{
    public static $app;
    
    public static function configure($object,$config){
        foreach ($config as $key => $val){
            $object->$key = $val;
        }
        return $object;
    }
}