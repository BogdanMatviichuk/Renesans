jQuery(function($) {
    'use strict';
    const imagePopup = () => {
        $('.open-img').magnificPopup({
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            fixedContentPos: true,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            // mainClass: 'my-mfp-zoom-in'
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            zoom: {
                enabled: true,
                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function
            },
    });
    }

    if (document.body.classList.contains('single')) {
        imagePopup();
    }
});