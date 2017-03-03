<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location: connexion.php');
}

require '../inc/functions.php';
include 'insert_projet.php';

$projets = bdd_select('SELECT * FROM projet');

define('CHEMIN_IMAGE', 'http://localhost:8888/Git-project/portfolio-max/assets/img/');

include('../inc/back-head.php');
?>

    <div class="wrap backoffice">
        <div class="content backoffice">
            <div class="content-insert-projet">
                <h1 class="form-insert">Ajouter un projet :</h1>
                    <div>
                        <?php if (isset($error_cover['format'])) { ?> 
                            <div class="bo-erreur"><?php echo $error_cover['format']; ?></div> 
                        <?php } ?> 
                        <?php if (isset($error_cover['taille'])) { ?> 
                            <div class="bo-erreur"><?php echo $error_cover['taille']; ?></div> 
                        <?php } ?> 
                    </div>
                <form action="backoffice.php" method="post" enctype="multipart/form-data" class="form-insert backoffice">

                    <table class="backoffice">
                        <tr>
                            <th>Titre</th>
                            <th>Quotes</th>
                            <th>texte</th>
                            <th>cover</th>
                            <th>images</th>
                            <th>validation</th>
                        </tr>

                        <tr>
                            <td class="backoffice">
                                <input type="text" name="titre" class="backoffice" placeholder="titre du projet...">
                            </td>
                            <td class="backoffice">
                                <textarea name="quote" cols="20" rows="6" class="backoffice"
                                          placeholder="explication courte..."></textarea>
                            </td>
                            <td class="backoffice">
                                <textarea name="txt" cols="20" rows="6" class="backoffice"
                                          placeholder="explication détaillée..."></textarea>
                            </td>
                            <td class="backoffice">
                                <input type="file" name="cover" id="file" class="backoffice inputfile">
                                <!--<label for="file">Choose a file</label> <input type="submit" value="ok">-->
                            </td>
                            <td class="backoffice">
                                <input type="file" name="images_projet[]" multiple>
                                <!--<label for="file">Choose a file</label>-->
                            </td>
                            <td class="backoffice">
                                <input type="submit" value="ok" name="ajout_projet" class="backoffice envoyer">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="separator-3"></div>
            <div id="display-projets" class="backoffice">

                <?php foreach ($projets as $projet) { ?>
                    <div class="display-projet backoffice">
                        <ul class="encart">
                            <li class="ligne-titre">
                                <h1>projet : <?php echo $projet['titre'] ?> </h1>

                                <div>
                                    <a href="delete_projet.php?id=<?php echo $projet['id'] ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <a href="view_update.php?id=<?php echo $projet['id'] ?>">
                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>

                        <ul class="encart">
                            <li class="ligne1">

                                <h4>titre</h4>
                                <div class="separator-1"></div>
                                <div><?php echo $projet['titre'] ?></div>
                            </li>
                            <li class="ligne1">
                                <h4>quote</h4>
                                <div class="separator-1"></div>
                                <div><?php echo $projet['quote'] ?></div>
                            </li>

                            <li class="ligne1">
                                <h4>texte</h4>
                                <div class="separator-1"></div>
                                <div class="overflow"><?php echo $projet['txt'] ?></div>
                            </li>
                        </ul>

                        <ul class="encart">
                            <li class="ligne2">
                                <h4>cover</h4>
                                <div class="separator-1"></div>
                                <?php if (!empty ($projet['cover'])) { ?>
                                    <img class="bo-resize" src="<?php echo CHEMIN_IMAGE . $projet['cover']; ?>" alt="cover"/>
                                <?php } ?>
                            </li>

                            <?php
                            $images = bdd_select('SELECT * FROM image WHERE id_projet= :id', [
                                'id' => $projet['id']
                            ]);
                            ?>

                            <li class="ligne2">
                                <h4>images</h4>
                                <div class="separator-1"></div>
                                <?php foreach ($images as $image) { ?>
                                    <?php if (!empty ($image['url_img'])) { ?>
                                        <img class="bo-resize" src="<?php echo CHEMIN_IMAGE . $image['url_img']; ?>" alt="images"/>
                                        <a href="delete_projet.php?id_img=<?php echo $image['id']; ?>">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="separator-3"></div>
                <?php }; ?>


            </div>


            <div class="separator-2"></div>
        </div>
    </div>

<?php include("../inc/back-footer.php") ?>