/*global requirejs, require, byId, select, log, window, define*/
define([""], function () {

    log('try2');
    var checklist, item, i, input;

    checklist = byId("checklist");
    item = selectAll('td');
    input = selectAll('input');

    log(item);

    for (i = 0; i < item.length; i += 1) {
        item[i].addEventListener("click", addEvent);
        input[i].addEventListener('blur', updateItem);
        input[i].addEventListener('keypress', itemKeypress);
    }

    function addEvent() {

        var input;
        this.className = "edit"; //attribut la class edit au td
        log(this);
        input = this.querySelector('input');
        // log(input);
        input.setSelectionRange(0, input.value.length) // Séléctionne automatiquement la longueur de la value de l'input

    }

    function updateItem() {
        this.previousElementSibling.innerHTML = this.value;
        this.parentNode.className = "";
    }

    function itemKeypress(evt){
        "use strict";
        if(evt.which === 13){
            updateItem.call(this);
        }
    }

    var checklist, item, i, input;

    checklist = document.getElementById("checklist");
    item = document.querySelectorAll('td');

    input = document.querySelectorAll('input');

    console.log(item);
    console.log(input);

    for (i = 0; i < item.length; i += 1) {
        item[i].addEventListener("click", addEvent);
        input[i].addEventListener('blur', updateItem);
        input[i].addEventListener('keypress', itemKeypress);
    }

    function addEvent() {
        "use strict";
        var input;
        this.className = "edit";

        input = this.querySelector('input');
        input.setSelectionRange(0, input.value.length) // Séléctionne automatiquement la longueur de la value de l'input
    }

    function updateItem() {
        "use strict";
        this.previousElementSibling.innerHTML = this.value;
        this.parentNode.className = "";
    }

    function itemKeypress(evt) {
        "use strict";
        if (evt.which === 13) {
            updateItem.call(this);
        }
    }
});
