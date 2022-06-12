<?php get_header(); ?>
<?php
$args = array(
  'post_type' => 'product',
  'posts_per_page' => -1,
  'orderby' => 'rand'
);
$the_query = new WP_Query($args);
$count_prod = 0;
$products = [];
if ($the_query->have_posts()) :
  while ($the_query->have_posts() && $count_prod <= 2) :
    $the_query->the_post();
    $products[] = wc_get_product(get_the_ID());
    $count_prod++;
  endwhile;
  wp_reset_postdata();
endif;
$data = [];
$data['products'] = format_products($products);
?>
<?php
function format_single_product($id, $img_size = 'full')
{
  $product = wc_get_product($id);

  $gallery_ids = $product->get_gallery_attachment_ids();
  $gallery = [];
  if ($gallery_ids) {
    foreach ($gallery_ids as $img_id) {
      $gallery[] = wp_get_attachment_image_src($img_id, $img_size)[0];
    }
  }

  return [
    'id' => $id,
    'name' => $product->get_name(),
    'price' => $product->get_price_html(),
    'link' => $product->get_permalink(),
    'sku' => $product->get_sku(),
    'description' => $product->get_description(),
    'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
    'gallery' => $gallery,
  ];
}

?>
<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
    <?php
    $produto = format_single_product(get_the_ID());
    $product_id = wc_get_product(get_the_ID());
    $regular_price = $product_id->get_regular_price();
    $sale_price = $product_id->get_sale_price();
    if ($product->is_type('variable')) {
      $regular_price = $product_id->get_variation_regular_price();
      $sale_price = $product_id->get_variation_sale_price();
    } else {
      $regular_price = $product_id->get_regular_price();
      $sale_price = $product_id->get_sale_price();
    }

    $is_on_sale = $product_id->is_on_sale();
    $category = get_categories();
    ?>
    <section class="single-product-page">
      <div class="container-wrap">
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class('single-product-page grids two_grids', $product); ?>>
          <div class="single-product-page--item">
            <div class="product-gallery" data-gallery="gallery">
              <div class="product-gallery-desktop">
                <div class="produto-gallery-main">
                  <img data-gallery="main" src="<?= $produto['img']; ?>" alt="<?= $produto['name']; ?>">
                </div>
                <div class="product-gallery-list">
                  <?php foreach ($produto['gallery'] as $img) { ?>
                    <img data-gallery="list" src="<?= $img; ?>" alt="<?= $produto['name']; ?>">
                  <?php } ?>
                </div>
              </div>
              <div class="product-gallery-mobile">
                <?php woocommerce_show_product_images() ?>
              </div>
            </div>
          </div>
          <div class="single-product-page--item">
            <div class="single-product-page--content">
              <?php woocommerce_breadcrumb() ?>
              <div class="title-container">

                <h1 class="title-small ultra-bold"><?php the_title(); ?></h1>
                <?php if (get_field('nome_pessoa_ou_loja')) : ?>
                  <span class="small-text text-gray">Por: <?php the_field('nome_pessoa_ou_loja') ?></span>
                <?php else : ?>
                  <span class="small-text text-gray">Por: nofacestylist</span>
                <?php endif; ?>
              </div>
              <div class="price-produc">
                <?php if ($is_on_sale) : ?>
                  <span class="normal-text price-product product-sale">
                    <?= $produto['price']; ?>
                  </span>
                  <p class="super-text" style="display: none;">12x R$<?= number_format(($sale_price / 12), 2, ",", ".") ?></p>
                <?php else : ?>
                  <span class="normal-text price-product">
                    <?= $produto['price']; ?>
                  </span>
                  <p class="super-text" style="display: none;">12x R$<?= number_format(($regular_price / 12), 2, ",", ".") ?></p>
                <?php endif ?>
              </div>
              <?php woocommerce_template_single_add_to_cart() ?>
              <?php if (have_rows('fornecedores', 'opt-atendente')) : while (have_rows('fornecedores', 'opt-atendente')) : the_row(); ?>
                  <?php
                  $fornecedores = get_sub_field('nome');
                  $atendentes = $fornecedores->slug;
                  $link = get_sub_field('link_whatsapp');
                  if (has_term($fornecedores->slug, 'product_cat') && $link) :
                  ?>
                    <div class="button-container-whatsapp">
                      <a href="<?= $link ?>" target="_blank" class="button-whatsapp"><i class="fab fa-whatsapp text-white"></i> Comprar por WhatsApp</a>
                    </div>
                  <?php endif; ?>
              <?php endwhile;
              endif; ?>

              <div class="description_product accordin_product">
                <div class="title-container flex_item">
                  <h3 class="text-small">DESCRIÇÃO DO PRODUTO</h3>
                  <img src="<?= home_url() ?>/wp-content/uploads/arrow-top-description.png" class="arrows-top-accordion" alt="">
                </div>
                <div class="conteudo normal-text">
                  <?php the_content(); ?>
                </div>
              </div>
              <div class="tabela-medidas accordin_product">
                <div class="title-container flex_item">
                  <h3 class="text-small">TABELA DE MEDIDAS</h3>
                  <img src="<?= home_url() ?>/wp-content/uploads/arrow-top-description.png" class="arrows-top-accordion" alt="">
                </div>
                <div class="conteudo normal-text">
                  <?php the_field('medidas') ?>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <article class="info-compra">
      <div class="container-wrap">
        <div class="info-compra_holder grids three_grids">
          <?php
          if (have_rows('cards_products')) :
            while (have_rows('cards_products')) :
              the_row();
              $image_cards = get_sub_field('imagem');
          ?>
              <div class="info-compra--item">
                <div class="image-container">
                  <img src="<?= $image_cards['url'] ?>" class="image-center" alt="<?= $image_cards['alt'] ?>">
                </div>
                <div class="text-container text-center">
                  <h4 class="text-medium"><?php the_sub_field('titulo') ?></h4>
                  <p class="text-small"><?php the_sub_field('descricao') ?></p>
                </div>
                <div class="button-container text-center text-center">
                  <a href="<?php the_sub_field('link') ?>" class="text-small text-gray"><?php the_sub_field('texto_link') ?></a>
                </div>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </article>
    <section class="comprar-mais">
      <div class="container-wrap">
        <div class="title-container text-center">
          <h2 class="title-tiny">Produtos que você pode gostar</h2>
        </div>
        <div class="comprar-mais_holder grids three_grids">
          <?php handel_product_list($data['products']); ?>
        </div>
      </div>
    </section>
<?php endwhile;
endif; ?>

<script>
  const accordion_products = document.querySelectorAll('.accordin_product')
  const accordion_products_conteudo = document.querySelectorAll('.accordin_product .conteudo')
  accordion_products.forEach((accordion, index) => {
    accordion.addEventListener('click', () => {
      accordion.classList.toggle('active')
      accordion_products_conteudo[index].classList.toggle('active')
    })
  })
</script>
<?php get_footer(); ?>