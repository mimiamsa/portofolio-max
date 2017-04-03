/*global requirejs, require, byId, select, log, window, define*/
define(function () {
    "use strict";


    function scrollAction() {
        var navToFix, navMobile, navPosToFix, navPosMobile, contentImg;
        navToFix = byId('nav-fix');
        navMobile = byId('nav-mobile');
        contentImg = select('.images-content');
        // log(navToFix);
        // log(navMobile);
        // log(contentImg);
        navPosToFix = navToFix.getBoundingClientRect().top;
        navPosMobile = navMobile.getBoundingClientRect().top;
        log('——position de la nav fix: ' + navPosToFix + " ——position de la nav mobile: " + navPosMobile);
        if (navPosToFix <= 0) {
            navToFix.style.position = 'fixed';
            navToFix.style.top = "0"; //add class avec top 0
            contentImg.classList.add('to-relative');

        }
        if (navPosMobile > 0) {
            if (navToFix.style.position = 'fixed') {
                navToFix.style.position = "relative";
                contentImg.classList.remove('to-relative');
            }
        }
    }

    (function ecouteScroll() {
        window.addEventListener('scroll', scrollAction, false);
    })();

});