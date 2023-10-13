<?php

class CRUD extends PDO {

    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=ecommerce_tp1; port=3306; charset=utf8', 'root', '');
    }

    public function select($table){
        $sql="SELECT * FROM $table";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $field){
        $sql="SELECT * FROM $table WHERE $field = '$value'";
        $stmt = $this->query($sql);
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            header('location:client-index.php');
        }  
    }
}


?>