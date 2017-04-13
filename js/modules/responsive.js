define(["jquery"], function ($) {

    var navResponsive, i, width, navmobile, allActiv;

    navResponsive = byId("nav-fix");
    navmobile = byId("nav-mobile");

    function displayInfos(e) {
        var parent, currents, currentBtn, currentMask;

        parent = this.parentElement;


        while (!parent.classList.contains("mini-wrap")) {
            parent = parent.parentElement;
        }

        currentBtn = this.querySelector(".cross-infos-btn");
        currentMask = parent.querySelector(".mask");

        log("this")
        log(this)
        log("currentMask")
        log(currentMask)
        allActiv = parent.parentElement.querySelectorAll(".active");

        if (!this.classList.contains("active")) {
            for (i = 0; i < allActiv.length; i += 1) {
                allActiv[i].classList.remove("active");
            }
        }
        this.classList.toggle("active");
        currentBtn.classList.toggle("active");
        currentMask.classList.toggle("active");

    }



function burgerChangeState(e) {
    var navfullscreen, bar1, bar2, bar3, form;
    form = byId('form-bigcontainer');

    bar1 = select(".bar1");
    bar3 = select(".bar3");
    bar2 = select(".bar2");

    bar1.classList.toggle("croix");
    bar3.classList.toggle("croix");
    bar2.classList.toggle("croix");

    navfullscreen = byId('nav-responsive');
    navResponsive.classList.toggle('open');
    navfullscreen.classList.toggle('open');
}


function activeResponsivenav(e) {
    width = document.documentElement.clientWidth;

    if (navmobile) {
        if (width <= 819) {
            navResponsive.classList.add("nav-project");
            // navmobile.classList.add("nav-responsive");
            navmobile.style.top = "0";

            // navmobile.style.display = "none";

        }
        if (width > 819) {
            log("coucou");
            log(width);
            navResponsive.classList.remove("nav-project");
            navmobile.style.top = "100vh";
            // navmobile.classList.remove("nav-responsive");
        }
    }
}


(function ecouteClickMore() {
    var moreBtn;
    moreBtn = selectAll(".bouton-titre");
    for (i = 0; i < moreBtn.length; i += 1) {
        moreBtn[i].onclick = displayInfos;
    }

}());

(function ecouterClickBurger() {
    var burgerResponsive;
    burgerResponsive = byId("burger-responsive");
    burgerResponsive.onclick = burgerChangeState;
}());

(function ecouteResize() {
    window.addEventListener('resize', activeResponsivenav, false);
}());

}
)
;