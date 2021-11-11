<?php get_header();
/* Template Name: Contact */
?>
<?php $image = get_field( 'contact_background' ); ?>
<div class="s-contact" data-scroll-section>
    <div class="s-contact__bg bg-top" style="background-image: url('<?php echo( $image['url'] ); ?>');"></div>

    <div class="cn cn--md">
        <div class="s-contact__inner">
            <div class="s-contact__info">
                <address class="address">
                    <?php
                    if( have_rows('contact_adress') ):
                        while ( have_rows('contact_adress') ) : the_row(); ?>
                            <span><?php the_sub_field( 'row' ); ?></span>
                        <?php endwhile;
                    endif; ?>
                </address>
                <div class="tel">
                    Call: <a href="tel:+<?php the_field( 'contact_phone' ); ?>"><?php the_field( 'contact_phone'); ?></a>
                </div>

                <div class="mail">
                    Email: <a href="mailto:<?php the_field( 'contact_email'); ?>"><?php the_field( 'contact_email'); ?></a>
                </div>
                <div class="schedule">
                    <?php
                    if( have_rows('contact_time') ):
                        while ( have_rows('contact_time') ) : the_row(); ?>
                            <time><?php the_sub_field( 'row' ); ?></time>
                        <?php endwhile;
                    endif; ?>
                </div>
                <div class="bottom">
                    <?php
                    if( have_rows('contact_text_after_adress') ):
                        while ( have_rows('contact_text_after_adress') ) : the_row(); ?>
                            <div><?php the_sub_field( 'text' ); ?></div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
            <?php
            $location = get_field('map');
            if( $location ): ?>
            <div class="s-contact__map">
                <div id="map-canvas-1" class="map-wrapper" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>" data-zoom="15"></div>
                <a class="marker" data-rel="map-canvas-1" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>" data-image="<?php echo get_template_directory_uri(); ?>/assets/images/marker.png"></a>
            </div>
            <?php endif; ?>
            <div class="s-contact__form">
                <h4 class="title h4">Send us a message</h4>
                <?php the_field( 'contact_form'); ?>
            </div>
            <div class="s-contact__shipping">
                <div class="img">
                    <?php $image = get_field( 'contact_bottom_image' ); ?>
                    <img  src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
                <h4 class="title h4"><?php the_field( 'contact_bottom_title'); ?></h4>
                <div class="text"><?php the_field( 'contact_bottom_content'); ?></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
