<?php
require_once "../model/ModelUser.php";
require_once "../utils/Utils.php";

class ViewUser
{
    public static function ajoutUser()
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
    public static function listeUsers() // cette methode permet l'affichage de la liste des users
    {
        $users = ModelUser::listeUsers(); // on affecte a la variable $users tout le tableau qui est associatif et on utilise une for each pour le parcourir
    ?>
        <table class="table container bg-light border  border-dark mt-2 ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Password</th>
                    <th scope="col">Tel</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <th scope="row" id="ajax"> <?php echo $user['id'] ?></th>
                        <td><?php echo $user['nom'] ?></td>
                        <td><?php echo $user['prenom'] ?></td>
                        <td><?php echo $user['mail'] ?></td>
                        <td><?php echo $user['tel'] ?></td>
                        <td>
                            <div><a class="btn btn-success col-12 " href="VoirProfil.php?id=<?php echo $user['id'] ?>">Voir profil </a>

                                <button type="button" class="btn btn-success mt-1 col-12 modif-user" href="ModifProfil.php?id=<?php echo $user['id'] ?>" data-toggle="modal" data-target="#modalModif">
                                    Modifier profil
                                </button>

                                <button type="button" class="btn btn-success mt-1 col-12 supp-user" data-toggle="modal" id="<?php echo $user['id'] ?>" data-target="#modal">
                                    Supprimer
                                </button>
                            </div>
                        </td>

                    </tr>

                <?php
                }

                ?>


            </tbody>
        </table>
<?php }
}
