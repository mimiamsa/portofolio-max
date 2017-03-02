<?php
include '../inc/pdo.php';
include '../inc/functions.php';


define('CHEMIN_IMAGE', 'http://localhost:8888/Git-project/portfolio-max/assets/img/');
include '../inc/head.php';
?>
    <div class="wrap">
    <header class="home">
        <a href=""><h1>MAX<span>ALLIX</span></h1></a>
        <nav>
            <ul>
                <li>
                    <a href="#">about</a>
                </li>
                <li>
                    <a href="#">contact</a>
                </li>
            </ul>
        </nav>
    </header>
    <?php $projets = bdd_select('SELECT * FROM projet ORDER BY id DESC');
    ?>
    <div class="images-content">
            <?php foreach ($projets as $projet) { ?>
               <div class="mini-wrap">
                   <img class="cover" src="<?= CHEMIN_IMAGE . $projet['cover'] ?> " alt="coucou">
                   <div class="mask">
                       <h1><?= $projet['titre'] ?></h1>
                       <p><?= $projet['quote'] ?></p>
                   </div>
               </div>
            <?php } ?>
    </div>

<?php

include '../inc/footer.php';