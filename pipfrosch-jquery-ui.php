<?php

/* header stuff here */

/* only do setting stuff on admin page, do not update jQuery UI if on admin page */

if ( is_admin() ) {
  $foo = 'bar';
} else {
  add_action( 'wp_enqueue_scripts', 'pipjqui_register_themes' );
  add_action( 'wp_enqueue_scripts', 'pipjq_update_wpcore_jqueryui' );
  //
  // NOTE FOR BELOW - may not be necessary if I can declare a style sheet
  //  as a dependency for a script, I have to test. Should be able to.
  // If I can then all I have to do is specify jquery-ui-theme-active as a
  //  dependency of jquery-ui-core and I do not need pipjqui_load_default_theme()
  add_action( 'wp_enqueue_scripts', 'pipjqui_load_default_theme', PHP_INT_MAX );
}