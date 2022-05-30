<?php
require_once "controllers/MainController.php";
require_once "models/Utilisateur/UtilisateurManager.php";

class UtilisateurController extends MainController {

    public function __construct(){
        $this->utilisateurManager = new UtilisateurManager();
    }

    public function login(){
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",
            "view" => "views/connexion.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function validationLogin($login,$password){
        if($this->utilisateurManager->getUserLogin($login,$password)){
                Toolbox::addAlertMessage("Bienvenue " .$login."!", Toolbox::COULEUR_VERTE);
                $_SESSION['profile'] = [
                    "login" => $login,
                ];
                Security::generateCookieConnexion();
                header('Location: '.URL."account/profile");
        } else {
            Toolbox::addAlertMessage("Les informations sont incorrectes", Toolbox::COULEUR_ROUGE);
            header('Location: '.URL."login");
        }
    }

    public function profile(){
        $datas = $this->utilisateurManager->getUserInformations($_SESSION['profile']['login']);
        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "user" => $datas,
            // "page_javascript"=> ['profil.js'],
            //"page_css"=> ['style.css'],
            "view" => "views/profile.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($datas);
    }

    public function deconnexion(){
        Toolbox::addAlertMessage("Vous êtes maintenant déconnecté", Toolbox::COULEUR_VERTE);
        unset($_SESSION['profile']);
        setCookie(Security::COOKIE_NAME,"",time() - 3600);
        header('Location: '.URL."login");
        //var_dump($_SESSION);
    }

    public function errorPage($msg){
        parent::errorPage($msg);
    }
}