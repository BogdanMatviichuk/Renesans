<?php
/**
 * Style functions
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */

/**
 * Enqueue theme styles.
 */
function gulp_wp_theme_styles() {

	/**
	 * Set a script handle prefix based on theme name.
	 * Note that this should be the same as the `themePrefix` var set in your Gulpfile.js.
	 */
	$theme_handle_prefix = 'renaissancelondon';

  wp_enqueue_style( 'locomotive', 'https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css', array(), '1.0.0', 'all' );
  if (is_front_page()) {
    wp_enqueue_style('splitting', 'https://unpkg.com/splitting/dist/splitting.css', array(), '1.0.0', 'all');
    wp_enqueue_style('splitting-cells', 'https://unpkg.com/splitting/dist/splitting-cells.css', array(), '1.0.0', 'all');
  }

  if (is_page_template('front-page.php')) {
    //  Beer-slider -- Restoration
    wp_enqueue_style( 'beerSlider', 'https://cdn.jsdelivr.net/npm/beerslider@1.0.3/dist/BeerSlider.unmin.css', array(), '1.0.0', 'all' );
  }

  // Slick slider
  wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1//slick-theme.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'magnific', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css', array(), '1.0.0', 'all' );

  wp_enqueue_style( $theme_handle_prefix . '-styles', get_template_directory_uri() . '/assets/css/' . $theme_handle_prefix .'.min.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'gulp_wp_theme_styles' );
