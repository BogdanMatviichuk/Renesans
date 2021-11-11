<?php get_header();
/* Template Name: Restoration */
?>
<section class="hero " data-scroll-section>
    <div class="cn cn--md">
        <h1 class="hero__title"><?php the_field( 'restoration_header_title' ); ?></h1>
        <h4 class="hero__desc"><?php the_field( 'restoration_header_description' ); ?></h4>
    </div>
</section>

<section class="restoration-slider cn cn--md" data-scroll-section>
    <div class="slider-for">
        <?php
        if( have_rows('restoration_header_slider') ):
            while ( have_rows('restoration_header_slider') ) : the_row(); ?>
                <?php $image_repeater = get_sub_field( 'image' ); ?>
                <div><img src="<?php echo esc_url($image_repeater['url']); ?>" alt="<?php echo $image_repeater['alt'];?>"></div>
            <?php endwhile;
        endif; ?>
    </div>
    <div class="slider-nav-wrap">
        <div class="slider-nav">
            <?php
            if( have_rows('restoration_header_slider') ):
                while ( have_rows('restoration_header_slider') ) : the_row(); ?>
                    <div><?php the_sub_field( 'title' ); ?></div>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>

<section class="background cn cn--md" data-scroll-section>
    <div class="background__content">
        <div class="background__desc">
            <h3 class="background__title"><?php the_field( 'restoration_backgroundr_title' ); ?></h3>
            <div class="background__text"><?php the_field( 'restoration_backgroundr_content' ); ?></div>
            <a class="background__more" href="<?php the_field( 'restoration_backgroundr_button_link' ); ?>"><?php the_field( 'restoration_backgroundr_button_text' ); ?></a>
        </div>
        <div class="background__img img--contain-wrap">
            <?php $image = get_field( 'restoration_backgroundr_small_image' ); ?>
            <img class="img--contain" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>"  data-scroll data-scroll-speed="-1">
        </div>
    </div>
    <?php $image = get_field( 'restoration_backgroundr_big_image' ); ?>
    <img class="img--single" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>"  data-scroll data-scroll-speed="-1">
</section>

<section class="project" data-scroll-section>
    <div class="project__content cn cn--md">
        <h3 class="project__title"><?php the_field( 'restoration_project_title' ); ?></h3>
        <div class="project__desc">
            <div class="project__text"><?php the_field( 'restoration_project_left_content' ); ?></div>
            <div class="project__text"><?php the_field( 'restoration_project_right_content' ); ?></div>
        </div>
    </div>
    <div class="project__imgs cn cn--lg">
        <div class="project__col">
            <div class="project__img img--contain-wrap">
                <?php $image = get_field( 'restoration_project_left_image' ); ?>
                <img class="img--contain" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-scroll data-scroll-speed="-2">
            </div>
        </div>
        <div class="project__col">
            <div class="project__img img--contain-wrap">
                <?php $image = get_field( 'restoration_project_right_image' ); ?>
                <img class="img--contain" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-scroll data-scroll-speed="-1">
            </div>
        </div>
    </div>
</section>

<section class="consultancy cn cn--md" data-scroll-section>
    <h3 class="consultancy__title"><?php the_field( 'restoration_consultancy_title' ); ?></h3>
    <div class="consultancy__content">
        <div class="consultancy__desc">
            <div class="consultancy__text"><?php the_field( 'restoration_consultancy_content' ); ?></div>
        </div>
        <div class="consultancy__img img--contain-wrap">
            <?php $image = get_field( 'restoration_consultancy_image' ); ?>
            <img class="img--contain" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-scroll data-scroll-speed="-2">
        </div>
    </div>
</section>

<section class="repairs cn cn--md" data-scroll-section>
    <h2 class="repairs__title"><?php the_field( 'restoration_repairs_title' ); ?></h2>
    <div class="repairs__diff">
        <div id="beer-slider" class="beer-slider">
            <?php $image = get_field( 'restoration_repairs_image_after' ); ?>
            <img src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-beer-label="before">
            <div class="beer-reveal">
                <?php $image = get_field( 'restoration_repairs_image_before' ); ?>
                <img src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-beer-label="after">
            </div>
        </div>
    </div>
    <div class="repairs__content">
        <div class="repairs__img">
            <div class="img--contain-wrap">
                <?php $image = get_field( 'restoration_repairs_image_before' ); ?>
                <img class="img--contain" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
            <div class="repairs__subdesc">
                <div class="repairs__label">Before</div>
            </div>
        </div>
        <div class="repairs__img">
            <div class="img--contain-wrap">
                <?php $image = get_field( 'restoration_repairs_image_after' ); ?>
                <img class="img--contain" src="<?php echo( $image['url'] ); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
            <div class="repairs__subdesc">
                <div class="repairs__label">After</div>
            </div>
        </div>
    </div>
    <!--                        <div class="repairs__subdesc">-->
    <!--                            <div class="repairs__label">Before</div>-->
    <!--                            <div class="repairs__label">After</div>-->
    <!--                        </div>-->
    <div class="repairs__desc">
        <div class="repairs__text"><?php the_field( 'restoration_repairs_content_before' ); ?></div>
        <div class="repairs__text"><?php the_field( 'restoration_repairs_content_after' ); ?></div>
    </div>
</section>

<div class="enquire-wrap cn cn--md"  data-scroll-section>
    <section class="enquire">
        <h3 class="enquire__title"><?php the_field( 'restoration_footer_title' ); ?></h3>
        <div class="enquire__desc"><?php the_field( 'restoration_footer_content' ); ?></div>
    </section>
</div>
<?php get_footer(); ?>
