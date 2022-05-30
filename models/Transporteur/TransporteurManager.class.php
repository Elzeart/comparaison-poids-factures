<?php
require_once "models/MainManager.php";
require_once "Transporteur.class.php";

class TransporteurManager extends MainManager {
    private $transporteurs; //---<> TABLEAU DES TRANSPORTEURS <>---//

    public function ajoutTransporteur($transporteur){
        $this->transporteurs[] = $transporteur;
    }
    
    public function getTransporteurs(){
        return $this->transporteurs;
    }
    
    // public function getTransporteur(){
    //     $req = $this->getBdd()->prepare ("SELECT * FROM transporteur");
    //     $req->execute();
    //     $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    //     $req->closeCursor();
    //     return $datas;
    //     var_dump($datas);
    // }

    public function affichageTransporteurs(){              
        $req = $this->getBdd()->prepare("SELECT * FROM transporteur ");
        $req->execute();
        $myTransporteurs = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($myTransporteurs as $transporteur){
            $t = new Transporteur($transporteur['idTransporteur'],
                                    $transporteur['nomTransporteur'],
                                    $transporteur['calcul'],
                                    $transporteur['colonnePoidsCsv'],
                                    $transporteur['colonneRefCsv']);
            $this->ajoutTransporteur($t);
            //var_dump($t);
        }
    }

    public function modifierTransporteurBdd($idTransporteur,$nomTransporteur,$calcul,$colonnePoidsCsv,$colonneRefCsv){
        $sql= 'UPDATE transporteur SET 
        nomTransporteur= :nomTransporteur, calcul= :calcul, colonnePoidsCsv = :colonnePoidsCsv, colonneRefCsv = :colonneRefCsv
        WHERE idTransporteur= :idTransporteur';
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":idTransporteur",$idTransporteur,PDO::PARAM_INT);
        $stmt->bindValue(":nomTransporteur",$nomTransporteur,PDO::PARAM_STR);
        $stmt->bindValue(":calcul",$calcul,PDO::PARAM_STR);
        $stmt->bindValue(":colonnePoidsCsv",$colonnePoidsCsv,PDO::PARAM_STR);
        $stmt->bindValue(":colonneRefCsv",$colonneRefCsv,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function getTransporteurById($id){
        for($i=0; $i < count($this->transporteurs); $i++){
            if($this->transporteurs[$i]->getIdTransporteur() === $id){
                return $this->transporteurs[$i];
            }
        }
        throw new Exception("Le transporteur n'existe pas");
    }

    public function supprimerTransporteurBdd($id){
        $req = "DELETE FROM transporteur WHERE idTransporteur = :idTransporteur";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idTransporteur",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if($result > 0){
            $transporteur = $this->getTransporteurById($id);
            unset($transporteur);
            Toolbox::addAlertMessage("Le transporteur a été supprimé", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Le transporteur n'a pas été supprimé", Toolbox::COULEUR_ROUGE);
        }
    }

    public function ajouterTransporteurBdd($nomTransporteur,$calcul,$colonnePoidsCsv,$colonneRefCsv){  

        var_dump($nomTransporteur, $calcul, $colonnePoidsCsv, $colonneRefCsv);
        $req = "INSERT INTO transporteur  (nomTransporteur, calcul, colonnePoidsCsv, colonneRefCsv)
                VALUES (:nomTransporteur , :calcul, :colonnePoidsCsv, :colonneRefCsv)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nomTransporteur",$nomTransporteur,PDO::PARAM_STR);
        $stmt->bindValue(":calcul",$calcul,PDO::PARAM_STR);
        $stmt->bindValue(":colonnePoidsCsv",$colonnePoidsCsv,PDO::PARAM_STR);
        $stmt->bindValue(":colonneRefCsv",$colonneRefCsv,PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
            $transporteur = new Transporteur($this->getBdd()->lastInsertId(),$nomTransporteur,$calcul,$colonnePoidsCsv,$colonneRefCsv);
            $this->ajoutTransporteur($transporteur);//---<> AJOUT DU TRANSPORTEUR DANS LE TABLEAU DE TRANSPORTEURS <>---//
            Toolbox::addAlertMessage("Le transporteur a été ajouté", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Echec de l'ajout du transporteur", Toolbox::COULEUR_ROUGE);
        }
    } 
}
