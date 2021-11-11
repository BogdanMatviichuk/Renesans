<?php get_header();
/* Template Name: Interior */
?>
<section class="hero " data-scroll-section>
    <div class="cn cn--md">
        <h1 class="hero__title"><?php the_title();?></h1>
    </div>
</section>

<section class="product-demo-wrap cn cn--lg" data-scroll-section>
    <div class="product-demo">
        <?php
        $args = array(
            'post_type' => 'interior',
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
            <?php  echo get_template_part( 'includes/partials/post', 'content' );?>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php  echo get_template_part( 'includes/partials/listing', 'footer' );?>
<?php get_footer(); ?>
