<?php
include_once( __DIR__.'/../interfaces/Controller.php' );
include_once( __DIR__.'/../database/Database.php' );
include_once( __DIR__.'/../utils/Responder.php' );

Class Systems extends Responder{
    private $route='system';
    public function __construct($request){
        $request_method = ($request['_SERVER']['REQUEST_METHOD']);
        switch($request_method){
            case 'GET':
                $this->get($request);
            break;
            case 'POST':
                $this->insert($request);
            break;
            case 'UPDATE':
                $this->update($request);
            break;
            case 'DELETE':
                $this->delete($request);
            break;
        }
    }
    private function get($request){
        $uri = $request['_SERVER']['REQUEST_URI'];
        if(count($request['_GET']) > 0){
            //Evaluate params
        }else{
            $uri=explode("/",$uri);
            $index = count($uri) - 1;
            if( $this->route === $uri[$index] ){
                //Return all registers
            }else{
                $this->show($uri[$index]);    
            }
        }
    }
    private function show($id){
        $database_consumer = new Database();
        //Return only the requested register
    }
    private function insert($request){}
    private function update($request){}
    private function delete($request){}
}
?>