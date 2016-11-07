$(window).load(function() {
    // The slider being synced must be initialized first
    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: false,
        sync: "#carousel"
    });


    $('#carousel').flexslider({
        animation: "slide",
        directionNav:true,
        controlNav: false,
        animationLoop: true,
        slideshow:true,
        itemWidth: 100,
        itemMargin: 5,
        asNavFor: '#slider'
    });
});
