jQuery(document).ready(function ($) {
    // Main Carousel
    var home_carousel_top = $("#home-carousel-top");

    home_carousel_top.on('initialized.owl.carousel', function (e) {
        build_slide_caption(e.target, e.item.index);
    });

    home_carousel_top.owlCarousel({
        items: 1,
        smartSpeed: 800,
        nav: true,
        navText: false,
        autoplay: true,
        autoplayTimeout: 8000,
        dots: true,
        loop: true,
        lazyLoad: true
    });

    home_carousel_top.on('changed.owl.carousel', function (e) {
        build_slide_caption(e.target, e.item.index);
    });

    function build_slide_caption(target, index) {
        var url = $(target).find(".owl-item").eq(index).find(".item").attr('data-slide-url');
        var caption_1 = $(target).find(".owl-item").eq(index).find(".item").attr('data-slide-caption-1');
        var caption_2 = $(target).find(".owl-item").eq(index).find(".item").attr('data-slide-caption-2');
        var caption_3 = $(target).find(".owl-item").eq(index).find(".item").attr('data-slide-caption-3');

        if (url) {
            $('#home-carousel-caption a').attr('href', url).show();
        }
        else {
            $('#home-carousel-caption a').attr('href', '#').hide();
        }
        if (caption_1) {
            $('#home-carousel-caption .slide-caption-1').text(caption_1).show();
        }
        else {
            $('#home-carousel-caption .slide-caption-1').text('').hide();
        }
        if (caption_2) {
            $('#home-carousel-caption .slide-caption-2').text(caption_2).show();
        }
        else {
            $('#home-carousel-caption .slide-caption-2').text('').hide();
        }
        if (caption_3) {
            $('#home-carousel-caption .slide-caption-3').text(caption_3).show();
        }
        else {
            $('#home-carousel-caption .slide-caption-3').text('').hide();
        }
    }

    // Releases Carousel
    $('#releases-carousel').owlCarousel({
        items: 4,
        lazyLoad: true,
        loop: true,
        nav: true,
        navText: false,
        dots: false,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1399: {
                items: 4
            }
        }
    });

    // Videos Carousel
    $('#videos-carousel').owlCarousel({
        items: 4,
        lazyLoad: true,
        loop: true,
        nav: true,
        navText: false,
        dots: false,
        margin: 2,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 4
            }
        }
    });
});