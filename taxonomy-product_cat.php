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
        <li><a  href="<?php echo get_permalink(20);?>">All Fireplaces</a></li>
        <?php
        $PozCat     = get_queried_object()->term_id;
        $PozCat_slug     = get_queried_object()->slug;
        $terms = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
        ) );
        foreach ( $terms as $term ) {
            if ( $PozCat === $term->term_id ) {
                $active = 'class="nav-product--active"';
            } else {
                $active = '';
            }
            ?>
            <li><a <?php echo $active;?> href="<?php echo get_category_link($term->term_id); ?>"><?php echo $term->name; ?></a></li>
        <?php } ?>
    </ul>
</nav>

<section class="product-demo-wrap cn cn--lg" data-scroll-section>
    <div class="product-demo">
        <?php
        $args = array(
            'product_cat' => $PozCat_slug,
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
        <?php  echo get_template_part( 'includes/partials/post', 'content' );?>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php  echo get_template_part( 'includes/partials/listing', 'footer' );?>
<?php get_footer(); ?>
