<?php

class Tarif{
    private $idPrixPoids;
    private $valeurPoids;
    private $valeurPrix;
    private $idTransporteur;



    public function __construct($idPrixPoids,$valeurPoids,$valeurPrix,$idTransporteur){
        $this->idPrixPoids = $idPrixPoids;
        $this->valeurPoids = $valeurPoids;
        $this->valeurPrix = $valeurPrix;
        $this->idTransporteur = $idTransporteur;
    }

    public function getIdPrixPoids()
    {
        return $this->idPrixPoids;
    }
    public function setIdPrixPoids($idPrixPoids)
    {
        $this->idPrixPoids= $idPrixPoids;
    }

    public function getValeurPoids()
    {
        return $this->valeurPoids;
    }
    public function setValeurPoids($valeurPoids)
    {
        $this->valeurPoids= $valeurPoids;
    }

    public function getValeurPrix()
    {
        return $this->valeurPrix;
    }
    public function setValeurPrix($valeurPrix)
    {
        $this->valeurPrix = $valeurPrix;
    }
    public function getIdTransporteur()
    {
        return $this->idTransporteur;
    }
    public function setIdTransporteur($idTransporteur)
    {
        $this->idTransporteur = $idTransporteur;
    }
}
    ?>