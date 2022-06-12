<?php //Template name: Sobre ?>
<?php get_header(); ?>
<?php
  $quem_somos = get_field('quem_somos');
  $nossos_produtos = get_field('nossos_produtos');

?>
<?php hero_header(); ?>
<div class="page-sobre">
<section class="sessoes">
  <div class="container-wrap">
    <div class="title-container text-center">
      <h1 class="title-tiny"><?php the_field('titulo_first') ?></h1>
      <p class="text-tiny"><?php the_field('descricao_first') ?></p>
      <div class="link-container">
        <a href="<?php the_field('link') ?>" class="text-tiny text-gray"><?php the_field('texto_link') ?></a>
      </div>
    </div>
  </div>
</section>
<section class="sessoes">
  <div class="container-wrap">
    <div class="sessoes_holder grids two_grids">
      <div class="sessoes--item two_grids--item">
        <img src="<?= $quem_somos['imagem'] ?>" alt="<?= $quem_somos['conteudo']['titulo'] ?>">
      </div>
      <div class="sessoes--item two_grids--item flex_column">
        <div class="title-container">
          <h2 class="title-tiny"><?= $quem_somos['conteudo']['titulo'] ?></h2>
          <p class="text-large"><?= $quem_somos['conteudo']['descricao'] ?></p>
        </div>
        <div class="text-container">
          <div class="text-tiny">
            <?= $quem_somos['conteudo']['texto'] ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sessoes">
  <div class="container-wrap">
    <div class="sessoes_holder grids two_grids reverse-column">
      <div class="sessoes--item two_grids--item flex_column">
        <div class="title-container">
          <h2 class="title-tiny"><?= $nossos_produtos['conteudo']['titulo'] ?></h2>
          <p class="text-large"><?= $nossos_produtos['conteudo']['descricao'] ?></p>
        </div>
        <div class="text-container">
          <p class="text-tiny"><?= $nossos_produtos['conteudo']['texto'] ?></p>
        </div>
        <div class="link-container">
          <a href="<?= $nossos_produtos['conteudo']['link'] ?>" class="text-tiny text-gray"><?= $nossos_produtos['conteudo']['texto_link'] ?></a>
        </div>
    </div>
      <div class="sessoes--item two_grids--item">
        <img src="<?= $nossos_produtos['imagem'] ?>" alt="">
      </div>
    </div>
  </div>
</section>
<section class="sessoes chamada-produto">
  <div class="container-wrap">
    <div class="sessoes_holder">
      <div class="image-container">
        <img src="<?php the_field('chamada_imagem') ?>" alt="">
      </div>
    </div>
  </div>
</section>
<section class="sessoes">
  <div class="container-wrap">
    <div class="title-container text-center">
      <h2 class="title-tiny"><?php the_field('titulo_second') ?></h2>
      <p class="text-large"><?php the_field('descricao_second') ?></p>
    </div>
    <div class="text-container padding-text text-small text-center">
      <?php the_field('conteudo_second') ?>
    </div>
  </div> 
</section>
</div>
<?php get_footer(); ?>
