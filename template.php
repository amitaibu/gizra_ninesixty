<?php
// $Id:$

/**
 * Page preprocess.
 */
function gizra_ninesixty_preprocess_page(&$vars) {
  // On development, when CSS optimization isn't used, it is recommended to use
  // Unlimited IE CSS module -- http://drupal.org/project/unlimited_css
  // Following lines, will make sure, it's loading happens.
  if (module_exists('unlimited_css')) {
    $vars['styles'] .= unlimited_css_preprocess_page($vars);

    $vars['styles'] .= $vars['conditional_styles'] = variable_get('conditional_styles_' . $GLOBALS['theme'], '');
  }

}