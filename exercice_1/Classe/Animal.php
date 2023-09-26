<?php

//class Aninal

abstract class Animal {

    protected $type = 'Cat';

    abstract public function setProp($type, $name, $birthday);

    abstract public function getProp();
}

?>