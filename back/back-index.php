<?php
session_start();

if(!isset($_SESSION['id'])) {
    header('location: connexion.php');

}

include('../inc/back-head.php');


?>
    <div class="wrap">
        <div class="content">ACCUEIL</div>
    </div>

    <div class="separator-2"></div>

<?php include("../inc/back-footer.php")?>