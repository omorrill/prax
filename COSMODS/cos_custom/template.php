<?php

/**
 * Here we override the default HTML output of drupal.
 * refer to http://drupal.org/node/550722
 */


/**
 * Preprocessor function for html.tpl.php.
 */
function cos_custom_preprocess_html(&$vars) {
  global $user;

  $vars['classes_array'][] = 'main-drop-menus';
  $vars['classes_array'][] = 'search-fade';

  if (theme_get_setting('color_select') && theme_get_setting('color_select') != 'default') {
    $vars['classes_array'][] = theme_get_setting('color_select');
  }

  //Add role name classes (to allow css based show for admin/hidden from user)
  foreach ($user->roles as $role){
    $vars['classes_array'][] = 'role-' . cos_custom_id_safe($role);
  }

  if (!$vars['is_front']) {
    // Add unique classes for each page and website section
    $path = drupal_get_path_alias($_GET['q']);
    list($section, ) = explode('/', $path, 2);
    $vars['classes_array'][] = 'with-subnav';
    $vars['classes_array'][] = cos_custom_id_safe('page-'. $path);
    $vars['classes_array'][] = cos_custom_id_safe('section-'. $section);

    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        if ($section == 'node') {
          // Remove 'section-node'
          array_pop( $vars['classes_array'] );
        }
        // Add 'section-node-add'
        $vars['classes_array'][] = 'section-node-add';
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        if ($section == 'node') {
          // Remove 'section-node'
          array_pop( $vars['classes_array']);
        }
        // Add 'section-node-edit' or 'section-node-delete'
        $vars['classes_array'][] = 'section-node-'. arg(2);
      }
    }
  }
  //for normal un-themed edit pages
  if ((arg(0) == 'node') && (arg(2) == 'edit')) {
    $vars['template_files'][] =  'page';
  }

  // Add IE classes.
  if (theme_get_setting('cos_custom_ie_enabled')) {
    $cos_custom_ie_enabled_versions = theme_get_setting('cos_custom_ie_enabled_versions');
    if (in_array('ie8', $cos_custom_ie_enabled_versions, TRUE)) {
      drupal_add_css(path_to_theme() . '/css/ie8.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE), 'preprocess' => FALSE));
      drupal_add_js(path_to_theme() . '/js/selectivizr-min.js');
    }
    if (in_array('ie9', $cos_custom_ie_enabled_versions, TRUE)) {
      drupal_add_css(path_to_theme() . '/css/ie9.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 9', '!IE' => FALSE), 'preprocess' => FALSE));
    }
    if (in_array('ie10', $cos_custom_ie_enabled_versions, TRUE)) {
      drupal_add_css(path_to_theme() . '/css/ie10.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 10', '!IE' => FALSE), 'preprocess' => FALSE));
    }
  }
}

/**
 * Implements hook_preprocess_page().
 */
function cos_custom_preprocess_page(&$vars, $hook) {
  // If an image is shown at the top of content, we need to let the title know.
  if (isset($vars['page']['content_top']['cck_blocks_field_image'])) {
    // Place the title in the content top area.
    $vars['page']['content_top']['title'] = array(
      '#markup' => '<h1 class="title content-image">' . drupal_get_title() . '</h1>',
    );

    // Hide the normal page title by setting it to nothing.
    drupal_set_title('');
  }

  // Add a background image (based on department context).
  if ($background_image = _cos_custom_get_background_image_url()) {
    $vars['attributes_array']['style'] = "background: url($background_image) no-repeat center center fixed; background-size: cover;";
  }

  if (isset($vars['node_title'])) {
    $vars['title'] = $vars['node_title'];
  }
  // Adding classes whether #navigation is here or not
  if (!empty($vars['main_menu']) or !empty($vars['sub_menu'])) {
    $vars['classes_array'][] = 'with-navigation';
  }
  if (!empty($vars['secondary_menu'])) {
    $vars['classes_array'][] = 'with-subnav';
  }
  if (!empty($vars['page']['highlighted_full'])) {
    $vars['classes_array'][] = 'with-highlighted-full';
  }
  if (!empty($vars['page']['highlighted'])) {
    $vars['classes_array'][] = 'with-highlighted';
  }

  // Remove title if delta blocks is enabled--let it manage placement.
  if (module_exists('delta_blocks')) {
    $vars['title'] = FALSE;
  }

  // Add first/last classes to node listings about to be rendered.
  if (isset($vars['page']['content']['system_main']['nodes'])) {
    // All nids about to be loaded (without the #sorted attribute).
    $nids = element_children($vars['page']['content']['system_main']['nodes']);
    // Only add first/last classes if there is more than 1 node being rendered.
    if (count($nids) > 1) {
      $first_nid = reset($nids);
      $last_nid = end($nids);
      $first_node = $vars['page']['content']['system_main']['nodes'][$first_nid]['#node'];
      $first_node->classes_array = array('first');
      $last_node = $vars['page']['content']['system_main']['nodes'][$last_nid]['#node'];
      $last_node->classes_array = array('last');
    }
  }

  // Allow page override template suggestions based on node content type.
  if (isset($vars['node']->type) && isset($vars['node']->nid)) {
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
    $vars['theme_hook_suggestions'][] = "page__node__" . $vars['node']->nid;
  }

  if (isset($vars['section_title']) &&
     (($vars['section_title'] == 'not-found') || $vars['section_title'] == 'not-authd')) {
    unset($vars['page']['content']['system_main']);
  }
}

function cos_custom_get_image_credit($file_name, $domain_id) {
  $credits = array(
    1 => array(
      'default.jpg' => array(
        // 'name' => 'Victor Bonomi',
        // 'link' => 'http://www.flickr.com/photos/vbonomi',
      ),
      'afa.jpg' => array(
        'name' => 'Jeff Maurone',
        'link' => 'http://www.flickr.com/photos/jeffmaurone',
      ),
      'dream_catcher.jpg' => array(),
      'field_tractor.jpg' => array(),
      'gotg.jpg' => array(
        'name' => 'Steve Berardi',
        'link' => 'http://www.flickr.com/photos/steveberardi/',
      ),
      'grass.jpg' => array(),
      'leaves_autumn.jpg' => array(),
      'leaves_on_deck.jpg' => array(),
      'morning_glory.jpg' => array(),
      'pikes_peak_summit.jpg' => array(
        'name' => 'geekoftheweek',
        'link' => 'http://www.flickr.com/photos/geekoftheweek/',
      ),
      'pine_cones.jpg' => array(),
      'raindrops_downtown.jpg' => array(),
      'raindrops_leaf.jpg' => array(),
      'rolling_hills.jpg' => array(),
      'sunny_field_closeup.jpg' => array(),
      'tree_no_leaves.jpg' => array(),
      'wheat_closeup.jpg' => array(),
    ),
    5 => array(
      'book.jpg' => array(),
      'computer_table.jpg' => array(),
      'default.jpg' => array(),
      'ideas_computer.jpg' => array(),
      'meeting_at_cafe.jpg' => array(),
      'tech_gear.jpg' => array(),
      'typing.jpg' => array(),
    ),
    4 => array(
      'default.jpg' => array(),
      'forest_sunset.jpg' => array(),
      'gotg_peak.jpg' => array(
        'name' => 'Victor Bonomi',
        'link' => 'http://www.flickr.com/photos/vbonomi/'
      ),
      'gotg_pikes_peak.jpg' => array(
        'name' => 'Dave Soldano',
        'link' => 'http://www.flickr.com/photos/davesoldano',
      ),
      'grassy_trail.jpg' => array(),
      'mossy_trail.jpg' => array(),
      'nuts_wood.jpg' => array(),
      'pine_cones.jpg' => array(),
      'red_rock_canyon.jpg' => array(
        'name' => 'Mark Byzewski',
        'link' => 'http://www.flickr.com/photos/markbyzewski/',
      ),
      'sunny_field_closeup.jpg' => array(),
      'wood-pile.jpg' => array(),
    ),
    3 => array(
      'default.jpg' => array(),
      'gold_camp_road.jpg' => array(),
      'hwy24.jpg' => array(),
      'metro_bus.jpg' => array(),
      'railroad.jpg' => array(),
      'road_rockys.jpg' => array(),
      'windy_road.jpg' => array(),
    ),
  );
  return (isset($credits[$domain_id][$file_name])) ? $credits[$domain_id][$file_name] : FALSE;
}

/**
 * Preprocessor function for node.tpl.php.
 */
function cos_custom_preprocess_node(&$vars) {
  // Add a striping class.
  $vars['classes_array'][] = 'node-' . $vars['zebra'];

  // Add $unpublished variable.
  $vars['unpublished'] = (!$vars['status']) ? TRUE : FALSE;

  // Merge first/last class (from cos_custom_preprocess_page) into classes
  // array of current node object.
  $node = $vars['node'];
  if (!empty($node->classes_array)) {
    $vars['classes_array'] = array_merge($vars['classes_array'], $node->classes_array);
  }
  // If this is an event and has an image, move the submitted by text.
  if ($node->type == 'event' && isset($node->field_image) && isset($node->field_image[LANGUAGE_NONE][0])) {
    $vars['content']['submitted'] = array(
      // Between event info and body.
      '#weight' => 6.5,
      '#markup' => '<div class="submitted">' . $vars['submitted'] . '</div>',
    );
    $vars['display_submitted'] = FALSE;
  }
}

/**
 * Preprocessor function for block.tpl.php.
 */
function cos_custom_preprocess_block(&$vars, $hook) {
  // Add a striping class.
  $vars['classes_array'][] = 'block-' . $vars['block_zebra'];

  // Add first/last block classes
  $first_last = "";
  // If block id (count) is 1, it's first in region.
  if ($vars['block_id'] == '1') {
    $first_last = "first";
    $vars['classes_array'][] = $first_last;
  }

  // Include a clearfix on /almost/ every region.
  if (!in_array($vars['elements']['#block']->region, array('header_under'))) {
    $vars['classes_array'][] = 'clearfix';
  }
}

/**
 * Preprocessor function for region.tpl.php.
 */
function cos_custom_preprocess_region(&$vars) {
  if ($vars['region'] == 'header_under' && count(element_children($vars['elements'])) > 1) {
    $vars['classes_array'][] = 'multiple-blocks';
    $vars['classes_array'][] = 'clearfix';
  }
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function cos_custom_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('cos_custom_breadcrumb');
  if ($show_breadcrumb == 'yes' || $show_breadcrumb == 'admin' && arg(0) == 'admin') {

    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('cos_custom_breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }

    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $breadcrumb_separator = theme_get_setting('cos_custom_breadcrumb_separator');
      $trailing_separator = $title = '';
      if (theme_get_setting('cos_custom_breadcrumb_title')) {
        $item = menu_get_item();
        if (!empty($item['tab_parent'])) {
          // If we are on a non-default tab, use the tab's title.
          $title = check_plain($item['title']);
        }
        else {
          $title = drupal_get_title();
        }
        if ($title) {
          $trailing_separator = $breadcrumb_separator;
        }
      }
      elseif (theme_get_setting('cos_custom_breadcrumb_trailing')) {
        $trailing_separator = $breadcrumb_separator;
      }

      // Provide a navigational heading to give context for breadcrumb links to
      // screen-reader users. Make the heading invisible with .element-invisible.
      $heading = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

      return $heading . '<div class="breadcrumb">' . implode($breadcrumb_separator, $breadcrumb) . $trailing_separator . $title . '</div>';
    }
  }
  // Otherwise, return an empty string.
  return '';
}

/**
 * Converts a string to a suitable html ID attribute.
 *
 * http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
 * valid ID attribute in HTML. This function:
 *
 * - Ensure an ID starts with an alpha character by optionally adding an 'n'.
 * - Replaces any character except A-Z, numbers, and underscores with dashes.
 * - Converts entire string to lowercase.
 *
 * @param $string
 *  The string
 * @return
 *  The converted string
 */
function cos_custom_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  $string = strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
  // If the first character is not a-z, add 'n' in front.
  if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
    $string = 'id'. $string;
  }
  return $string;
}

/**
 * Generate the HTML output for a menu link and submenu.
 *
 * @param $variables
 *  An associative array containing:
 *   - element: Structured array data for a menu link.
 *
 * @return
 *  A themed HTML string.
 *
 * @ingroup themeable
 *
 */
function cos_custom_menu_link(array $variables) {
  $element = $variables['element'];
  $original_link = $element['#original_link'];
  $sub_menu = '';

  if ($element['#below']) {
    $toggle = '<span class="submenu-toggle submenu-toggle-' . $original_link['depth'] . '"></span>';
    $sub_menu = $toggle . drupal_render($element['#below']);
  }

  if ($original_link['menu_name'] == 'main-menu') {
    $element['#localized_options'] += array(
      'html' => TRUE,
    );
    $element['#title'] = '<span class="link-wrapper">' . $element['#title'] . '</span>';
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  // Add depth class.
  $element['#attributes']['class'][] = 'depth-' . $original_link['depth'];
  // Adding a class depending on the TITLE of the link (not constant)
  $element['#attributes']['class'][] = cos_custom_id_safe($element['#title']);
  // Adding a class depending on the ID of the link (constant)
  $element['#attributes']['class'][] = 'mid-' . $element['#original_link']['mlid'];

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Override or insert variables into theme_menu_local_task().
 */
function cos_custom_preprocess_menu_local_task(&$variables) {
  $link =& $variables['element']['#link'];

  // If the link does not contain HTML already, check_plain() it now.
  // After we set 'html'=TRUE the link will not be sanitized by l().
  if (empty($link['localized_options']['html'])) {
    $link['title'] = check_plain($link['title']);
  }
  $link['localized_options']['html'] = TRUE;
  $link['title'] = '<span class="tab">' . $link['title'] . '</span>';
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function cos_custom_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override for theme_container.
 *
 * Extends containers with a title.
 */
function cos_custom_container($variables) {
  $element = $variables['element'];
  $title = '';

  // Added this. This should be default.
  if (!isset($element['#attributes']['class']) || !is_string($element['#attributes']['class'])) {
    $element['#attributes']['class'][] = 'container';
  }

  // Special handling for form elements.
  if (isset($element['#array_parents'])) {
    // Assign an html ID.
    if (!isset($element['#attributes']['id'])) {
      $element['#attributes']['id'] = $element['#id'];
    }
    // Add the 'form-wrapper' class.
    $element['#attributes']['class'][] = 'form-wrapper';
  }
  // Allow a title for the container.
  if (!empty($element['#title'])) {
    $title = '<label class="container-title">' . $element['#title'] . '</label>';
  }

  return '<div' . drupal_attributes($element['#attributes']) . '>' . $title . $element['#children'] . '</div>';
}

/**
 * Returns the rendered site name.
 *
 * Override for delta blocks to make sure it shows as active appropriately.
 */
function cos_custom_delta_blocks_site_name($variables) {
  // If there is no page title set for this page, use a h1 for the site name.
  $tag = drupal_get_title() !== '' ? 'h2' : 'h1';
  $site_name = $variables['site_name'];

  if ($variables['site_name_linked']) {
    $options['html'] = TRUE;
    $options['attributes']['title'] = t('Return to the @name home page', array('@name' => $variables['site_name']));

    if (drupal_is_front_page()) {
      $options['attributes']['class'][] = 'active';
    }

    $link = array(
      '#theme' => 'link',
      '#path' => '<front>',
      '#text' => '<span>' . $site_name . '</span>',
      '#options' => $options,
    );

    $site_name = render($link);
  }

  $attributes['class'] = array('site-name');

  if ($variables['site_name_hidden']) {
    $attributes['class'][] = 'element-invisible';
  }

  return '<' . $tag . drupal_attributes($attributes) . '>' . $site_name . '</' . $tag . '>';
}

/**
 * Preprocessor function for search-result.tpl.php.
 */
function cos_custom_preprocess_search_result(&$vars) {
  $image = '';
  $path = '';
  $image = $vars['result']['fields']['sm_field_image'];
  $video = $vars['result']['fields']['sm_field_video'];
  if (!empty($image) && $image[0] != '') {
    // There should only ever be one of these so assume getting index 0 is ok.
    $path = $image[0];
  }
  elseif (!empty($video) && $video[0] != '') {
    $path = $video[0];
  }
  $options = array(
    'style_name' => 'promoted_image',
    'path' => $path,
    'height' => '',
    'width' => '',
    'alt' => $vars['result']['title'],
    'title' => $vars['result']['title'],
  );
  $vars['image'] = ($path != '') ? theme_image_style($options) : NULL;

  // Modify what information is shown in the info string.

  // Hide the content author and date (which is added again below).
  $date = strtotime($vars['info_split']['date']);
  unset($vars['info_split']['user'], $vars['info_split']['date']);

  // If the information is present, show the domain the content is posted to.
  if (!empty($vars['result']['fields']['sm_domain_name']) && !empty($vars['result']['fields']['sm_domain_path'])) {

    $name = (is_array($vars['result']['fields']['sm_domain_name'])) ? $vars['result']['fields']['sm_domain_name'][0] : $vars['result']['fields']['sm_domain_name'];
    $path = $vars['result']['fields']['sm_domain_path'];

    // Setting the absolute to true via l() isn't working so force it to be absolute.
    if (mobile_domain_check_domain()) {
      // If we're mobile we want to get the mobile path (which should be stored.
      // If it's not stored then assume m. is correct.
      if (is_array($path) && count($path) > 1) {
        $path = $path[1];
      }
      else {
        $path = 'm.' . $path[0];
      }
    }
    else {
      $path = (is_array($path)) ? $path[0] : $path;
    }

    $vars['info_split']['domain'] = l($name, 'http://' . $path);
  }

  // Make date prettier.
  $vars['info_split']['date'] = date('m/d/Y', $date);

  // Combine all info.
  $vars['info'] = implode(' - ', $vars['info_split']);
}

/**
 * Preprocessor for maintenance/error pages.
 *
 * Swaps logo for one that looks good on a light background.
 */
function cos_custom_preprocess_maintenance_page(&$vars) {
  $maintenance_logo = path_to_theme() . '/images/logos/logo_city_footer@2x.png';
  $file_exists = file_exists($maintenance_logo);

  $vars['logo'] = ($file_exists) ? url($maintenance_logo) : $vars['logo'];
}

/**
 * Preprocessor for mimemail-message.tpl.php to give us a few extra variables.
 */
function cos_custom_preprocess_mimemail_message(&$vars) {
  $mail_logo = path_to_theme() . '/images/logos/logo_city_footer.png';
  $file_exists = file_exists($mail_logo);

  $vars['logo'] = ($file_exists) ? url($mail_logo, array('absolute' => TRUE)) : '';
  $vars['front_page'] = url();
}

/**
 * Get the background image url for a department context.
 *
 * @return string|boolean The background image url or FALSE if not found.
 */
function _cos_custom_get_background_image_url() {
  $url = FALSE;

  // Check for an active department context.
  if (module_exists('context')) {
    $contexts = context_active_contexts();
    foreach ($contexts as $context) {
      if (drupal_strtolower(trim($context->tag)) == 'departments') {
        $tid = isset($context->conditions['node_taxonomy']['values']) ? reset($context->conditions['node_taxonomy']['values']) : FALSE;
        if (is_numeric($tid) && $term = taxonomy_term_load($tid)) {
          if (!empty($term->field_image[LANGUAGE_NONE][0]['uri'])) {
            $url = file_create_url($term->field_image[LANGUAGE_NONE][0]['uri']);
          }
        }
      }
    }
  }

  // Check for a default image if a context was not found.
  if (!$url && $fid = theme_get_setting('default_department_image')) {
    if ($file = file_load($fid)) {
      $url = file_create_url($file->uri);
    }
  }

  return $url;
}
