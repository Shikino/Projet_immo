<?php
require_once '../view/viewUser.php';
require_once '../model/modelUser.php';
require_once '../view/viewTemplate.php';

if (isset($_GET['mail']) && isset($_GET['token'])) {

    if (ModelUser::verificationUser($_GET['mail'], $_GET['token'])) {

        ModelUser::confirmationUser($_GET['mail']);
     
        viewTemplate::alert('connexion réussi !', 'primary',  'CreationUser.php');
    } else {
        viewTemplate::alert('connexion raté !', ' danger ',  'CreationUser.php');
    }
}
?>