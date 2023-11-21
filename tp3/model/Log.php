<?php

class Log extends CRUD {

    protected $table = 'log';
    protected $primaryKey = "id";

    protected $fillable = ['adresse_ip', 'date' , 'nom', 'page', 'usager'];
}

?>