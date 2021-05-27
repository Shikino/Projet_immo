<?php
class ViewTemplate
{
    public static function alert($message, $type, $lien)
    {
?>
        <div class=" container text-center alert alert-<?php echo $type; ?>" role="alert">
            <?php echo $message; ?>
            <br />Cliquez <a href="<?php echo $lien ?>"> ici</a> pour continuer la navigation.
        </div>
    <?php
    }
    public static function header()
    {
        Define("adresseRoot", "/classes/controller/");
        session_start();

    ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
            <link rel="stylesheet" href="../../css/bootstrap.min.css" />
            <link rel="stylesheet" href="../../css/all.min.css" />
            <link rel="stylesheet" href="../../css/styles.css" />
            
            <title>Inscription</title>
        </head>

        <body>
        <?php }
    public static function navbar()
    {
        ?>

            <div class="">
                <nav class="navbar navbar-default navbar-trans navbar-expand-lg ">
                    <div class="container ">
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <a class="navbar-brand text-brand" href="ControllerHome.php">UnJauneHomme<span class="color-b">Business</span></a>
                        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                            <span class="fa fa-search" aria-hidden="true"></span>
                        </button>
                        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                            <ul class="navbar-nav">
                                <?php
                                // condition pour ne plus afficher le inscription qd on est co
                                if (isset($_SESSION["connect"])) { ?>

                                <?php

                                } else {
                                ?>
                                    <li class="nav-item">

                                        <a class="nav-link" href="ControllerInscription.php">Inscription</a>

                                    </li>
                                <?php

                                }
                                ?>
                                <?php
                                // condition pour  afficher le voir mon profil qd on est co
                                if (isset($_SESSION["connect"])) { ?>
                                    <li class="nav-item">

                                        <a class="nav-link" href="ControllerVoirMonProfil.php?mail=<?php echo $_SESSION['mail'] ?>">Voir mon profil</a>

                                    </li>

                                <?php

                                } else {
                                ?>

                                <?php

                                }
                                ?>


                                <?php
                                // condition pour ne plus afficher le connexion qd on est co
                                if (isset($_SESSION["connect"])) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?php echo adresseRoot . "ControllerDeconnexion.php" ?>>Déconnexion</a>

                                    </li>
                                <?php

                                } else {
                                ?>
                                    <li class="nav-item">

                                        <a class="nav-link" href=<?php echo adresseRoot . "ControllerConnexion.php" ?>>Connexion</a>

                                    </li>
                                <?php

                                }
                                ?>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown"><?php if (isset($_SESSION["connect"])) { ?>
                                            <a class="dropdown-item" href="ControllerCreationAnonce.php">Creer une annonce</a>
                                            <a class="dropdown-item" href="blog-single.html">Parcourir les anonces</a>
                                            <a class="dropdown-item" href="agents-grid.html">Voir Favoris</a>

                                        <?php } else { ?>
                                            <a class="dropdown-item" href="property-single.html">pas co pas d'annonce</a>
                                            <a class="dropdown-item" href="blog-single.html">Parcourir les anonces</a>


                                        <?php }
                                        ?>



                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                            <span class="fa fa-search" aria-hidden="true"></span>
                        </button>
                    </div>
                </nav>
            </div>
        <?php }

    public static function footer()
    {
        ?>
            <script src="../../js/jquery-3.5.1.min.js"></script>
            <script src="../../js/bootstrap.min.js"></script>
            <script src="../../js/all.min.js"></script>
            <script src="../../js/ctrl.js"></script>
            <script src="../../js/main.js"></script>
            <footer class="bg-light text-center text-lg-start">
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);"><span>Immo ©<?php echo date("Y"); ?> </span></div>

            </footer>

    <?php }
}
