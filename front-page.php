<?php get_header();
/* Template Name: Home */
?>

<div class="home-hero" data-scroll-section>
  <div class="carousel">
      <?php
      $i = 0;
      if( have_rows('home_header_slider') ):
          while ( have_rows('home_header_slider') ) : the_row(); ?>
              <?php $image_repeater = get_sub_field( 'image' );

              ?>
              <div class="slide">
                  <a href="<?php if ($i == 0) { echo '/restoration/'; } elseif ($i == 1) { echo '/fireplaces/';} elseif ($i == 2) { echo '/lighting/';} elseif ($i == 3) { echo '/sculptures/';} ?>" class="slide__image show-custom-cursor" style="background-image: url(<?php echo esc_url($image_repeater['url']); ?>);"></a>
                  <div class="cn cn--lg show-custom-cursor" style="pointer-events: none">
                      <div class="slide__content">
                          <div class="h1 default-cursor <?php if ($i == 0 ) {echo ('active');} ?>" data-slide="0">Restoration</div>
                          <div class="h1 default-cursor <?php if ($i == 1 ) {echo ('active');} ?>" data-slide="1">Fireplaces</div>
                          <div class="h1 default-cursor <?php if ($i == 2 ) {echo ('active');} ?>" data-slide="2">Lighting</div>
                          <div class="h1 default-cursor <?php if ($i == 3 ) {echo ('active');} ?>" data-slide="3">Sculptures</div>
                      </div>
                      <a href="<?php the_sub_field( 'button_link' ); ?>" class="btn btn-white"><?php the_sub_field( 'button_text' ); ?></a>
                  </div>
              </div>
          <?php
            $i++;
          endwhile;
      endif; ?>
  </div>
</div>

<section class="press-demo scroll-bar cn-fluid" data-scroll-section>
  <h2 class="scroll-bar__title"><?php the_field( 'home_press_title' ); ?></h2>
  <div class="scroll-bar__content">

    <?php
    $args = array(
        'post_type' => 'press_post',
        'posts_per_page' => '6',
        'order' => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
      <div class="scroll-bar__img popup-gallery">
        <?php $thumbnail_id = get_post_meta( get_the_ID(), '_thumbnail_id', true );
        $img_alt            = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
        <a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="show-custom-cursor">
          <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php echo $img_alt; ?>">
        </a>
        <?php
        if( have_rows('press_images') ):
          while ( have_rows('press_images') ) : the_row(); ?>
            <?php $image_repeater = get_sub_field( 'image' ); ?>
            <a href="<?php echo esc_url($image_repeater['url']); ?>"></a>
          <?php endwhile;
        endif; ?>
      </div>
    <?php endwhile;
    wp_reset_postdata();
    endif; ?>

  </div>
  <div class="scroll-bar__btn">
    <a href="<?php the_field( 'home_press_button_link' ); ?>" class="btn btn-white"><?php the_field( 'home_press_button_title' ); ?></a>
  </div>
</section>

<section class="work scroll-bar cn-fluid" data-scroll-section>
  <h2 class="scroll-bar__title"><?php the_field( 'home__work_title' ); ?></h2>
  <div class="scroll-bar__content">
      <?php
      if( have_rows('home__work_images') ):
          while ( have_rows('home__work_images') ) : the_row(); ?>
              <?php $image_repeater = get_sub_field( 'image' ); ?>
              <div class="scroll-bar__img popup-gallery">
                <a href="<?php echo esc_url($image_repeater['url']); ?>" class="show-custom-cursor">
                  <img src="<?php echo esc_url($image_repeater['url']); ?>" alt="<?php echo $image_repeater['alt'];?>" data-scroll data-scroll-speed="1">
                </a>
              </div>
          <?php endwhile;
      endif; ?>
  </div>
</section>

<section class="pieces" data-scroll-section>
  <div class="cn cn--lg">
    <div class="pieces__items">
        <?php
        if( have_rows('home_pieces_images') ):
            while ( have_rows('home_pieces_images') ) : the_row(); ?>
                <?php $image_repeater = get_sub_field( 'image' ); ?>
                <div class="scroll-bar__img">
                    <img src="<?php echo esc_url($image_repeater['url']); ?>" alt="<?php echo $image_repeater['alt'];?>" data-scroll data-scroll-speed="1">
                </div>
            <?php endwhile;
        endif; ?>
    </div>
    <h2 class="pieces__title"><?php the_field( 'home_pieces_title' ); ?></h2>
    <h4 class="pieces__desc"><?php the_field( 'home_pieces_description' ); ?></h4>
    <div class="pieces__btn">
      <a href="<?php the_field( 'home_pieces_button_link' ); ?>" class="btn btn-white"><?php the_field( 'home_pieces_button_title' ); ?></a>
    </div>
  </div>
</section>

<section class="welcome welcome-text-animation" data-scroll-section data-scroll-call="testEvent2">
  <div class="cn cn--lg">
    <h5 class="welcome__title text__spliting" data-splitting><?php the_field( 'home_welcome_title' ); ?></h5>
    <h3 class="welcome__desc"><?php the_field( 'home_welcome_description' ); ?></h3>
    <div class="welcome__btn">
      <a href="<?php the_field( 'home_welcome_button_link' ); ?>" class="btn btn-white"><?php the_field( 'home_welcome_button_title' ); ?></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
