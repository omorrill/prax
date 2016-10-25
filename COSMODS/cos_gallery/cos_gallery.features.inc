<?php
/**
 * @file
 * cos_gallery.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function cos_gallery_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_image_default_styles().
 */
function cos_gallery_image_default_styles() {
  $styles = array();

  // Exported image style: gallery_image_grid.
  $styles['gallery_image_grid'] = array(
    'label' => 'gallery image grid',
    'effects' => array(),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function cos_gallery_node_info() {
  $items = array(
    'gallery_of_images' => array(
      'name' => t('Gallery of images'),
      'base' => 'node_content',
      'description' => t('Select or upload a number of images to display.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
