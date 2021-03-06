<?php

include 'inc/pdo.php';
include 'inc/functions.php';
define('CHEMIN_IMAGE', 'http://localhost:8888/Git-project/portfolio-max/assets/img/');
include 'inc/front-head-new.php';

$images = bdd_select("SELECT * FROM image WHERE id_projet= :idproj", [
    'idproj' => $_GET['id']
]);

$projet = bdd_select("SELECT * FROM projet WHERE id = :idproj ", [
    'idproj' => $_GET['id']
]);
//debug($images[0]['url_img']);

?>

<div id="small-wrap"><!--équivaut au front -->

    <header id="nav-fix" class="home-header nav-project">
        <nav>
            <a class="logo" href="index.php">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 968 170.3"
                     xml:space="preserve">
                    <path d="M244.6,55.7c-2-4.9-4.4-12.2-5.6-17.3c-1.5,5.1-3.9,12.4-5.6,17.3l-19,51.1h48.9L244.6,55.7z M272.6,133h-67.4l-13.4,37.2
		H161L224.4,0h28.9l63.2,170.2h-30.6L272.6,133z"/>
                    <polygon
                            points="427.3,0 394,54.7 360.7,0 326.9,0 377,82.2 323.2,170.2 357,170.2 394,109.9 430.7,170.2 464.5,170.2 410.8,82.2 461.1,0 "/>
                    <path d="M541.5,42.8c-1.5-4.1-5.6-16.1-6.8-21.4c-1.2,5.4-5.3,17.8-6.6,21.4l-24.1,70.3h61.5L541.5,42.8z M569.2,124.3h-68.8l-15.6,46h-13.6L529.8,0h9.7l59.1,170.2h-13.4L569.2,124.3z"/>
                    <rect x="827.6" y="0" width="12.9" height="170.2"/>
                    <polygon points="949.8,0 912.6,69.1 874.9,0 860.8,0 905.7,81.7 856.9,170.2 870.7,170.2 911.8,93.1 954.1,170.2 968,170.2
	918.6,80.5 963.6,0 "/>
                    <polygon points="618.8,0 618.8,170.2 703,170.2 703,158.1 631.7,158.1 631.7,0 "/>
                    <polygon points="723.2,0 723.2,170.2 807.4,170.2 807.4,158.1 736.1,158.1 736.1,0 "/>
                    <path d="M126.5,0.1l-44,99.9c-1.7,4.1-3.4,8.8-4.6,12.6c-1.2-3.9-2.9-8.5-4.6-12.6L29.4,0.1H0v170.2h17.5v-0.1h11.7V79.8
		c0-6.1-0.5-15.8-1-20.4c2.2,6.6,5.3,14.6,8,20.4l40,90.4h2.7l40-89.9c2.4-6.1,5.6-14.3,7.8-20.9c-0.5,4.6-1,14.3-1,20.4v90.5h29.2
		V0.1H126.5z"/>
                </svg>
            </a>
            <ul class="nav">
                <li class="nav-items"><a href="">about</a></li>
                <li class="nav-items contact-btn">contact</li>
            </ul>
            <div id="burger-responsive">
                <div class="item bar1"></div>
                <div class="item bar2"></div>
                <div class="item bar3"></div>
            </div>
        </nav>
        <ul id="nav-responsive">
            <li class="nav-items"><a href="about.php">about</a></li>
            <li class="nav-items contact-btn">contact</li>
        </ul>
    </header>
    <div id="form-bigcontainer">
        <div class="form-container2" id="contact-form">
            <form action="#" method="post" class="container2" id="submit-form">
                <img src="assets/svg/cross-white.svg" class="contact-cross btn-close"  id="btn-close2" alt="cross">
                <span class="label-contact2">Par mail :</span>
                <input type="text" id="sujet" class="contact2" placeholder="Sujet">
                <input type="email" id="mail" class="contact2" placeholder="e-mail">
                <textarea name="message" id="message" class="contact2" cols="30" rows="9"
                          placeholder="Votre message..."></textarea>
                <p><input type="submit" class="envoyer2" value="Envoyer" id="btn-envoyer"><span id="status"></span>
                </p>
                <span class="label-contact2"> ou par téléphone :<br>06 66 63 22 17</span>
            </form>
        </div>
        <div class="contact-background"></div>
    </div>
</div>


<div class="first-img-project">

    <img class="img-project-first" src="<?php echo CHEMIN_IMAGE . $images[0]['url_img']; ?>" alt="">
    <div class="txt-content-project">
        <div class="title-project"><?php echo $projet[0]['titre']; ?></div>
        <div class="txt-project"> <?php echo nl2br($projet[0]['txt']) ; ?></div>
    </div>
</div>
<div class="img-content-project">
    <?php foreach ($images as $image) {
        if (!empty ($image['url_img'])) { ?>
            <img class="img-project" src="<?php echo CHEMIN_IMAGE . $image['url_img']; ?>" alt="">
        <?php }
    } ?>

</div>
<?php
include 'inc/front-footer.php';
?>