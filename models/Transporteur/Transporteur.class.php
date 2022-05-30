<?php

class Transporteur{
    private $idTransporteur;
    private $nomTransporteur;
    private $calcul;
    private $colonnePoidsCsv;
    private $colonneRefCsv;


    public function __construct($idTransporteur,$nomTransporteur,$calcul,$colonnePoidsCsv,$colonneRefCsv){
        $this->idTransporteur = $idTransporteur;
        $this->nomTransporteur = $nomTransporteur;
        $this->calcul = $calcul;
        $this->colonnePoidsCsv = $colonnePoidsCsv;
        $this->colonneRefCsv = $colonneRefCsv;
    }

    public function getIdTransporteur()
    {
        return $this->idTransporteur;
    }
    public function setIdTransporteur($idTransporteur)
    {
        $this->idTransporteur= $idTransporteur;
    }

    public function getNomTransporteur()
    {
        return $this->nomTransporteur;
    }
    public function setNomTransporteur($nomTransporteur)
    {
        $this->nomTransporteur= $nomTransporteur;
    }

    public function getCalcul()
    {
        return $this->calcul;
    }
    public function setCalcul($calcul)
    {
        $this->calcul = $calcul;
    }
   
    public function getColonnePoidsCsv()
    {
        return $this->colonnePoidsCsv;
    }
    public function setColonnePoidsCsv($colonnePoidsCsv)
    {
        $this->colonnePoidsCsv = $colonnePoidsCsv;
    }

    public function getColonneRefCsv()
    {
        return $this->colonneRefCsv;
    }
    public function setColonneRefCsv($colonneRefCsv)
    {
        $this->colonneRefCsv = $colonneRefCsv;
    }
}