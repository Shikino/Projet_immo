<?php
require_once "../view/ViewTemplate.php";
require_once "../view/ViewInscription.php";
require_once "../model/Modelinscription.php";
require_once "../controller/User.Class.php";
ViewTemplate::header();
if (isset($_GET['mail']) && isset($_GET['token'])) {

    if (ModelUser::getbyMailToken($_GET['mail'], $_GET['token'])) {
        $user = new User(
            [
                'mail' => $_GET['mail'],
                'token' => $_GET['token']
            ]
        );
        ModelUser::comfirmerMailToken($user);
        ViewTemplate::alert("Vérification reussie", "success", "ControllerConnexion.php");
    } else {

        ViewTemplate::alert("Veuillez svp verifier votre profil", "danger", "ControllerConnexion.php");
    }
} else {

    ViewTemplate::alert("Aucunes donnes transmises", "danger", "ControllerInscription.php");
}
ViewTemplate::footer();
