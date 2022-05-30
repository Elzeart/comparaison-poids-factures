<?php
require_once "controllers/MainController.php";
require_once "models/TarifPrixPoids/TarifManager.class.php";

class TarifController extends MainController {
    private $tarifManager;
    private $transporteurManager;

    public function __construct(){
            $this->tarifManager = new TarifManager();
            $this->transporteurManager = new TransporteurManager();
            $this->transporteurManager->affichageTransporteurs();
    }

    public function afficherTarifTransporteur(){
        $transporteurs = $this->transporteurManager->getTransporteurs();
        if(empty($_POST['idTransporteur'])){
            $this->tarifManager->affichageTarifsAll();
            $tarifs = $this->tarifManager->getTarif();
        } else {
            $this->tarifManager->affichageTarif();
            $tarifs = $this->tarifManager->getTarif();
        }
        $data_page = [
            "page_description" => "Page de tarif transporteur",
            "page_title" => "Page de tarif transporteur",
            "transporteurs" => $transporteurs,
            "tarifs" => $tarifs,
            // "page_javascript"=> ['profil.js'],
            //"page_css"=> ['style.css'],
            "view" => "views/afficherPrixPoids.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        // var_dump($tarifs);
    }
    
    public function ajoutTarif(){
        $transporteurs = $this->transporteurManager->getTransporteurs();
        $data_page = [
            "page_description" => "Page des tarif transporteur",
            "page_title" => "Page des tarif transporteur",
            "transporteurs" => $transporteurs,
            // "page_javascript"=> ['profil.js'],
            //"page_css"=> ['style.css'],
            "view" => "views/ajoutTarifTransporteur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function ajouterTarifValidation(){
        try{
            $this->tarifManager->ajouterTarifBdd($_POST['valeurPoids'],$_POST['valeurPrix'],$_POST['idTransporteur']);
        } catch (Exception $e) {
        }
        header('Location: ' . URL . "tarifTransporteur");
    }

/*     public function modifierTarifValidation(){
        try {
            $this->tarifManager->modifierTarifBdd($_POST['idPrixPoids'],$_POST['valeurPoids'], $_POST['valeurPrix'],$_POST['idTransporteur']);
            Toolbox::addAlertMessage("La modification du tarif a été éffectuée", Toolbox::COULEUR_VERTE);
        } catch (Exception $e) {
            Toolbox::addAlertMessage("La modification du tarif a échoué", Toolbox::COULEUR_ROUGE);
        }
        header('Location: ' . URL . "tarifTransporteur");
    } */

    public function supprimerTarif($id){
        try{
            $this->tarifManager->supprimerTarifBdd($id);
        } catch (Exception $e) {
    }
        header('Location: ' . URL . "tarifTransporteur");
    }

    public function modifierTarif($id){
        $this->tarifManager->affichageTarifsAll();
        $tarif = $this->tarifManager->getTarifById($id);
        $data_page = [
            "page_description" => "Page de tarif transporteur",
            "page_title" => "Page de tarif transporteur",
            "tarif" => $tarif,
            // "page_javascript"=> ['profil.js'],
            "page_css" => ['styleTransp.css'],
            //"page_css"=> ['style.css'],
            "view" => "views/modifierTarif.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($transporteur);
    }

    public function modifierTarifValidation(){
        try {
            $this->tarifManager->modifierTarifBdd($_POST['idPrixPoids'], $_POST['valeurPoids'],$_POST['valeurPrix'], $_POST['idTransporteur']);
            Toolbox::addAlertMessage("La modification de la taxe a été éffectuée", Toolbox::COULEUR_VERTE);
        } catch (Exception $e) {
            Toolbox::addAlertMessage("La modification de la taxe a échoué", Toolbox::COULEUR_ROUGE);
        }
        header('Location: ' . URL . "tarifTransporteur");
    }

    public function errorPage($msg){
        parent::errorPage($msg);
    }
}