(function ($) {
    let previousScroll = 0;
    $(window).scroll(() => {
        let scroll = Math.min(Math.max(document.scrollingElement.scrollTop, 0), document.body.scrollHeight - window.innerHeight); // Min-max because innertional scrolling on apple
        if (scroll > previousScroll) {
            $("nav").addClass("navbar-hide");
        }
        else if (scroll < previousScroll) {
            $("nav").removeClass("navbar-hide");
        }
        previousScroll = scroll;
    });
})(jQuery);
