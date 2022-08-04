<?php

//---<> EN STATIC POUR QUE CE SOIT ACCESSIBLE DIRECTEMENT DEPUIS LA CLASSE SECURITE <>---//
abstract class Security {

    public static function secureHTML($chaine){
        return htmlspecialchars(strip_tags(trim(($chaine))));
    }

}