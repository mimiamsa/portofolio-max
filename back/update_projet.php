<?php
include_once('../inc/pdo.php');
include_once('../inc/functions.php');

if (!empty($_POST['up_titre'])) {
    extract($_POST);
//    $erreur = [];

    bdd_update('UPDATE projet SET titre = :titre WHERE id= :id', [
        'id' => $_POST['id'],
        'titre' => $_POST['up_titre']
    ]);

}

if (!empty($_POST['up_quote'])) {
    extract($_POST);
//    $erreur = [];


    bdd_update('UPDATE projet SET quote = :quote WHERE id= :id', [
        'id' => $_POST['id'],
        'quote' => $_POST['up_quote']
    ]);
}

if (!empty($_POST['up_txt'])) {
    extract($_POST);
//    $erreur = [];

    bdd_update('UPDATE projet SET txt = :txt WHERE id= :id', [
        'id' => $_POST['id'],
        'txt' => $_POST['up_txt']
    ]);
}

if (!empty($_FILES['up_cover'])) {

//    $erreur = [];
    $old_cover = bdd_select("SELECT cover FROM projet WHERE id= :id", [
        'id' => $_POST['id']
    ]);

    if (!empty($old_cover[0]['cover'])) {
        unlink('../assets/img/' . $old_cover[0]['cover']);
    }
    move_uploaded_file($_FILES['up_cover']['tmp_name'], '../assets/img/' . $_FILES['up_cover']['name']);

    bdd_update('UPDATE projet SET cover = :newcover WHERE id= :id', [
        'id' => $_POST['id'],
        'newcover' => $_FILES['up_cover']['name']
    ]);
}


if (!empty($_FILES['up_images_projet'])) {

//    var_dump($_FILES);
    foreach ($_FILES['up_images_projet']['tmp_name'] as $key => $val) {


        if (move_uploaded_file($_FILES['up_images_projet']['tmp_name'][$key], '../assets/img/' . $_FILES['up_images_projet']['name'][$key])) {
            $validation = 'les fichiers ont été uploadé';

        } else {
            exit('no good');
        }

        bdd_insert('INSERT INTO image(url_img, id_projet) VALUES (:urlimg, :idprojet)', [
            'urlimg' => $_FILES['up_images_projet']['name'][$key],
            'idprojet' => $_POST['id']
        ]);

    }
}

if (isset($_POST['id'])) {
    header('location: view_update.php?id=' . $_POST['id']);
}