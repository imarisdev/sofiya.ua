$(window).load(function() {
    // The slider being synced must be initialized first
    $('.video-slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: false,
        sync: ".video-carousel"
    });


    $('.video-carousel').flexslider({
        animation: "slide",
        directionNav:true,
        controlNav: false,
        animationLoop: true,
        slideshow:true,
        itemWidth: 100,
        itemMargin: 5,
        asNavFor: '.video-slider'
    });

    $('.photo-slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: false,
        sync: ".photo-carousel"
    });


    $('.photo-carousel').flexslider({
        animation: "slide",
        directionNav:true,
        controlNav: false,
        animationLoop: true,
        slideshow:true,
        itemWidth: 100,
        itemMargin: 5,
        asNavFor: '.photo-slider'
    });
});
