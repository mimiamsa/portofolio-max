/*global requirejs, require, byId, select, log, window, define*/
define(function () {
    "use strict";

    function scrollAction() {
        var navToFix, navMobile, navPosToFix, navPosMobile;
        navToFix = byId('nav-fix');
        navMobile = byId('nav-mobile');
        // log(navToFix);
        // log(navMobile);
        navPosToFix = navToFix.getBoundingClientRect().top;
        navPosMobile = navMobile.getBoundingClientRect().top;
        // log('——position de la nav fix: ' + navPosToFix + " ——position de la nav mobile: " + navPosMobile);
        if (navPosToFix <= 0) {
            navToFix.style.position = 'fixed';
            navToFix.style.top = "0"; //add class avec top 0
        }
        if (navPosMobile > 0) {
            if (navToFix.style.position = 'fixed') {
                navToFix.style.position = "relative";
            }
        }
    }

    (function ecouteScroll() {
        window.addEventListener('scroll', scrollAction, false);
    })();

});