<?php

// ver melhor PDO
abstract class CRUD extends PDO {

    public function __construct() {
        parent::__construct('mysql:host=localhost; dbname=ecommerce_tp1; port=3306; charset=utf8', 'root', '');
    }

    // mudar o id_produit dps pra poder usar em todas as situcoes
    public function select($field = 'id_produit', $order = 'ASC') {
        $sql = "SELECT * FROM $this->table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($value) {
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = '$value'";
        $stmt = $this->query($sql);
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            // OLHAR ISSO AQUI
            RequirePage::url('home/error/404');
        }
    }

    public function insert($data) {

        //entender melhor isso
        //  type, description, prix, id_material, id_usager
        // :type, :description, :prix, :id_material, :id_usager
        $nomChamp = implode(", ", array_keys($data));
        $valeurChamp = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach ($data as $cle => $valeur) {
            $stmt->bindValue(":$cle", $valeur);
        }
        $stmt->execute();
        return $this->lastInsertId();
    }
}

?>