<?php
require_once "models/MainManager.php";
require_once "Facture.class.php";


class FactureManager extends MainManager {

    // private $factures; //---<> TABLEAU DES factures <>---//

    // public function ajoutFacture($facture){
    //     $this->factures[] = $facture;
    // }
    
    // public function getFacture(){
    //     return $this->factures;
    // }

    public function trouverFacture($idTransporteur){
        $req = "SELECT calcul FROM transporteur where idTransporteur = :idTransporteur";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idTransporteur",$idTransporteur,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function trouverValeurBase($idTransporteur){
        // $req = $this->getBdd()->prepare("SELECT valeurPrix FROM prix_poids where idTransporteur = 1 AND valeurPoids = 4");
        $req = "SELECT valeurPrix, valeurPoids FROM prix_poids where idTransporteur = :idTransporteur";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idTransporteur",$idTransporteur,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function trouverTaxes($idTransporteur){
        $req = "SELECT * FROM taxes WHERE idTransporteur = :idTransporteur";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idTransporteur",$idTransporteur,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function trouverColonne($idTransporteur){
        $req = "SELECT colonnePoidsCsv, colonneRefCsv FROM transporteur WHERE idTransporteur = :idTransporteur";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idTransporteur",$idTransporteur,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

