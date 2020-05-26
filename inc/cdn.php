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

  // hashes to use with unminified themes
  $hashes_bloated = array(
    'jquery-ui-theme-black-tie'      => 'sha256-GoHAaz6rZ9vWIl8NqcaR1Sw+khKk1WzAeMdegW32UWA=',
    'jquery-ui-theme-blitzer'        => 'sha256-Dqz7i1wh9OJN1LZB7J06AqOtXCLOCsu93ogEm2LOZVg=',
    'jquery-ui-theme-cupertino'      => 'sha256-MZF4MuMkEfGGlK1vfxD+52t9NdRYVOHhRtdKgPrqPB4=',
    'jquery-ui-theme-dark-hive'      => 'sha256-430fmdsHlbyhcsmK+R+9wspVgGJBgjkWM5tuB2XC03U=',
    'jquery-ui-theme-dot-luv'        => 'sha256-nMFc/Arw3qNXfeAsTFcQhouE2j0y/opaOerh6Hwzbac=',
    'jquery-ui-theme-eggplant'       => 'sha256-RSjpd+rlIFi3UPnVNS2BTimivY7cG80ylALmfmiylcQ=',
    'jquery-ui-theme-excite-bike'    => 'sha256-V8t2pH/kNt4uR+oXqSr4llRwO57sqSMZeF3MAFOXqKQ=',
    'jquery-ui-theme-flick'          => 'sha256-yxEWE9G8cV0ozlp8HSy5r3keT6RRqxM80uNy3Ounv3o=',
    'jquery-ui-theme-hot-sneaks'     => 'sha256-ZLKD1XbP5jIo5j5lKxCko6NzjhMpgf72SR4VW/v6XZY=',
    'jquery-ui-theme-humanity'       => 'sha256-nAHctpD9aZtH+aV4m5TGwmK94W+c4olzRPfQuxNzHy8=',
    'jquery-ui-theme-le-frog'        => 'sha256-+ZV+xgxPMxY3rXjBsF5BA6ENfj192LfbzKAZi30/oaw=',
    'jquery-ui-theme-mint-choc'      => 'sha256-iSN80m429odBZ7aI9svrZ5HpEU+R07DcH0BXuGukeNI=',
    'jquery-ui-theme-overcast'       => 'sha256-DTulLMsL5OaW4M19ZcBKUchHb/jN8cmIhnMTz2cLJrY=',
    'jquery-ui-theme-pepper-grinder' => 'sha256-pE/A/Hedp/UAUMIPQl9ymGISd4OFHk18FMdhFznEPh8=',
    'jquery-ui-theme-redmond'        => 'sha256-zUjGuUyp7YLmnOVJfWbGjkjC5AyYdNVhi17dlAdZyyE=',
    'jquery-ui-theme-smoothness'     => 'sha256-+bdRwc0NKw+Rhi25h/7Z3aSHWLFeb0LKZ3lrRfSyFwI=',
    'jquery-ui-theme-south-street'   => 'sha256-jHNrDR9Hsp+pj8EMxPLwdUNEHp8j6YexSExxRmNasX8=',
    'jquery-ui-theme-start'          => 'sha256-GH61FxVLvSeEzukfQR8OcUfIlCQLlmentFQMLo4tkjE=',
    'jquery-ui-theme-sunny'          => 'sha256-JzCn+vC3yW/o/qXEsaQDwnSPc6Xe66bD52VE/edl3z4=',
    'jquery-ui-theme-swanky-purse'   => 'sha256-D59cs1ougaNpjsvhlccjR2q/O6NXmtFi0Thul5rnynk=',
    'jquery-ui-theme-trontastic'     => 'sha256-Qca0tpwZtx4E6ebB+un72sLpfR++S/400RDhIbXswjc=',
    'jquery-ui-theme-ui-darkness'    => 'sha256-RvaOcjdKda6lgto0g7nn6ScwwdHKZk+0SkqBIMB2bTk=',
    'jquery-ui-theme-ui-lightness'   => 'sha256-cimC9VbkCJERZEjeG0EO341EjtUeTT7gAIGo2eHdcrw=',
    'jquery-ui-theme-vader'          => 'sha256-0V1xTj3zT1+6rjmFeUGgUxWmzy970O1UdknsP20fuAo=' );
  // hashes to use with minified themes
  $hashes_minified = array(
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
    // CDNs that minify CSS
    $effecient = array(
      'jQuery.com CDN',
//      'Microsoft CDN',
      'jsDelivr CDN',
      'CloudFlare CDNJS',
      'Google CDN'
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
  $src = PIPJQUI_PLUGIN_WEBPATH . 'themes/' . $themestub . '/jquery-ui.min.css' . '?ver=' . PIPJQUIV ;
  $html  = '<!-- fallback for CDN CSS failure -->' . PHP_EOL;
  $html .= '<script>' . PHP_EOL;
  $html .= 'function jquicssfb() {' . PHP_EOL;
  $html .= '  document.write(\'<link rel="stylesheet" href="' . $src . '" type="text/css" media="' . $media . '" />\');' . PHP_EOL;
  $html .= '}' . PHP_EOL . '</script>' . PHP_EOL;
  return '<link rel="stylesheet" id="' . $handle . '-css" href="' . $href . $cdnstring . ' type="text/css" media="' . $media . '" onerror="this.src=\'' . $src . '\'" />' . PHP_EOL;  
}
