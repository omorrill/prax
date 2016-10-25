<?php

// Form override fo theme settings
function cos_custom_form_system_theme_settings_alter(&$form, $form_state) {

  $form['options_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Specific Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE
  );

  $form['options_settings']['color'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Base Color'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE
  );

  $form['options_settings']['color']['color_select'] = array(
    '#type' => 'select',
    '#title' => t('Color Scheme'),
    '#description' => t('The main color scheme of the site.'),
    '#default_value' => theme_get_setting('color_select'),
    '#options' => array(
      'default' => t('Default'),
      'red' => t('Red'),
      'blue' => t('Blue'),
    ),
  );

  // IE specific settings.
  $form['options_settings']['cos_custom_ie'] = array(
    '#type' => 'fieldset',
    '#title' => t('Internet Explorer Stylesheets'),
    '#attributes' => array('id' => 'basic-ie'),
  );
  $form['options_settings']['cos_custom_ie']['cos_custom_ie_enabled'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Internet Explorer stylesheets in theme'),
    '#default_value' => theme_get_setting('cos_custom_ie_enabled'),
    '#description' => t('If you check this box you can choose which IE stylesheets in theme get rendered on display.'),
  );
  $form['options_settings']['cos_custom_ie']['cos_custom_ie_enabled_css'] = array(
    '#type' => 'fieldset',
    '#title' => t('Check which IE versions you want to enable additional .css stylesheets for.'),
    '#states' => array(
      'visible' => array(
        ':input[name="cos_custom_ie_enabled"]' => array('checked' => TRUE),
      ),
    ),
  );
  $form['options_settings']['cos_custom_ie']['cos_custom_ie_enabled_css']['cos_custom_ie_enabled_versions'] = array(
    '#type' => 'checkboxes',
    '#options' => array(
      'ie8' => t('Internet Explorer 8'),
      'ie9' => t('Internet Explorer 9'),
      'ie10' => t('Internet Explorer 10'),
    ),
    '#default_value' => theme_get_setting('cos_custom_ie_enabled_versions'),
  );

  $form['options_settings']['default_department_image'] = array(
    '#title' => t('Background Image'),
    '#type' => 'managed_file',
    '#description' => t('The uploaded image will be displayed on the home page and any department without an image.'),
    '#default_value' => theme_get_setting('default_department_image'),
    '#upload_location' => 'public://department_image/',
  );

  $form['options_settings']['clear_registry'] = array(
    '#type' => 'checkbox',
    '#title' =>  t('Rebuild theme registry on every page.'),
    '#description'   =>t('During theme development, it can be very useful to continuously <a href="!link">rebuild the theme registry</a>. WARNING: this is a huge performance penalty and must be turned off on production websites.', array('!link' => 'http://drupal.org/node/173880#theme-registry')),
    '#default_value' => theme_get_setting('clear_registry'),
  );
}
