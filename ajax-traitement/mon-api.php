<?php
if (isset($_POST['sujet']) && isset($_POST['mail']) && isset($_POST['message'])) {
//    extract($_POST);
    var_dump($_POST);
    $mail = $_POST['mail'];
    $sujet = $_POST['sujet'];
    $message = nl2br($_POST['message']);
    $to = "mi.amsalem@gmail.com";
    $from = $mail;
    $subject = "formulaire de contact";
    $sent_message = '<b>Name:</b>' . $sujet . '<br><b>e-mail</b>' . $mail . ' <p>' . $message . '</p>';
    $headers = "From: $from\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; chartset:UTF-8\n";

    if(mail($to, $sujet, $message, $headers)) {
        echo 'success';
    } else {
        echo 'failed to send message';
    }

}