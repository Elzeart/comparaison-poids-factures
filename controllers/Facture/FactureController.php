<?php
require_once "controllers/MainController.php";
require_once "models/Facture/FactureManager.class.php";
// require_once "models/Transporteur/TransporteurManager.class.php";

class FactureController extends MainController {
    private $factureManager;
    private $transporteurManager;
    
    public function __construct(){
        $this->factureManager = new FactureManager();
        $this->transporteurManager = new TransporteurManager();
    }

    public function compare(){
        $this->transporteurManager->affichageTransporteurs();
        $transporteurs = $this->transporteurManager->getTransporteurs();
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            // "variableEncode" => $variableEncode,
            "transporteurs" => $transporteurs,
            // "page_javascript"=> ['scriptComp.js'],
            "page_css" => ['styleComp.css'],
            "view" => "views/compare.view.php",
            "template" => "views/common/template.php"
            ];
        $this->generatePage($data_page);
    }


    public function comparer($idTransporteur){
        $colonnesPoidsRefCsv = json_encode($this->factureManager->trouverColonne($idTransporteur),JSON_UNESCAPED_UNICODE);

        $myFacture = json_encode($this->factureManager->trouverFacture($idTransporteur),JSON_UNESCAPED_UNICODE);
        $myValeurBase = json_encode($this->factureManager->trouverValeurBase($idTransporteur),JSON_UNESCAPED_UNICODE);
        $myTaxes = json_encode($this->factureManager->trouverTaxes($idTransporteur),JSON_UNESCAPED_UNICODE);

        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "myFacture" => $myFacture,
            "myValeurBase" => $myValeurBase,
            "myTaxes" => $myTaxes,
            "colonnesPoidsRefCsv" => $colonnesPoidsRefCsv,
            "page_javascript"=> ['scriptComp2.js'],
            "page_css" => ['styleComp.css'],
            "view" => "views/comparer.view.php",
            "template" => "views/common/template.php"
            ];
        $this->generatePage($data_page);
    }

    public function historique(){
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            // "page_css" => ['style.css'],
            "view" => "views/historique.view.php",
            "template" => "views/common/template.php"
            ];
        $this->generatePage($data_page);
    }

    public function errorPage($msg){
        parent::errorPage($msg);
    }
}