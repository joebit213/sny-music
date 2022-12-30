jQuery(document).ready(function ($) {
    // Social Popup Open
    $('.share-links a').on('click', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        window.open(link, "popupWindow", "width=670,height=378,scrollbars=no");
    });

    // Video Player
    $(document).on('click', '.video-item a', function (e) {
        e.preventDefault();
        var artist = $(this).data('artist');
        var title = $(this).data('title');
        var embed_url = $(this).data('embed-url');

        $('#video-player .embed-responsive iframe').attr('src', embed_url + '?autoplay=1');
        $('#video-player .embed-responsive iframe').attr('alt', title);
        //$('#video-player .video-info h3').html("<span>" + artist + " - </span>" + title);

        $('html, body').stop().animate({
            scrollTop: $('#video-player').offset().top
        }, {
            duration: 200
        });
    });

    // Bio Toggle
    $('#bio-read-more').on('click', function (e) {
        e.preventDefault();
        $('.bio-content').toggleClass('collapsed');
        var toggle_text = $(this).attr('data-toggle-text');
        $(this).attr('data-toggle-text', $(this).text());
        $(this).text(toggle_text);
    });

    // Events toggle
    $('#view-all-events').on('click', function (e) {
        e.preventDefault();
        $('#artist-events .event').fadeIn();
        $(this).fadeOut();
    });

    // Newsletter
    $('.newsletter-link a').on('click', function (e) {
        e.preventDefault();
        $.magnificPopup.open({
            items: {
                src: '#newsletter-modal'
            },
            type: 'inline',
            closeMarkup: '<button title="%title%" type="button" class="mfp-close"><span class="sr-only">Close</span></button>'
        });
    });

    // Instagram link fix
    if ($('#sbi_images').length) {
        var ig_fix = setInterval(function () {
            if ($('.sbi_photo').length) {
                $('.sbi_photo').each(function (index) {
                    var alt = $(this).find('img').attr('alt');
                    $(this).append('<div class="sr-only">' + alt + '</div>');
                });
                clearInterval(ig_fix);
            }
        }, 1000);
    }
});