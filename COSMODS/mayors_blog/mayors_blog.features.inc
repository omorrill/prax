<?php
/**
 * @file
 * mayors_blog.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function mayors_blog_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "context" && $api == "context") {
    return array("version" => "3");
  }
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function mayors_blog_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function mayors_blog_image_default_styles() {
  $styles = array();

  // Exported image style: blog_slideshow_image.
  $styles['blog_slideshow_image'] = array(
    'name' => 'blog_slideshow_image',
    'label' => 'blog_slideshow_image',
    'effects' => array(
      6 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => 490,
          'height' => 290,
          'upscale' => 0,
        ),
        'weight' => -10,
      ),
      1 => array(
        'label' => 'Crop',
        'help' => 'Cropping will remove portions of an image to make it the specified dimensions.',
        'effect callback' => 'image_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_crop_form',
        'summary theme' => 'image_crop_summary',
        'module' => 'image',
        'name' => 'image_crop',
        'data' => array(
          'width' => 490,
          'height' => 290,
          'anchor' => 'center-center',
        ),
        'weight' => -9,
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function mayors_blog_node_info() {
  $items = array(
    'blog_entry' => array(
      'name' => t('Blog Entry'),
      'base' => 'node_content',
      'description' => t('Blog entry--automatically populates in Mayor\'s blog area when published.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
