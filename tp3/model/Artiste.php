<?php

class Artiste extends CRUD {

    protected $table = 'usager';
    protected $primaryKey = 'id_usager';

    //mudar???
    protected $fillable = ['id_usager', 'nom', 'prenom', 'id_genre'];

    public function checkUser($username, $password) {
        $sql = "SELECT * FROM $this->table WHERE username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));
        $count = $stmt->rowCount();

        if($count === 1){
            $salt = "H3@_l?a";
            $saltPassword = $password.$salt;
            //echo $saltPassword;
            $info_user = $stmt->fetch();
            // var_dump($info_user);
            // echo "<br>";
            // echo $info_user['password'];
            // die();

           if(password_verify($saltPassword, $info_user['password'])){
            //session
            session_regenerate_id();
            $_SESSION['id_usager'] = $info_user['id_usager'];
            $_SESSION['username'] = $info_user['username'];
            $_SESSION['privilege'] = $info_user['id_privilege'];
            $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);

            // var_dump($_SESSION);
            // die();
            RequirePage::url('produit');
            exit();

        }else{
            $errors = "<ul><li>Verifier le mot de passe</li></ul>";
            return $errors;
        }

    }else{
        $errors = "<ul><li>Verifier le username</li></ul>";
        return $errors; 
    }


    }

}

?>