<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location: connexion.php');
}

require '../inc/functions.php';

//include 'update_projet.php';


define('CHEMIN_IMAGE', 'http://localhost:8888/projet-book-maxou/site-max-3/assets/img/');


$projet = bdd_select("SELECT * FROM projet WHERE id= :id", [
    'id' => $_GET['id']
]);

if (empty($projet)) {
    header('Location: backoffice.php');
}
//var_dump($projet);

$images = bdd_select("SELECT * FROM image WHERE id_projet= :idprojet", [
    'idprojet' => $_GET['id']
]);

//var_dump($projet);
include('../inc/back-head.php');
?>
<!--<div class="separator-3"></div>-->
<div class="wrap backoffice">
    <div class="content">
        <div class="content-update-projet">
            <div class="big-titre-update">
                <a href="backoffice.php" class="precedent" title="retour à la page d'accueil">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </a>
                <h1>
                    Modifier projet
                </h1>
            </div>
            <div class="separator-3"></div>

            <ul class="form-update un">
                <li class="up-txt">
                    <form action="update_projet.php" method="post" class="hidden update" id="form1">
                        <div class="titre-update">
                            <h4>titre</h4>
                            <input type="submit" value="ok" class="backoffice button-update">
                        </div>
                        <div class="separator-1"></div>

                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <input type="text" name="up_titre" value="<?php echo $projet[0]['titre'] ?>" class="backoffice">
                    </form>
                </li>
                <li class="up-txt">
                    <form action="update_projet.php" method="post" class="hidden update" id="form2">
                        <div class="titre-update">
                            <h4>quote</h4>
                            <input type="submit" value="ok" class="backoffice button-update">
                        </div>

                        <div class="separator-1"></div>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <textarea name="up_quote" cols="50" rows="5"
                                  class="backoffice"><?php echo $projet[0]['quote'] ?></textarea>
                    </form>
                </li>
            </ul>

            <ul class="form-update">
                <li class="up-txt">
                    <form action="update_projet.php" method="post" class="hidden update" id="form2">
                        <div class="titre-update">
                            <h4>texte</h4>
                            <input type="submit" value="ok" class="backoffice button-update">
                        </div>
                        <div class="separator-1"></div>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" class="backoffice">
                        <textarea name="up_txt" cols="60" rows="6"
                                  class="backoffice"><?php echo $projet[0]['txt'] ?></textarea>
                    </form>
                </li>
                <li class="up-cover">
                    <form action="update_projet.php" method="post" class="hidden update" id="form2"
                          enctype="multipart/form-data">
                        <div class="titre-update">
                            <h4>cover</h4>
                            <input type="submit" value="ok" class="backoffice button-update">
                        </div>
                        <div class="separator-1"></div>
                        <?php if (!empty($projet[0]['cover'])) { ?>
                            <img class="bo-resize" src="<?php echo CHEMIN_IMAGE . $projet[0]['cover'] ?>" alt="cover">
                            <div class="separator-2"></div>
                        <?php } ?>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <input type="file" name="up_cover" class="backoffice">
                    </form>
                </li>
            </ul>

            <div class="up-img">
                <form action="update_projet.php" method="post" class="hidden update" id="form2"
                      enctype="multipart/form-data">
                    <div class="titre-update">
                        <h4>images</h4>
                        <input type="submit" value="ok" class="backoffice button-update">
                    </div>
                    <div class="separator-1"></div>
                    <?php foreach ($images as $image) { ?>
                        <img class="bo-resize" src="<?php echo CHEMIN_IMAGE . $image['url_img'] ?>" alt="img-projet">
                    <?php } ?>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <div class="separator-2"></div>
                    <input type="file" name="up_images_projet[]" multiple>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('../inc/back-footer.php'); ?>

