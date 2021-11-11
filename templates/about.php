<?php get_header();
/* Template Name: About */
?>
<?php $image = get_field( 'about_header_background' ); ?>
<section class="hero" data-scroll-section>
    <div class="hero__img img--cover-wrap">
        <img class="img--cover" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
    </div>
    <div class="cn">
    </div>
</section>

<section class="about cn cn--md" data-scroll-section>
    <div class="about__text">
        <h2 class="about__title"><?php the_field( 'about_content_title' ); ?></h2>
        <div class="about__subtitle" data-scroll data-scroll-speed="1">
            <p><?php the_field( 'about_content_subtitle' ); ?></p>
        </div>
    </div>
    <?php $image = get_field( 'about_content_big_image' ); ?>
    <img class="img--single" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>"  data-scroll data-scroll-speed="1">
    <div class="about__content col-wrap">
        <div class="about__img img--cover-wrap">
            <?php $image = get_field( 'about_content_small_image' ); ?>
            <img class="img--cover" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>"  data-scroll data-scroll-speed="-2">
        </div>
        <div class="about__desc"><?php the_field( 'about_content_description' ); ?></div>
    </div>
</section>

<section class="fireplaces cn cn--md" data-scroll-section>
    <h3 class="fireplaces__title"><?php the_field( 'about_fireplaces_title' ); ?></h3>
    <div class="fireplaces__content">
        <div class="fireplaces__text"><?php the_field( 'about_fireplaces_content' ); ?></div>
        <div class="fireplaces__text">
            <p><?php the_field( 'about_fireplaces_right_side_text' ); ?></p>
            <div class="fireplaces-contact">
                <address class="fireplaces__address">
                    <?php
                    if( have_rows('contact_adress',22) ):
                        while ( have_rows('contact_adress',22) ) : the_row(); ?>
                            <span><?php the_sub_field( 'row' ); ?></span>
                        <?php endwhile;
                    endif; ?>
                </address>
                <div class="fireplaces-contact__item">
                    <a href="tel:+<?php the_field( 'contact_phone',22 ); ?>">Call : <?php the_field( 'contact_phone',22 ); ?></a>
                    <?php
                    if( have_rows('contact_time',22) ):
                        while ( have_rows('contact_time',22) ) : the_row(); ?>
                            <time><?php the_sub_field( 'row' ); ?></time>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
