<?php
// $Id:$

/**
 * Implementation of hook_panels_layouts().
 */
function gizra_ninesixty_basic_panels_layouts() {
  $items['basic'] = array(
    'title' => t('Gizra 960 basic layout'),
    'icon' => 'basic.png',
    'theme' => 'basic',
    'panels' => array(
      'left' => t('Left side'),
      'right' => t('Right side'),
      'bottom' => t('Bottom')
    ),
  );

  return $items;
}
