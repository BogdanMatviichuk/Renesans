<?php
/**
 * Default post template
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */

get_header();
?>
<?php $image = get_field( 'products_header_background' ); ?>
    <section class="hero" data-scroll-section>
        <div class="hero__img img--cover-wrap">
            <img class="img--cover" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
        </div>
        <div class="scroll-next">
            <div>Scroll to explore</div>
            <div class="arrow">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down.svg" alt="">
            </div>
        </div>
    </section>

    <section class="s-product section" data-scroll-section>
        <div class="cn cn--md">
            <div class="s-product__top">
                <div class="product-info">
                    <div class="stock-number"><?php the_field( 'products_stock_no' ); ?></div>
                    <h1 class="title h3"><?php the_title();?></h1>
                    <div class="price-line">
                        <div class="price h4"><?php the_field( 'products_price' ); ?></div>
                        <div class="text">All prices subject to VAT</div>
                    </div>
                    <div class="desc"><?php the_field( 'products_content' ); ?></div>
                    <div class="bottom">
                        <div>Dimensions: <?php the_field( 'products_dimensions' ); ?></div>
                        <div>Status : <?php the_field( 'products_status' ); ?></div>
                    </div>
                </div>

                <div class="product-img">
                    <?php $thumbnail_id = get_post_meta( get_the_ID(), '_thumbnail_id', true );
                    $img_alt            = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
                    <a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="open-img img show-custom-cursor">

                        <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php echo $img_alt; ?>" data-scroll data-scroll-speed="-1">

                    </a>
                </div>
            </div>

            <div class="s-product__photos">
              <?php $image = get_field( 'products_img_left' ); ?>
              <a href="<?php echo( $image['url'] ); ?>" class="open-img img img--left show-custom-cursor">
                    <img src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-scroll data-scroll-speed="1">
                </a>

              <?php $image = get_field( 'products_img_right' ); ?>
              <a href="<?php echo( $image['url'] ); ?>" class="open-img img img--right show-custom-cursor">
                    <img src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-scroll data-scroll-speed="1">
                </a>

              <?php $image = get_field( 'products_img_center' ); ?>
              <a href="<?php echo( $image['url'] ); ?>" class="open-img img img--center show-custom-cursor">
                    <img src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-scroll data-scroll-speed="1">
                </a>
            </div>

            <div class="s-product__tags">
                <div class="title">Filed under</div>

                <div class="tags-list">
                    <?php
                    if( have_rows('products_tags') ):
                        while ( have_rows('products_tags') ) : the_row(); ?>
                            <div class="tag"><?php the_sub_field( 'tag' ); ?></div>
                        <?php endwhile;
                    endif; ?>


                </div>
            </div>
        </div>
    </section>

    <section class="s-available-products scroll-bar section" data-scroll-section>
        <div class="cn-fluid">
            <h2 class="scroll-bar__title h3">Also Available </h2>
            <div class="scroll-bar__content">
                <?php
                $post_type = get_post_type( $post->ID );
                $args = array(
                    'post_type' => $post_type,
                    'post__not_in' => [  $post->ID ],
                    'posts_per_page' => '5',
                    'orderby' => 'rand'
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
                    <?php  echo get_template_part( 'includes/partials/post', 'recent' );?>
                <?php endwhile; endif; ?>
            </div>

            <div class="scroll-bar__btn">
                <a href="<?php
                if($post_type == 'type_lighting') {
                    $perm_id = 37;
                } elseif ($post_type == 'sculptures') {
                    $perm_id =3375;
                } elseif ($post_type == 'interior') {
                    $perm_id =39;
                } else {
                    $perm_id =20;
                }
                the_permalink($perm_id); ?>" class="btn btn-bordered">SEE ALL</a>
            </div>
        </div>
    </section>

    <?php  echo get_template_part( 'includes/partials/blog', 'footer' );?>
<?php
get_footer();
