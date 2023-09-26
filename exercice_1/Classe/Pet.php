<?php

require_once('Animal.php');
//class Pet
class Pet extends Animal {
    public $name;
    public $birthday;
    public $age;

    
    public function setProp($name, $birthday, $type = 'Cat') { 
        $this->type = $type;     
        $this->name = $name;
        $this->birthday = $birthday;
        $this->age();
    }
    
    //Calculer agr
    public function age() {
        $today = date('Y');
        $birthdayYear = date('Y', strtotime($this->birthday));
        $this->age = $today - $birthdayYear;
    }
    
    public function getProp() {
        return "<p>Type : $this->type</p>
                <p>Name : $this->name</p>
                <p>Birthday : $this->birthday</p>
                <p>Age : $this->age</p>";
    }
}

?>