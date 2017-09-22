<?php
namespace vendor\dao\console;

use vendor\dao\Dao;
use vendor\dao\Object;

class Application extends Object{
    
    public function __construct($config= [])
    {
        Dao::$app = $this;
        parent::__construct($config);
    }

    public function dispatcher(){
        $router = $this->routers;
        $argv = $_SERVER['argv'];
        if (count($argv) >= 2) {
            $uri = $argv[1];
            if (!isset($router[$uri])) {
                throw new \Exception('404 : Page Not Fount');
            }
            list($controller, $action) = explode('/', $router[$uri]['handle']);
            $handle = 'console\controller\\' . ucwords($controller) . 'Controller@Action' . ucfirst($action);
            return $handle;
        }
        throw new \Exception('controller and action not fount !');
    }
    
    public function run(){
        $handle = $this->dispatcher();
        list($controller, $action) = explode('@', $handle);
        $controller = new $controller;
        $controller->$action();
    }
}