<?php

class Genre extends CRUD {
    protected $table = 'genre';
    protected $primaryKey = 'id_genre';

    protected $fillable = ['id_genre', 'nom_genre'];
}

?>