<?php

define('PATHS_INC', TEMPLATEPATH . '/includes');

require_once(PATHS_INC . '/menu-customizer/header-main.php');
require_once(PATHS_INC . '/menu-customizer/header-main-mobile.php');

global $DIR_IMG;
$DIR_IMG = get_template_directory_uri() . '/public/images';

function dp8_css()
{
  wp_enqueue_style('style-wordpress', get_stylesheet_uri());
  //wp_enqueue_style('childstyle', get_stylesheet_directory_uri() . '/assets/css/style.main.css');
}
add_action('wp_enqueue_scripts', 'dp8_css');

function wp_custom_script()
{
  wp_register_script('siema-js', get_stylesheet_directory_uri() . '/assets/js/siema.min.js', array(), false, false);
  wp_register_script('siema-dots', get_stylesheet_directory_uri() . '/assets/js/siema-dots.js', array('siema-js'), false, false);
  wp_enqueue_script('FontAwesome', 'https://kit.fontawesome.com/9dd9385575.js', array(), false, false);
  //wp_enqueue_script('siema-dots');

  wp_enqueue_script('Module', get_stylesheet_directory_uri(), '/public/js/app.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'wp_custom_script', 10);

function add_type_attribute($tag, $handle, $src)
{
  // if not your script, do nothing and return original $tag
  if ('Module' !== $handle) {
    return $tag;
  }
  // change the script tag by adding type="module" and return it.
  $tag = '<script type="module" id="app-module" src="' . get_stylesheet_directory_uri() . '/public/js/app.js"></script>';
  return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

add_theme_support('menus');
add_theme_support('widgets');

function add_woocommerce_support()
{
  add_theme_support('woocommerce');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'add_woocommerce_support');




if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'    => 'Tema',
    'menu_title'    => 'Tema',
    'menu_slug'     => 'tema',
    'redirect'      => true,
    'position'      => '3.1',
    'icon_url'      =>  'https://nofacestylist.com/wp-content/uploads/fav-icon-2-e1647634674301.png',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Logos',
    'menu_title' => 'Logos',
    'parent_slug' => 'tema',
    'menu_slug'   => 'tema-logo',
    'post_id' => 'opt-logo',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Footer',
    'menu_title' => 'Footer',
    'parent_slug' => 'tema',
    'menu_slug'   => 'tema-footer',
    'post_id' => 'opt-footer',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Redes Sociais',
    'menu_title' => 'Redes Sociais',
    'parent_slug' => 'tema',
    'menu_slug'   => 'redes-sociais',
    'post_id' => 'opt-social',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Atendente Loja',
    'menu_title' => 'Atendente Loja',
    'parent_slug' => 'tema',
    'menu_slug'   => 'atendendete-loja',
    'post_id' => 'opt-atendente',
  ));
}

if (function_exists('acf_add_local_field_group')) :

  acf_add_local_field_group(array(
    'key' => 'group_6050f48e3d492',
    'title' => 'Logo',
    'fields' => array(
      array(
        'key' => 'field_6050f59911dc2',
        'label' => 'Desktop',
        'name' => 'desktop',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'url',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
      array(
        'key' => 'field_6050f5aa11dc3',
        'label' => 'Mobile',
        'name' => 'mobile',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'url',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
      array(
        'key' => 'field_60521c3a3a72a',
        'label' => 'Fav Icon',
        'name' => 'fav_icon',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'tema-logo',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));

  acf_add_local_field_group(array(
    'key' => 'group_60916d850c349',
    'title' => 'Type Form',
    'fields' => array(
      array(
        'key' => 'field_60916e4cc15ab',
        'label' => 'Codigo',
        'name' => 'codigo',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'new_lines' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'type-form.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));

endif;

function format_products($products, $img_size = 'full')
{
  $products_final = [];
  foreach ($products as $product) {
    $products_final[] = [
      'id' => $product->get_id(),
      'name' => $product->get_name(),
      'price' => $product->get_price_html(),
      'link' => $product->get_permalink(),
      'short' => $product->short_description,
      'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
    ];
  }
  return $products_final;
}

function limita_caracteres($texto, $limite, $quebra = true)
{
  $tamanho = strlen($texto);
  if ($tamanho <= $limite) { //Verifica se o tamanho do texto é menor ou igual ao limite
    $novo_texto = $texto;
  } else { // Se o tamanho do texto for maior que o limite
    if ($quebra == true) { // Verifica a opção de quebrar o texto
      $novo_texto = trim(substr($texto, 0, $limite)) . "...";
    } else { // Se não, corta $texto na última palavra antes do limite
      $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
      $novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . "..."; // Corta o $texto até a posição localizada
    }
  }
  return $novo_texto; // Retorna o valor formatado
}

function handel_product_list($products)
{
?>
  <?php foreach ($products as $product) { ?>
    <?php $resumo = strlen($product['short']); ?>
    <div <?php wc_product_class('product-item', $product); ?>>
      <a href="<?= $product['link']; ?>">
        <div class="product-info">
          <img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
          <div class="product-description text-center">
            <h2 class="text-medium "><?= $product['name']; ?></h2>
            <div class="price-product">
              <span><?= $product['price']; ?></span>
            </div>
            <div class="short-description" style="display: none;">
              <p class="text-tiny"><?= $resumo ?></p>
            </div>
          </div>
          <div class="button-container">
            <span class="btn btn-comprar button-center"><img src="<?= site_url() ?>/wp-content/uploads/shopping_bag.png" alt=""> Comprar</span>
          </div>
        </div>
      </a>
      <a href="?add-to-cart=<?= $product['id'] ?>" class="product-overlay">
        <img src="<?= site_url() ?>/wp-content/uploads/icon-cart.png" alt="">
      </a>
    </div>
  <?php } ?>
<?php
} // Fecha a função handel

function novo_tamanho_do_resumo($length)
{
  return 12;
}

add_filter('excerpt_length', 'novo_tamanho_do_resumo');

function script_accordion()
{
?>
  <script>
    const accordion_holder = document.querySelectorAll('.accordion')
    const accordion_conteudo = document.querySelectorAll('.accordion-conteudo')

    accordion_holder.forEach((item, index) => {
      item.addEventListener('click', () => {
        accordion_conteudo[index].classList.toggle('active')
        accordion_holder[index].classList.toggle('active')
      })
    })
  </script>
  <?php
}
add_action('wp_footer', 'script_accordion');

function hero_header()
{
  if (have_rows('banner')) : ?>
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
          <span class="arrows arrows-left"><i class="fas fa-chevron-left fa-lg text-white"></i></span>
          <span class="arrows arrows-right"><i class="fas fa-chevron-right fa-lg text-white"></i></span>
        </div>

      </div>
    </section>
<?php endif;
}
