<?php

if ( ! defined( 'PIPJQUI_PLUGIN_WEBPATH' ) ) { exit; }

function pipjqui_theme_cdn_attributes( string $html, string $handle, string $href, string $media = 'all' ) {
  // array of handles this callback is used with
  $myhandles = pipjqui_themesri( 'handle' );
  if ( ! in_array( $handle, $myhandles ) ) {
    return $html;
  }
  $cdn = pipjqui_get_option_as_boolean( 'pipjqui_cdn', false );
  if ( ! $cdn ) {
    return $html;
  }
  $sri     = pipjqui_get_option_as_boolean( 'pipjqui_sri' );
  if ( $sri ) {
    $sriarray = pipjqui_themesri();
    $srihash = $sriarray[ $handle ];
    $cdnstring = '" integrity="' . $srihash . '" crossorigin="anonymous"';
  } else {
    $cdnstring = '" crossorigin="anonymous"';
  }
  $themestub = preg_replace(' /jquery-ui-theme-/', '', $handle );
  $src = PIPJQUI_PLUGIN_WEBPATH . 'themes/' . $themestub . '/jquery-ui.min.css' . '?ver=' . PIPJQUIV ;

  $fallback  = 'this.onerror=null;'            ; // prevent loops
  $fallback .= 'this.crossorigin=null;'        ; // serving fallback from local
  $fallback .= 'this.integrity=null;'          ; // do not need SRI for fallback
  $fallback .= 'this.href=\'' . $src . '\';'   ; // reference the local source
  
  return '<link rel="stylesheet" id="' . $handle . '-css" href="' . $href . $cdnstring . ' type="text/css" media="' . $media . '" onerror="' . $fallback . '" />' . PHP_EOL;  
}
