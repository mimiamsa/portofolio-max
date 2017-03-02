/*global requirejs, require, byId, select, log, window, define*/
define([""], function () {

    log('try');

    function activeInput(evt){
        var form1, form2, form3,form4, form5, td1, td2, td3;
        form1 = byId('form1');
        form2 = byId('form2');
        form3 = byId('form3');
        form4 = byId('form4');
        form5 = byId('form5');
        td1 = byId('td1');
        td2 = byId('td2');
        td3 = byId('td3');

        if (evt.id === "btn-formulaire1") {
            form1.classList.toggle('is-active');
            td1.classList.toggle('is-hidden');

        } else if (evt.id === "btn-formulaire2") {
            form2.classList.toggle('is-active');
            td2.classList.toggle('is-hidden');
        } else if(evt.id === "btn-formulaire3") {
            form3.classList.toggle('is-active');
            td3.classList.toggle('is-hidden');
        } else if(evt.id === "btn-formulaire4") {
            form4.classList.toggle('is-active');
        } else if (evt.id === "btn-formulaire5") {
            form5.classList.toggle('is-active');
        }


    }

    function changerTexteBtn(btn) {
        if (btn.textContent === 'modifier') {
            btn.textContent = 'annuler'
        } else {
            btn.textContent = 'modifier'
        }
    }


    function observerClicks() {
        var btns, i;
        btns = selectAll('.btn');
        // log(btn);
        for (i = 0; i < btns.length; i += 1) {

            btns[i].onclick = function () {
                activeInput(this);
                changerTexteBtn(this);
            }
        }
    }

    observerClicks()
});