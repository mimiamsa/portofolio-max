<?php
include_once('../inc/pdo.php');
include_once('../inc/functions.php');

if(isset($_GET['id'])) {

//requete de supression du produit avec référence $_GET['ref']
//$requete = $bdd->query('DELETE FROM produit WHERE ref' . $_GET['ref'])=> injectection SQL possible

    $delete_projet = bdd_delete('DELETE FROM projet WHERE id = ?', [$_GET['id']] );
}

if(isset($_GET['id_img'])) {

//    $delete_cover = bdd_delete('DELETE FROM image WHERE url_img = ?', [$_GET['url_img']] );
    $delete_cover = bdd_delete('DELETE FROM image WHERE id = :id_img ', [
        'id_img' => $_GET['id_img']
    ] );
}

header('location: backoffice.php');
