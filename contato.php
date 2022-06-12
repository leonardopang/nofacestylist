<?php //Template name: Contato ?>
<?php get_header(); ?>
<section class="banner" style="background-color: #091012; background-image: url(<?= home_url() ?>/wp-content/uploads/bg-banner.png);">
  <div class="container-wrap">
    <div class="banner_holder flex_item text-center">
      <div class="title-container">
        
      </div>
    </div>
    <div class="arrows-down">

    </div>
  </div>
</section>
<section class="contato sessoes">
  <div class="container-wrap">
    <div class="contato_holder">
      <div class="title-container">
        <h2 class="title-small text-bold">Formulário de contato</h2>
        <p class="text-mediun text-light">Ficamos felizes que você esteja entrando em contato</p>
      </div>
      <?= do_shortcode('[contact-form-7 id="61" title="Contato"]') ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>