<!doctype html>
<html lang="pt-br">
<?php
$theme_version = wp_get_theme();
$theme_version = $theme_version->get('Version');
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php site_icon_url() ?>" type="image/x-icon">
  <title>
    <?php
    if (is_page_template('home') || is_page('home') || is_home()) :
      echo get_bloginfo('name') . " | " . get_bloginfo('description');
    elseif (is_shop()) : ?>
      <?php wp_title("|"); ?>
    <?php else : ?>
      <?php bloginfo('name') ?> | <?= get_the_title() ?>
    <?php endif; ?>
  </title>
  <!--<link rel="preload" href="<?php bloginfo('template_url'); ?>/public/css/main.css?ver=<?php echo $theme_version; ?>" as="style" onload="this.rel='stylesheet'">-->

  <link rel="preload" href="<?php bloginfo('template_url'); ?>/public/css/main.css" as="style" onload="this.rel='stylesheet'">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
  <!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.helper.ie8.js"></script><![endif]-->
</head>
<?php wp_head() ?>

<body <?php body_class() ?>>
  <header class="header stick">
    <div class="header_holder">
      <div class="header-top">

      </div>
      <div class="header-middle">
        <div class="container-wrap">

          <div class="header-middle_holder header-middle-desktop">
            <div class="header-middle--left">
              <nav class="menu_holder">
                <?php wp_nav_menu(array(
                  'menu' => 'principal'
                )) ?>
              </nav>
            </div>
            <div class="header-middle-center">
              <div class="logo-container">
                <a href="<?= site_url() ?>">
                  <img src="<?= site_url() ?>/wp-content/uploads/logo.png" alt="<?= get_bloginfo('name') . " | " . get_bloginfo('description') ?>">
                </a>
              </div>
            </div>
            <div class="header-middle-right">
              <nav class="menu-loja_holder flex_item">
                <?php wp_nav_menu(array(
                  'menu' => 'right'
                )) ?>
              </nav>
            </div>
          </div>

          <div class="header-middle_holder header-middle-mobile">
            <div class="header-middle-center">
              <div class="logo-container">
                <a href="<?= site_url() ?>">
                  <img src="<?= site_url() ?>/wp-content/uploads/logo.png" alt="<?= get_bloginfo('name') . " | " . get_bloginfo('description') ?>">
                </a>
              </div>
            </div>
            <div class="header-middle-right">
              <span class="hamburguer-menu">
                <img src="<?= site_url() ?>/wp-content/uploads/hamburguer-menu.png" alt="<?= get_bloginfo('name') ?> | Hamburguer Menu">
              </span>
            </div>
            <div class="header-middle-menu">
              <nav class="menu_holder">
                <?php wp_nav_menu(array(
                  'menu' => 'principal',
                  'walker' => new Main_Menu_Mobile_Walker()
                )) ?>
              </nav>
            </div>
          </div>


        </div>
      </div>
    </div>
  </header>