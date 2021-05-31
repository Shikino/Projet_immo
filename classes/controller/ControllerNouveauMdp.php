<?php
require_once "../view/ViewTemplate.php";
require_once "../model/Modelinscription.php";
require_once "../view/ViewNouveauMdp.php";
ViewTemplate::header();
if ( isset($_GET["connexion"]) ) {

    if(  $_GET["connexion"]== "mailNotFound"){

        ViewTemplate::alert("Adresse mail inconnu", "danger", Null);

    };
}
ViewNouveauMdp::VerifMailMdp();
ViewTemplate::footer();
