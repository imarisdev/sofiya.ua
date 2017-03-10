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


    $('.js-feedback-form').on('submit', function() {

        var formData = new FormData();

        var formFields = $(this).serializeArray();
        $.each(formFields, function (key, input) {
            formData.append(input.name, input.value);
        });

        $.ajax({
            url: '/feedback/send',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            beforeSend: function(e) {

            },
            success: function (data) {
                $('.js-feedback-form')[0].reset();
                $.fancybox.close();
            },
            error: function(data) {
                alert('Заполните обязательные поля!')
            }
        });

        return false;
    });

    setTimeout(function() {
        onYouTubeIframeAPIReady();
    }, 5000);

    new WOW().init();

    $('.js-stop-video').on('click', function() {
        for (var i = 0; i < video_players.length; i++) {
            video_players[i].stopVideo();
        }
    });
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

video_players = new Array();

function onYouTubeIframeAPIReady() {
    var temp = $("iframe.js-iframe-video");
    for (var i = 0; i < temp.length; i++) {
        var t = new YT.Player($(temp[i]).attr('id'), {
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
        video_players.push(t);
    }
    console.log('test');
}

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING) {
        var temp = event.target.a.src;
        var tempPlayers = $("iframe.js-iframe-video");
        for (var i = 0; i < video_players.length; i++) {
            if (video_players[i].a.src != temp)
                video_players[i].stopVideo();
        }
    }
}