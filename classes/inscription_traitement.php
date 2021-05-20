<?php
require_once 'config.php';

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['tel'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);
    $tel = htmlspecialchars($_POST['tel']);

    $check = $bdd->prepare('SELECT * password FROM user WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 0) {
        if (strlen($nom) <= 100) {
            if (strlen($prenom) <= 100) {
                if (strlen($tel) <= 20) {
                    if (strlen($email) <= 100) {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            if ($password === $password_retype) {

                                $cost = ['cost' => 12];
                                $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                                $ip = $_SERVER['REMOTE_ADDR'];


                                $insert = $bdd->prepare('INSERT INTO user(nom, prenom, email, password, tel, ip, tokken) VALUES(:nom, :prenom, :email, :password, :tel, :ip, :tokken)');
                                $insert->execute(array(
                                    'nom' => $nom,
                                    'prenom' => $prenom,
                                    'email' => $email,
                                    'password' => $password,
                                    'tel' => $tel,
                                    'ip' => $ip,
                                    'token' =>  bin2hex(openssl_random_pseudo_bytes(24))
                                ));

                                header('Location:inscription.php?reg_err=success');
                                die();
                            } else {
                                header('Location: inscription.php?reg_err=password');
                                die();
                            }
                        } else {
                            header('Location: inscription.php?reg_err=email');
                            die();
                        }
                    } else {
                        header('Location: inscription.php?reg_err=email_length');
                        die();
                    }
                } else {
                    header('Location: inscription.php?reg_err=pseudo_length');
                    die();
                }
            } else {
                header('Location: inscription.php?reg_err=pseudo_length');
                die();
            }
        } else {
            header('Location: inscription.php?reg_err=pseudo_length');
            die();
        }
    } else {
        header('Location: inscription.php?reg_err=already');
        die();
    }
}
