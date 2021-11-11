jQuery(function($) {
    'use strict';

    const carousels = () => {
        let scroller = new LocomotiveScroll();
        const slider = new BeerSlider(document.getElementById("beer-slider"));

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            dots: true,
            arrows: false,
            asNavFor: '.slider-nav',
            adaptiveHeight: true,
            fade: true,
            speed: 900,
            infinite: true,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100
        }).on("beforeChange", function (){
            scroller.update();
        });

        $('.slider-nav').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            focusOnSelect: true,
            arrows: false,
            fade: true,
            adaptiveHeight: true
        });
    }

    if (document.body.classList.contains('page-template-restoration')) {
        carousels();
    }
});
