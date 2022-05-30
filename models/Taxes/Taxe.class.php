<?php

class Taxe{
    private $idTaxe;
    private $nomTaxe;
    private $valeurTaxe;
    private $idTransporteur;
    private $nomTransporteur;


    public function __construct($nomTaxe,$valeurTaxe,$nomTransporteur,$idTransporteur,$idTaxe){
        $this->nomTaxe = $nomTaxe;
        $this->valeurTaxe = $valeurTaxe;
        $this->nomTransporteur = $nomTransporteur;
        $this->idTransporteur= $idTransporteur;
        $this->idTaxe = $idTaxe;
    }

    public function getIdTaxe()
    {
        return $this->idTaxe;
    }
    public function setIdTaxe($idTaxe)
    {
        $this->idTaxe= $idTaxe;
    }

    public function getNomTaxe()
    {
        return $this->nomTaxe;
    }
    public function setNomTaxe($nomTaxe)
    {
        $this->nomTaxe= $nomTaxe;
    }

    public function getValeurTaxe()
    {
        return $this->valeurTaxe;
    }
    public function setValeurTaxe($valeurTaxe)
    {
        $this->valeurTaxe = $valeurTaxe;
    }

    public function getIdTransporteur()
    {
        return $this->idTransporteur;
    }
    public function setIdTransporteur($idTransporteur)
    {
        $this->idTransporteur = $idTransporteur;
    }

    public function getNomTransporteur()
    {
        return $this->nomTransporteur;
    }
    public function setNomTransporteur($nomTransporteur)
    {
        $this->nomTransporteur = $nomTransporteur;
    }

}