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

    public static function menu()
    {
        ?><nav class="navbar navbar-expand-lg navbar-light bg-secondary">
                <a class="navbar-brand" href="../controller/CreationUser.php">Immo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="creationuser.php">Créer un compte</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../controller/ConnexionUser.php">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listeusers.php">Liste User</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="CreationAnnonce.php">Ajouter une annonce</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ListeAnnonce.php">Listes des annonces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="CreationBiens.php">Creation des Biens</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ListeBiens.php">Liste des Biens</a>

                    </ul>

                </div>
            </nav>
        <?php }
    public static function footer()
    {
        ?>
            <footer class="bg-light text-center text-lg-start">
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);"><span>Immo ©<?php echo date("Y"); ?> </span></div>

            </footer>

    <?php }
}
