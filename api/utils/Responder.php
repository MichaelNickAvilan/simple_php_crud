<?php
class Responder{
    public function publishResponse($header_code, $message, $type){
        $response = new stdClass();
        switch($type){
            case 'error':
                $response->status = 'fault';
                $response->code = $header_code;
                $response->message = $message;
            break;
            case 'success':
                $response->status = 'success';
                $response->code = $header_code;
                $response->message = $message;
            break;
        }
        header("Content-Type: application/json;charset=utf-8");
        http_response_code($header_code);
        echo( json_encode($response) );
    }
}
?>