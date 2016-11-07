var Site = {

};

$(document).ready(function () {

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

// fancybox
$(document).ready(function() {
    $(".js-fancybox").fancybox();
});