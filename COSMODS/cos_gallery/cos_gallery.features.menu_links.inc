<?php
/**
 * @file
 * cos_gallery.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function cos_gallery_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: navigation_gallery-of-images:node/add/gallery-of-images
  $menu_links['navigation_gallery-of-images:node/add/gallery-of-images'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/gallery-of-images',
    'router_path' => 'node/add/gallery-of-images',
    'link_title' => 'Gallery of images',
    'options' => array(
      'attributes' => array(
        'title' => 'Select or upload a number of images to display.',
      ),
      'identifier' => 'navigation_gallery-of-images:node/add/gallery-of-images',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 0,
    'parent_identifier' => 'navigation_add-content:node/add',
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Gallery of images');

  return $menu_links;
}
