<?php

if ( ! defined( 'PIPJQUI_PLUGIN_WEBPATH' ) ) { exit; }


function pipjqui_theme_cdn_attributes( string $html, string $handle, string $href, string $media ) {
  // array of handles this callback is used with
  $myhandles = array(
    'jquery-ui-theme-black-tie',
    'jquery-ui-theme-blitzer',
    'jquery-ui-theme-cupertino',
    'jquery-ui-theme-dark-hive',
    'jquery-ui-theme-dot-luv',
    'jquery-ui-theme-eggplant',
    'jquery-ui-theme-excite-bike',
    'jquery-ui-theme-flick',
    'jquery-ui-theme-hot-sneaks',
    'jquery-ui-theme-humanity',
    'jquery-ui-theme-le-frog',
    'jquery-ui-theme-mint-choc',
    'jquery-ui-theme-overcast',
    'jquery-ui-theme-pepper-grinder',
    'jquery-ui-theme-redmond',
    'jquery-ui-theme-smoothness',
    'jquery-ui-theme-south-street',
    'jquery-ui-theme-start',
    'jquery-ui-theme-sunny',
    'jquery-ui-theme-swanky-purse',
    'jquery-ui-theme-trontastic',
    'jquery-ui-theme-ui-darkness',
    'jquery-ui-theme-ui-lightness',
    'jquery-ui-theme-vader' );
  if ( ! in_array( $handle, $myhandles ) ) {
    return $html;
  }

  // hashes to use with unminified themes
  $hashes_bloated = array(
    'jquery-ui-theme-black-tie'      => 'fixme',
    'jquery-ui-theme-blitzer'        => 'fixme',
    'jquery-ui-theme-cupertino'      => 'fixme',
    'jquery-ui-theme-dark-hive'      => 'fixme',
    'jquery-ui-theme-dot-luv'        => 'fixme',
    'jquery-ui-theme-eggplant'       => 'fixme',
    'jquery-ui-theme-excite-bike'    => 'fixme',
    'jquery-ui-theme-flick'          => 'fixme',
    'jquery-ui-theme-hot-sneaks'     => 'fixme',
    'jquery-ui-theme-humanity'       => 'fixme',
    'jquery-ui-theme-le-frog'        => 'fixme',
    'jquery-ui-theme-minti-choc'     => 'fixme',
    'jquery-ui-theme-overcast'       => 'fixme',
    'jquery-ui-theme-pepper-grinder' => 'fixme',
    'jquery-ui-theme-redmond'        => 'fixme',
    'jquery-ui-theme-smoothness'     => 'fixme',
    'jquery-ui-theme-south-street'   => 'fixme',
    'jquery-ui-theme-start'          => 'fixme',
    'jquery-ui-theme-sunny'          => 'fixme',
    'jquery-ui-theme-swanky-purse'   => 'fixme',
    'jquery-ui-theme-trontastic'     => 'fixme',
    'jquery-ui-theme-ui-darkness'    => 'fixme',
    'jquery-ui-theme-ui-lightness'   => 'fixme',
    'jquery-ui-theme-vader'          => 'fixme' );
  // hashes to use with minified themes
  $hashes_minified = array(
    'jquery-ui-core'                 => 'fixme',
    'jquery-ui-theme-black-tie'      => 'fixme',
    'jquery-ui-theme-blitzer'        => 'fixme',
    'jquery-ui-theme-cupertino'      => 'fixme',
    'jquery-ui-theme-dark-hive'      => 'fixme',
    'jquery-ui-theme-dot-luv'        => 'fixme',
    'jquery-ui-theme-eggplant'       => 'fixme',
    'jquery-ui-theme-excite-bike'    => 'fixme',
    'jquery-ui-theme-flick'          => 'fixme',
    'jquery-ui-theme-hot-sneaks'     => 'fixme',
    'jquery-ui-theme-humanity'       => 'fixme',
    'jquery-ui-theme-le-frog'        => 'fixme',
    'jquery-ui-theme-minti-choc'     => 'fixme',
    'jquery-ui-theme-overcast'       => 'fixme',
    'jquery-ui-theme-pepper-grinder' => 'fixme',
    'jquery-ui-theme-redmond'        => 'fixme',
    'jquery-ui-theme-smoothness'     => 'fixme',
    'jquery-ui-theme-south-street'   => 'fixme',
    'jquery-ui-theme-start'          => 'fixme',
    'jquery-ui-theme-sunny'          => 'fixme',
    'jquery-ui-theme-swanky-purse'   => 'fixme',
    'jquery-ui-theme-trontastic'     => 'fixme',
    'jquery-ui-theme-ui-darkness'    => 'fixme',
    'jquery-ui-theme-ui-lightness'   => 'fixme',
    'jquery-ui-theme-vader'          => 'fixme' );

  $sri     = pipjqui_get_option_as_boolean( 'pipjqui_sri' );
  if ( $sri ) {
    // CDNs that minify CSS
    $effecient = array(
      'Microsoft CDN',
      'jsDelivr CDN',
      'CloudFlare CDNJS',
    );
    // get the cdn
    $cdnhost = pipjqui_get_cdnhost_option();
    if ( in_array( $cdnhost, $effecient ) ) {
      $sriarray = $hashes_minified;
    } else {
      $sriarray = $hashes_bloated;
    }
    $srihash = $sriarray[$handle];
    $cdnstring = '" integrity="' . $srihash . '" crossorigin="anonymous"';
  } else {
    $cdnstring = '" crossorigin="anonymous"';
  }
  return '<link rel="stylesheet" id="' . $handle . '" href="' . $href . $cdnstring . ' media="' . $media . '" />' . PHP_EOL;  
}
