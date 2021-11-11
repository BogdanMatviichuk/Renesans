<?php
/**
 * Header template
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title( '&ndash;', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
  <style>
    .ept_swipe {
      position: fixed;
      background-color: #11071b;
      width: 100%;
      height: 100%;
      z-index: 999;
      top: 0;
      bottom: 0;
      right: 0;
      opacity: 1;
      -webkit-transition: width .5s ease-in-out; /* Safari */
      transition: width .5s ease-in-out;
    }
    .ept_swipe--animate {
      width: 0;
    }
  </style>
  <?php wp_head(); ?>

  <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/libs/SidebarTransitions/js/modernizr.custom.js"></script>
</head>
<body <?php body_class(); ?>>
<div class="ept_swipe"></div>
<div id="st-container" class="st-container">
  <div class="st-pusher">
    <nav class="st-menu st-effect-3" id="menu-3">
      <button class="close-menu">
        <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line x1="1.35355" y1="0.646447" x2="28.3536" y2="27.6464"/>
          <line y1="-0.5" x2="38.1838" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 28 1)"/>
        </svg>
      </button>

      <div class="st-menu__inner">
        <div class="st-menu__top" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/menu-bg.jpg');">
          <div class="st-menu__container">
            <form class="search-form" method="get" action="<?php echo home_url(); ?>" role="search">
              <label>
                <input class="text-input" type="search" name="s" placeholder="Search">
              </label>
              <button>
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.5" d="M20.746 19.5153L15.6019 14.3738C16.8906 12.8011 17.5973 10.833 17.5973 8.80049C17.5973 3.9469 13.6495 0 8.79971 0C7.6141 0 6.46286 0.232044 5.3782 0.691835C4.33005 1.13659 3.3893 1.77041 2.58171 2.57827C1.77412 3.38613 1.13836 4.32719 0.693753 5.37569C0.234115 6.46071 0 7.61234 0 8.79834C0 13.6519 3.94774 17.5988 8.79756 17.5988C10.8316 17.5988 12.7968 16.892 14.3691 15.6028L19.5089 20.7443C19.6742 20.9098 19.8933 21 20.1253 21C20.3594 21 20.5785 20.9098 20.7417 20.7443C21.0854 20.407 21.0854 19.8548 20.746 19.5153ZM15.8554 8.79834C15.8554 12.6915 12.6895 15.8564 8.79971 15.8564C4.90782 15.8564 1.74405 12.6894 1.74405 8.79834C1.74405 4.9073 4.90997 1.74033 8.79971 1.74033C12.6895 1.74033 15.8554 4.9073 15.8554 8.79834Z" fill="white"/>
                </svg>
              </button>
            </form>
            <ul class="primary-menu">
                <li class="open-sub-menu">Fireplaces</li>
            </ul>

                <?php wp_nav_menu( [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'primary-menu',
                ] ); ?>



                <?php wp_nav_menu( [
                    'theme_location' => 'secondary',
                    'container'      => false,
                    'menu_class'     => 'secondary-menu',
                ] ); ?>

            <div class="sub-menu-container">
              <div class="close-sub-menu">
                <div class="icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-left.svg" alt="">
                </div>
                <div>Fireplaces</div>
              </div>

              <ul class="sub-menu">
                <li><a href="<?php echo get_permalink(20);?>">All Fireplaces</a></li>
                  <?php
                  $terms = get_terms( array(
                      'taxonomy'   => 'product_cat',
                      'hide_empty' => true,
                  ) );
                  foreach ( $terms as $term ) {
                      ?>
                  <li><a  href="<?php echo get_category_link($term->term_id); ?>"><?php echo $term->name; ?></a></li>
                  <?php } ?>
              </ul>
            </div>
          </div>
        </div>

        <div class="st-menu__bottom">
          <div class="left">
            <address>
                <?php
                if( have_rows('contact_adress',22) ):
                    while ( have_rows('contact_adress',22) ) : the_row(); ?>
                        <span><?php the_sub_field( 'row' ); ?></span>
                    <?php endwhile;
                endif; ?>
            </address>
          </div>
          <div class="right">
            <p>Call : <a href="tel:<?php the_field( 'contact_phone',22 ); ?>"><?php the_field( 'contact_phone',22 ); ?></a></p>
              <?php
              if( have_rows('contact_time',22) ):
                  while ( have_rows('contact_time',22) ) : the_row(); ?>
                      <p class="w-days"><?php the_sub_field( 'row' ); ?></p>
                  <?php endwhile;
              endif; ?>
          </div>

          <div class="st-menu__links">
              <?php
              if( have_rows('socials', 'option') ):
                  while ( have_rows('socials', 'option') ) : the_row(); ?>
                      <?php $image_repeater = get_sub_field( 'image' ); ?>
                      <a href="<?php the_sub_field( 'link' ); ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($image_repeater['url']); ?>" alt="<?php echo $image_repeater['alt'];?>"></a>
                  <?php endwhile;
              endif; ?>
          </div>
        </div>
      </div>

    </nav>

    <div class="st-content">
      <div class="st-content-inner">

        <!-- Top Navigation -->
        <header class="header">
          <div class="cn cn--lg header-container">
            <button class="open-menu" data-effect="st-effect-3"><span>Menu</span></button>
            <a href="/" class="header__logo">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Renaissance">
            </a>
            <div class="header__btn">
              <a href="/contact/" class="btn btn-white">CONTACT</a>
            </div>
          </div>
        </header>

        <div class="page-wrapper clearfix" data-scroll-container>
