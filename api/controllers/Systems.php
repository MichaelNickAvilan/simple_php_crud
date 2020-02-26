<?php
include_once( __DIR__.'/../interfaces/Controller.php' );
include_once( __DIR__.'/../database/Database.php' );
include_once( __DIR__.'/../utils/Responder.php' );

Class Systems extends Responder{
    private $route='system';
    private $uri='';
    public function __construct($request, $payload = NULL){
        $this->uri = $request['_SERVER']['REQUEST_URI'];
        $request_method = ($request['_SERVER']['REQUEST_METHOD']);
        switch($request_method){
            case 'GET':
                $this->get($request);
            break;
            case 'POST':
                $this->insert($payload);
            break;
            case 'PUT':
                $this->update($request, $payload);
            break;
            case 'DELETE':
                $this->delete($request);
            break;
        }
    }
    private function get($request){
        $uri = $this->uri;
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
    private function insert($payload){
        $database_consumer = new Database();
        $response = new stdClass();
        $date = date("Y-m-d H:i:s");
        $query = $database_consumer->rawQuery(
            "INSERT INTO systems (name, creation_date, modification_date) 
            VALUES (?,?,?)", 
            [ 
                [ 's', $payload->name ],
                [ 's', $date ],
                [ 's', $date ], 
            ]
        );
        $this->publishResponse('200', $query, 'success');
    }
    private function update($request, $payload){
        $uri = $this->uri;
        $uri=explode("/",$uri);
        $index = count($uri) - 1;
        if( $this->route != $uri[$index] ){
           $database_consumer = new Database();
           $query = $database_consumer->rawQuery(
               "UPDATE systems SET name=? WHERE id=?", 
               [
                   [ 's', $payload->name ],
                   [ 'i', $uri[$index] ]
               ]
           );
           $this->publishResponse('200', $query, 'success');
        }else{
            $this->publishResponse('404', "", 'error');
        }
    }
    private function delete($request){}
}
?>