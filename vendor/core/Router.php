<?php
use NoahBuscher\Macaw\Macaw;

class Router {
    
    public static function run(){
        $uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        //$uri = explode('/', $_SERVER['REQUEST_URI']);
        print_r($uri);exit;
        Macaw::get('(:all)', 'app\controller\DemoController@ActionView');
        print_r(Macaw::$routes);exit;
        Macaw::dispatch();
    }
}