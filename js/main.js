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
        hidetitle: 'modules/hide-title'

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
    if (byId('hide-title')) {
        require(["hidetitle"], function (hidetitle) {
        });
        log("hide");
    }
});