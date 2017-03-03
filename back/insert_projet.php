<?php
include_once('../inc/pdo.php');
include_once('../inc/functions.php');

if (isset($_POST['ajout_projet'])) {
    extract($_POST);

    $lastId = bdd_insert('INSERT INTO projet(titre, quote, txt ) VALUES (:titre, :quote, :txt )', [
        'titre' => $titre,
        'quote' => $quote,
        'txt' => $txt
    ]); // la fonction bbd_insert retourne le dernier id ajouter


    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $error_cover = [];

        if (!in_array($_FILES['cover']['type'], ['image/png', 'image/jpeg'])) {
            $error_cover['format'] = 'Extension de la cover incorrect, png et jpg acceptés.';
        }

        if ($_FILES['cover']['size'] > 8) { // > 4Mo>4194304
            $error_cover['taille'] = 'La cover est trop lourde.';
        }

        if (!isset($error_cover)) {
            $extension = str_replace('image/', '', $_FILES['cover']['type']);// recupere extension du fichier
            $name = bin2hex(random_bytes(8)) . '.' . $extension;
            if (move_uploaded_file($_FILES['cover']['tmp_name'], '../assets/img/' . $name)) {
                $validation = 'le fichier à été uploadé';
                bdd_update('UPDATE projet SET cover = :cover WHERE id =' . $lastId, [
                    'cover' => $_FILES["cover"]["name"]
                ]);
            } else {
                $error_cover['error_envoi'] = 'il y a eu une erreur lors de l’envoi';
            }
        }
    }


    if (isset($_FILES['images_projet'])) {

            foreach ($_FILES['images_projet']['tmp_name'] as $key => $image_projet) {

                if (move_uploaded_file($_FILES['images_projet']['tmp_name'][$key], '../assets/img/' . $_FILES['images_projet']['name'][$key])) {
                    $validation = 'les fichiers ont été uploadé';
                }

                bdd_insert('INSERT INTO image(url_img, id_projet) VALUES (:urlimg, :idprojet)', [
                    'urlimg' => $_FILES['images_projet']['name'][$key],
                    'idprojet' => $lastId
                ]);
            }
        }
}
