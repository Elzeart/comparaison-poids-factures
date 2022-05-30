<?php
require_once "controllers/MainController.php";
require_once "models/Transporteur/TransporteurManager.class.php";
require_once "models/Taxes/TaxeManager.class.php";

class TransporteurController extends MainController {
    private $transporteurManager;

    public function __construct(){
        $this->transporteurManager = new TransporteurManager();
        $this->transporteurManager->affichageTransporteurs();

    }

    public function voirTransporteurs(){
        $transporteurs = $this->transporteurManager->getTransporteurs();
        $data_page = [
            "page_description" => "Page de tarif transporteur",
            "page_title" => "Page de tarif transporteur",
            "transporteurs" => $transporteurs,
            // "page_javascript"=> ['profil.js'],
            //"page_css"=> ['style.css'],
            "view" => "views/voirTransporteurs.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($transporteurs);
        //var_dump($taxes);
    }

    public function voirTransporteur($id){
        $transporteur = $this->transporteurManager->getTransporteurById($id);
        $data_page = [
            "page_description" => "Page de tarif transporteur",
            "page_title" => "Page de tarif transporteur",
            "transporteur" => $transporteur,
            // "page_javascript"=> ['profil.js'],
            "page_css" => ['styleTransp.css'],
            //"page_css"=> ['style.css'],
            "view" => "views/voirTransporteur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($transporteur);
    }

    public function modifierTransporteur($id){
        $transporteur = $this->transporteurManager->getTransporteurById($id);
        $data_page = [
            "page_description" => "Page de tarif transporteur",
            "page_title" => "Page de tarif transporteur",
            "transporteur" => $transporteur,
            // "page_javascript"=> ['profil.js'],
            "page_css" => ['styleTransp.css'],
            //"page_css"=> ['style.css'],
            "view" => "views/modifierTransporteur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($transporteur);
    }

    public function ajouterTransporteur(){
        $data_page = [
            "page_description" => "Page d'ajout de transporteur",
            "page_title" => "Page d'ajout de transporteur",
            "page_css" => ['styleTransp.css'],
            //"page_css"=> ['style.css'],
            "view" => "views/ajouterTransporteur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($transporteur);
    }

    public function ajouterTransporteurValidation(){
        try{
            $this->transporteurManager->ajouterTransporteurBdd($_POST['nomTransporteur'],$_POST['calcul'], $_POST['colonnePoidsCsv'], $_POST['colonneRefCsv']);
        } catch (Exception $e) {
    }
    header('Location: ' . URL . "transporteur");
    }

    public function modifierTransporteurValidation(){

        try {
            //$this->transporteurManager->getTransporteurById($_POST['idTransporteur'])->getNomTransporteur();
            //var_dump($_POST['idTransporteur'], $_POST['nomTransporteur'],$_POST['calcul'], $_POST['colonnePoidsCsv'], $_POST['colonneRefCsv']);
            $this->transporteurManager->modifierTransporteurBdd($_POST['idTransporteur'], $_POST['nomTransporteur'],$_POST['calcul'], $_POST['colonnePoidsCsv'], $_POST['colonneRefCsv']);
            Toolbox::addAlertMessage("La modification du transporteur a été éffectuée", Toolbox::COULEUR_VERTE);
        } catch (Exception $e) {
            Toolbox::addAlertMessage("La modification du transporteur a échoué", Toolbox::COULEUR_ROUGE);
        }
        header('Location: ' . URL . "transporteur");
    }

    public function supprimerTransporteur($id){
        try{
            $this->transporteurManager->supprimerTransporteurBdd($id);
        } catch (Exception $e) {
        }
        header('Location: ' . URL . "transporteur");
    }

    public function errorPage($msg){
        parent::errorPage($msg);
    }
}
