<?php
Class Database {
    private $env = array();
    public function __construct(){
        $this->env = $this->loadConfig();
    }
    public function rawQuery($query, $params){
        $conn = $this->openConnection();
        $stmt = $conn->prepare($query);
        if(count($params) === 0){
            $stmt->execute();
            $rows = mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
            mysqli_stmt_close($stmt);
            return $rows;
        }else{
            $binds='';
            $values = array();
            foreach ($params as $key => $param) {
                $binds.=$param[0];
                array_push($values, $param[1]);
            }
            array_unshift($values,$binds);
            call_user_func_array(array($stmt, 'bind_param'), $this->getReferences($values));
            $stmt->execute();
            if(strrpos($query, "SELECT") === 0){
                $rows = mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
                mysqli_stmt_close($stmt);
                return $rows;
            }else{
                $response = new stdClass();
                $response ->affected_rows = $stmt->affected_rows;
                $response ->insert_id = $stmt->insert_id;
                mysqli_stmt_close($stmt);
            }
            
            return $response;
        }
        $this->closeConection($conn);
    }
    private function openConnection(){
        $conn = new mysqli
        (
            $this->env->DB_HOST, 
            $this->env->DB_USER, 
            $this->env->DB_PASSWORD,
            $this->env->DB_NAME
        );
        return $conn;
    }
    private function closeConection($conn){
        $conn -> close();
    }
    private function loadConfig(){
        $param = new stdClass();
        $file = fopen(__DIR__.'/../.env', "r");
        $lines = fread($file,filesize(__DIR__.'/../.env'));
        $lines = explode(PHP_EOL, $lines);
        foreach ($lines as $key => $line) {
          $line = explode("=", $line);
          if($line[0]!=''){
            $param->{$line[0]} = $line[1];
          }
        }
        return $param;
    }
    private function getReferences($args){
        foreach (array_keys($args) as $i) {
          if ($i>0){ 
            $args[$i] = & $args[$i];
          }
        }
        return $args;
    }
}
?>