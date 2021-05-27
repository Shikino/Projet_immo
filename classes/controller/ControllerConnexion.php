<?php
require_once "../view/ViewTemplate.php";
require_once "../view/ViewConnexion.php";
ViewTemplate::header();
viewTemplate::navbar();
if ( isset($_GET["connect"]) ) {

    if(  $_GET["connect"]== "error"){

        ViewTemplate::alert("Identifiants non valides", "danger", Null);

    }else if ($_GET["connect"]== "mailNotFound" ){

        ViewTemplate::alert("Adresse mail inconnu", "danger", Null);

    }


}
ViewConnexion::connexion();
ViewTemplate::footer();
