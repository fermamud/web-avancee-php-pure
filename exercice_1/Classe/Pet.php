<?php

require_once('Animal.php');

class Pet extends Animal {
    public $name;
    public $birthday;
    public $age;

    public function age() {
        $today = date('Y');
        $birthdayYear = date('Y', strtotime($this->birthday));
        $this->age = $today - $birthdayYear;
    }

    public function setProps($name, $birthday) {
        $this->name = $name;
        $this->birthday = $birthday;
        $this->age();
    }

    public function getProps() {
        return "<p>Type : $this->type</p>
                <p>Name : $this->name</p>
                <p>Birthday : $this->birthday</p>
                <p>Age : $this->age</p>";
    }
}

?>