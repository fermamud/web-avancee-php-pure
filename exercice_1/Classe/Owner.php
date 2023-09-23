<?php

class Owner {
    private $name;  
    private $address;
    private $zipCode;
    private $phone;
    private $email;

    public function __construct($name, $address, $zipCode, $phone, $email) {
        $this->setProp($name, $address, $zipCode, $phone, $email);
    }

    public function setProp($name, $address, $zipCode, $phone, $email) {
        $this->name = $name;
        $this->address = $address;
        $this->zipCode = $zipCode;
        $this->phone = $phone;
        $this->email = $email;

        echo "<p>Name: $this->name</p>
              <p>Address: $this->address</p>
              <p>Zip Code: $this->zipCode</p>
              <p>Phone: $this->phone</p>
              <p>Email: $this->email</p>";
    }


    // function __destruct() {
    //     echo "<br>Name : {$this->name}<br>
    //           Adress : {$this->address}<br>
    //           Zip Code : {$this->zipCode}<br>
    //           Phone : {$this->phone}<br>
    //           Email : {$this->email}";
    // }
    //posso inserir um getProp???
}

?>