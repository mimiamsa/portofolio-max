<?php
session_start();

// si l'admin est déjà connecté accès au back office //
if (isset($_SESSION['id'])) {
    header('Location: backoffice.php');
}


// si l'utilisateur entre ses id //
if (!empty($_POST)) {
    extract($_POST);

    require_once '../inc/functions.php';

    // dans la variable $admin on stock les données du tableau retourné
    $admin = account_exists();



    if (!empty($admin)) { //si le tableau de $admin contient qqchose alors l'admin est identifié
        $_SESSION['id'] = $admin['id'];

        header('Location: backoffice.php'); // l'utilisateur est redirigé vers sa page de compte
    } else {
//        var_dump($_POST);
        $erreur = 'identifiants erronés !';
    }
}


// Pour définir un admin avec un mot de passe,
// il faut decommenté cette ligne et actualisé la page, cela crée un nouveau mdp (hash) et un admin
//bdd_insert('INSERT INTO admin (password, login) values (:mdp, :login)',
//    array(
//        'mdp' => password_hash('azert123', PASSWORD_DEFAULT),
//        'login' => 'maxallix'
//    ));

include('../inc/back-head.php');
?>
    <div class="wrap connect">
        <div class="content connect">
            <form class="connect" action="connexion.php" method="post">
                <?php if (isset($erreur)) : ?>
                    <div class="bo-erreur connect"><?php echo $erreur ?></div>
                <?php endif ?>
                <label class="connect" for="">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <p class="connect">ADMIN</p>
                </label>
                <input class="connect" type="text" name="login" placeholder="login" value="">
                <input class="form-control connect" type="password" name="password" placeholder="Mot de passe">
                <input class="connect backoffice envoyer2" type="submit" value="Connexion">
            </form>
        </div>
    </div>

<?php include("../inc/back-footer.php") ?>