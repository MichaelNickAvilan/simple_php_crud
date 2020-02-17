<?php
Class Database {
    private $env = array();
    public function __construct(){
        $this->env = $this->loadConfig();
        var_dump($this->env);
    }
    public function rawQuery($query, $params){
    }
    private function loadConfig(){
        $params=array();
        $file = fopen(__DIR__.'/../.env', "r");
        $lines = fread($file,filesize(__DIR__.'/../.env'));
        $lines = explode(";", $lines);
        foreach ($lines as $key => $line) {
          $line = explode("=", $line);
          if($line[0]!=''){
            $param = new stdClass();
            $param->{$line[0]} = $line[1];
            array_push($params, $param);
          }
        }
        return $params;
    }
    private function getParam($param){}
}
?>