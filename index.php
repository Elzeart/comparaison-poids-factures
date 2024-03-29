<?php
//---<> ROUTEUR <>---//
//---<> DEVERSE DANS TEMPLATE.PHP A L'EMPLACEMENT DE LA VARIABLE CONTENT <>---//
?>

<?php
session_start();//---<> ON DEMARRE LA SESSION <>---//
//---<> ON DECOMPOSE L'URL <>---//               //---<> CONDITION TERNAIRE POUR TESTER SI ON EST SUR UN SITE EN HTTP OU HTTPS <>--->
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/Toolbox.class.php";
require_once "controllers/Security.class.php";
require_once "controllers/Utilisateur/UtilisateurController.php";
require_once "controllers/Transporteur/TransporteurController.php";
require_once "controllers/Facture/FactureController.php";
require_once "controllers/TarifPrixPoids/TarifController.php";
require_once "controllers/Taxe/TaxeController.php";
$utilisateurController = new UtilisateurController;
$transporteurController = new TransporteurController;
$factureController = new FactureController;
$tarifController = new TarifController;
$taxeController = new TaxeController;

try{
    if(empty($_GET['page'])){
        // require "views/connexion.view.php";
        $page = "facturation";
    } else {
    //---<> ON EXPLOSE NOTRE URL EN UTILISANT LE CARACTERE "/" <>---//
        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL );
                                                //---<> ON SECURISE UN PEU CE QUI PASSE A TRAVERS LES URL <>---//
        $page = $url[0];
    }                                       
    switch($page){
        case "transporteurs" : 
            if(empty($url[1])){
                $transporteurController->voirTransporteurs();
            } else if ($url[1] === "at"){ 
                $transporteurController->ajouterTransporteur();
            } else if ($url[1] === "mt"){ 
                $transporteurController->modifierTransporteur($url[2]);
            } else if ($url[1] === "st"){ 
                $transporteurController->supprimerTransporteur($url[2]);
            } else if ($url[1] === "atv"){ 
                $transporteurController->ajouterTransporteurValidation();
            } else if ($url[1] === "mtv"){ 
                $transporteurController->modifierTransporteurValidation();
            } else {
                //---ON TRAITE TOUT LES CAS QUI NE SONT PAS PARAMETRES---//
                throw new Exception ("La page n'existe pas"); 
            }
        break;
        case 'tarifsTransporteur':
            if (empty($url[1])) {
                $tarifController->afficherTarifTransporteur();
            } else if ($url[1] === "at"){ 
                $tarifController->ajoutTarif();
            } else if ($url[1] === "mt"){ 
                $tarifController->modifierTarif($url[2]);
            } else if ($url[1] === "st"){ 
                $tarifController->supprimerTarif($url[2]);
            } else if ($url[1] === "atv"){ 
                $tarifController->ajouterTarifValidation();
            }  else if ($url[1] === "mtv"){ 
                $tarifController->modifierTarifValidation();
            }  else {
                //---ON TRAITE TOUT LES CAS QUI NE SONT PAS PARAMETRES---//
                throw new Exception ("La page n'existe pas"); 
            }
        break;
        case "facturation" : 
            if(empty($url[1])){
                $factureController->compare();
            } else if ($url[1] === "c"){   
                $factureController->comparer($_POST['idTransporteur']);
            } else if ($url[1] === "h"){ 
                $factureController->historique();
            } else {
                throw new Exception ("La page n'existe pas"); 
            }
        break;
        case "taxesTransporteur" : 
            if(empty($url[1])){
                $taxeController->voirTaxes();
            } else if ($url[1] === "mt"){ 
                $taxeController->modifierTaxe($url[2]);
            } else if ($url[1] === "mtv"){ 
                $taxeController->modifierTaxeValidation();
            } else if ($url[1] === "at"){ 
                $taxeController->ajouterTaxe();
            } else if ($url[1] === "atv"){ 
                $taxeController->ajouterTaxeValidation();
            } else if ($url[1] === "st"){ 
                $taxeController->supprimerTaxe($url[2]);
            } else {
                //---ON TRAITE TOUT LES CAS QUI NE SONT PAS PARAMETRES---//
                throw new Exception ("La page n'existe pas"); 
            }
        break;
        default : throw new Exception ("La page n'existe pas"); 
    }
}

catch(Exception $e){
    $msg = $e->getMessage();
    // require "views/error.view.php";
}


