/*
header > hamburger-menu
------------------------------------------ */
jQuery(function ($) { 
    const $hamburger = $('.js-header__hamburger-menu');
    const $body = $('.js-body');

    $('.js-header__hamburger-button').on('click', function () {
        $hamburger.toggleClass('js-header__hamburger-menu-active');
        $body.toggleClass('is-overflow');
    });

    $(window).on('resize', function () {
        $hamburger.removeClass('js-header__hamburger-menu-active');
        $body.removeClass('is-overflow');
    });

    $('.js-header__hamburger-menu a[href^="#"]').on('click', function () {
        $hamburger.removeClass('js-header__hamburger-menu-active');
        $body.removeClass('is-overflow');
    });
});

/*
header > transform
------------------------------------------ */
jQuery(function ($) { 
    $(window).on("scroll", function () {
        const headerHeight = $(".js-header").outerHeight();
        const kvHeight = $(".js-kv").height();
        if ($(this).scrollTop() >= kvHeight - headerHeight) {
            $(".js-header").addClass("transform");
        } else {
            $(".js-header").removeClass("transform");
        }
    });
});