<?php get_header();
/* Template Name: Listing */
?>
<section class="hero " data-scroll-section>
    <div class="cn cn--md">
        <h1 class="hero__title">Fireplace</h1>
    </div>
</section>

<nav class="nav-product cn cn--lg" data-scroll-section>
    <ul>
        <li><a class="nav-product--active" href="#">All Fireplaces</a></li>
        <?php

        $terms = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
        ) );
        foreach ( $terms as $term ) {
            ?>
            <li><a href="<?php echo get_category_link($term->term_id); ?>"><?php echo $term->name; ?></a></li>
        <?php } ?>
    </ul>
</nav>

<section class="product-demo-wrap cn cn--lg" data-scroll-section>
    <div class="product-demo">
        <?php  $args = array(
            'post_type' => 'products',
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
            <?php  echo get_template_part( 'includes/partials/post', 'content' );?>
        <?php endwhile; endif; ?>

    </div>
</section>

<?php  echo get_template_part( 'includes/partials/listing', 'footer' );?>
<?php get_footer(); ?>
