<?php
// $Id: theme-settings.php,v 1.1 2009/06/26 00:33:40 duvien Exp $

// Include the definition of zen_settings() and zen_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'zen_ninesixty') . '/theme-settings.php';


/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @return
 *   A form array.
 */

function gizra_ninesixty_settings($saved_settings) {
  return zen_ninesixty_settings($saved_settings);
}
