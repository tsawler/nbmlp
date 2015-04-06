//sticky header on scroll
$(window).load(function () {
    $(".sticky").sticky({topSpacing: 0});
});

//parallax
$(window).stellar({
    horizontalScrolling: false,
    responsive: true/*,
     scrollProperty: 'scroll',
     parallaxElements: false,
     horizontalScrolling: false,
     horizontalOffset: 0,
     verticalOffset: 0*/
});

//owl carousel for news
/*$(document).ready(function () {

    $("#news-carousel").owlCarousel({
        // Most important owl features
        items: 2,
        itemsCustom: false,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [768, 2],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        startDragging: true,
        autoPlay: 4000
    });

});*/

//text rotater

$(document).ready(function () {
    $(".rotate").textrotator({
        animation: "flipUp",
        speed: 2000
    });
});

/* ==============================================
 WOW plugin triggers animate.css on scroll
 =============================================== */

var wow = new WOW(
    {
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 100, // distance to the element when triggering the animation (default is 0)
        mobile: false        // trigger animations on mobile devices (true is default)
    }
);
wow.init();


//portfolio mix
$('#grid').mixitup();


//MAGNIFIC POPUP
$('.show-image').magnificPopup({type: 'image'});

/* ==============================================
 flex slider
 =============================================== */

$('.main-flex-slider').flexslider({
    slideshowSpeed: 5000,
    directionNav: false,
    animation: "fade"
});


/*========tooltip and popovers====*/

$("[data-toggle=popover]").popover();

$("[data-toggle=tooltip]").tooltip();


//transparent header
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.transparent-header').css("background", "#252525");
        } else {
            $('.transparent-header').css("background", "transparent");
        }
    });
});
