<?php
// $Id: twocol_stacked.inc,v 1.1.2.1 2008/12/16 21:27:59 merlinofchaos Exp $

/**
 * Implementation of hook_panels_layouts().
 */
function gizra_basic_panels_layouts() {
  $items['basic'] = array(
    'title' => t('Nannylove basic layout'),
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
