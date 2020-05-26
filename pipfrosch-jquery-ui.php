<?php
/**
 * Plugin Name:       Pipfrosch jQuery UI
 * Plugin URI:        https://pipfrosch.com/floss/pipfrosch-jquery-ui/
 * Description:       Provides a modern jQuery UI library for WordPress frontend
 * Tags:              jQuery,jQuery UI,jQuery-UI
 * Version:           0.0.3pre
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
define( "PIPJQUI_OPTIONS_GROUP", 'pipjq_ui_opgroup');
define( "PIPJQUI_SECTION_SLUG_NAME", 'pipjqui_settings_form' );
define( "PIPJQUI_SETTINGS_PAGE_SLUG_NAME", 'pipjqui_options');

require_once( PIPJQUI_PLUGIN_DIR . 'versions.php' );
require_once( PIPJQUI_PLUGIN_DIR . 'inc/functions.php' );
require_once( PIPJQUI_PLUGIN_DIR . 'inc/cdn.php' );
require_once( PIPJQUI_PLUGIN_DIR . 'demo/demo.php' );

pipjqui_upgrade_check();
/* only do setting stuff on admin page, do not update jQuery UI if on admin page */

if ( is_admin() ) {
  add_action( 'admin_init', 'pipjqui_register_settings', 20 );
  add_action( 'admin_menu', 'pipjqui_register_options_page' );
} else {
  add_action( 'wp_enqueue_scripts', 'pipjqui_register_themes' );
  add_action( 'wp_enqueue_scripts', 'pipjqui_update_wpcore_jqueryui' );

  // NOTE FOR BELOW - it does not seem that WP has a way to make a script
  //  depend on a style sheet hence this hack, which has to run very late
  //  to avoid race condition
  add_action( 'wp_enqueue_scripts', 'pipjqui_load_default_theme', PHP_INT_MAX );
  
  // for the demo page
  $demo = pipjqui_get_option_as_boolean( 'pipjqui_demo', false );
  if ( $demo ) {
    wp_register_style( 'pipjqui-democss', PIPJQUI_PLUGIN_WEBPATH . 'demo/pipjqui-demo.css', array(), '2' );
    wp_register_script( 'pipjqui-demojs', PIPJQUI_PLUGIN_WEBPATH . 'demo/pipjqui-demo.js', array('jquery-ui-core'), '1', true );
    add_action( 'wp_enqueue_scripts', 'pipjqui_shortcode_style');
    add_action( 'init', 'pipjqui_register_shortcodes');
  }
}