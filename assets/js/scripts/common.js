jQuery(function($) {
    'use strict';

  const scrollOptions = {
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
    repeat: false,
    reloadOnContextChange: true,
  }
  const header = $('.header');


  // Scroller scripts
  let scroller = new LocomotiveScroll(scrollOptions);

  scroller.on('scroll', function (instance) {

    if (instance.scroll.y > 100) {
      header.addClass('fixed');
    } else {
      header.removeClass('fixed');
    }


  });

  $('body').imagesLoaded(function() {
    scroller.update();
  })


  const menuFunc = () => {
    const openMenu = jQuery('.open-menu'),
        closeMenu = jQuery('.close-menu'),
        openSubMenu = jQuery('.open-sub-menu'),
        closeSubMenu = jQuery('.close-sub-menu');

    openMenu.on('click', function () {
      openMenu.addClass('hidden');
      closeMenu.fadeIn(200);
      jQuery('.st-container').addClass('st-effect-3  st-menu-open');
      jQuery('header').addClass('menu-open');
      jQuery('html').addClass('overflow-hidden');
    });

    closeMenu.on('click', function () {
      closeMenu.fadeOut(200);
      openMenu.removeClass('hidden');
      jQuery('.st-container').removeClass('st-effect-3  st-menu-open');
      jQuery('header').removeClass('menu-open');
      jQuery('html').removeClass('overflow-hidden');

      setTimeout(function () {
        jQuery('.st-menu__container').removeClass('sub-menu-open');
      }, 500)
    });

    openSubMenu.on('click', function () {
      jQuery('.st-menu__container').addClass('sub-menu-open');
    });

    closeSubMenu.on('click', function () {
      jQuery('.st-menu__container').removeClass('sub-menu-open');
    });
  };
  const homeHeroImgToggle = () => {
    $('.home-hero__img').click(function () {

    });

    let heroItem = $('.home-hero__item');
    const toggleItem = (th) => {
      let currentType = th.data('type');
      $('.home-hero__desktop-buttons a').hide().removeClass('active');
      $('.home-hero__desktop-buttons [data-link="' + currentType + '"]').addClass('active').fadeIn();
    };
    heroItem.map(function () {
      let th = $(this);
      if (th.hasClass('active')) {
        toggleItem(th);
      }

      th.click(function () {
        let thImage = th.find('.home-hero__img').attr('src');
        $('.home-hero__bg').css('background-image', 'url(' + thImage + ')')

        heroItem.removeClass('active');
        th.addClass('active');


        toggleItem(th);

      });
    })

    if (heroItem.hasClass('active')) {

    }

  };

  const scrollBar = () => {
    $('.scroll-bar__content').map(function () {
      new SimpleBar($(this)[0], {
        autoHide: false,
        scrollbarMaxSize: 210
      });
      scroller.update();
    });
  };

  const scrollNext = () => {
    $('.scroll-next').on('click', function () {
      let cls = $('.s-product').offset().top;
      scroller.scrollTo(cls);
    });
  }



  const popupGallery = () => {
    $('.popup-gallery').map(function () {
      let th = $(this);
      th.magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'my-mfp-zoom-in',
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
        image: {
          tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        }
      });
    })
  }

  if (document.body.classList.contains('page-template-press') || document.body.classList.contains('home')) {
    popupGallery();
  }


  //  Functions For all Pages
  menuFunc();
  scrollBar();


  // Functions with scroller for single pages
  if (document.body.classList.contains('home')) {
    homeHeroImgToggle();

    scroll.on('call', (obj) => {
      console.log(obj);
    });
  }

  if (document.body.classList.contains('single')) {
    scrollNext();
  }



  document.addEventListener("DOMContentLoaded", function(event) {
    scroller.update();
    blockWelcome();
  });
});


// const disableFixedHeader = [''];

// const viewportWidth = window.innerWidth;
// const lazy = () => {
//     document.addEventListener('lazyloaded', (e) => {
//         e.target.parentNode.classList.add('image-loaded');
//         e.target.parentNode.classList.remove('loading');
//         scroller.update();
//     });
// }
// lazy();