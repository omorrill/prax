<?php

/**
 * @file
 * template.php file for PikesPeakColorado
 *
 * Implement preprocess functions and alter hooks in this file.
 */

function get_node_title($nid) {
  $node_title_get = '';

  $node_title = db_query('SELECT title as title FROM node WHERE nid = :nid', array(':nid' => $nid));
  if (isset($nid)) {
    $nt = '';
      foreach ($node_title as $title) {
        $nt .= $title->title;
      }
      $node_title_get .= $nt;
    }
  //$node_title_get = check_markup((strlen($node_title_get) > 3) ? substr($node_title_get,0,30).'...click for full article' : $node_title_get);

  return $node_title_get;
}

function get_node_body($eid) {
  $node_body_get = '';

  $node_body = db_query('SELECT body_value as body_value FROM field_data_body WHERE entity_id = :eid', array(':eid' => $eid));
  if (isset($eid)) {
    $nb = '';
      foreach ($node_body as $body) {
        $nb .= $body->body_value;
      }
      $node_body_get .= $nb;
    }
  $node_body_get = check_markup((strlen($node_body_get) > 303) ? substr($node_body_get,0,275).' ...click for full article' : $node_body_get, $format_id = 'full_html');

  return $node_body_get;
}

/**
 * Preprocess function for page.tpl.php
 */
function ppc_preprocess_page(&$variables) {
  //$vairables['site_slogan'] = "Owen Rules";
  $ha1 = theme_get_setting('highlighted_article_1');
  $ha2 = theme_get_setting('highlighted_article_2');
  $ha3 = theme_get_setting('highlighted_article_3');

  $variables['node_title_1'] = get_node_title($ha1);
  $variables['node_title_2'] = get_node_title($ha2);
  $variables['node_title_3'] = get_node_title($ha3);

  $variables['node_body_1'] = get_node_body($ha1);
  $variables['node_body_2'] = get_node_body($ha2);
  $variables['node_body_3'] = get_node_body($ha3);
}
