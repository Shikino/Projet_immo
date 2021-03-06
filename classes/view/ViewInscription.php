<?php
require_once "../model/ModelUser.php";

class ViewInscription
{
    public static function inscription()
    {
        isset($_POST['ajout']) ? $formSubmit = true : $formSubmit = false;
?>
        <div class="container mt-2">
            <div class="text-center" id='erreurs'></div>
            <form name="ajout_user" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nom" id="nom" class="form-control" aria-describedby="nom" value="<?php echo $formSubmit ? $_POST['nom'] : '' ?>" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <input type="text" name="prenom" id="prenom" class="form-control" aria-describedby="prenom" value="<?php echo $formSubmit ? $_POST['prenom'] : '' ?>" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="mail" id="mail" class="form-control" aria-describedby="mail" value="<?php echo $formSubmit ? $_POST['mail'] : '' ?>" placeholder="Adresse mail" required>
                </div>
                <div class="form-group">
                    <input type="password" name="pass" id="pass" class="form-control" aria-describedby="pass" value="<?php echo $formSubmit ? $_POST['pass'] : '' ?>" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="tel" id="tel" class="form-control" aria-describedby="tel" value="<?php echo $formSubmit ? $_POST['tel'] : '' ?>" placeholder="Tel" required>
                </div>
                <button type="submit" id="submit" name="ajout" class="btn btn-primary">Ajouter</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>
    <?php
    }
    public static function lienValidation($lien, $mail)
    { ?>
        <div>Veuillez cliquer <a href="ControllerConnexion.php?token=<?php echo $lien ?>&mail=<?php echo $mail ?>">ici</a> pour confirmer votre inscription.</div>
<?php
    }
}
