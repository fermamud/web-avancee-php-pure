<?php

abstract class Animal {

    protected $type = 'Cat';

    public function setProp($type) {
        $this->type = $type;
    }

    public function getProp() {
        return "Type : $this->type";
    } 
}

?>