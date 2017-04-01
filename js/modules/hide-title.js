define([""], function () {

    log('hide yourself');

    var elHideContainer, height, title;
    title = byId('hide-title');
    elHideContainer = byId('hid-call');
    log(elHideContainer);

    window.setTimeout(function () {
        height = elHideContainer.scrollHeight;
        log(height);
    }, 100);

    function opacityScroll() {
        // var scrollTop = document.documentElement.scrollTop;
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        log(scrollTop);
        var rest = height - scrollTop;
        var total = Math.floor((scrollTop * 100) / height);
        if (total <= 100) {
            title.style.opacity = 1 - (total / 100);
            if (total >= 2){
                title.style.marginTop = (total / 90) + "%";
            }
        }
    }

    (function ecouteScrollCall() {
        window.addEventListener('scroll', opacityScroll, false);
    })();

    // function vanishElement() {
    //     var elToHide, elPosition;
    //
    //     elToHide = byId("hide-title");
    //     log(elToHide);
    //
    //     elPosition = elToHide.getBoundingClientRect().top;
    //     log(elPosition);
    // }
    //
    // (function ecouteScrollTitle() {
    //     window.addEventListener('scroll', vanishElement, false);
    // })();

});