<?php
require_once "connexion.php";
class ModelUser
{

    static function EnvoieDonnee($nom, $prenom, $mail, $pass, $tel, $tokken)
    {
        $idcon = connexion();
        $requette = $idcon->prepare("INSERT INTO user values (null, :nom , :prenom, :mail, :pass, :tel ,'0', '0', '0', :tokken)");
        $requette->execute(
            array(
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':mail' => $mail,
                ':pass' => $pass,
                ':tel' => $tel,
                ':tokken' => $tokken
            )
        );
    }
}
