<?php
include 'inc/pdo.php';
include 'inc/functions.php';


define('CHEMIN_IMAGE', 'http://localhost:8888/Git-project/portfolio-max/assets/img/');
include 'inc/front-head-new.php';
?>
<div id="big-wrapper"> <!--équivaut au mon html pour le parallax-->

    <div id="medium-wrapper"> <!--équivaut au parallax-group-->
        <video class="home-video" src="assets/vids/-compo3_1.mp4"></video>  <!--équivaut au back -->
        <div class="wrapper-call-action"><!--équivaut au mileu -->
            <div class="call-action">
                <h2>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias at deleniti dicta
                    eligendi est fuga nemo non nulla numquam obcaecati.
                </h2>
            </div>
        </div>
    </div>


    <div id="small-wrap"><!--équivaut au front -->

        <header id="nav-fix" class="home-header">
            <nav>
                <a class="logo" href="">
                    <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1228.3 180.62">
                        <path d="M300.56,146.3H233.22l-13.16,34.32H175.42L247.41,0h39l72.25,180.62H314Zm-28.38-73.8c-1.81-4.39-4.13-10.32-5.42-14.71-1,4.39-3.61,10.58-5.16,14.71l-14.71,36.12h40Z"/>
                        <path d="M446.86,124.88,410,180.62H362l60.89-92.89L365.32,0h48l33.54,50.83L480.14,0h48.25L470.86,87.73l60.89,92.89h-48Z"/>
                        <path d="M661.79,146.3H594.45l-13.16,34.32H536.65L608.64,0h39l72.25,180.62H675.21Zm-28.38-73.8c-1.81-4.39-4.13-10.32-5.42-14.71-1,4.39-3.61,10.58-5.16,14.71l-14.71,36.12h40Z"/>
                        <path d="M725.45,0h40.77V141.14h86.44v39.48H725.45Z"/>
                        <path d="M865.27,0H906V141.14h86.44v39.48H865.27Z"/>
                        <path d="M1005.37,0h40.77V180.62h-40.77Z"/>
                        <path d="M1143.41,124.88l-36.9,55.73h-48l60.89-92.89L1061.87,0h48l33.54,50.83L1176.69,0h48.25l-57.54,87.73,60.89,92.89h-48Z"/>
                        <path d="M134.17,0,91.34,89.79c-1.81,3.87-2.84,7.48-4.13,10.84-1.29-3.35-2.58-7-4.39-10.84L41.54,0H0V180.62H40.77V89.28c1,2.58.52,1.81,1,2.84l42.88,88.5h3L130,91.6c.52-.77.26.26,1.29-2.32v91.34H172.1V0Z"/>
                    </svg>
                </a>
                <ul class="nav">
                    <li class="nav-items"><a href="">about</a></li>
                    <li class="nav-items"><a href="#contact-form">contact</a></li>
                </ul>
            </nav>
        </header>
        <div id="nav-mobile" class="hidden-nav"></div>

        <div class="modal form-container" id="contact-form">
            <form action="" method="post" class="modal-container" id="submit-form">
                <a href="#modal-close"><i class="fa fa-times contact-cross" aria-hidden="true"></i></a>
                <label for="contact-form" class="label-contact">Par mail :</label>
                <input type="text" id="sujet" class="contact" placeholder="Sujet">
                <input type="email" id="mail" class="contact" placeholder="e-mail">
                <textarea name="message" id="message" class="contact" cols="30" rows="10"
                          placeholder="Votre message..."></textarea>
                <p><input type="submit" class="envoyer" value="Envoyer" id="btn-envoyer"><span id="status"></span></p>
                <label for="" class="label-contact"> ou par téléphone :<br>06 66 63 22 17</label>
            </form>
        </div>
        <?php
        $projets = bdd_select('SELECT * FROM projet ORDER BY id DESC');
        ?>
        <div class="images-content">
            <?php foreach ($projets as $projet) { ?>
                <div class="mini-wrap">
                    <img class="cover" src="<?= CHEMIN_IMAGE . $projet['cover'] ?>" alt="<?= $projet["titre"] ?>">
                    <div class="mask"></div>
                </div>
            <?php } ?>
            <footer class="footer-last"></footer>
        </div>
    </div>
</div>