<?php
/**
 * Plugin Name:       Pipfrosch jQuery UI
 * Plugin URI:        https://pipfrosch.com/floss/pipfrosch-jquery-ui/
 * Description:       Provides a modern jQuery UI library for WordPress frontend
 * Tags:              jQuery,jQuery UI,jQuery-UI
 * Version:           0.0.2pre
 * Requires at least: 4.1.0
 * Tested up to:      5.4.1
 * Author:            Pipfrosch Press
 * Author URI:        https://pipfrosch.com/
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       pipfrosch-jquery-ui
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

$pipjqui_url_array = parse_url( plugin_dir_url( __FILE__ ) );

define( "PIPJQUI_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );
define( "PIPJQUI_PLUGIN_WEBPATH", $pipjqui_url_array['path'] );
define( "PIPJQUI_PLUGIN_VERSION", '0.0.2pre' );

/* defines for settings API here */

require_once( PIPJQUI_PLUGIN_DIR . 'versions.php' );
require_once( PIPJQUI_PLUGIN_DIR . 'inc/functions.php' );
require_once( PIPJQUI_PLUGIN_DIR . 'inc/cdn.php' );
require_once( PIPJQUI_PLUGIN_DIR . 'inc/demo.php' );

pipjqui_upgrade_check();
/* only do setting stuff on admin page, do not update jQuery UI if on admin page */

if ( is_admin() ) {
  $foo = 'bar';
} else {
  add_action( 'wp_enqueue_scripts', 'pipjqui_register_themes' );
  add_action( 'wp_enqueue_scripts', 'pipjqui_update_wpcore_jqueryui' );
  //
  // NOTE FOR BELOW - may not be necessary if I can declare a style sheet
  //  as a dependency for a script, I have to test. Should be able to.
  // If I can then all I have to do is specify jquery-ui-theme-active as a
  //  dependency of jquery-ui-core and I do not need pipjqui_load_default_theme()
  add_action( 'wp_enqueue_scripts', 'pipjqui_load_default_theme', PHP_INT_MAX );
  // for the demo page
  $demo = true;
  if ( $demo ) {
    wp_register_style( 'pipjqui-democss', PIPJQUI_PLUGIN_WEBPATH . 'demo/pipjqui-demo.css', array(), '1' );
    add_action( 'wp_enqueue_scripts', 'pipjqui_shortcode_style');
    add_action( 'init', 'pipjqui_register_shortcodes');
  }
}