define(["jquery"], function ($) {

    // log("responsive");
    var navResponsive, i;
    navResponsive = byId("nav-fix");


    function displayInfos(e) {
        var maskToDisplay, maskCloseBtn, plusToCross, parent;
        parent = this.parentElement;
        // maskToDisplay = this.parentElement.querySelector(".mask");
        while (!parent.classList.contains("mini-wrap")) {
            parent = parent.parentElement;
        }
        maskToDisplay = parent.querySelector(".mask");
        plusToCross = this.children[0];
        // log(plusToCross);
        // log(maskToDisplay);
        this.classList.toggle('remove-shadow');
        maskToDisplay.classList.toggle("responsive-mask");
        plusToCross.classList.toggle("close");
    }

    // function closeMask(e) {
    //     log(this);
    //     var maskToHide;
    //     maskToHide = this.parentElement;
    //    maskToHide.classList.remove("responsive-mask");
    // }

    function burgerChangeState(e) {
        var navfullscreen, bar1, bar2, bar3, contactbtn, form;
        form = byId('form-bigcontainer');

        contactbtn = byId("contact-btn2");
        log(contactbtn);
        bar1 = select(".bar1");
        bar3 = select(".bar3");
        bar2 = select(".bar2");
        // log(bar2);
        bar1.classList.toggle("croix");
        bar3.classList.toggle("croix");
        bar2.classList.toggle("croix");

        navfullscreen = byId('nav-responsive');
        navResponsive.classList.toggle('open');
        navfullscreen.classList.toggle('open');

        contactbtn.onclick = function () {
            form.classList.add("show");
            btnclose = select('.btn-close');
            btnclose.onclick = close;
        };

    }

    function displayForm() {
        log('yo');
        form.classList.add("show");
        btnclose = select('.btn-close');
        btnclose.onclick = close;
    }

    function activeResponsivenav(e) {
        var width, navmobile;

        navmobile = byId("nav-mobile");
        width = document.documentElement.clientWidth;
        log(width);
        if (width <= 819) {
            navResponsive.classList.add("nav-project");
            navmobile.classList.add("nav-responsive");

            // navmobile.style.display = "none";

        }
        if (width > 819) {
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

    (function ecouteClickMore() {
        var moreBtn;
        moreBtn = selectAll(".bouton-titre");
        for (i = 0; i < moreBtn.length; i += 1) {
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