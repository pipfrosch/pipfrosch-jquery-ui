<?php

if ( ! defined( 'PIPJQUI_PLUGIN_WEBPATH' ) ) { exit; }


/**
 * Generate src attribute for the script nodes.
 *
 * This function creates the appropriate `src` attribute needed to register the
 *  jQuery UI plugin and themes with WordPress based upon the CDN choice. It returns
 *  an object with that strings as a property, and also a boolean property that
 *  specifies whether or not the `src` attribute is for a CDN.
 *
 * @param string The name of the CDN host.
 *
 * @return stdClass
 */
function pipjqui_script_src( string $cdnhost="localhost" )
{
  $rs = new stdClass();
  switch ( $cdnhost ) {
    case 'jQuery.com CDN':
      $rs->jqueryui = 'http://code.jquery.com/ui/' . PIPJQUIV . '/jquery-ui.min.js';
      $rs->cdn = true;
      break;
    case 'Microsoft CDN':
      $rs->jqueryui = 'https://ajax.aspnetcdn.com/ajax/jquery.ui/'            . PIPJQUIV . '/jquery-ui.min.js';
      $rs->cdn = true;
      break;
  }
}

function pipjqui_resolvetheme( string $cdnhost, string $theme ): string
{
  $stub = 'humanity';
  $standard = array( 'Black Tie',
                     'Blitzer',
                     'Cupertino',
                     'Dark-Hive',
                     'Dot-Luv',
                     'Eggplant',
                     'Excite-Bike',
                     'Flick',
                     'Hot-Sneaks',
                     'Humanity',
                     'Le-Frog',
                     'Mint-Choc',
                     'Overcast',
                     'Pepper-Grinder',
                     'Redmond',
                     'Smoothness',
                     'South-Street',
                     'Start',
                     'Sunny',
                     'Swanky-Purse',
                     'Trontastic',
                     'UI-Darkness',
                     'UI-Lightness',
                     'Vader');
  if ( in_array( $theme, $standard ) ) {
    $stub = strtolower( $theme );
  }
  switch ( $cdnhost ) {
    case 'jQuery.com CDN':
      $base = 'https://code.jquery.com/ui/';
      $path = '/themes/' . $stub . 'jquery-ui.css';
      return $base . PIPJQUIV . $path;
      break;
    case 'Microsoft CDN':
      $base = 'https://ajax.aspnetcdn.com/ajax/jquery.ui/';
      $path =  '/themes/' . $stub . 'jquery-ui.css';
      return $base . PIPJQUIV . $path;
      break;
    case 'CloudFlare CDNJS':
      $base = 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/';
      $path = '/themes/' . $stub . '/jquery-ui.min.css';
      return $base . PIPJQUIV . $path;
      break;
  }
  return PIPJQUI_PLUGIN_WEBPATH . themes/ . $stub . '/jquery-ui.min.css';
}

function pipjqui_theme_src( string $cdnhost="localhost", array $foo )
{
  $rs = array();
  switch ( $cdnhost ) {
    case 'Microsoft CDN':
      if ( in_array('Black Tie', $foo ) ) {
        $rs['jqueryui-blacktie'] = 'https://ajax.aspnetcdn.com/ajax/jquery.ui/'   . PIPJQUIV . '/themes/black-tie/jquery-ui.css';
      }
  }
}


function pipjq_update_wpcore_jqueryui()
{

  $core = array(         'jquery-ui-widget',
                         'jquery-ui-position');

  $core_supp = array(    'jquery-ui-keycode',
                         'jquery-ui-disable-selection',
                         'jquery-ui-disableselection',
                         'jquery-ui-form-reset-mixin',
                         'jquery-ui-labels',
                         'jquery-ui-scroll-parent',
                         'jquery-ui-scrollparent',
                         'jquery-ui-unique-id',
                         'jquery-ui-uniqueid');
  //?? :data Selector -- :focusable Selector -- :tabbable Selector ??

  $interactions = array( 'jquery-ui-draggable',
                         'jquery-ui-droppable',
                         'jquery-ui-resizeable',
                         'jquery-ui-selectable',
                         'jquery-ui-sortable');

  $widgets = array(      'jquery-ui-accordion',
                         'jquery-ui-autocomplete',
                         'jquery-ui-button',
                         'jquery-ui-datepicker',
                         'jquery-ui-dialog',
                         'jquery-ui-menu',
                         'jquery-ui-mouse',
                         'jquery-ui-progressbar',
                         'jquery-ui-selectmenu',
                         'jquery-ui-slider',
                         'jquery-ui-spinner',
                         'jquery-ui-tabs',
                         'jquery-ui-tooltip');

  $widgets_supp = array( 'jquery-ui-checkboxradio',
                         'jquery-ui-controlgroup');

  $effects = array(      'jquery-ui-effects-core',
                         'jquery-ui-effects-blind',
                         'jquery-ui-effects-bounce',
                         'jquery-ui-effects-clip',
                         'jquery-ui-effects-drop',
                         'jquery-ui-effects-explode',
                         'jquery-ui-effects-fade',
                         'jquery-ui-effects-fold',
                         'jquery-ui-effects-highlight',
                         'jquery-ui-effects-puff',
                         'jquery-ui-effects-pulsate',
                         'jquery-ui-effects-scale',
                         'jquery-ui-effects-shake',
                         'jquery-ui-effects-size',
                         'jquery-ui-effects-slide',
                         'jquery-ui-effects-transfer');

  $components = array_merge($core, $interactions, $widgets, $effects);
  $alias_components = array_merge($components, $core_supp, $widgets_supp);

  wp_deregister_script( 'jquery-ui-core' );
  foreach( $components as $component ) {
    wp_deregister_script( $component );
  }
  wp_register_script( 'jquery-ui-core', $srcuri->jqueryui, array( 'jquery-core' ), null );
  // set up the aliases
  foreach( $alias_components as $component ) {
    wp_register_script( $component, null, array( 'jquery-ui-core' ), null );
  }

}
