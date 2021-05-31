<?php
require_once "../view/ViewTemplate.php";
require_once "../view/ViewConnexion.php";
ViewTemplate::header();
viewTemplate::navbar();
if ( isset($_GET["connexion"]) ) {

    if(  $_GET["connexion"]== "error"){

        ViewTemplate::alert("Identifiants invalides", "danger", Null);

    }else if ($_GET["connexion"]== "mailNotFound" ){

        ViewTemplate::alert("Adresse mail inconnu", "danger", Null);

    }


}
ViewConnexion::connexion();
ViewTemplate::footer();
