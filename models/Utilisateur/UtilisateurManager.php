<?php
require_once "models/MainManager.php";
require_once "User.class.php";

class UtilisateurManager extends MainManager {


    public function getUserLogin($login,$password){
            $req =("SELECT * FROM utilisateur WHERE login = ? and password = ? LIMIT 1");
            $stmt = $this->getBdd()->prepare($req);
            $stmt->execute(array($login,$password));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
    }

    public function getUserInformations($login){
        $req = "SELECT * FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }
}
