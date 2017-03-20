/*global requirejs, require, byId, select, log, window, define*/
define([""], function () {

    log('cici');

    var form, contactForm, btnContact, btnclose, formHtml;
    form = byId('form-bigcontainer');
    contactForm = byId("submit-form");
    formHtml = contactForm.innerHTML;
    log(formHtml);

    function close() {
        log('close');
        form.classList.remove("show");
    }

    function displayForm(){
        log('pipi');
        form.classList.add("show");
        btnclose = select('.btn-close');
        btnclose.onclick = close;
    }

   (function gererClick() {
        btnContact = byId("contact-btn");
        log(btnContact);
        btnContact.onclick = displayForm;
    })();



    contactForm.onsubmit = function (e) {
        var statusForm, btnEnvoi, sujet, mail, message;
        sujet = byId("sujet");
        mail = byId("mail");
        message = byId("message");
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
        var x = xhr.open("POST", "ajax-traitement/mon-api.php");
        //-> définit la méthode php et la page php qui doit être lu au moment de l'envoi

        xhr.onload = function () {
            log(formHtml);
            contactForm.innerHTML = formHtml + '<p class="sent-message">Votre message a été envoyé</p>';
            var btnclose2 = byId('btn-close2');
            // log(btnclose2);
            btnclose2.addEventListener('click', function(closeEvent) {
                // log("prout");
                // log(form);
                form.classList.remove("show");

            }, false);
            statusForm.innerHTML = xhr.responseText;
            btnEnvoi.disabled = false;
            //-> si l'envoie n'a pas fonctionner, permet à l'utilisateur de re-appuyer sur le bouton pour re-essayer d'envoyer le message

        }
        e.preventDefault();
        xhr.send(formdata);
    }
});