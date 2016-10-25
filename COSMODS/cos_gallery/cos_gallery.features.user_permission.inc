<?php
/**
 * @file
 * cos_gallery.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function cos_gallery_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'create gallery_of_images content'.
  $permissions['create gallery_of_images content'] = array(
    'name' => 'create gallery_of_images content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'create gallery_of_images content on assigned domains'.
  $permissions['create gallery_of_images content on assigned domains'] = array(
    'name' => 'create gallery_of_images content on assigned domains',
    'roles' => array(),
    'module' => 'domain',
  );

  // Exported permission: 'delete any gallery_of_images content'.
  $permissions['delete any gallery_of_images content'] = array(
    'name' => 'delete any gallery_of_images content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete gallery_of_images content on assigned domains'.
  $permissions['delete gallery_of_images content on assigned domains'] = array(
    'name' => 'delete gallery_of_images content on assigned domains',
    'roles' => array(),
    'module' => 'domain',
  );

  // Exported permission: 'delete own gallery_of_images content'.
  $permissions['delete own gallery_of_images content'] = array(
    'name' => 'delete own gallery_of_images content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit any gallery_of_images content'.
  $permissions['edit any gallery_of_images content'] = array(
    'name' => 'edit any gallery_of_images content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit own gallery_of_images content'.
  $permissions['edit own gallery_of_images content'] = array(
    'name' => 'edit own gallery_of_images content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'update gallery_of_images content on assigned domains'.
  $permissions['update gallery_of_images content on assigned domains'] = array(
    'name' => 'update gallery_of_images content on assigned domains',
    'roles' => array(),
    'module' => 'domain',
  );

  return $permissions;
}
