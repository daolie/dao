<?php
namespace vendor\dao;

use NoahBuscher\Macaw\Macaw;

class Application extends Object{
    
    public function __construct($config= [])
    {
        Dao::$app = $this;
        parent::__construct($config);
    }

    public function Dispatcher(){
        $router = $this->routers;
        $uri = $_SERVER['REQUEST_URI'];
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        if($uri == '/'){
            $controller = 'demo';
            $action = 'index';
        }else{
            if(!isset($router[$uri])){
                $this->error();
            }
            list($controller,$action) = explode('/', $router[$uri]['handle']);
            if(strtoupper($httpMethod) !== $router[$uri]['method']){
                throw new \Exception('request method should be '.$router[$uri]['method']);
            }
        }
        $handle = 'app\controller\\'.ucwords($controller).'Controller@Action'.ucfirst($action);
        return [strtolower($httpMethod), trim($uri, '/'), $handle];
       // return $httpMethod == 'GET' ? $this->get($uri, $handle) : $this->post($uri, $handle);
    }
    
    /*public function get($uri,$handle){
        return Macaw::get($uri, $handle);
    }
    
    public function post($uri,$handle){
        //$uri = ltrim($uri,'/');
        Macaw::post('demo/page', 'app\controller\DemoController@ActionPage');
    }*/
    
    public function run(){
        try{
           // list($method,$uri,$handle) = $this->Dispatcher();
           // echo $handle;exit;
          //  Macaw::post('demo/page', 'app\controller\DemoController@ActionPage');
            Macaw::get('demo/page','app\controller\DemoController@actionPage');
           // $this->Dispatcher();
            Macaw::error($this->error());
            Macaw::dispatch();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    
    public function error(){
        throw new \Exception('404 :: Page Not Found！');
    }
}