<?php
/**
 * @file
 * mayors_blog.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function mayors_blog_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'create blog_entry content'.
  $permissions['create blog_entry content'] = array(
    'name' => 'create blog_entry content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'create blog_entry content on assigned domains'.
  $permissions['create blog_entry content on assigned domains'] = array(
    'name' => 'create blog_entry content on assigned domains',
    'roles' => array(
      'developer' => 'developer',
    ),
    'module' => 'domain',
  );

  // Exported permission: 'delete any blog_entry content'.
  $permissions['delete any blog_entry content'] = array(
    'name' => 'delete any blog_entry content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete blog_entry content on assigned domains'.
  $permissions['delete blog_entry content on assigned domains'] = array(
    'name' => 'delete blog_entry content on assigned domains',
    'roles' => array(
      'developer' => 'developer',
    ),
    'module' => 'domain',
  );

  // Exported permission: 'delete own blog_entry content'.
  $permissions['delete own blog_entry content'] = array(
    'name' => 'delete own blog_entry content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit any blog_entry content'.
  $permissions['edit any blog_entry content'] = array(
    'name' => 'edit any blog_entry content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit own blog_entry content'.
  $permissions['edit own blog_entry content'] = array(
    'name' => 'edit own blog_entry content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'update blog_entry content on assigned domains'.
  $permissions['update blog_entry content on assigned domains'] = array(
    'name' => 'update blog_entry content on assigned domains',
    'roles' => array(
      'developer' => 'developer',
    ),
    'module' => 'domain',
  );

  return $permissions;
}
