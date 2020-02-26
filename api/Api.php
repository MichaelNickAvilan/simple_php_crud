<?php

include_once( __DIR__.'/utils/Responder.php' );

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Class API extends Responder {

    private $routes = array();

    public function __construct() {
        $this->routes = [
            ['system', 'controllers/Systems.php', 'Systems']
        ];
        $this->dispatchAction();
    }
    private function dispatchAction(){
        $current_route = $this->getCurrentRoute();
        if($current_route != NULL){
            include_once( __DIR__.'/'.$current_route[1] );
            $method = $GLOBALS['_SERVER']['REQUEST_METHOD'];
            if($method == 'POST' || $method == 'PUT' || $method == 'DELETE'){
                $consumer = new $current_route[2]
                ( 
                    $GLOBALS,
                    json_decode(file_get_contents('php://input')) 
                );    
            }else{
                $consumer = new $current_route[2]($GLOBALS);
            }
        }
    }
    private function getCurrentRoute(){
        $centinel = FALSE;
        $uri = $_SERVER['REQUEST_URI'];
        $current_route = explode('/', $uri);
        $index = count( $current_route ) - 1;
        $current_route = $current_route[ $index ];
        $params_centinel = strrpos($current_route, '?');
        foreach ($this->routes as $key => $route) {
            if($params_centinel){
                $base_route = explode('?',$current_route);
                if($base_route[0] === $route[0] ){
                    $centinel = TRUE;
                }
            }else{
                if( $route[0] === $current_route ){
                    $centinel = TRUE;    
                }else{
                    $current_route = explode('/', $uri);
                    $index = count( $current_route ) - 2;
                    if($current_route[$index] === $route[0]){
                        $centinel = TRUE;
                    }
                }
            }
            if( $centinel === TRUE ){
                return $route;
            }
        }
        if($centinel === FALSE){
            $this->publishResponse('400', 'The requested resource does not exist', 'error');
        }
    }
}
$api_consumer = new API ();
?>