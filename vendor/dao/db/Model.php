<?php
namespace Vendor\dao\db;

use Medoo\Medoo;

class Model extends Medoo{
    
    public function __construct($option = [])
    {
        parent::__construct($option);
        $this->init();
    }
    
    public function init(){
        
    }
    
}