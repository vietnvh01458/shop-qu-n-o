jQuery(document).ready(function ($) {

    $('#lebanon-featured .featured-box').click(function () {

        window.location.href = $(this).attr('data-target');

    });


    $('.featured-box').hover(function () {

        $('.lebanon-icon', this).stop(true, false).animate({
            top: '-7px'

        }, 300);
        $('.lebanon-desc', this).stop(true, false).animate({
            top: '7px'

        }, 300);

        $('.lebanon-title', this).stop(true, false).animate({
            'letter-spacing': '1.5px'

        }, 300);

    }, function () {
        $('.lebanon-icon', this).stop(true, false).animate({
            top: '0px'

        }, 300);
        $('.lebanon-desc', this).stop(true, false).animate({
            top: '0px'

        }, 300);
        $('.lebanon-title', this).stop(true, false).animate({
            'letter-spacing': '1px'

        }, 300);
    });


    $('.lebanon-blog-content').imagesLoaded(function () {
        $('.lebanon-blog-content').masonry({
            itemSelector: '.lebanon-blog-post',
            gutter: 0,
            transitionDuration: 0,
        }).masonry('reloadItems');
    });

    $('#primary-menu').slicknav({
        prependTo: $('.lebanon-header-menu'),
        label: ''
    });

    $('.lebanon-search, #lebanon-search .fa.fa-close').click(function () {

        $('#lebanon-search').fadeToggle(449)

    });

    // Homepage Overlay
    $('#lebanon-overlay-trigger').click(function () {

        var selector = $('#lebanon-overlay-trigger');

        if (selector.hasClass('open')) {

            $('.overlay-widget').hide();
            selector.removeClass('open animated');

        } else {

            selector.addClass('open animated');
            $('.overlay-widget').fadeIn(330);
        }

    });

    // scroll to top trigger
    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });

    // scroll to top trigger
    $('.scroll-down').click(function () {

        $("html, body").animate({
            scrollTop: ($('#lebanon-featured-post').height() + 85 )
        }, 1000);

        return false;

    });


    // ------------
    var lebanonWow = new WOW({
        boxClass: 'reveal',
        animateClass: 'animated',
        offset: 100

    });

    lebanonWow.init();
    
    
});