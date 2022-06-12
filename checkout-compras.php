<?php //Template name: Checkout 
?>
<?php get_header(); ?>
<section class="checkout-page">
  <div class="container-wrap">
    <div class="checkout-page_holder">
      <?= do_shortcode('[woocommerce_checkout]') ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>