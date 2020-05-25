<?php

function pipjqui_demo_accordion(): void
{
  $html  = '<!-- Accordion -->' . PHP_EOL;
  $html .= '<div id="accordion">' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Accordion</h2>' . PHP_EOL;
  $html .= '  <h3>First</h3>' . PHP_EOL;
  $html .= '  <div>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>' . PHP_EOL;
  $html .= '  <h3>Second</h3>' . PHP_EOL;
  $html .= '  <div>Phasellus mattis tincidunt nibh.</div>' . PHP_EOL;
  $html .= '  <h3>Third</h3>' . PHP_EOL;
  $html .= '  <div>Nam dui erat, auctor a, dignissim quis.</div>' . PHP_EOL;
  $html .= '</div>' . PHP_EOL . PHP_EOL;
  echo $html;
}

function pipjqui_demo_autocomplete(): void
{
  $html  = '<!-- Autocomplete -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Autocomplete</h2>' . PHP_EOL;
  $html .= '<div>' . PHP_EOL;
  $html .= '  <input id="autocomplete" title="type &#8216;a&#8217;">' . PHP_EOL;
  $html .= '</div>' . PHP_EOL;
  echo $html;
}







function pipjqui_demo_shortcode(): void
{
  echo '<div id="pipjqui-demo">' . PHP_EOL;
  echo '<h1>Welcome to jQuery UI via Pipfrosch Press!</h1>' . PHP_EOL;
  echo '<div class="ui-widget">' . PHP_EOL;
  echo '  <p>This page demonstrates the capabilities of jQuery UI. This demo page is adapted from the jQuery UI demo in the official download.</p>' . PHP_EOL;
  echo '</div>' . PHP_EOL;
  // include the demos
  pipjqui_demo_accordion();
  pipjqui_demo_autocomplete();
  // close opening div
  echo "</div>" . PHP_EOL;
}

function pipjqui_shortcode_style() {
  global $post;
  if ( isset($post->post_content) && has_shortcode( $post->post_content, 'jqueryui-demo' ) ) {
    wp_enqueue_style('pipjqui-democss');
    wp_enqueue_script('pipjqui-demojs');
  }
}


function pipjqui_register_shortcodes() {
  add_shortcode('jqueryui-demo', 'pipjqui_demo_shortcode');
}