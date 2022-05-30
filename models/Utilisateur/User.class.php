<?php

class User{
    private $idUser;
    private $login;
    private $password;


    public function __construct($login,$password){
        $this->login = $login;
        $this->password = $password;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser($idUser)
    {
        $this->idUser= $idUser;
    }

    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($login)
    {
        $this->login= $login;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

}
