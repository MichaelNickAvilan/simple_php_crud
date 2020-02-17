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
                $database_consumer = new Database();
                $items = $database_consumer->rawQuery(
                    "SELECT * FROM systems", []
                );
                $response = new stdClass();
                $response->total = count($items);
                $response->items = $items;
                $this->publishResponse('200', $response, 'success');
            }else{
                $this->show($uri[$index]);    
            }
        }
    }
    private function show($id){
        $database_consumer = new Database();
        $items = $database_consumer->rawQuery(
            "SELECT * FROM systems WHERE id = ? ", 
            [ 
                [ 'i', $id ] 
            ]
        );
        $response = new stdClass();
        $response->total = count($items);
        $response->items = $items;
        $this->publishResponse('200', $response, 'success');
    }
    private function insert($request){}
    private function update($request){}
    private function delete($request){}
}
?>