<?php
include_once( __DIR__.'/../interfaces/Controller.php' );
include_once( __DIR__.'/../database/Database.php' );

Class Systems {
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
            //Evaluar parámetros
        }else{
            $uri=explode("/",$uri);
            $index = count($uri) - 1;
            $id = $uri[$index];
            $this->show($id);
        }
    }
    private function show($id){
        $database_consumer = new Database();
        var_dump($id);
    }
    private function insert($request){}
    private function update($request){}
    private function delete($request){}
}
?>