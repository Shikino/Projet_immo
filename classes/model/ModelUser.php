<?php
require_once "connexion.php";
class ModelUser
{

    public static function EnvoieDonnee($nom, $prenom, $mail, $pass, $tel, $tokken)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("INSERT INTO user values (null, :nom , :prenom, :mail, :pass, :tel ,'0', '0', '0', :tokken)");
        $requete->execute(
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



    public static function verificationMail($mail)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("SELECT * FROM user WHERE mail = :mail");
        $requete->execute(
            array(
                ':mail' => $mail
            )
        );
        return $requete->fetch();
    }


    public static function verificationUser($mail, $token)
    {
        $connexion = connexion();
        $requete = $connexion->prepare("SELECT * FROM user WHERE mail=:mail AND token=:token");
        $requete->execute(
            array(
                ':mail' => $mail,
                ':token' => $token
            )
        );
        return $requete->fetch();
    }


    public static function confirmationUser($mail)
    {
        $connexion = connexion();
        $requette = $connexion->prepare("UPDATE user SET confirme='1', actif  = '1' WHERE mail=mail");
        $requette->execute(
            array(
                ':mail' => $mail
            )
        );
    }
}
