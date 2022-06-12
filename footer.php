<?php if (is_page_template(array('home.php', 'sobre.php'))) : ?>
  <?php
  $loja_footer = get_field('loja_footer', 'opt-footer');
  ?>
  <section class="sessoes section-to-loja">
    <div class="container-wrap">
      <div class="sessoes_holder">
        <div class="title-container text-center">
          <h2 class="title-tiny"><?= $loja_footer['titulo'] ?></h2>
          <p class="text-tiny"><?= $loja_footer['descricao'] ?></p>
          <a href="<?= $loja_footer['link_botao'] ?>" class="button button-center button-to-shop"><?= $loja_footer['texto_botao'] ?></a>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php if (!is_page_template(array('login.php', 'cadastro.php'))) : ?>
  <footer class="footer">
    <div class="footer-top">
      <div class="container-wrap">
        <div class="footer-top_holder grids four_grids">
          <div class="arrows-top-footer">
            <img src="<?= site_url() ?>/wp-content/uploads/arrow-top.png" alt="Arrows Top">
          </div>
          <div class="footer-top--item footer-top--logo">
            <div class="logo-container">
              <img src="<?php the_field('logo_footer', 'opt-footer') ?>" alt="No Face Stylist">
            </div>
          </div>
          <div class="footer-top--item footer-top--atendimento">
            <div class="title-container">
              <h5 class="text-large">ATENDIMENTO AO CONSUMIDOR</h5>
            </div>
            <nav class="menu-footer">
              <?php wp_nav_menu(array(
                'menu' => 'atendimento'
              )) ?>
            </nav>
          </div>
          <div class="footer-top--item footer-top--politicas">
            <div class="title-container">
              <h5 class="text-large">POLÍTICAS E PRIVACIDADE</h5>
            </div>
            <nav class="menu-footer">
              <?php wp_nav_menu(array(
                'menu' => 'politicas'
              )) ?>
            </nav>
          </div>
          <?php if (have_rows('redes_sociais', 'opt-footer')) : ?>
            <div class="footer-top--item footer-top--redes">
              <div class="title-container">
                <h5 class="text-large">REDES</h5>
              </div>

              <div class="redes-sociais-footer">
                <?php while (have_rows('redes_sociais', 'opt-footer')) : ?>
                  <?php the_row(); ?>
                  <?php if (get_row_layout() == 'facebook_container') : ?>
                    <a href="<?php the_sub_field('link') ?>" target="_blank" class="fa-stack">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-facebook-f fa-inverse fa-stack-1x"></i>
                    </a>
                  <?php elseif (get_row_layout() == 'instagram_holder') : ?>
                    <a href="<?php the_sub_field('link') ?>" target="_blank" class="fa-stack">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-instagram fa-inverse fa-stack-1x"></i>
                    </a>
                  <?php elseif (get_row_layout() == 'youtube_holder') : ?>
                    <a href="<?php the_sub_field('link') ?>" class="fa-stack">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="far fa-youtube fa-inverse fa-stack-1x"></i>
                    </a>
                  <?php elseif (get_row_layout() == 'linkedin_holder') : ?>
                    <a href="<?php the_sub_field('link') ?>" target="_blank" class="fa-stack">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-linkedin-in fa-inverse fa-stack-1x"></i>
                    </a>
                  <?php elseif (get_row_layout() == 'whatsapp_holder') : ?>
                    <a href="<?php the_sub_field('link') ?>" target="_blank" class="fa-stack">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fab fa-whatsapp fa-inverse fa-stack-1x"></i>
                    </a>
                  <?php elseif (get_row_layout() == 'email_holder') : ?>
                    <a href="mailto:<?php the_sub_field('email') ?>" class="fa-stack">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="far fa-envelope fa-inverse fa-stack-1x"></i>
                    </a>
                <?php endif;
                endwhile;
                wp_reset_postdata(); ?>
              </div>
            <?php endif; ?>
            <div class="newsletter-footer">
              <div class="title-container">
                <h5 class="text-large">Newsletter</h5>
              </div>
              <?= do_shortcode('[contact-form-7 id="74" title="Newsletter"]') ?>
            </div>
            </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container-wrap">
        <div class="footer-bottom_holder flex_item">
          <p class="text-tiny text-white">Copyright © No Face Stylist 2021. Todos os Direitos Reservados</p>
          <span class="text-tiny text-white flex_item">Feito por: <a href=""><img src="<?= site_url() ?>/wp-content/uploads/logo-feito-por.png" alt="Estúdio DP8"></a></span>
        </div>
      </div>
    </div>
  </footer>
  <div class="widget-social">
    <?php if (have_rows('redes_sociais_widget', 'opt-social')) : ?>
      <?php while (have_rows('redes_sociais_widget', 'opt-social')) : ?>
        <?php the_row(); ?>
        <?php if (get_row_layout() == 'facebook_container') : ?>
          <a href="<?php the_sub_field('link') ?>" taget="_blank" class="fa-stack">
            <i class="fas fa-circle fa-stack-2x" style="color: #404040;"></i>
            <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
          </a>
        <?php elseif (get_row_layout() == 'instagram_holder') : ?>
          <a href="<?php the_sub_field('link') ?>" taget="_blank" class="fa-stack">
            <i class="fas fa-circle fa-stack-2x" style="color: #404040;"></i>
            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
          </a>
        <?php elseif (get_row_layout() == 'youtube_holder') : ?>
          <a href="<?php the_sub_field('link') ?>" taget="_blank" class="fa-stack">
            <i class="fas fa-circle fa-stack-2x" style="color: #404040;"></i>
            <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
          </a>
        <?php elseif (get_row_layout() == 'linkedin_holder') : ?>
          <a href="<?php the_sub_field('link') ?>" taget="_blank" class="fa-stack">
            <i class="fas fa-circle fa-stack-2x" style="color: #404040;"></i>
            <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
          </a>
        <?php elseif (get_row_layout() == 'whatsapp_holder') : ?>
          <a href="<?php the_sub_field('link') ?>" taget="_blank" class="fa-stack">
            <i class="fas fa-circle fa-stack-2x" style="color: #404040;"></i>
            <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
          </a>
        <?php elseif (get_row_layout() == 'email_holder') : ?>
          <a href="mailto:<?php the_sub_field('email') ?>" class="fa-stack">
            <i class="fas fa-circle fa-stack-2x" style="color: #404040;"></i>
            <i class="far fa-envelope fa-stack-1x fa-inverse"></i>
          </a>
        <?php elseif (get_row_layout() == 'spotify_holder') : ?>
          <a href="<?php the_sub_field('link') ?>" taget="_blank" class="fa-stack">
            <i class="fas fa-circle fa-stack-2x" style="color: #404040;"></i>
            <i class="fab fa-spotify fa-stack-1x fa-inverse"></i>
          </a>
      <?php endif;
      endwhile;
      wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
<?php endif; ?>
</body>
<?php wp_footer() ?>

</html>