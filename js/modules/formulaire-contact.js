/*global requirejs, require, byId, select, log, window, define*/
define([""], function () {


    log('coucou-contact');

    var contactForm;

    contactForm = byId("submit-form");


    contactForm.onsubmit = function (e) {
        var statusForm, btnEnvoi, sujet, mail, message;
        sujet =byId("sujet");
        mail =byId("mail");
        message =byId("message");
        statusForm = byId("status");
        btnEnvoi = byId("btn-envoyer");
        btnEnvoi.disabled = true;
        // -> signifie que l'utilisateur ne peut pas appuyer sur le bouton plein de fois et envoyé trop de données
        statusForm.innerHTML = "Please wait";
        //-> indique à l'utilisateur que les infos envoyés sont en train d'être envoyé

        var formdata = new FormData();
        formdata.append("sujet", sujet.value);
        formdata.append("mail", mail.value);
        formdata.append("message", message.value);
        //-> données qui vont être envoyé et à récupérer

        var xhr = new XMLHttpRequest();
        var x = xhr.open("POST", "../ajax-traitement/mon-api.php");
        log("x");
        log(x);
        //-> définit la méthode php et la page php qui doit être lu au moment de l'envoi

        xhr.onload = function () {

                contactForm.innerHTML = '<h2>Votre message a été envoyé</h2> <a href="#modal-close"><i class="fa fa-times contact-cross" aria-hidden="true"></i></a>'

                statusForm.innerHTML = xhr.responseText;
                btnEnvoi.disabled = false;
                //-> si l'envoie n'a pas fonctionner, permet à l'utilisateur de re-appuyer sur le bouton pour re-essayer d'envoyer le message

        }
        e.preventDefault();
        xhr.send(formdata);
    }
});