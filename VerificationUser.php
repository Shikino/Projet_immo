<?php
require_once '../view/ViewUser.php';
require_once '../model/ModelUser.php';
require_once '../view/ViewTemplate.php';

if (isset($_GET['mail']) && isset($_GET['token'])) {

    if (ModelUser::verificationUser($_GET['mail'], $_GET['token'])) {

        ModelUser::confirmationUser($_GET['mail'], $_GET['token']);
     
        viewTemplate::alert('connexion réussi !', 'primary',  'CreationUser.php');
    } else {
        viewTemplate::alert('connexion raté !', ' danger ',  'CreationUser.php');
    }
}
?>