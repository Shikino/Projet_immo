<?php
require_once "../view/ViewTemplate.php";
require_once "../view/ViewConnexion.php";
require_once "../model/ModelUser.php";
ViewTemplate::header();
viewTemplate::menu();
if (isset($_POST['connexion'])) {
    $donnees = [$_POST['mail'], $_POST['pass']];
    $table =  ModelUser::verificationMail($_POST['mail']);
    if (isset($table['mail'])) {
        viewTemplate::alert('Mail correct', 'success', 'ConnexionUser.php');
        if (password_verify($_POST['pass'], $table['pass'])) {
            viewTemplate::alert('Mot de passe correct', 'success', 'ConnexionUser.php');
        } else {
            viewTemplate::alert('Mot de passe incorrect', 'danger', 'ConnexionUser.php');
        }
    } else {
        viewTemplate::alert('Mail incorrect', 'danger', 'ConnexionUser.php');
    }
} else {
    ViewConnexion::connexion();
}
ViewTemplate::footer();
