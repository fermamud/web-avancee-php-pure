<?php

class Log extends CRUD {

    protected $table = 'log';
    protected $primaryKey = "id";

    protected $fillable = ['id', 'adresse_ip', 'date' , 'nom', 'page'];
}

?>