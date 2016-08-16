$(document).ready(function () {
    $("#owl-carousel").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 6,
        itemsCustom: false,
        itemsDesktop: [1199, 5],
        itemsDesktopSmall: [990, 4],
        itemsTablet: [815, 3],
        itemsTabletSmall: [640, 2],
        itemsMobile: [450, 1],
        navigationText: ["", ""],
        pagination: false
    });

    $("#owl-carousel-video-page").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 5,
        itemsCustom: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [990, 3],
        itemsTablet: [815, 2],
        itemsTabletSmall: [640, 1],
        navigationText: ["", ""],
        pagination: false
    });

    //list
    $('.js-parent').hover(function () {
       // $(this).find('.js-child').toggle('slow');
    });


    $(document).ready(function(){

        $('.js-parent').hover(function () {
            clearTimeout($.data(this,'timer'));
            $('ul',this).stop(true,true).slideDown(200);
        }, function () {

            $.data(this,'timer', setTimeout($.proxy(function() {
                $('ul',this).stop(true,true).slideUp(200);
            }, this), 100));
        });
    });





    $('.js-phone-click').click(function () {
        $(this).find('.js-phone-block').toggle('slow');
    });

    new WOW().init();
});

/* phone menu */
jQuery(function ($) {
    jQuery('body').click(function (event) {
        var eventInMenu = $(event.target).parents('.js-phone-click');

        if (!eventInMenu.length) {
            $('.js-phone-block').hide();
        }
    });

    jQuery('.js-phone-click').click(function () {
        $('.js-phone-block').show();
    });
});

/* adaptive */
$(document).on('click', '.menu-adapt', function () {
    $('body, .menu-adapt-list').toggleClass('active-menu');
});


$('body').on('touchend click', '.main-content', function () {
    if ($('body').hasClass('active-menu')) {
        $('body').removeClass('active-menu');
        $('.menu-adapt-list').removeClass('active-menu');
        return false;
    }
});

//tabs
$(document).ready(function(){
    $(".js-tabs").lightTabs();
});
