<?php

class CRUD extends PDO {

    public function __construct() {
        parent::__construct('mysql:host=localhost; dbname=ecommerce_tp1; port=3306; charset=utf8', 'root', '');
    }

    public function select($table) {
        $sql = "SELECT * FROM $table";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $field = 'id') {
        $sql = "SELECT * FROM $table WHERE $field = '$value'";
        $stmt = $this->query($sql);
        $count = $stmt->rowCount();
        if($count == 1) {
            return $stmt->fetch();
        }else{
            header('location: client-index.php');
        }  
    }

    public function insert($table, $data) {
        $nomChamp = implode(", ", array_keys($data));
        $valeurChamp = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach ($data as $cle => $valeur) {
            $stmt->bindValue(":$cle", $valeur);
        }
        $stmt->execute();
        return $this->lastInsertId();
    }

    public function update($table, $data, $field) {
        $champRequete = null;
        foreach ($data as $cle => $valeur) {
            $champRequete .= "$cle =:$cle, ";
        }
        $champRequete = rtrim($champRequete, ", ");

        $sql = "UPDATE $table SET $champRequete WHERE $field =:$field";
        $stmt = $this->prepare($sql);
        foreach ($data as $cle => $valeur) {
            $stmt->bindValue(":$cle", $valeur);
        }
        $stmt->execute();

        header('location: liste-collaborateurs.php');
    }

    public function selectAvecVilleNom($table1, $table2, $field) {
        $sql = "SELECT id_usager, usager.nom, prenom, genre.nom AS genre FROM $table1 JOIN $table2 ON $table1.$field = $table2.$field ORDER BY id_usager";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function delete($table, $value, $field) {
        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        header('location: liste-collaborateurs.php');
    }
}


?>