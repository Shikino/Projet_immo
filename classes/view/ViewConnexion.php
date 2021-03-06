<?php
class ViewConnexion
{



    public static function connexion()
    {
        isset($_POST['connexion']) ? $formSubmit = true : $formSubmit = false;
?>
        <div class="container mt-2">
            <div class="text-center" id='erreurs'></div>
            <form name="ajout_user" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">

                <div class="form-group">
                    <input type="email" name="mail" id="mail" class="form-control" aria-describedby="mail" value="<?php echo $formSubmit ? $_POST['mail'] : '' ?>" placeholder="Adresse mail" required>
                </div>
                <div class="form-group">
                    <input type="password" name="pass" id="pass" class="form-control" aria-describedby="pass" placeholder="Mot De Passe" required>
                </div>
                <button type="submit" id="connexion" name="connexion" class="btn btn-primary">Se connecter</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>
        <div class="container mt-2">
            <div> <a href="../controller/ControllerNouveauMdp">Mot de passe oublié ?</a></div>
            <div>
                <h3>Pas encore inscrit ?</h3>
                <a type="submit" id="connexion" name="inscription" href="<?php echo "../controller/ControllerInscription.php" ?>" class="btn btn-success">Inscription</a>
            </div>

        </div>
        }
<?php
    }
}
