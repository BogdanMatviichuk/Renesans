<?php
/**
 * Footer template
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */
?>

<footer class="footer" data-scroll-section>
  <div class="cn cn--lg">
      <?php wp_nav_menu( [
          'theme_location' => 'footer',
          'container'      => false,
          'menu_class'     => 'footer__nav',
      ] ); ?>
    <p class="footer__copy"><small><?php echo get_field('copyright', 'option' );?></small></p>

    <div class="footer__links">
        <?php
        if( have_rows('socials', 'option') ):
            while ( have_rows('socials', 'option') ) : the_row(); ?>
                <?php $image_repeater = get_sub_field( 'image' ); ?>
                <a href="<?php the_sub_field( 'link' ); ?>" target="_blank" rel="noopener"><img src="<?php echo esc_url($image_repeater['url']); ?>" alt="<?php echo $image_repeater['alt'];?>"></a>
            <?php endwhile;
        endif; ?>
    </div>
  </div>
</footer>
</div>

</div><!-- /st-content-inner -->
</div><!-- /st-content -->
</div>

<?php if ( is_single() ) { ?>
  <div class="b-info-sticky fixed">
    <div class="cn cn--md">
      <div class="b-info-sticky__inner">
        <div class="left">
          <div class="title"><?php the_title();?></div>
          <div class="price-line">
            <div class="price"><?php the_field( 'products_price' ); ?></div>
            <div class="text">All prices subject to VAT</div>
          </div>
          <div class="stock-number"><?php the_field( 'products_stock_no' ); ?></div>
        </div>

        <div class="right">
          <a href="/contact/" class="btn btn-dark">ENQUIRE</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="s-cursor cursor">
  <div class="c-label"></div>
  <div class="c-pointer"></div>
</div>

</div>


<?php if ( is_page_template( 'templates/contact.php' ) ) { ?>
    <?php $key = get_field('google_map_key', 'option' );?>
  <!--MAP-->
  <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key;?>"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts/map.js"></script>
  <!---->
<?php } ?>
<?php wp_footer();?>
</body>
</html>
