jQuery(function($) {
    'use strict';

    const carousels = () => {
        $('.carousel').on('init', function (event, slick) {}).slick({
            infinite: true,
            speed: 1500,
            autoplay: true,
            autoplaySpeed: 4800,
            pauseOnHover: false,
            arrows: false,
            fade: true,
            cssEase: 'linear'
        })
        .on('beforeChange', function (event, slick, currentSlide, nextSlide) {})
        .on('afterChange', function (event, slick, currentSlide) {});


        $('[data-slide]').click(function (){
            let actIndex = $(this).data('slide');
            let slider = $( '.carousel' );
            slider[0].slick.slickGoTo(parseInt(actIndex));
        });
    }

    const wordSplitter = () => {

    }

    if (document.body.classList.contains('home')) {
        carousels();
        const wordSpitting = Splitting();
        const textSpitting = $('.text__spliting');
        Splitting({
            target: textSpitting,
            by: "chars",
            key: null
        });

        // wordSplitter();
    }
});
