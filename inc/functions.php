<?php

if ( ! defined( 'PIPJQUI_PLUGIN_WEBPATH' ) ) { exit; }

/**
 * Takes a theme (or stub) name and returns the corresponding stub.
 *
 * This function will return 'humanity' if the specified theme does
 *  not exist.
 *
 * @param string $theme The jQuery UI Theme to convert to a stub
 *
 * @return string
 */
function pipjqui_theme_to_stub( string $theme ): string
{
  $stub = strtolower( sanitize_text_field( $theme ) );
  $stub = preg_replace('/\s+/', '-', $stub);
  $standard = array( 'black-tie',
                     'blitzer',
                     'cupertino',
                     'dark-hive',
                     'dot-luv',
                     'eggplant',
                     'excite-bike',
                     'flick',
                     'hot-sneaks',
                     'humanity',
                     'le-frog',
                     'mint-choc',
                     'overcast',
                     'pepper-grinder',
                     'redmond',
                     'smoothness',
                     'south-street',
                     'start',
                     'sunny',
                     'swanky-purse',
                     'trontastic',
                     'ui-darkness',
                     'ui-lightness',
                     'vader');
  if ( in_array( $stub, $standard ) ) {
    return $stub;
  }
  return 'humanity';
}

/**
 * Get an option as boolean value.
 *
 * This function queries the option and returns a boolean value representing
 *  the option if the option has been set and returns a boolean default if the
 *  option has not been set. It also sets the option to a string equivalent of
 *  the boolean default (a "0" for false or a "1" for true) if the option is
 *  not set.
 *
 * @param string The name of the option to query.
 * @param bool   The default value to return and set if the option is not set.
 *
 * @return bool
 */
function pipjqui_get_option_as_boolean( string $option, bool $default = true ) {
  $test = get_option( $option );
  if ( is_bool( $test ) ) {
    if ( $test ) {
       update_option( $option, '1');
       return $test;
    } else {
       $value = '0';
       if ( $default ) {
         $value = '1';
       }
       add_option( $option, $value );
       return $default;
    }
  }
  $q = intval( $test );
  if ( $q === 0 ) {
    return false;
  }
  return true;
}

/**
 * Sanitize CDN host string
 *
 * This WordPress plugin uses a fixed set of public Content Distribution Networks.
 *  This function eats an input and outputs a sanitized version that matches
 *  the case sensitivity expected, returning the default CDN if it can not
 *  identify which CDN is intended in the input.
 *
 * @param string The CDN host string to sanitize.
 *
 * @return string
 */
function pipjqui_sanitize_cdnhost( string $input ) {
  $input = strtolower( sanitize_text_field( $input ) );
  switch( $input ) {
    case 'microsoft cdn':
      return 'Microsoft CDN';
      break;
//    case 'jsdelivr cdn':
//      return 'jsDelivr CDN';
//      break;
    case 'cloudflare cdnjs':
      return 'CloudFlare CDNJS';
      break;
    case 'google cdn':
      return 'Google CDN';
      break;
  }
  return 'jQuery.com CDN';
}

function pipjqui_get_cdnhost_option() {
  // see if preferred CDN from Pipfrosch jQuery has been set and default to
  //  that if it has been.
  $test = get_option( 'pipjq_cdnhost' ); // this option not set by this plugin
  if ( is_string( $test ) ) {
    $default = pipjqui_sanitize_cdnhost( $test );
  } else {
    $default = pipjqui_sanitize_cdnhost( 'use default' );
  }
  $test = get_option( 'pipjqui_cdnhost' );
  if ( ! is_string( $test ) ) {
    add_option( 'pipjqui_cdnhost', $default );
    return $default;
  }
  $clean = pipjqui_sanitize_cdnhost( $test );
  if ( $clean !== $test ) {
    update_option( 'pipjqui_cdnhost', $clean );
  }
  return $clean;
}

/**
 * returns the selected CDN or localhost
 *
 * @return string
 */
function pipjqui_get_cdnhost(): string
{
  if ( pipjqui_get_option_as_boolean( 'pipjqui_cdn', false ) ) {
    return pipjqui_get_cdnhost_option();
  }
  return 'localhost';
}

/**
 * Callback function to register the jQuery UI theme style sheets
 *
 * Always loads the base theme locally so there is something in case
 *  of a CDN failure
 *
 * TODO - SRI and anonymous filters
 *
 * @return void
 */
function pipjqui_register_themes(): void
{
  $cdnhost = pipjqui_get_cdnhost();
  // jquery-ui-theme-base
  $src = PIPJQ_PLUGIN_WEBPATH . 'themes/base/jquery-ui.min.css';
  // when serving locally include non-null version parameter
  wp_register_style( 'jquery-ui-base', $src, array(), PIPJQUIV );
  
  
  $stub = 'humanity';
  $themes = array( 'Black Tie',
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
  foreach ( $themes as $theme ) {
    $stub = pipjqui_theme_to_stub( $theme );
    $handle = 'jquery-ui-theme-' . $stub;
    switch ( $cdnhost ) {
      case 'jQuery.com CDN':
        $base = 'https://code.jquery.com/ui/';
        $path = '/themes/' . $stub . 'jquery-ui.css';
        $src = $base . PIPJQUIV . $path;
        wp_register_style( $handle, $src, array('jquery-ui-base'), null );
        break;
      case 'Microsoft CDN':
        $base = 'https://ajax.aspnetcdn.com/ajax/jquery.ui/';
        $path =  '/themes/' . $stub . 'jquery-ui.css';
        wp_register_style( $handle, $src, array('jquery-ui-base'), null );
        $src = $base . PIPJQUIV . $path;
        break;
      case 'CloudFlare CDNJS':
        $base = 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/';
        $path = '/themes/' . $stub . '/jquery-ui.min.css';
        $src = $base . PIPJQUIV . $path;
        wp_register_style( $handle, $src, array('jquery-ui-base'), null );
        break;
      case 'Google CDN':
        $base = 'https://ajax.googleapis.com/ajax/libs/jqueryui/'
        $path = '/themes/' . $stub . '/jquery-ui.min.css';
        $src = $base . PIPJQUIV . $path;
        wp_register_style( $handle, $src, array('jquery-ui-base'), null );
        break;
      default:
        $src = PIPJQ_PLUGIN_WEBPATH . 'themes/' . $stub . '/jquery-ui.min.css';
        // when serving locally include non-null version parameter
        //  when serving locally, we do not need base as fall-back dep
        wp_register_style( $handle, $src, array(''), PIPJQUIV );
    }
  }
  // use base by default
  $handle = 'jquery-ui-base';
  wp_register_style( 'jquery-ui-theme-active', false, array( $handle ), null );
  
  /* register aliases for what standard themes provide - TODO I think this borked */
  $base = array( 'accordion',
                 'autocomplete',
                 'button',
                 'datepicker',
                 'dialog',
                 'menu',
                 'progressbar',
                 'resizable',
                 'selectable',
                 'slider',
                 'spinner',
                 'tabs',
                 'tooltip',
                 'theme' );
  foreach( $base as $feature ) {
    $handle = 'jquery-ui-' . $feature;
    wp_deregister_style( $handle );
    wp_register_style( $handle, false, array('jquery-ui-theme-active'), null);
  }
}

/**
 * Generate src attribute for the script nodes.
 *
 * This function creates the appropriate `src` attribute needed to register the
 *  jQuery UI plugin based upon the CDN choice. It returns an object with that
 *  strings as a property, and also a boolean property that specifies whether or
 *  not the `src` property is for a CDN.
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
      $rs->jqueryui = 'https://code.jquery.com/ui/' . PIPJQUIV . '/jquery-ui.min.js';
      $rs->cdn = true;
      break;
    case 'Microsoft CDN':
      $rs->jqueryui = 'https://ajax.aspnetcdn.com/ajax/jquery.ui/' . PIPJQUIV . '/jquery-ui.min.js';
      $rs->cdn = true;
      break;
    case 'CloudFlare CDNJS':
      $rs->jqueryui = 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/' . PIPJQUIV . '/jquery-ui.min.js';
      $rs->cdn = true;
      break;
    case 'Google CDN':
      $rs->jqueryui = 'https://ajax.googleapis.com/ajax/libs/jqueryui/' . PIPJQUIV . '/jquery-ui.min.js';
      $rs->cdn = true;
      break;
    default:
      $rs->jqueryui = PIPJQ_PLUGIN_WEBPATH . 'jquery-ui.min.js';
      $rs->cdn = false;
  }
  return $rs;
}

/**
 * Fallback for a CDN failure.
 *
 * In the event that a client can not retrieve the needed jQuery file from a CDN or
 *  it retrieves the file but the SRI does not match, a website will be broken without
 *  a fallback. This function provides a small HTML snippet for a script that verifies
 *  retrieval of the jQuery library or the jQuery Migrate plugin was successful, and
 *  instructs the client to download the copy served from the local website if it was
 *  not.
 *
 * @return string
 */
function pipjq_fallback_for_cdn_failure(): string
{
  $html = '<script>' . PHP_EOL . '  // Fallback to load locally if CDN fails' . PHP_EOL;
  $html .= '  if (typeof jQuery.ui == \'undefined\') {' . PHP_EOL;
  $html .= '    document.write(\'<script src="' . PIPJQUI_PLUGIN_WEBPATH . 'jquery-ui.min.js?ver=' . PIPJQUIV . '"><\/script>\');' . PHP_EOL;
  $html .= '  }' . PHP_EOL;
  $html .= '</script>' . PHP_EOL;
  return $html;
}

/**
 * Add the SRI and CrossOrigin attributes
 *
 * The WordPress core function `wp_register_script()` does not provide a means
 *  for adding attributes to a script node. When a script is served from a third
 *  party resource, it really needs to have both an `integrity` and a
 *  `crossorigin` attribute set so the browser can validate both the integrity of
 *  the resource being downloaded from the third party, and what authentication
 *  should be performed (always anonymous for a public CDN, which at least with
 *  some browsers means cookies are not set or sent even if they exist. Yay for
 *  privacy). This function is used as a callback in a the WordPress
 *  `script_loader_tag` to rewrite the <script></script> node with the appropriate
 *  attributes for both SRI and CrossOrigin, along with the fallback HTML snippet
 *  from the `pipjqui_fallback_for_cdn_failure()` function.
 *
 * @param string The original version of the script tag.
 * @param string The handle that was used to register the script associated with
 *               the tag in the first parameter.
 * @param string The contents of the `src` attribute in the tag from the first
 *               parameter.
 *
 * @return string
 */
function pipjqui_add_sri_attributes( string $tag, string $handle, string $source ): string
{
  if ( $handle === 'jquery-ui-core' ) {
    $html = pipjq_fallback_for_cdn_failure();
    return '<script src="' . $source . '" integrity="' . PIPJQUIVSRI . '" crossorigin="anonymous"></script>' . PHP_EOL . $html;
  }
  return $tag;
}

/**
 * Add CrossOrigin attribute
 *
 * There are a valid reasons why a webmaster may not want this WordPress plugin
 *  adding the SRI tag. For example, they may have a different plugin that already
 *  does that from a database. In such cases, the CrossOrigin attribute should
 *  still be added, along with the fallback HTML snippet. This function does that.
 *  See the PHPdoc header for pipjqui_add_sri_attributes().
 *
 * @param string The original version of the script tag.
 * @param string The handle that was used to register the script associated with
 *               the tag in the first parameter.
 * @param string The contents of the `src` attribute in the tag from the first
 *               parameter.
 *
 * @return string
 */
function pipjqui_add_crossorigin_attribute( string $tag, string $handle, string $source ): string
{
  if ( $handle === 'jquery-ui-core' ) {
    $html = pipjq_fallback_for_cdn_failure();
    return '<script src="' . $source . '" crossorigin="anonymous"></script>' . PHP_EOL . $html;
  }
  return $tag;
}

function pipjq_update_wpcore_jqueryui()
{
  $sri     = pipjqui_get_option_as_boolean( 'pipjqui_sri' );
  $cdnhost = pipjqui_get_cdnhost();
  
  $srcuri = pipjqui_script_src( $cdnhost );
  

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
    wp_register_script( $component, false, array( 'jquery-ui-core' ), null );
  }
  if ( $srcuri->cdn ) {
    if ( $sri ) {
      add_filter( 'script_loader_tag', 'pipjqui_add_sri_attributes', 10, 3 );
    } else {
      add_filter( 'script_loader_tag', 'pipjqui_add_crossorigin_attribute', 10, 3 );
    }
  }
}
  
/**
 * Load default jQuery UI theme
 *
 * This callback needs to be called late in wp_enqueue_scripts action so that when
 *  jquery-ui-core gets loaded this callback is not called before jquery-ui-core gets loaded.
 *
 * If it detects that jQuery UI is being used on the pages, it triggers the active theme to
 *  be enqueued.
 *
 * @return void
 */
function pipjqui_load_default_theme(): void
{
  if ( wp_script_is( 'jquery-ui-core' ) ) {
    wp_enqueue_style( 'jquery-ui-theme-active' );
  }
}

/**
 * Attempts to get the current theme version
 *
 * Returns string if successful, false otherwise which when used
 *  in wp_register_style will result in WP version being used.
 */
function pipjqui_get_active_theme_version()
{
  if ( function_exists( 'wp_get_theme' ) ) {
    $themeObject = wp_get_theme();
    if ( $themeObject->exists() ) {
      if ( $themeObject->__isset( 'version' ) ) {
        $version = $themeObject->__get( 'version' );
        if ( version_compare( $version, '0.0.1', '>=' ) ) {
          return $version;
        }
      }
    }
  }
  return false;
}

/* Functions for theme developers to use */

/**
 * Define a standard jQuiry UI theme that gets loaded
 *
 * This function should be called late:
 *
 * function theme_stub_load_jqui_theme() {
 *   if (function_exists('pipjqui_load_alternate_theme')) {
 *     $jqui_theme=get_option('your_theme_stub_jqui_theme');
 *     if (is_string($jqui_theme)) { // make sure its string rather than boolean false
 *       pipjqui_load_alternate_theme($jqui_theme);
 *     }
 *   }
 * }
 * add_action('wp_enqueue_scripts', 'theme_stub_load_jqui_theme', PHP_INT_MAX);
 *
 * Calling it late makes sure pipfrosch-jquery-ui is loaded so that
 *  pipjqui_load_alternate_theme will have been defined and the
 *  jquery-ui-theme-active handle will have been registered.
 *
 * @param string $theme The standard jQuery UI theme to use.
 *
 * @return void
 */
function pipjqui_load_alternate_theme( string $theme ): void
{
  $theme_handle = 'jquery-ui-theme-' . pipjqui_theme_to_stub( $theme );
  wp_deregister_style( 'jquery-ui-theme-active' );
  wp_register_style( 'jquery-ui-theme-active', false, array( $theme_handle ), null );
}

/**
 * Define a custom jQuiry UI theme that gets loaded
 *
 * This function should be called late:
 *
 * function theme_stub_load_jqui_theme() {
 *   if (function_exists('pipjqui_load_custom_theme')) {
 *     $my_handle = 'my-theme-custom-jquery-ui-theme';
 *     $my_source = trailingslashit( get_template_directory_uri() ) . 'css/custom-jquery-ui.min.css';
 *     $my_dep = 'Le-Frog'; // for the jQuery UI Le-Frog theme
 *     pipjqui_load_custom_theme($my_handle, $my_source, $my_dep);
 *   }
 * }
 * add_action('wp_enqueue_scripts', 'theme_stub_load_jqui_theme', PHP_INT_MAX);
 *
 * Calling it late makes sure pipfrosch-jquery-ui is loaded so that
 *  pipjqui_load_custom_theme will have been defined and the
 *  jquery-ui-theme-active handle will have been registered.
 *
 * @param string $handle     The handle to use for your custom jQuery UI Theme
 * @param string $src        The URI path to the CSS for your custom jQuery UI Them
 * @param string $dependency The existing jQuery UI Theme your custom theme depends on.
 *                           By default, it depends upon the base theme. If your custom
 *                           theme really defines all the CSS that jQuery UI needs you
 *                           can use an empty string to indicate no dependencies. 
 *
 * @return void
 */
function pipjqui_load_custom_theme( string $handle, string $src, string $dependency='base' ): void
{
  // use the WordPress version if we can detect theme version
  $version = pipjqui_get_active_theme_version();
  // try to detect theme version
  
  if ( strlen( trim( $dependency ) ) = 0 ) {
    wp_register_style( $handle, $src, array(), $version );
  } elseif ( $dependency === 'base' ) {
    wp_register_style( $handle, $src, array( 'jquery-ui-base' ), $version );
  } else {
    $dep_handle = 'jquery-ui-' . pipjqui_theme_to_stub( $dependency );
    wp_register_style( $handle, $src, array( $dep_handle ), $version );
  }
  wp_deregister_style( 'jquery-ui-theme-active' );
  wp_register_style( 'jquery-ui-theme-active', false, array( $handle ), null );
}