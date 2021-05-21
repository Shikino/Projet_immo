<?php
require_once "connexion.php";
class ModelUser
{

    static function EnvoieDonnee($nom, $prenom, $mail, $pass, $tel, $tokken)
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



    static function test($mail)
    {   
        $idcon = connexion();
        $requete = $idcon->prepare("SELECT * FROM user WHERE mail = :mail");
        $requete->execute(array(':mail' => $mail));

        $user = $requete->fetch();

        if (($user['mail'] != $_POST['mail'])) {

            $requete = $idcon->prepare("INSERT INTO user(mail) VALUES(:mail)");
            $requete->execute(array('mail' => htmlspecialchars($_POST['mail'])));
            header('Location: connect.php');
            exit();
        } else {
            if ($user['mail'] == $_POST['mail']) {
                echo "<li class='text-error'>Cette adresse e-mail est déjà prise !</li>";
                exit();
            }
        }
    }
}
