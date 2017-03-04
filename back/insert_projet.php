<?php
include_once('../inc/pdo.php');
include_once('../inc/functions.php');

if (isset($_POST['ajout_projet'])) {
    $error_txt = [];
    extract($_POST);
    if (!empty($_POST['titre']) && !empty($_POST['quote']) && !empty($_POST['txt'])) {
        $lastId = bdd_insert('INSERT INTO projet(titre, quote, txt ) VALUES (:titre, :quote, :txt )', [
            'titre' => $titre,
            'quote' => $quote,
            'txt' => $txt
        ]);


        if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
            $error_cover = [];

            if (!in_array($_FILES['cover']['type'], ['image/png', 'image/jpeg'])) {
                $error_cover['format'] = 'Extension de la cover incorrect, png et jpg acceptés.';
            }

            if ($_FILES['cover']['size'] > 4194304) { // > 4Mo>4194304
                $error_cover['taille'] = 'La cover est trop lourde.';
            }

            if (empty($error_cover)) {
                $extension = str_replace('image/', '', $_FILES['cover']['type']);// recupere extension du fichier
                $name = bin2hex(random_bytes(8)) . '.' . $extension;
                if (move_uploaded_file($_FILES['cover']['tmp_name'], '../assets/img/' . $name)) {
                    $validation = 'le fichier à été uploadé';
                    bdd_update('UPDATE projet SET cover = :cover WHERE id =' . $lastId, [
                        'cover' => $name
                    ]);
                } else {
                    $error_cover['error_envoi'] = 'il y a eu une erreur lors de l’envoi';
                }
            }
        }

        if (!empty($_FILES['images_projet']['name'][0])) {
            $error_images = [];
            foreach ($_FILES['images_projet']['type'] as $value) {
                if (!in_array($value, ['image/png', 'image/jpeg'])) {
                    $error_images['format'] = 'Extension des images incorrectes, png et jpg acceptés.';
                }
            }
            foreach ($_FILES['images_projet']['size'] as $key => $imgs_size) {
                if ($imgs_size > 4194304) { // > 4Mo>4194304
                    $error_images['taille'] = 'Les images sont trop lourdes.';
                }
            }

            if (empty($error_images)) {
                foreach ($_FILES['images_projet']['type'] as $key => $type) {
                    $extension_imgs = str_replace('image/', '', $type);
                    $name_imgs = bin2hex(random_bytes(8)) . '.' . $extension_imgs;
                    if (move_uploaded_file($_FILES['images_projet']['tmp_name'][$key], '../assets/img/' . $name_imgs)) {
                        $validation = 'les fichiers ont été uploadés';
                    }

                    bdd_insert('INSERT INTO image(url_img, id_projet) VALUES (:urlimg, :idprojet)', [
                        'urlimg' => $name_imgs,
                        'idprojet' => $lastId
                    ]);
                }
            }
        }

    } else {
        $error_txt['txt'] = 'Veuillez renseigner tous les champs texte.';
    }
}


