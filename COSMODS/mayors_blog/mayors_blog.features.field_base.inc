<?php
/**
 * @file
 * mayors_blog.features.field_base.inc
 */

/**
 * Implements hook_field_default_field_bases().
 */
function mayors_blog_field_default_field_bases() {
  $field_bases = array();

  // Exported field_base: 'field_back_to_blog'
  $field_bases['field_back_to_blog'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_back_to_blog',
    'field_permissions' => array(
      'type' => 0,
    ),
    'foreign keys' => array(),
    'global_block_settings' => 1,
    'indexes' => array(),
    'locked' => 0,
    'module' => 'link',
    'settings' => array(
      'attributes' => array(
        'class' => '',
        'rel' => '',
        'target' => 'default',
      ),
      'display' => array(
        'url_cutoff' => 80,
      ),
      'enable_tokens' => 1,
      'title' => 'optional',
      'title_maxlength' => 128,
      'title_value' => '',
      'url' => 0,
    ),
    'translatable' => 0,
    'type' => 'link_field',
  );

  // Exported field_base: 'field_blog_slideshow'
  $field_bases['field_blog_slideshow'] = array(
    'active' => 1,
    'cardinality' => -1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_blog_slideshow',
    'field_permissions' => array(
      'type' => 0,
    ),
    'foreign keys' => array(),
    'global_block_settings' => 1,
    'indexes' => array(
      'revision_id' => array(
        0 => 'revision_id',
      ),
    ),
    'locked' => 0,
    'module' => 'field_collection',
    'settings' => array(
      'hide_blank_items' => 1,
      'path' => '',
    ),
    'translatable' => 0,
    'type' => 'field_collection',
  );

  // Exported field_base: 'field_blog_slideshow_caption'
  $field_bases['field_blog_slideshow_caption'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_blog_slideshow_caption',
    'field_permissions' => array(
      'type' => 0,
    ),
    'foreign keys' => array(
      'format' => array(
        'columns' => array(
          'format' => 'format',
        ),
        'table' => 'filter_format',
      ),
    ),
    'global_block_settings' => 1,
    'indexes' => array(
      'format' => array(
        0 => 'format',
      ),
    ),
    'locked' => 0,
    'module' => 'text',
    'settings' => array(
      'max_length' => 600,
    ),
    'translatable' => 0,
    'type' => 'text',
  );

  return $field_bases;
}
