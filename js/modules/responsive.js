define(["jquery"], function ($) {

    log("responsive");
    var navResponsive;
    navResponsive = byId("nav-fix");

    function burgerChangeState(e) {
        var navfullscreen;
        navfullscreen = byId('nav-responsive');
        this.classList.toggle('open');
        navResponsive.classList.toggle('open');
        navfullscreen.classList.toggle('open');
    }

    function activeResponsivenav(e) {
        var width, navmobile;

        navmobile = byId("nav-mobile");
        width = document.documentElement.clientWidth;
        log(width);
        if (width <= 767) {
            navResponsive.classList.add("nav-project");
            navmobile.classList.add("nav-responsive");

            // navmobile.style.display = "none";

        }
        if (width > 767) {
            navResponsive.classList.remove("nav-project");
            navmobile.classList.remove("nav-responsive");
        }
    }


    (function ecouterClickBurger() {
        var burgerResponsive;
        burgerResponsive = byId("burger-responsive");
        burgerResponsive.onclick = burgerChangeState;
    })();

    (function ecouteResize() {
        window.addEventListener('resize', activeResponsivenav, false);
    })();
});