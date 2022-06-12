<?php //Template name: Home 
global $DIR_IMG;
?>
<?php get_header() ?>
<?php if (have_rows('banner')) : ?>

  <section class="hero-header">
    <div class="container-wrap">
      <div class="hero-header-siema">

        <?php while (have_rows('banner')) : ?>
          <?php the_row(); ?>
          <?php $titulo_banner = get_sub_field('titulo'); ?>
          <div class="hero-header-siema--item">
            <div class="hero-header-image">
              <img src="<?php the_sub_field('imagem') ?>" alt="">
            </div>
            <div class="hero-header_holder">
              <?php if ($titulo_banner) : ?>
                <div class="container-wrap">
                  <div class="title-container">
                    <h2 class="text-large text-white"><?php the_sub_field('titulo') ?></h2>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>

        <?php endwhile; ?>
      </div>

      <div class="arrows-container">

        <span class="arrows arrows-left"><?= file_get_contents($DIR_IMG . '/svg/icon-arrow-left-white.svg') ?></i></span>
        <span class="arrows arrows-right"><?= file_get_contents($DIR_IMG . '/svg/icon-arrow-right-white.svg') ?></i></span>
      </div>

    </div>
  </section>
<?php endif; ?>
<div class="page-home">
  <section class="sessoes categorias">
    <div class="container-wrap">
      <div class="sessoes_holder">
        <div class="title-container text-center">
          <h2 class="title-tiny"><?php the_field('titulo_first') ?></h2>
          <p class="text-tiny weight-500"><?php the_field('sub_titulo_first') ?></p>
          <div class="link-container">
            <a href="<?php the_field('link_first') ?>" class="text-tiny text-gray"><?php the_field('texto_link_first') ?></a>
          </div>
        </div>
        <?php if (have_rows('primero_chamada')) : ?>
          <?php while (have_rows('primero_chamada')) : ?>
            <?php the_row(); ?>
            <div class="cards grids two_grids">
              <?php if (have_rows('cards_container')) : ?>
                <?php while (have_rows('cards_container')) : ?>
                  <?php the_row(); ?>

                  <a href="<?php the_sub_field('link') ?>" class="cards--item">
                    <div class="image-container">
                      <img src="<?php the_sub_field('imagem') ?>" alt="">
                    </div>
                    <div class="title-container">
                      <div class="title-container text-center">
                        <h2 class="title-tiny"><?php the_sub_field('titulo') ?></h2>
                        <p class="text-tiny weight-500"><?php the_sub_field('descricao') ?></p>
                        <div class="link-container">
                          <span class="text-tiny text-gray"><?php the_sub_field('texto_link') ?></span>
                        </div>
                      </div>
                    </div>
                  </a>

                <?php endwhile; ?>
                <?php wp_reset_postdata() ?>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata() ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php $segunda_chamada = get_field('segunda_chamada'); ?>
  <section class="sessoes chamada-produto">
    <div class="container-wrap">
      <div class="sessoes_holder">
        <div class="image-container">
          <img src="<?= $segunda_chamada['imagem'] ?>" alt="<?= $segunda_chamada['titulo'] ?>">
        </div>
        <div class="title-container text-center">
          <h2 class="title-tiny"><?= $segunda_chamada['titulo'] ?></h2>
          <p class="text-tiny weight-500"><?= $segunda_chamada['sub_titulo'] ?></p>
          <div class="link-container">
            <a href="<?= $segunda_chamada['link'] ?>" class="text-tiny text-gray"><?= $segunda_chamada['texto_link'] ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="sessoes ">
    <div class="container-wrap">
      <div class="sessoes_holder">
        <div class="cards grids three_grids">
          <?php
          if (have_rows('terceira_chamada')) :
            while (have_rows('terceira_chamada')) :
              the_row();
          ?>
              <a href="<?php the_sub_field('link') ?>" class="cards--item">
                <div class="image-container">
                  <img src="<?php the_sub_field('imagem') ?>" alt="<?php the_sub_field('titulo') ?>">
                </div>
                <div class="title-container">
                  <div class="title-container text-center">
                    <h2 class="title-tiny"><?php the_sub_field('titulo') ?></h2>
                    <p class="text-tiny weight-500"><?php the_sub_field('descricao') ?></p>
                    <div class="link-container">
                      <span class="text-tiny text-gray"><?php the_sub_field('texto_link') ?></span>
                    </div>
                  </div>
                </div>
              </a>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer() ?>