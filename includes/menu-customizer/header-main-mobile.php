<?php
class Main_Menu_Mobile_Walker extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 2, $args = array(), $id = 0)
  {
    $indent = str_repeat("\t", $depth);

    // var_dump($item);
    $item_has_child = array_search('menu-item-has-children', $item->classes) !== FALSE;

    // var_dump($depth);
    $atts['target'] = !empty($item->target) ? $item->target : '';
    // var_dump($atts['target']);

    $chevron_subitem = $item_has_child ? '<span class="js-open-submenu"></span>' : '';

    if ($depth == 0) {
      $item_classes = implode(' ', $item->classes);
      $output .= sprintf("\n<li class='c-main-menu-mobile__item c-main-menu-mobile__item-parent'><span class='c-main-menu-mobile__item-parent-color c-main-menu-mobile__item-parent-color--hidden' class='c-main-menu-mobile__item-color-bar'></span><a class='c-main-menu-mobile__link %s' target='%s' onfocus='blur();' href='%s'><span class='c-main-menu-mobile__title'>%s</span> %s</a>", $item_classes, $atts['target'], $item->url, $item->title, $chevron_subitem);
    } else if ($depth == 1) {
      $item_classes = implode(' ', $item->classes);
      $output .= sprintf("\n<li class='c-main-menu-mobile__sub-item'><a class='%s sub-menu-item js-menu-posts-hover' onfocus='blur();' href='%s'><span class='c-main-menu-mobile__title'>%s</span></a>", $item_classes, $item->url, $item->title);
    }
  }

  function end_el(&$output, $item, $depth = 2, $args = array(), $id = 0)
  {
    $item_has_child = array_search('menu-item-has-children', $item->classes) !== FALSE;
    $indent = str_repeat("\t", 1);
    if ($depth == 0) {
      $item_classes = implode(' ', $item->classes);
      $output .= "</li>\n";
    } else if ($depth == 1) {
      $item_classes = implode(' ', $item->classes);
      $output .= "</li>\n";
    }
  }
}
