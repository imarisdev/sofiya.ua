$.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
    var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

    if (token) {
        return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
    }
});


var Site = {

};

$(window).scroll(function() {
    var top = $(document).scrollTop();

    if (top > 150) {
        $(".header-top .nav-bottom, .header-top").addClass('fixed')
    } else {
        $(".header, .header-top .nav-bottom ").removeClass('fixed');
    }
});

$(document).ready(function () {

    //list
    $('.js-parent').hover(function () {
       // $(this).find('.js-child').toggle('slow');
    });


    $('.js-parent').hover(function () {
        clearTimeout($.data(this,'timer'));
        $('ul',this).stop(true,true).slideDown(200);
    }, function () {

        $.data(this,'timer', setTimeout($.proxy(function() {
            $('ul',this).stop(true,true).slideUp(200);
        }, this), 100));
    });


    $.fancybox({

    });
    /*$('.js-fancybox').ceebox({
        html: false
    });*/

    $('.js-phone-click').click(function () {
        $('.js-phone-block').toggle('slow');
    });

    new WOW().init();
});

/* phone menu */
jQuery(function ($) {
    jQuery('body').click(function (event) {
        var eventInMenu = $(event.target).parent('.phone-click');

        if (!eventInMenu.length) {
            $('.js-phone-block').hide();
            $('.js-phone-click').removeClass('active');
        }
    });

    jQuery('.js-phone-click').click(function () {
        $('.js-phone-block').show();
        $(this).addClass('active');
    });


    //FORM
    jQuery('.js-form-label').click(function () {
        $('.js-form-content').toggle('slow');
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