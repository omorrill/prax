<?php
/**
 * @file
 * mayors_blog.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function mayors_blog_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'mayors_blog';
  $context->description = '';
  $context->tag = 'mayor';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '*blog' => '*blog',
        '*blog/*' => '*blog/*',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'menu_block-1' => array(
          'module' => 'menu_block',
          'delta' => '1',
          'region' => 'sidebar_first',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('mayor');
  $export['mayors_blog'] = $context;

  return $export;
}
