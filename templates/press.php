<?php get_header();
/* Template Name: Press */
?>
<section class="hero" data-scroll-section>
    <div class="cn">
        <h1 class="hero__title">In The Press</h1>
    </div>
</section>

<section class="page-press-grid cn cn--lg" data-scroll-section>
  <div class="grid">
    <div class="grid-sizer"></div>
      <?php
      $args = array(
          'post_type' => 'press_post',
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
          <div class="grid-item popup-gallery">
              <?php $thumbnail_id = get_post_meta( get_the_ID(), '_thumbnail_id', true );
              $img_alt            = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
              <a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="show-custom-cursor">
                  <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php echo $img_alt; ?>">
              </a>
              <?php
              if( have_rows('press_images') ):
                while ( have_rows('press_images') ) : the_row(); ?>
                <?php $image_repeater = get_sub_field( 'image' ); ?>
                <a href="<?php echo esc_url($image_repeater['url']); ?>"></a>
                <?php endwhile;
              endif; ?>
          </div>
      <?php endwhile; endif; ?>
  </div>
</section>


<?php get_footer(); ?>
