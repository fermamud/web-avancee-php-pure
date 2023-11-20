<?php

class Artiste extends CRUD {

    protected $table = 'usager';
    protected $primaryKey = 'id_usager';

    public function checkUser($username, $password) {
        $sql = "SELECT * FROM $this->table WHERE username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));
        $count = $stmt->rowCount();

        if ($count === 1) {
            $salt = "H3@_l?a";
            $saltPassword = $password.$salt;
            $info_user = $stmt->fetch();

            if(password_verify($saltPassword, $info_user['password'])){
                // Session
                session_regenerate_id();
                $_SESSION['id_usager'] = $info_user['id_usager'];
                $_SESSION['username'] = $info_user['username'];
                $_SESSION['privilege'] = $info_user['id_privilege'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);

                RequirePage::url('produit');
                exit();
            }else{
                $errors = "<ul><li>Verifier le mot de passe</li></ul>";
                return $errors;
            }

        } else {
            $errors = "<ul><li>Verifier le username</li></ul>";
            return $errors; 
        }
    }

}

?>