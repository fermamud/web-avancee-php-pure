<?php

class RequirePage {
    // ver pq eh static
    static public function model($model) {
        return require_once('model/' . $model . '.php');
    }

    // ver pra que serve isso
    static public function url($url){
        header('location:'.PATH_DIR.$url);
    }
}

?>