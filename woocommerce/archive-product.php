<?php get_header(); ?>
<?php
$products = [];
if (have_posts()) :
  while (have_posts()) :
    the_post();
    $products[] = wc_get_product(get_the_ID());
  endwhile;
  wp_reset_postdata();
endif;
$data = [];
$data['products'] = format_products($products, 'medium');
?>
<section class="hero-header">
  <div class="container-wrap">
    <div class="hero-header-siema">
      <div class="hero-header-siema--item">
        <div class="hero-header-image">
          <img src="<?= site_url() ?>/wp-content/uploads/banner-loja.jpg" alt="">
        </div>
        <div class="hero-header_holder">
          <div class="container-wrap">
            <div class="title-container">
              <h2 class="text-large text-white">Bem vindo ao meu marketplace!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="arrows-container">
      <span class="arrows arrows-left"><i class="fas fa-chevron-left fa-lg text-white"></i></span>
      <span class="arrows arrows-right"><i class="fas fa-chevron-right fa-lg text-white"></i></span>
    </div>
  </div>
</section>
<section class="colecoes">
  <div class="container-wrap">
    <div class="coloecoes_container grids two_grids">
      <div class="colecoes-filter">
        <?= do_shortcode('[woocommerce_product_search placeholder="Pesquisar" excerpt="no" categories="no" category_results="no" show_price="no" show_add_to_cart="no" show_description="no" category_results="yes" product_thumbnails="no"]') ?>
        <div class="title-container">
          <h3 class="title-tiny">Filtros: </h3>
        </div>
        <div class="filtro-categoria">
          <div class="title-container">
            <h3 class="text-medium">Categorias</h3>
          </div>
          <?php
          wp_nav_menu([
            'menu' => 'filtro',
            'menu-class' => 'filtro-cat',
            'container' => false,
          ]);
          ?>
        </div>
        <div class="filtro-atributos">
          <?php

          $attribute_taxonomies = wc_get_attribute_taxonomies();
          foreach ($attribute_taxonomies as $attribute) {
            the_widget('WC_Widget_Layered_Nav', [
              'title' => $attribute->attribute_label,
              'attribute' => $attribute->attribute_name,
            ]);
          }
          ?>
        </div>
      </div>
      <div class="colecoes-product">
        <div class="colecoes-product-header flex_item">
          <?php woocommerce_result_count(); ?>
          <?php woocommerce_catalog_ordering(); ?>
        </div>
        <div class="colecoes-product_holder grids three_grids">
          <?php handel_product_list($data['products']); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>