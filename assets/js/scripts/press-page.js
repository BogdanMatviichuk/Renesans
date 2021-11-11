jQuery(function($) {
    'use strict';

    const pressPageGrid = () => {
        const grid = document.querySelector('.grid');

        let scroller = new LocomotiveScroll();

        const msnry = new Masonry( grid, {
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            gutter: 40,
            percentPosition: true
        });

        imagesLoaded( grid ).on( 'progress', function() {
            msnry.layout();
            scroller.update();
        });
    }

    // const popupGallery = () => {
    //     $('.popup-gallery').map(function () {
    //         let th = $(this);
    //         th.magnificPopup({
    //             delegate: 'a',
    //             type: 'image',
    //             tLoading: 'Loading image #%curr%...',
    //             mainClass: 'my-mfp-zoom-in',
    //             gallery: {
    //                 enabled: true,
    //                 navigateByImgClick: true,
    //                 preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    //             },
    //             zoom: {
    //                 enabled: true,
    //                 duration: 300, // duration of the effect, in milliseconds
    //                 easing: 'ease-in-out', // CSS transition easing function
    //             },
    //             image: {
    //                 tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
    //             }
    //         });
    //     })
    // }




    if (document.body.classList.contains('page-template-press')) {
        pressPageGrid();
        // popupGallery();
    }

});