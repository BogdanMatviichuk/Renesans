<a href="<?php the_permalink(); ?>" class="product-demo__item">
    <div class="product-demo__img show-custom-cursor">
        <?php $thumbnail_id = get_post_meta( get_the_ID(), '_thumbnail_id', true );
        $img_alt            = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
        <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php echo $img_alt; ?>">
    </div>
    <div class="product-demo__desc">
        <div class="product-demo__title"><?php the_title();?></div>
        <div class="product-demo__bottom">
            <div class="product-demo__price"><?php the_field( 'products_price' ); ?></div>
            <div class="product-demo__number"><?php the_field( 'products_stock_no' ); ?></div>
        </div>
    </div>
</a>
