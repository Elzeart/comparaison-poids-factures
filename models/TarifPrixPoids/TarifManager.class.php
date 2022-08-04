<?php
require_once "models/MainManager.php";
require_once "Tarif.class.php";

class TarifManager extends MainManager {
    private $tarifs; //---<> TABLEAU DES PRIX/POIDS<>---//

    public function ajoutPrixPoids($tarif){
        $this->tarifs[] = $tarif;
    }
    
    public function getTarif(){
        return $this->tarifs;
    }

    public function affichageTarifsAll(){
        $req = $this->getBdd()->prepare("SELECT * FROM prix_poids");
        $req->execute();       
        $myTarifs = $req->fetchAll(PDO::FETCH_ASSOC);
        // $req->closeCursor();
        foreach($myTarifs as $tarifs){
            $t = new Tarif(         $tarifs['idPrixPoids'],
                                    $tarifs['valeurPoids'],
                                    $tarifs['valeurPrix'],
                                    $tarifs['idTransporteur']);
            $this->ajoutPrixPoids($t);
        }
    }

    public function affichageNomTransporteurLieTarifs(){
        $req2 = $this->getBdd()->prepare("SELECT nomTransporteur FROM transporteur INNER Join prix_poids On transporteur.idTransporteur = prix_poids.idTransporteur");
        $req2->execute();
        // $req2->closeCursor();       
        return $nomTransp = $req2->fetchAll(PDO::FETCH_ASSOC);
    }


    public function affichageTarif(){
        $req = $this->getBdd()->prepare("SELECT * FROM prix_poids WHERE idTransporteur = '" .$_POST['idTransporteur']. "' ORDER BY valeurPoids");
        $req->execute();       
        $myTarifs = $req->fetchAll(PDO::FETCH_ASSOC);
        // $req->closeCursor();
        foreach($myTarifs as $tarifs){
            $t = new Tarif(         $tarifs['idPrixPoids'],
                                    $tarifs['valeurPoids'],
                                    $tarifs['valeurPrix'],
                                    $tarifs['idTransporteur']);
            $this->ajoutPrixPoids($t);
        }
        $req2 = $this->getBdd()->prepare("SELECT nomTransporteur FROM transporteur INNER Join prix_poids On transporteur.idTransporteur = prix_poids.idTransporteur where prix_poids.idTransporteur = '" .$_POST['idTransporteur']. "' ");
        $req2->execute();       
        return $nomTransp = $req2->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTarifById($id){
        for($i=0; $i < count($this->tarifs); $i++){
            if($this->tarifs[$i]->getIdPrixPoids() === $id){
                return $this->tarifs[$i];
            }
        }
        throw new Exception("Le tarif n'existe pas");
    }

    public function ajouterTarifBdd($valeurPoids,$valeurPrix,$idTransporteur){
        $idTransporteur = $_POST['idTransporteur'];
        $req = "INSERT INTO prix_poids  (valeurPoids, valeurPrix , idTransporteur)
                VALUES (:valeurPoids, :valeurPrix, :idTransporteur)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":valeurPoids",$valeurPoids,PDO::PARAM_STR);
        $stmt->bindValue(":valeurPrix",$valeurPrix,PDO::PARAM_STR);
        $stmt->bindValue(":idTransporteur",$idTransporteur,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
            $tarif = new Tarif($this->getBdd()->lastInsertId(),$valeurPoids,$valeurPrix,$idTransporteur);
            $this->ajoutPrixPoids($tarif);//---<> AJOUT DU TRANSPORTEUR DANS LE TABLEAU DE TRANSPORTEURS <>---//
            Toolbox::addAlertMessage("Le tarif a été ajouté", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Echec de l'ajout du tarif", Toolbox::COULEUR_ROUGE);
        }
    }

    public function supprimerTarifBdd($id){
        $req = "DELETE FROM prix_poids WHERE idPrixPoids = :idPrixPoids";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idPrixPoids",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if($result > 0){
            /* $tarif = $this->getTarifById($id);
            unset($tarif); */
            Toolbox::addAlertMessage("Le tarif a été supprimé", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Le tarif n'a pas été supprimé", Toolbox::COULEUR_ROUGE);
        }
    }

    public function modifierTarifBdd($idPrixPoids,$valeurPoids,$valeurPrix,$idTransporteur){
        $sql= 'UPDATE prix_poids SET 
        idPrixPoids = :idPrixPoids, valeurPoids= :valeurPoids, valeurPrix= :valeurPrix, idTransporteur = :idTransporteur 
        WHERE idPrixPoids= :idPrixPoids';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":idPrixPoids",$idPrixPoids,PDO::PARAM_INT);
        $stmt->bindValue(":valeurPoids",$valeurPoids,PDO::PARAM_STR);
        $stmt->bindValue(":valeurPrix",$valeurPrix,PDO::PARAM_STR);
        $stmt->bindValue(":idTransporteur",$idTransporteur,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }


}