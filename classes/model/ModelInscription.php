<?php
require_once "connexion.php";
class ModelUser
{

    public static function envoieDonnee($nom, $prenom, $mail, $pass, $tel, $token)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("INSERT INTO user values (null, :nom , :prenom, :mail, :pass, :tel ,'0', '0', '0', :token)");
        $requete->execute(
            [
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':mail' => $mail,
                ':pass' => $pass,
                ':tel' => $tel,
                ':token' => $token
            ]
        );
    }



    public static function verificationMail($mail)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("SELECT * FROM user WHERE mail = :mail");
        $requete->execute(
            [
                ':mail' => $mail
            ]
        );
        return $requete->fetch();
    }


    public static function verificationUser($mail, $token)
    {
        $connexion = connexion();
        $requete = $connexion->prepare("SELECT * FROM user WHERE mail=:mail AND token=:token");
        $requete->execute(
            [
                ':mail' => $mail,
                ':token' => $token
            ]
        );
        return $requete->fetch();
    }


    public static function confirmationUser($mail, $token)
    {
        $connexion = connexion();
        $requette = $connexion->prepare("UPDATE user SET confirme='1', actif  = '1' WHERE mail=mail");
        $requette->execute(
            [
                ':mail' => $mail,
                'token' => $token
            ]
        );
    }
}
