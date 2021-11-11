<?php
/**
 * Index template
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */

get_header();
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>

      <article class="" data-scroll-section>
        <header class="hero">
          <div class="cn cn--md">
            <h1><?php the_title(); ?></h1>
          </div>
        </header>
        <div class="cn cn--md gap--lg">
          <?php the_content(); ?>
        </div>
      </article>

		<?php
	}
}
get_footer();
