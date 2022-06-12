<?php //Template name: Cadastro ?>
<?php get_header(); ?>
<?php
  $url_minha_conta = site_url() . '/minha-conta';
  if( is_user_logged_in(  ) ) : ?>
    <script>
      location.href = "<?= $url_minha_conta ?>";
    </script>
<?php
  endif;
?>
  <section class="login-register">
    <div class="login-register_holder grids two_grids">
      <div class="login-register--item image-login-register" style="background-image: url(<?= site_url() ?>/wp-content/uploads/background-cadastro.jpg);"></div>
      <div class="login-register--item register-form">
        <div class="title-container">
          <h1 class="title-medium">Crie a sua conta</h1>
        </div>
        <?= do_shortcode( '[woocommerce_simple_registration]' ) ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>