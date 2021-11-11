<a href="<?php the_permalink(); ?>" class="scroll-bar__product">
    <div class="img show-custom-cursor">
        <?php $thumbnail_id = get_post_meta( get_the_ID(), '_thumbnail_id', true );
        $img_alt            = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
        <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php echo $img_alt; ?>">
    </div>
    <div class="title"><?php the_title();?></div>
    <div class="price"><?php the_field( 'products_price' ); ?></div>
    <div class="stock-number"><?php the_field( 'products_stock_no' ); ?></div>
</a>
