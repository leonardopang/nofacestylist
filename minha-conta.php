<?php //Template name: Minha Conta ?>
<?php get_header(); ?>
<?php
  $url_home = site_url() . '/login';
  if( !is_user_logged_in() ) :
?>
      <script>
        location.href = "<?= $url_home ?>"
      </script>
<?php else : ?>
<section class="minha-conta">
  <div class="container-wrap">
    <div class="minha-conta_holder">
      <?= do_shortcode( '[woocommerce_my_account]' ) ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>