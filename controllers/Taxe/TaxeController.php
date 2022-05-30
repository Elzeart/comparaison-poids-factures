<?php
require_once "controllers/MainController.php";
require_once "models/Taxes/TaxeManager.class.php";

class TaxeController extends MainController {
    private $taxeManager;
    // private $taxeManager;

    public function __construct(){
        $this->taxeManager = new TaxeManager();
        $this->taxeManager->chargementTaxes();

    }

    public function voirTaxes(){
        $taxes = $this->taxeManager->getTaxes();
        $data_page = [
            "page_description" => "Page de taxes transporteur",
            "page_title" => "Page de taxes transporteur",
            "taxes" => $taxes,
            // "page_javascript"=> ['profil.js'],
            //"page_css"=> ['style.css'],
            "view" => "views/taxes.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function modifierTaxe($id){
        $taxe = $this->taxeManager->getTaxeById($id);
        $data_page = [
            "page_description" => "Page de modification de la taxe",
            "page_title" => "Page de modification de la taxe",
            "taxe" => $taxe,
            // "page_javascript"=> ['profil.js'],
            "page_css" => ['styleTransp.css'],
            //"page_css"=> ['style.css'],
            "view" => "views/modifierTaxe.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function modifierTaxeValidation(){

        try {
            $this->taxeManager->modifierTaxeBdd($_POST['nomTaxe'], $_POST['valeurTaxe'],$_POST['idTaxe']);
            Toolbox::addAlertMessage("La modification de la taxe a été éffectuée", Toolbox::COULEUR_VERTE);
        } catch (Exception $e) {
            Toolbox::addAlertMessage("La modification de la taxe a échouée", Toolbox::COULEUR_ROUGE);
        }
        header('Location: ' . URL . "taxesTransporteur");
    }

    public function ajouterTaxe(){
        $nomTransporteurVsId = $this->taxeManager->getListeNomVsId();
        $data_page = [
            "page_description" => "Page d'ajout d'une taxe",
            "page_title" => "Page d'ajout d'une taxe",
            "nomTransporteurVsId" => $nomTransporteurVsId,
            "page_css" => ['styleTransp.css'],
            //"page_css"=> ['style.css'],
            "view" => "views/ajouterTaxe.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($transporteur);
    }

    public function ajouterTaxeValidation(){
        try{
            $this->taxeManager->ajouterTaxeValidationBdd($_POST['nomTaxe'],$_POST['valeurTaxe'],$_POST['idTransporteur'], $_POST['nomTransporteur']);
        } catch (Exception $e) {
    }
    header('Location: ' . URL . "taxesTransporteur");
    }

    public function supprimerTaxe($id){
        try{
            $this->taxeManager->supprimerTaxeBdd($id);
        } catch (Exception $e) {
        }
        header('Location: ' . URL . "taxesTransporteur");
    }

}