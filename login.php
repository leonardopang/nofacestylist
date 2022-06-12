<?php //Template name: Login ?>
<?php get_header(); ?>
<?php
  $url_minha_conta = site_url() . '/minha-conta';
  if( is_user_logged_in() ) : ?>
    <script>
      location.href = "<?= $url_minha_conta ?>";
    </script>
<?php
  endif;
?>
  <section class="login-register">
    <div class="login-register_holder grids two_grids">
      <div class="login-register--item image-login-register" style="background-image: url(<?= site_url() ?>/wp-content/uploads/background-login.jpg);">
      </div>
      <div class="login-register--item login-form">
        <div class="title-container">
          <h1 class="title-small">Bem vindo de volta!</h1>
        </div>
        <?php wp_login_form(); ?>
        <a href="<?= site_url() ?>/cadastro" class="button-register">Registre-se</a>
      </div>
    </div>
  </section>
<?php get_footer(); ?>