/*global requirejs, require, byId, select, log, window*/
requirejs.config({
    paths: {
        /* libs */
        //        d3: '//cdnjs.cloudflare.com/ajax/libs/d3/4.1.1/d3.min',
        //        angular: 'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min',
        //        Handlebars: 'https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.6/handlebars',
        jquery: 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min',
        tinymce: 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.2/jquery.tinymce.min',
        utility: 'lib/utility',
        fontawesome: "https://use.fontawesome.com/744d72b8e0",
        /* mes modules */
        module1: 'modules/module-1',
        scroller: 'modules/gui_scroller',
        contactform: 'modules/formulaire-contact',
        // essai1 : 'modules/essai-update',
        // essai2 : 'modules/essai-update-2',
        // essai3 : 'modules/essai-update-3',

    }
});

requirejs(["utility", "fontawesome"], function (utility, fontawesome) {
    "use strict";

    if (byId('nav-mobile')) {
        require(["scroller"], function (scroller) {
            log(scroller)
        });
    }
    if (byId('contact-form')) {
        require(["contactform"], function (contactform) {
        });
    }
    // require(["essai1"], function (essai1) {
    // });

    // require(["essai2"], function (essai2) {
    // });
    //
    // require(["essai3"], function (essai3) {
    // });

});