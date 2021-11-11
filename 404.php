<?php
/**
 * 404 template
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */

get_header();
?>
  <article class="" data-scroll-section>
    <header class="hero">
      <div class="cn cn--md">
        <h1><?php echo '404. Page Not Found.'; ?></h1>
      </div>
    </header>
    <div class="cn cn--md gap--lg">
      <?php the_content(); ?>
    </div>
  </article>

<?php
get_footer();
