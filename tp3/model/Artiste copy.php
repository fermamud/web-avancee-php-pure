<?php

class Artiste extends CRUD {

    protected $table = 'usager';
    protected $primaryKey = 'id_usager';

    protected $fillable = ['id_usager', 'nom', 'prenom', 'id_genre'];

}

?>