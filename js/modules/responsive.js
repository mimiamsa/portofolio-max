define(["jquery"], function ($) {

    log("responsive");
    var navResponsive, i;
    navResponsive = byId("nav-fix");


    function displayInfos(e) {
        var maskToDisplay, maskCloseBtn;
        maskToDisplay = this.parentElement.querySelector(".images-content .mask");
        log(maskToDisplay);
        maskToDisplay.classList.add("responsive-mask");
    }

    function closeMask(e) {
        log(this);
        var maskToHide;
        maskToHide = this.parentElement;
       maskToHide.classList.remove("responsive-mask");
    }

    function burgerChangeState(e) {
        var navfullscreen, bar1, bar2, bar3;

            bar1 = select(".bar1");
            bar3 = select(".bar3");
            bar2 = select(".bar2");
            log(bar2);
            bar1.classList.toggle("croix");
            bar3.classList.toggle("croix");
            bar2.classList.toggle("croix");

        navfullscreen = byId('nav-responsive');
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

    (function ecouterClickCloseMore() {
        var closeMoreBtn;
        closeMoreBtn = selectAll(".responsive-cross-content");
        for(i= 0; i < closeMoreBtn.length; i+=1) {
            closeMoreBtn[i].onclick = closeMask;
        }
    })();

    (function ecouteClickMore(){
        var moreBtn;
        moreBtn = selectAll(".bouton-titre");
        for(i= 0; i < moreBtn.length; i+=1) {
            moreBtn[i].onclick = displayInfos;
        }

    })();

    (function ecouterClickBurger() {
        var burgerResponsive;
        burgerResponsive = byId("burger-responsive");
        burgerResponsive.onclick = burgerChangeState;
    })();

    (function ecouteResize() {
        window.addEventListener('resize', activeResponsivenav, false);
    })();
});