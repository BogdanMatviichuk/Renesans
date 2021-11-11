<?php
/**
 * Script functions
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */

/**
 * Enqueue theme scripts
 */
function gulp_wp_theme_scripts() {

	/**
	 * Set a script handle prefix based on theme name.
	 * Note that this should be the same as the `themePrefix` var set in your Gulpfile.js.
	 */
	$theme_handle_prefix = 'renaissancelondon';

	/**
	 * Enqueue common scripts.
	 */
  wp_enqueue_script( 'imagesloaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js', array('jquery' ), '1.0', true );
  wp_enqueue_script( 'EasyPageTransitionScripts', get_template_directory_uri() . '/assets/js/scripts/swipe.js', array('jquery' ), '1.0', true );
  wp_enqueue_script( 'locomotive', 'https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1/dist/locomotive-scroll.min.js', array('jquery' ), '1.0', true );

  //
  wp_enqueue_script( 'simplebar', get_template_directory_uri() . '/assets/js/scripts/simplebar.min.js', array('jquery' ), '1.0', true );
  wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery' ), '1.0', true );
  wp_enqueue_script( 'magnific', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery' ), '1.0', true );
  //  Splitting and TweenMax home page only
  if (is_front_page()) {
    wp_enqueue_script('splitting', 'https://unpkg.com/splitting/dist/splitting.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('tween-max', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js', array('jquery'), '1.0', true);
  }

  if (is_page_template('templates/restoration.php')) {
    wp_enqueue_script( 'beerslider', 'https://cdn.jsdelivr.net/npm/beerslider@1.0.3/dist/BeerSlider.min.js', array('jquery' ), '1.0', true );
  }
  if (is_page_template('templates/press.php')) {
    wp_enqueue_script( 'masonry', 'https://masonry.desandro.com/masonry.pkgd.js', array('jquery' ), '1.0', true );
  }

  wp_enqueue_script( $theme_handle_prefix . '-scripts', get_template_directory_uri() . '/assets/js/' . $theme_handle_prefix . '.min.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'gulp_wp_theme_scripts' );
