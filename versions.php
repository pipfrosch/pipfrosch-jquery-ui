<?php

if ( ! defined( 'PIPJQUI_PLUGIN_WEBPATH' ) ) { exit; }

define( "PIPJQUIV", "1.12.1" );
define( "PIPJQUIVSRI", "sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" );

// Theme SRI are for minified theme files from 1.12.1

function pipjqui_themesri( string $type = 'sri' ): array
{
  $sriarray = array('Base'           => 'sha256-sEGfrwMkIjbgTBwGLVK38BG/XwIiNC/EAG9Rzsfda6A=',
                    'Black Tie'      => 'sha256-MyuxfsvHhD1wixmCD+gnc3zfEQWfKEExEbhgBDgsabM=',
                    'Blitzer'        => 'sha256-cGh5mDFMJ5QuokG76ZKcBaytEHTcHJOiTXhyxwokExk=',
                    'Cupertino'      => 'sha256-BQ3m8birKYRzXjofYJeErdZ/SMsXgOoBPXt0d6c3FZc=',
                    'Dark Hive'      => 'sha256-eZniZ8LGwFHGy3Dndt7l7eKikb8Dg+d2e1AvTP5NWPg=',
                    'Dot-Luv'        => 'sha256-tZFFieWCR+QLPSJKq0FaBJZ0teyAXBPmoNQfhx/p+dU=',
                    'Eggplant'       => 'sha256-fGxAC40oa1naPPwQ5ToWafNA+QtM1IUVuf9++DSeH6w=',
                    'Excite-Bike'    => 'sha256-cLK/YyW3H2E03YfN4pgrxQh/ASTjd/ePSziRBGhwBVo=',
                    'Flick'          => 'sha256-+nx8JI0JK1hZo+vPNLtKzFtnPlybDQ04xvydqG8tUQU=',
                    'Hot-Sneaks'     => 'sha256-CMiJKSMjafyCv6GsInAcfYoIWSbUIFBq+CXK1/GAFV0=',
                    'Humanity'       => 'sha256-y5khn8kiGjGd/Y057AhC1Waa0j8g66J4HJEQ3py1v4o=',
                    'Le-Frog'        => 'sha256-hRL4c7xfuIDDk3xH2xa4Oet0QIp32zfD1OClfl/P9mQ=',
                    'Mint-Choc'      => 'sha256-4B2xaiXu2oXLoRnDkLla1ozu3wBDjcvGPNznjxBPPFI=',
                    'Overcast'       => 'sha256-WSxKuBEqPEVDCuATs83Zm9t07wP+GMlY33HM0qzqd/U=',
                    'Pepper-Grinder' => 'sha256-47Ea69dRDEWuu5vpeNAhuGeJxVhm+vp1eGFH7dW5t34=',
                    'Redmond'        => 'sha256-pXjw+x4dOoTZgRBmPD/ilEFccRj2c57rZaYj9A9kRrQ=',
                    'Smoothness'     => 'sha256-vpKTO4Ob1M4bZ8RAvZvYMtinMz1XjH0QYdAO2861V9M=',
                    'South-Street'   => 'sha256-/8xGgcV6Mp9fFa2u2lLYOWYNluCdrHEvBfiwhpkD/Js=',
                    'Start'          => 'sha256-+ApWgB/rWRVeGReiOzUVXkPXIzzigIdWWsHQSnmadE4=',
                    'Sunny'          => 'sha256-Jiadcnga6+xuEw92UTtTbFJr1SStsSPYOn7H1/eLTTI=',
                    'Swanky-Purse'   => 'sha256-kh9nfiRK1NVN8NYzEvAOHQcIrJtEv2bu4ir/SlzHKQs=',
                    'Trontastic'     => 'sha256-h+Ns2bPg6hdp4BEt8JFYWf+cyjYqZI8CKmHACTD/bIU=',
                    'UI-Darkness'    => 'sha256-QOlpGLggKjf/xD6nhRVHOUiRO5xvIk8JEdGaa4yJPJ4=',
                    'UI-Lightness'   => 'sha256-N7K28w/GcZ69NlFwqiKb1d5YXy37TSfgduj5gQ6x8m0=',
                    'Vader'          => 'sha256-ErFsoz05V7X4m+n14uj99ETR3ekcPWMSK+EaBzGl3xQ=' );
  $rs = array();
  switch ( $type ) {
    case 'human':
      return array_keys( $sriarray );
      break;
    case 'stub':
      $keys = array_keys( $sriarray );
      foreach ( $keys as $theme ) {
        $stub = strtolower( $theme );
        $stub = preg_replace('/\s+/', '-', $stub);
        $rs[] = $stub;
      }
      return $rs;
      break;
    case 'handle':
      $keys = array_keys( $sriarray );
      foreach ( $keys as $theme ) {
        $stub = strtolower( $theme );
        $stub = preg_replace('/\s+/', '-', $stub);
        $rs[] = 'jquery-ui-theme-' . $stub;
      }
      return $rs;
      break;
    default:
      break;
  }
  foreach ( $sriarray as $key => $value ) {
    $stub = strtolower( $theme );
    $stub = preg_replace('/\s+/', '-', $stub);
    $newkey = 'jquery-ui-theme-' . $stub;
    $rs[ $newkey ] = $value;
  }
  return $rs;
}
