<?php
namespace vendor\dao\web;

use NoahBuscher\Macaw\Macaw;
use vendor\dao\Dao;
use vendor\dao\Object;

class Application extends Object{
    
    public $controller;
    public $action;
    
    public function __construct($config= [])
    {
        Dao::$app = $this;
        parent::__construct($config);
    }

    public function dispatcher(){
        $router = $this->routers;
        $uri = $_SERVER['REQUEST_URI'];
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        if ($uri == '/') {
            $this->controller = $this->defoultController;
            $this->action = $this->defoultAction;
        } else {
            if (!isset($router[$uri])) {
                Macaw::exception('404 : Page Not Fount');
            }
            list($this->controller, $this->action) = explode('/', $router[$uri]['handle']);
            if (strtoupper($httpMethod) !== $router[$uri]['method']) {
                Macaw::exception('request method should be ' . $router[$uri]['method']);
            }
        }
        $handle = 'app\controller\\' . ucwords($this->controller) . 'Controller@Action' . ucfirst($this->action);
        return [strtolower($httpMethod), trim($uri, '/'), $handle];
    }
    
    public function run(){
        list($method, $uri, $handle) = $this->dispatcher();
        Macaw::$method($uri, $handle);
        Macaw::dispatch();
    }
}