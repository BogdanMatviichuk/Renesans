<?php get_header(); ?>

<section class="hero " data-scroll-section>
  <div class="cn cn--md">
    <h1 class="hero__title">Search</h1>
  </div>
</section>

<div class="search-container cn cn--lg" data-scroll-section>
  <h2 class="text-center">Search results for <span><?php print get_query_var( 's' ); ?></span></h2>
<!-- search -->
  <form class="search-form" method="get" action="<?php echo home_url(); ?>" role="search">
    <label>
      <input class="text-input" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'html5blank' ); ?>">
    </label>
    <button class="btn btn-bordered" role="button"><?php _e( 'Search', 'html5blank' ); ?></button>
  </form>
<!-- /search -->
</div>

<?php if ( have_posts() ): ?>
<section class="product-demo-wrap cn cn--lg" data-scroll-section>
  <div class="product-demo">
    <?php while ( have_posts() ): the_post(); ?>

      <a href="<?php the_permalink(); ?>" class="product-demo__item">
        <div class="product-demo__img show-custom-cursor">
          <?php $thumbnail_id = get_post_meta( get_the_ID(), '_thumbnail_id', true );
                $img_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
          <img src="<?php  if ($thumbnail_id) {
              $img_url = the_post_thumbnail_url( 'large' );
          } else {
              $img_url='https://renaissancelondon.coconuts.digital/wp-content/uploads/2021/10/woocommerce-placeholder-1150x1150-1.png';
              echo $img_url;
          }
         ?>" alt="<?php echo $img_alt; ?>">
        </div>
        <div class="product-demo__desc">
          <div class="product-demo__title"><?php the_title();?></div>
          <div class="product-demo__bottom">
            <div class="product-demo__price"><?php the_field( 'products_price' ); ?></div>
            <div class="product-demo__number"><?php the_field( 'products_stock_no' ); ?></div>
          </div>
        </div>
      </a>

    <?php endwhile; ?>
  </div>
</section>
<?php else: ?>
  <div class="no-posts cn cn--lg"  data-scroll-section>
    <h2 class="text-center">No results were found</h2>
  </div>
<?php endif; ?>

<?php get_footer(); ?>
