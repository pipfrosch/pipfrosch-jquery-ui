<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit; }

# remove options set by the plugin
delete_option( 'pipjqui_plugin_version' );
delete_option( 'pipjqui_cdn' );
delete_option( 'pipjqui_sri' );
delete_option( 'pipjqui_cdnhost' );
delete_option( 'pipjqui_jquery_ui_version' );
