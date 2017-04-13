define([""], function () {

    log('hide yourself');

    var elHideContainer, height, title, arrow;
    // title = byId('hide-title');
    arrow = select('.arrow-down');
    elHideContainer = byId('hid-call');
    // log(elHideContainer);

    window.setTimeout(function () {
        height = elHideContainer.scrollHeight;
    }, 100);

    function opacityScroll() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        // var rest = height - scrollTop;
        var total = Math.floor((scrollTop * 100) / height);
        if (total <= 100) {
            // title.style.opacity = 1 - (total / 100);
            arrow.style.opacity = 1 - (total / 100);
            if (total >= 2){
                // title.style.marginTop = (total / 90) + "%";
                arrow.style.marginTop = (total / 90) + "%";
            }
        }
    }


    (function ecouteScrollTitle() {
        window.addEventListener('scroll', opacityScroll, false);
    })();

});