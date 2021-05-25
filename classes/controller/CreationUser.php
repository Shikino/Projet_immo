<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inscription</title>
</head>

<body>

    <?php
    require_once "../view/ViewUser.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";


    function token($length) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    
     

    ViewTemplate::menu();
    if (isset($_POST['ajout'])) {
        if ((ModelUser::verificationMail($_POST['mail']))) {
            echo "Le mail est déjà utilisé";
        } else {
            $token = mt_rand(99999, 99999999);
            ModelUser::EnvoieDonnee($_POST['nom'], $_POST['prenom'], $_POST['mail'], password_hash($_POST['pass'], PASSWORD_DEFAULT), $_POST['tel'], $token);
            viewUser::lienValidation($token, $_POST['mail']);
        }
    } else {
        ViewUser::ajoutUser();
    }
    ?>









    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
    <script src="../../js/ctrl.js"></script>
</body>

</html>