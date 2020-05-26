<?php

if ( ! defined( 'PIPJQUI_PLUGIN_WEBPATH' ) ) { exit; }

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
  if ( defined( 'PIPJQ_PLUGIN_VERSION' ) && function_exists( 'pipjq_get_option_as_boolean' ) ) {
    // Defer to pipfrosch jQuery for some settings
    switch ($option) {
      case 'pipjqui_cdn':
      case 'pipjqui_sri':
        $option = preg_replace( '/^pipjqui/', 'pipjq', $option );
        return pipjq_get_option_as_boolean( $option, $default );
        break;
    }
  }
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

/**
 * Get CDN host option and return as sanitized string.
 *
 * This function queries the option setting for the CDN host to use
 *  and sanitizes the result. In the event that the option is not
 *  yet set, it sets the option to the default value as returned by
 *  the pipjqui_sanitize_cdnhost() function. In the event that the
 *  sanitized option returned differs from what is stored as in the
 *  WordPress options database for this setting, the WordPress option
 *  is updated with the sanitized version.
 *
 * @return string
 */
function pipjqui_get_cdnhost_option(): string
{
  if ( defined( 'PIPJQ_PLUGIN_VERSION' ) && function_exists( 'pipjq_get_cdnhost_option' ) ) {
    // Defer to pipfrosch jQuery for this setting
    $host = pipjq_get_cdnhost_option();
    return pipjqui_sanitize_cdnhost( $host );
  }
  $default = pipjqui_sanitize_cdnhost( 'use default' );
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
 * Initialize options
 *
 * This function makes sure the options are defined in the WordPress options
 *  database and sets them to the default values if they are not already
 *  defined. This script is run during plugin activation.
 *
 * @return void
 */
function pipjqui_initialize_options() {
  $foo = pipjqui_get_option_as_boolean( 'pipjqui_cdn', false );
  $foo = pipjqui_get_option_as_boolean( 'pipjqui_sri' );
  $foo = pipjqui_get_option_as_boolean( 'pipjqui_demo', false );
  $foo = pipjqui_get_cdnhost_option();
  $test = get_option( 'pipjqui_plugin_version' );
  if ( ( is_bool ($test) ) && ( ! $test ) ) {
      add_option( 'pipjqui_plugin_version', PIPJQUI_PLUGIN_VERSION );
  } else {
      update_option( 'pipjqui_plugin_version', PIPJQUI_PLUGIN_VERSION );
  }
  $test = get_option( 'pipjqui_jquery_ui_version' );
  if ( ( is_bool ($test) ) && ( ! $test ) ) {
    add_option( 'pipjqui_jquery_ui_version', PIPJQUIV );
  } else {
    update_option( 'pipjqui_jquery_ui_version', PIPJQUIV );
  }
}

/**
 * Creates a .htaccess file for mod_expires
 *
 * @return void
 */
function pipjqui_mod_expires(): void
{
  $htaccess = PIPJQUI_PLUGIN_DIR . ".htaccess";
  if ( file_exists( $htaccess ) ) {
    // do not overwrite if already exists
    return;
  }
  if ( is_writeable( dirname( $htaccess ) ) ) {
    $contents  = '<IfModule mod_expires.c>' . PHP_EOL;
    $contents .= '  ExpiresActive On' . PHP_EOL;
    $contents .= '  <FilesMatch "\.min\.(css|js)">' . PHP_EOL;
    $contents .= '    ExpiresDefault "access plus 1 years"' . PHP_EOL;
    $contents .= '  </FilesMatch>' . PHP_EOL;
    $contents .= '</IfModule>' . PHP_EOL . PHP_EOL;
    file_put_contents( $htaccess, $contents );
  }
}

/**
 * Callback to see if installed version of plugin is upgrade
 *
 * This also serves purpose of activation hook but in a way that should
 *  be compatible with mu plugins.
 *
 * @return void
 */
function pipjqui_upgrade_check(): void
{
  $test = get_option( 'pipjqui_plugin_version' );
  if ( ! is_string( $test ) || ( $test !== PIPJQUI_PLUGIN_VERSION ) ) {
    pipjqui_initialize_options();
    pipjqui_mod_expires();
  }
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
  $src = PIPJQUI_PLUGIN_WEBPATH . 'themes/base/jquery-ui.min.css';
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
        $base = 'https://ajax.googleapis.com/ajax/libs/jqueryui/';
        $path = '/themes/' . $stub . '/jquery-ui.min.css';
        $src = $base . PIPJQUIV . $path;
        wp_register_style( $handle, $src, array('jquery-ui-base'), null );
        break;
      default:
        $src = PIPJQUI_PLUGIN_WEBPATH . 'themes/' . $stub . '/jquery-ui.min.css';
        // when serving locally include non-null version parameter
        //  when serving locally, we do not need base as fall-back dep
        wp_register_style( $handle, $src, array(''), PIPJQUIV );
    }
  }
  // use base by default
  $handle = 'jquery-ui-base';
  wp_register_style( 'jquery-ui-theme-active', false, array( $handle ), null );
  add_filter( 'style_loader_tag', 'pipjqui_theme_cdn_attributes', 10, 3 );
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
      $rs->jqueryui = PIPJQUI_PLUGIN_WEBPATH . 'jquery-ui.min.js';
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
function pipjqui_fallback_for_cdn_failure(): string
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
  if ( $handle === 'pipfrosch-jquery-ui-core' ) {
    $html = pipjqui_fallback_for_cdn_failure();
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
  if ( $handle === 'pipfrosch-jquery-ui-core' ) {
    $html = pipjqui_fallback_for_cdn_failure();
    return '<script src="' . $source . '" crossorigin="anonymous"></script>' . PHP_EOL . $html;
  }
  return $tag;
}

function pipjqui_update_wpcore_jqueryui()
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
  if ( $srcuri->cdn ) {
    wp_register_script( 'pipfrosch-jquery-ui-core', $srcuri->jqueryui, array( 'jquery-core' ), null );
  } else {
    wp_register_script( 'pipfrosch-jquery-ui-core', $srcuri->jqueryui, array( 'jquery-core' ), PIPJQUIV );
  }
  // set up the aliases
  wp_register_script( 'jquery-ui-core', false, array( 'pipfrosch-jquery-ui-core' ), null );
  foreach( $alias_components as $component ) {
    wp_register_script( $component, false, array( 'pipfrosch-jquery-ui-core' ), null );
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
  if ( wp_script_is( 'pipfrosch-jquery-ui-core' ) ) {
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

/* For Settings API */

/**
 * Sanitize checkbox input.
 *
 * This plugin likes the faux boolean options set to be a string of "0" for false
 *  and "1" for true. The form sets a value a "1" when checked. If a string that
 *  evaluates as the integer 1 when recast to integer is supplies, this function
 *  will output the string "1". Any other value and it outputs the string "0".
 *
 * @param mixed The string passed to this callback from the WordPress options form
 *              processing.
 *
 * @return string
 */
function pipjqui_sanitize_checkbox( $input ): string
{
  if ( is_bool( $input ) && $input ) {
    return "1";
  } 
  if ( ! is_string( $input ) ) {
    return "0";
  }
  $input = sanitize_text_field( $input );
  if ( is_numeric( $input ) ) {
    $num = intval( $input );
    if ( $num === 1 ) {
      return "1";
    }
  }
  return "0";
}

/**
 * Settings form helpers
 *
 * Callback function used by the WordPress core function `add_settings_section()`
 *  to provide some recommendations for the plugin settings.
 *
 * @return void
 */
function pipjqui_settings_form_text_helpers(): void
{
  if ( ! defined( 'PIPJQ_SETTINGS_PAGE_SLUG_NAME' ) ) {
    $string  = '<p>' . __( 'It is recommended that you enable the', 'pipfrosch-jqueryui' );
    $string .= ' <em>' . __( 'Use Content Distribution Network', 'pipfrosch-jqueryui' ) . '</em> ';
    $string .= __( 'option', 'pipfrosch-jqueryui' ) . '.</p>' . PHP_EOL;
    $string .= '<p>' . __( 'It is recommended that you enable the', 'pipfrosch-jqueryui' );
    $string .= ' <em>' . __( 'Use Subresource Integrity', 'pipfrosch-jqueryui' ) . '</em> ';
    $string .= __( 'option (default)', 'pipfrosch-jqueryui' ) . '.</p>' . PHP_EOL;
    echo $string;
  }
  $string  = '<p>' . __( 'Activating the', 'pipfrosch-jqueryui' );
  $string .= ' <em>' . __( 'Enable', 'pipfrosch-jqueryui' ) . ' jQuery UI ' . __( 'Demo', 'pipfrosch-jqueryui' ) . '</em> ';
  $string .= __('allows you to use the shortcode' , 'pipfrosch-jqueryui' );
  $string .= ' <code>[jqueryui-demo]</code> ';
  $string .= __( 'to test whether or not', 'pipfrosch-jqueryui' );
  $string .= ' jQuery UI ';
  $string .= __( 'is working' );
  $string .= '.</p>' . PHP_EOL;
  echo $string; 
}

/**
 * Generate checkbox input HTML snippet for the ‘Use Content Distribution Network’ option.
 *
 * @return void
 */
function pipjqui_cdn_input_tag(): void
{
  $cdn = pipjqui_get_option_as_boolean( 'pipjqui_cdn', false );
  $checked = '';
  if ( $cdn ) {
    $checked = ' checked="checked"';
  }
  echo '<input type="checkbox" name="pipjqui_cdn" id="pipjqui_cdn" value="1"' . $checked . '>';
}

/**
 * Generate checkbox input HTML snippet for the ‘Use Subresource Integrity’ option.
 *
 * @return void
 */
function pipjqui_sri_input_tag(): void
{
  $sri = pipjqui_get_option_as_boolean( 'pipjqui_sri' );
  $checked = '';
  if ( $sri ) {
    $checked = ' checked="checked"';
  }
  echo '<input type="checkbox" name="pipjqui_sri" id="pipjqui_sri" value="1"' . $checked . '>';
}

/**
 * Generate checkbox input HTML snippet for the ‘jQuery UI demo’ option.
 *
 * @return void
 */
function pipjqui_demo_input_tag(): void
{
  $demo = pipjqui_get_option_as_boolean( 'pipjqui_demo', false );
  $checked = '';
  if ( $demo ) {
    $checked = ' checked="checked"';
  }
  echo '<input type="checkbox" name="pipjqui_demo" id="pipjqui_demo" value="1"' . $checked . '>';
}

/**
 * Generate select and child option tag HTML snippet for the ‘Select Public CDN Service’ menu.
 *
 * @return void
 */
function pipjqui_cdnhost_select_tag(): void
{
  $cdnhost = pipjqui_get_cdnhost_option();
  // translators: This array is of proper names and they do not get translated
  $values = array( 'jQuery.com CDN',
                   'CloudFlare CDNJS',
                   'jsDelivr CDN',
                   'Microsoft CDN',
                   'Google CDN' );
  $html = '<select name="pipjqui_cdnhost" id="pipjqui_cdnhost">' . PHP_EOL;
  foreach( $values as $value ) {
    $selected = '';
    if ( $cdnhost === $value ) {
      $selected = ' selected="selected"';
    }
    $html .= '  <option value="' . $value . '"' . $selected . '>' . $value . '</option>' . PHP_EOL;
  }
  $html .= '</select>' . PHP_EOL;
  echo $html;
}

/**
 * Creates the HTML needed for the Settings API form.
 *
 * This function notifies the administrator what version of the jQuery UI library and
 *  is available, as well as what Content Distribution Network is currently configured to be
 *  used. It then creates the HTML <form/> node that an administrator can use to change the
 *  settings associated with this WordPress plugin.
 *  This function is called as a callback by the WordPress core function `add_options_page()`
 *  to make the form available in the Settings menu.
 *
 * @return void
 */
function pipjqui_options_page_form(): void
{
  $cdn = pipjqui_get_option_as_boolean( 'pipjqui_cdn', false );
  $parenthesis = '(' . __( 'disabled', 'pipfrosch-jqueryui' ) . ')';
  if ( $cdn ) {
    $parenthesis = '(' . __( 'enabled', 'pipfrosch-jqueryui' ) . ')';
  }
  $cdnhost = pipjqui_get_cdnhost_option();
  $s = array( '/CDN$/' , '/CDNJS/' );
  $r = array( '<abbr>CDN</abbr>' , '<abbr>CDNJS</abbr>' );
  $cdnhost = preg_replace($s, $r, $cdnhost);
  $html  = '    <h2>Pipfrosch jQuery UI ' . __('Plugin Management', 'pipfrosch-jqueryui') . '</h2>' . PHP_EOL;
  $html .= '    <p>jQuery UI ' . __( 'Version', 'pipfrosch-jqueryui') . ': ' . PIPJQUIV . '</p>' . PHP_EOL;
  $html .= '    <p>' . __( 'Current', '') . ' <abbr title="' . esc_attr__( 'Content Distribution Network' , 'pipfrosch-jqueryui');
  $html .= '">CDN</abbr>: ' . $cdnhost . ' ' . $parenthesis . '</p>' . PHP_EOL;
  $html .= '    <form method="post" action="options.php">' . PHP_EOL;
  echo $html;
  settings_fields( PIPJQUI_OPTIONS_GROUP );
  do_settings_sections( PIPJQUI_SETTINGS_PAGE_SLUG_NAME );
  $html  = '      <p>' . __( 'Note that the', 'pipfrosch-jqueryui' ) . ' <em>' . __( 'Use Subresource Integrity', 'pipfrosch-jqueryui' );
  $html .= '</em> ' . __( 'option only has meaning when', 'pipfrosch-jqueryui' ) . ' <em>';
  $html .= __( 'Use Content Distribution Network', 'pipfrosch-jqueryui' ) . '</em> ';
  $html .= __( 'is enabled', 'pipfrosch-jqueryui') . '.</p>' . PHP_EOL;
  $html .= get_submit_button() . PHP_EOL;
  $html .= '    </form>' . PHP_EOL;
  echo $html;
}

/**
 * Set up the WordPress Settings API.
 *
 * This function is a callback added to the `admin_init` action by the WordPress
 *  Core function `add_action()` function used in the main plugin PHP script.
 *
 * @return void
 */
function pipjqui_register_settings(): void
{
  if ( ! defined( 'PIPJQ_SETTINGS_PAGE_SLUG_NAME' ) ) {
    register_setting( PIPJQUI_OPTIONS_GROUP,
                      'pipjqui_cdn',
                      array( 'sanitize_callback' => 'pipjqui_sanitize_checkbox' ) );
    register_setting( PIPJQUI_OPTIONS_GROUP,
                      'pipjqui_sri',
                      array( 'sanitize_callback' => 'pipjqui_sanitize_checkbox' ) );
    register_setting( PIPJQUI_OPTIONS_GROUP,
                      'pipjqui_cdnhost',
                      array( 'sanitize_callback' => 'pipjqui_sanitize_cdnhost' ) );
    register_setting( PIPJQUI_OPTIONS_GROUP,
                      'pipjqui_demo',
                      array( 'sanitize_callback' => 'pipjqui_sanitize_checkbox' ) );
    add_settings_section( PIPJQUI_SECTION_SLUG_NAME,
                          'jQuery UI Options',
                          'pipjqui_settings_form_text_helpers',
                          PIPJQUI_SETTINGS_PAGE_SLUG_NAME );
    add_settings_field( 'pipjqui_cdn',
                        __( 'Use Content Distribution Network', 'pipfrosch-jqueryui' ),
                        'pipjqui_cdn_input_tag',
                        PIPJQUI_SETTINGS_PAGE_SLUG_NAME,
                        PIPJQUI_SECTION_SLUG_NAME,
                        array( 'label_for' => 'pipjqui_cdn' ) );
    add_settings_field( 'pipjqui_sri',
                        __( 'Use Subresource Integrity', 'pipfrosch-jqueryui' ),
                        'pipjqui_sri_input_tag',
                        PIPJQUI_SETTINGS_PAGE_SLUG_NAME,
                        PIPJQUI_SECTION_SLUG_NAME,
                        array( 'label_for' => 'pipjqui_sri' ) );
    // Translators: CDN is an abbreviation and should not be translated
    add_settings_field( 'pipjqui_cdnhost',
                        __( 'Select Public CDN Service', 'pipfrosch-jqueryui' ),
                        'pipjqui_cdnhost_select_tag',
                        PIPJQUI_SETTINGS_PAGE_SLUG_NAME,
                        PIPJQUI_SECTION_SLUG_NAME,
                        array( 'label_for' => 'pipjqui_cdnhost' ) );
    add_settings_field( 'pipjqui_demo',
                        __( 'Enable', 'pipfrosch-jqueryui' ) . ' jQuery UI ' . __( 'Demo', 'pipfrosch-jqueryui' ),
                        'pipjqui_demo_input_tag',
                        PIPJQUI_SETTINGS_PAGE_SLUG_NAME,
                        PIPJQUI_SECTION_SLUG_NAME,
                        array( 'label_for' => 'pipjqui_demo' ) );
  } else {
    register_setting( PIPJQ_OPTIONS_GROUP,
                      'pipjqui_demo',
                      array( 'sanitize_callback' => 'pipjqui_sanitize_checkbox' ) );
    add_settings_section( PIPJQUI_SECTION_SLUG_NAME,
                          'jQuery UI Options',
                          'pipjqui_settings_form_text_helpers',
                          PIPJQ_SETTINGS_PAGE_SLUG_NAME );
    add_settings_field( 'pipjqui_demo',
                        __( 'Enable', 'pipfrosch-jqueryui' ) . ' jQuery UI ' . __( 'Demo', 'pipfrosch-jqueryui' ),
                        'pipjqui_demo_input_tag',
                        PIPJQ_SETTINGS_PAGE_SLUG_NAME,
                        PIPJQUI_SECTION_SLUG_NAME,
                        array( 'label_for' => 'pipjqui_demo' ) );
  }
}

/**
 * Registers the Settings API form for changing options.
 *
 * Basically just wraps the WordPress Core function `add_options_page()`
 *  in a callback added to the `admin_menu` action by the WordPress
 *  Core function `add_action()` function used in the main plugin PHP script.
 *
 * @return void
 */
function pipjqui_register_options_page(): void
{
  if ( ! defined( 'PIPJQ_SETTINGS_PAGE_SLUG_NAME' ) ) {
    add_options_page( 'jQuery UI ' . PIPJQUIV . ' ' . __( 'Options', 'pipfrosch-jqueryui' ),
                      'jQuery UI ' . __( 'Options', 'pipfrosch-jqueryui' ),
                      'manage_options',
                      'pipfrosch_jqueryui',
                      'pipjqui_options_page_form' );
    }
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
  // use the WordPress version if we can't detect WordPress Theme version
  $version = pipjqui_get_active_theme_version();
  // try to detect theme version
  
  if ( strlen( trim( $dependency ) ) === 0 ) {
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