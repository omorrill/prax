<?php

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function city_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' » ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Implement THEME_menu_tree__menu_MENU_NAME().
 */
function city_menu_tree__menu_top_links(&$variables) {
  return '<ul class="menu nav nav-pills pull-right">' . $variables['tree'] . '</ul>';
}

/**
 * Implements hook_preprocess_block()
 */

function city_preprocess_block(&$vars) {
  /* Set shortcut variables. Hooray for less typing! */
  $block_id = $vars['block']->module . '-' . $vars['block']->delta;
  $classes = &$vars['classes_array'];
  $title_classes = &$vars['title_attributes_array']['class'];
  $content_classes = &$vars['content_attributes_array']['class'];

  /* Add global classes to all blocks */
  $title_classes[] = 'block-title';
  $content_classes[] = 'block-content';

  /* Uncomment the line below to see variables you can use to target a field */
  #print $block_id . '<br/>';

  /* Add classes based on the block delta. */
  switch ($block_id) {
    /* System Navigation block */
    case 'system-navigation':
      $classes[] = 'block-rounded';
      $title_classes[] = 'block-fancy-title';
      $content_classes[] = 'block-fancy-content';
      break;
    /* Main Menu block */
    case 'system-main-menu':
    /* User Login block */
    case 'user-login':
      $title_classes[] = 'element-invisible';
      break;
    case 'block-47':
      $classes[] = 'hero-body';
      $title_classes[] = '';
      $content_classes[] = '';
      break;
  }
}

function city_preprocess_html(&$variables) {
  $variables['classes_array'][] = "regular-font";
}
