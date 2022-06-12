<?php
class Main_Menu_Walker extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 2, $args = array(), $id = 0)
  {
    $indent = str_repeat("\t", $depth);
    // // var_dump($permalink);
    $attr_target = !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    if ($depth == 0) {
      $item_classes = implode(' ', $item->classes);

      if ($item->url != '') {
        $arrow_svg = file_get_contents(get_template_directory_uri() . '/public/images/new-logo.svg');
        $output .= sprintf("\n<li class='%s c-main-menu__item'><a class='c-main-menu__link' onfocus='blur();' $attr_target href='%s'><span>%s</span></a>", $item_classes, $item->url, $item->title);
      } else {
        $output .= sprintf("\n<li class='%s c-main-menu__item'><span>%s</span>", $item_classes, $item->title);
      }
    } else if ($depth == 1) {
      $item_classes = implode(' ', $item->classes);
      $output .= sprintf("\n<li class='c-main-menu__sub-item'><a class='%s sub-menu-item' onfocus='blur();' $attr_target href='%s'>%s</a>", $item_classes, $item->url, $item->title);
    }
  }

  function end_el(&$output, $item, $depth = 1, $args = array(), $id = 0)
  {
    $output .= "</li>\n";
  }
}
