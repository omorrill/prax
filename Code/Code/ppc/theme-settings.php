<?php

function ppc_form_system_theme_settings_alter(&$form, $form_state) {
  $form[highlighted_articles] = array(
    '#type' => 'fieldset',
    '#title' => t('Highlighted Articles'),
    '#description' => t('This is where you select what pages are loaded to the front page.<br><em>Use the node number only--or that shit won\'t work.</em>'),
  );
  $form[highlighted_articles][highlighted_article_1] = array(
    '#type' => 'textfield',
    '#title' => t('Highlighted Article Left'),
    '#size' => 5,
    '#default_value' => theme_get_setting('highlighted_article_1'),
  );
  $form[highlighted_articles][highlighted_article_2] = array(
    '#type' => 'textfield',
    '#title' => t('Highlighted Article Center'),
    '#size' => 5,
    '#default_value' => theme_get_setting('highlighted_article_2'),
  );
  $form[highlighted_articles][highlighted_article_3] = array(
    '#type' => 'textfield',
    '#title' => t('Highlighted Article Right'),
    '#size' => 5,
    '#default_value' => theme_get_setting('highlighted_article_3'),
  );
}
