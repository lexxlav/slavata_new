<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  STARTERKIT_preprocess_html($variables, $hook);
  STARTERKIT_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

function idTheme_form_alter(&$form, &$form_state, $form_id) {
 
  if ($form_id == 'search_block_form') {
 
    $deftext = t('Поиск по сайту');
    $form['search_block_form']['#title'] = t(' '); 
    $form['search_block_form']['#title_display'] = 'invisible'; 
    $form['search_block_form']['#size'] = 24;  
    $form['search_block_form']['#default_value'] = $deftext; 
    $form['actions']['submit']['#value'] = t('Найти'); 
 
 
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = '".$deftext."';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == '".$deftext."') {this.value = '';}";
  }
}



function simple_commerce_cart() {
  global $user;

  $order = commerce_cart_order_load($user->uid);
  if(!empty($order)) {
    $wrapper = entity_metadata_wrapper('commerce_order', $order);
    $line_items = $wrapper->commerce_line_items;
    $total = commerce_line_items_total($line_items);
    $currency = commerce_currency_load($total['currency_code']);
    $quantity = commerce_line_items_quantity($line_items, commerce_product_line_item_types());
    $summ = commerce_currency_format($total['amount'], $total['currency_code']);

    print "<div id='cart_count'><center>{$quantity}</center></div><div id='cart_summ'>{$summ}</div>";
  }
  else {
    print "<div id='cart_count'><center>0</center></div><div id='cart_summ'>0,00 руб.</div>";
  }
}

/**
 * Override default theme_filter_tips().
 */
function sitemade_filter_tips($variables) {
  $tips = $variables['tips'];
  $long = $variables['long'];
  $output = '';
 
  $multiple = count($tips) > 1;
  if ($multiple) {
    $output = '<h2>' . t('Text Formats') . '</h2>';
  }
 
  if (count($tips)) {
    if ($multiple) {
      $output .= '<div class="compose-tips">';
    }
    foreach ($tips as $name => $tiplist) {
      if ($multiple) {
        $output .= '<div class="filter-type filter-' . drupal_html_class($name) . '">';
        $output .= '<h3>' . $name . '</h3>';
      }
 
      if ($multiple) {
        $output .= '</div>';
      }
    }
    if ($multiple) {
      $output .= '</div>';
    }
  }
 
  return $output;
}

/**
 * Override default theme_filter_tips_more_info().
 */
function sitemade_filter_tips_more_info() {
  return '';
}