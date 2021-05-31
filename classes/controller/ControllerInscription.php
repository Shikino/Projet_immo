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
    require_once "../view/ViewInscription.php";
    require_once "../model/ModelUser.php";
    require_once "../view/ViewTemplate.php";
    
     
ViewTemplate::navbar();
    if (isset($_POST['ajout'])) {
        if ((ModelUser::verificationMail($_POST['mail']))) {
            echo "Le mail est déjà utilisé";
        } else {
            $token = uniqid();
            ModelUser::envoieDonnee($_POST['nom'], $_POST['prenom'], $_POST['mail'], password_hash($_POST['pass'], PASSWORD_DEFAULT), $_POST['tel'], $token);
            ViewInscription::lienValidation($token, $_POST['mail']);
            ModelUser::verificationUser($mail, $token);
        }
    } else {
        ViewInscription::inscription();
    }
    ?>









    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
    <script src="../../js/ctrl.js"></script>
</body>

</html>