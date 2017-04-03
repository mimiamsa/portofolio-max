define(["jquery"], function ($) {

    log("responsive");

    (function ecouteResize() {
        window.addEventListener('resize', activeResponsivenav, false);
    })();

    function activeResponsivenav(e) {
        var width, navResponsive, navmobile, navResponsiveClone;

        navResponsive = byId("nav-fix");
        navmobile = byId("nav-mobile");
        log(navResponsive);
        // log(navmobile);
        width = document.documentElement.clientWidth;
        log(width);
        if(width <= 767) {
            log("grand");
            navResponsive.classList.add("nav-project");
            navmobile.classList.add("nav-responsive");
            // navmobile.style.display = "none";

        } if(width > 767) {
            navResponsive.classList.remove("nav-project");
            navmobile.classList.remove("nav-responsive");
        }


    }
});