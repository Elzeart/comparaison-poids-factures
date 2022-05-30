<?php
require_once "models/MainManager.php";
require_once "Taxe.class.php";

class TaxeManager extends MainManager {
    private $taxes; //---<> TABLEAU DES TAXES <>---//

    public function ajoutTaxe($taxe){
        $this->taxes[] = $taxe;
    }
    
    public function getTaxes(){
        return $this->taxes;
    }

    public function chargementTaxes(){
        $req = $this->getBdd()->prepare("SELECT * FROM transporteur JOIN taxes on taxes.idTransporteur = transporteur.idTransporteur ORDER BY transporteur.nomTransporteur;");
        $req->execute();
        $myTaxes = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($myTaxes as $taxe){
            $t = new Taxe($taxe['nomTaxe'],
                            $taxe['valeurTaxe'], 
                            $taxe['nomTransporteur'],
                            $taxe['idTransporteur'],
                            $taxe['idTaxe']
                            );
            $this->ajoutTaxe($t);
        }
    }

    public function getTaxeById($id){
        for($i=0; $i < count($this->taxes); $i++){
            if($this->taxes[$i]->getIdTaxe() === $id){
                return $this->taxes[$i];
            }
        }
        throw new Exception("La taxe n'existe pas"); 
    }

    public function modifierTaxeBdd($nomTaxe, $valeurTaxe, $idTaxe){
        $sql= 'UPDATE taxes SET 
        nomTaxe= :nomTaxe, valeurTaxe= :valeurTaxe
        WHERE idTaxe= :idTaxe';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":idTaxe",$idTaxe,PDO::PARAM_INT);
        $stmt->bindValue(":nomTaxe",$nomTaxe,PDO::PARAM_STR);
        $stmt->bindValue(":valeurTaxe",$valeurTaxe,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }


    public function ajouterTaxeValidationBdd($nomTaxe,$valeurTaxe,$idTransporteur,$nomTransporteur){  
        $req = "INSERT INTO taxes  (nomTaxe, valeurTaxe, idTransporteur)
                VALUES (:nomTaxe, :valeurTaxe, :idTransporteur)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nomTaxe",$nomTaxe,PDO::PARAM_STR);
        $stmt->bindValue(":valeurTaxe",$valeurTaxe,PDO::PARAM_STR);
        $stmt->bindValue(":idTransporteur",$idTransporteur,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
            $taxe = new Taxe($nomTaxe,$valeurTaxe,$nomTransporteur,$idTransporteur,$this->getBdd()->lastInsertId());
            $this->ajoutTaxe($taxe);//---<> AJOUT DU TRANSPORTEUR DANS LE TABLEAU DE TRANSPORTEURS <>---//
            Toolbox::addAlertMessage("La taxe a été ajoutée", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Echec de l'ajout de la taxe", Toolbox::COULEUR_ROUGE);
        }
    }

    public function getListeNomVsId(){
        $req = "SELECT idTransporteur, nomTransporteur FROM transporteur";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function supprimerTaxeBdd($id){
        $req = "DELETE FROM taxes WHERE idTaxe = :idTaxe";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idTaxe",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if($result > 0){
            $taxe = $this->getTaxeById($id);
            unset($taxe);
            Toolbox::addAlertMessage("La taxe a été supprimé", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("La taxe n'a pas été supprimé", Toolbox::COULEUR_ROUGE);
        }
    }

}



