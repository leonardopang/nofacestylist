<?php //Template name: Atendimento ?>
<?php get_header(); ?>
<section class="atendimentos sessoes">
  <div class="container-wrap">
    <div class="atendimentos_holder grids two_grids">
      <div class="atendimentos--item atendimentos-menu">
        <div class="title-container">
          <h2 class="text-medium">Outros Atendimentos</h2>
        </div>
        <?php
          wp_nav_menu([
            'menu' => 28,
            'menu_class' => 'atendimento-interno',
            'container' => false
          ]);
        ?>
      </div>
      <div class="atendimentos--item">
        <div class="title-container">
          <h1 class="title-tiny"><?php the_field('titulo_politica_e_atendimento', 85); ?></h1>
          <p class="text-small"><?php the_field('descricao_politica_e_atendimento', 85); ?></p>
        </div>
        <?php if(!is_page('85')): ?>
        <div class="conteudo">
          <h2 class="title-tiny"><?php the_title() ?></h2>
          <div class="text-container">
            <p class="text-small">
              <?php the_field('descricao_sub_page') ?>
            </p>
          </div>
        </div>
        <?php
          if( have_rows('construtor') ) :
            while( have_rows('construtor') ) :
              the_row();
              if( get_row_layout() == 'texto_container' ): ?>
                <div class="text-container text-small">
                  <?php the_sub_field('texto'); ?>
                </div>
              <?php
              elseif( get_row_layout() == 'accordion_container' ): ?>
                <div class="accordion">
                  <div class="accordion-header">
                    <div class="title-container">
                      <h2 class="text-medium"><?php the_sub_field('titulo') ?></h2>
                    </div>
                    <div class="arrows">
                      <img src="<?= site_url() ?>/wp-content/uploads/arrow-accordion.png" alt="">
                    </div>
                  </div>
                  <?php
                    if( have_rows('conteudo_accordion') ):
                      while( have_rows('conteudo_accordion') ) :
                        the_row(); 
                  ?>
                        <div class="accordion-conteudo">
                          <?php if( get_row_layout() == 'titulo_container' ) : ?>
                            <div class="title-container">
                              <h2 class="text-large"><?php the_sub_field('titulo') ?></h2>
                            </div>
                          <?php elseif( get_row_layout() == 'texto_container' ) : ?>
                            <div class="text-container text-small">
                              <?php the_sub_field('texto'); ?>
                            </div>
                          <?php elseif( get_row_layout() == 'image_container' ) : ?>
                            <div class="image-container">
                              <img src="<?php the_sub_field('image'); ?>" alt="">
                            </div>
                          <?php elseif( get_row_layout() == 'video_container' ) : ?>
                            <div class="video-container">
                              <?php the_sub_field('texto'); ?>
                            </div>
                          <?php endif; ?>
                        </div>
                  <?php 
                      endwhile;
                      wp_reset_postdata();
                    endif;
                  ?>
                </div>
              <?php
              elseif( get_row_layout() == 'imagem_container' ): ?>
                <div class="image-container">
                  <img src="<?php the_sub_field('image'); ?>" alt="">
                </div>
              <?php
              elseif( get_row_layout() == 'titulo_container' ): ?>
                <div class="video-container">
                  <?php the_sub_field('texto'); ?>
                </div>
                
        <?php
              endif;
            endwhile;
            wp_reset_postdata();
          endif;
        ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>