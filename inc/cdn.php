<?php

if ( ! defined( 'PIPJQUI_PLUGIN_WEBPATH' ) ) { exit; }


function pipjqui_theme_cdn_attributes( string $html, string $handle, string $href, string $media = 'all' ) {
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
  $cdn = pipjqui_get_option_as_boolean( 'pipjqui_cdn', false );
  if ( ! $cdn ) {
    return $html;
  }
  $themestub = preg_replace('/jquery-ui-theme-/', '', $handle);
  // hashes to use with minified themes
  $sriarray = array(
    'jquery-ui-theme-base'           => 'sha256-sEGfrwMkIjbgTBwGLVK38BG/XwIiNC/EAG9Rzsfda6A=',
    'jquery-ui-theme-black-tie'      => 'sha256-MyuxfsvHhD1wixmCD+gnc3zfEQWfKEExEbhgBDgsabM=',
    'jquery-ui-theme-blitzer'        => 'sha256-cGh5mDFMJ5QuokG76ZKcBaytEHTcHJOiTXhyxwokExk=',
    'jquery-ui-theme-cupertino'      => 'sha256-BQ3m8birKYRzXjofYJeErdZ/SMsXgOoBPXt0d6c3FZc=',
    'jquery-ui-theme-dark-hive'      => 'sha256-eZniZ8LGwFHGy3Dndt7l7eKikb8Dg+d2e1AvTP5NWPg=',
    'jquery-ui-theme-dot-luv'        => 'sha256-tZFFieWCR+QLPSJKq0FaBJZ0teyAXBPmoNQfhx/p+dU=',
    'jquery-ui-theme-eggplant'       => 'sha256-fGxAC40oa1naPPwQ5ToWafNA+QtM1IUVuf9++DSeH6w=',
    'jquery-ui-theme-excite-bike'    => 'sha256-cLK/YyW3H2E03YfN4pgrxQh/ASTjd/ePSziRBGhwBVo=',
    'jquery-ui-theme-flick'          => 'sha256-+nx8JI0JK1hZo+vPNLtKzFtnPlybDQ04xvydqG8tUQU=',
    'jquery-ui-theme-hot-sneaks'     => 'sha256-CMiJKSMjafyCv6GsInAcfYoIWSbUIFBq+CXK1/GAFV0=',
    'jquery-ui-theme-humanity'       => 'sha256-y5khn8kiGjGd/Y057AhC1Waa0j8g66J4HJEQ3py1v4o=',
    'jquery-ui-theme-le-frog'        => 'sha256-hRL4c7xfuIDDk3xH2xa4Oet0QIp32zfD1OClfl/P9mQ=',
    'jquery-ui-theme-mint-choc'      => 'sha256-4B2xaiXu2oXLoRnDkLla1ozu3wBDjcvGPNznjxBPPFI=',
    'jquery-ui-theme-overcast'       => 'sha256-WSxKuBEqPEVDCuATs83Zm9t07wP+GMlY33HM0qzqd/U=',
    'jquery-ui-theme-pepper-grinder' => 'sha256-47Ea69dRDEWuu5vpeNAhuGeJxVhm+vp1eGFH7dW5t34=',
    'jquery-ui-theme-redmond'        => 'sha256-pXjw+x4dOoTZgRBmPD/ilEFccRj2c57rZaYj9A9kRrQ=',
    'jquery-ui-theme-smoothness'     => 'sha256-vpKTO4Ob1M4bZ8RAvZvYMtinMz1XjH0QYdAO2861V9M=',
    'jquery-ui-theme-south-street'   => 'sha256-/8xGgcV6Mp9fFa2u2lLYOWYNluCdrHEvBfiwhpkD/Js=',
    'jquery-ui-theme-start'          => 'sha256-+ApWgB/rWRVeGReiOzUVXkPXIzzigIdWWsHQSnmadE4=',
    'jquery-ui-theme-sunny'          => 'sha256-Jiadcnga6+xuEw92UTtTbFJr1SStsSPYOn7H1/eLTTI=',
    'jquery-ui-theme-swanky-purse'   => 'sha256-kh9nfiRK1NVN8NYzEvAOHQcIrJtEv2bu4ir/SlzHKQs=',
    'jquery-ui-theme-trontastic'     => 'sha256-h+Ns2bPg6hdp4BEt8JFYWf+cyjYqZI8CKmHACTD/bIU=',
    'jquery-ui-theme-ui-darkness'    => 'sha256-QOlpGLggKjf/xD6nhRVHOUiRO5xvIk8JEdGaa4yJPJ4=',
    'jquery-ui-theme-ui-lightness'   => 'sha256-N7K28w/GcZ69NlFwqiKb1d5YXy37TSfgduj5gQ6x8m0=',
    'jquery-ui-theme-vader'          => 'sha256-ErFsoz05V7X4m+n14uj99ETR3ekcPWMSK+EaBzGl3xQ=' );

  $sri     = pipjqui_get_option_as_boolean( 'pipjqui_sri' );
  if ( $sri ) {
    $srihash = $sriarray[$handle];
    $cdnstring = '" integrity="' . $srihash . '" crossorigin="anonymous"';
  } else {
    $cdnstring = '" crossorigin="anonymous"';
  }
  $src = PIPJQUI_PLUGIN_WEBPATH . 'themes/' . $themestub . '/jquery-ui.min.css' . '?ver=' . PIPJQUIV ;
  return '<link rel="stylesheet" id="' . $handle . '-css" href="' . $href . $cdnstring . ' type="text/css" media="' . $media . '" onerror="this.crossorigin=null;this.integrity=null;this.onerror=null;this.href=\'' . $src . '\';" />' . PHP_EOL;  
}
