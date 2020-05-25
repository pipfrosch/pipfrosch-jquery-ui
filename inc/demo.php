<?php

function pipjqui_demo_accordion(): void
{
  $html  = '<!-- Accordion -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Accordion</h2>' . PHP_EOL;
  $html .= '<div id="accordion">' . PHP_EOL;
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
  $html .= '</div>' . PHP_EOL . PHP_EOL;
  echo $html;
}

function pipjqui_demo_checkboxradio(): void
{
  $html  = '<!-- Checkboxradio -->' . PHP_EOL;
  $html .= '<form style="margin-top: 1em;">' . PHP_EOL;
  $html .= '  <div id="radioset">' . PHP_EOL;
  $html .= '    <input type="radio" id="radio1" name="radio"><label for="radio1">Choice 1</label>' . PHP_EOL;
  $html .= '    <input type="radio" id="radio2" name="radio" checked="checked"><label for="radio2">Choice 2</label>' . PHP_EOL;
  $html .= '    <input type="radio" id="radio3" name="radio"><label for="radio3">Choice 3</label>' . PHP_EOL;
  $html .= '  </div>' . PHP_EOL;
  $html .= '</form>' . PHP_EOL . PHP_EOL;
  echo $html;
}

function pipjqui_demo_controlgroup(): void
{
  $html  = '<!-- Controlgroup -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Controlgroup</h2>' . PHP_EOL;
  $html .= '<fieldset>' . PHP_EOL;
  $html .= '  <legend>Rental Car</legend>' . PHP_EOL;
  $html .= '  <div id="controlgroup">' . PHP_EOL;
  $html .= '    <select id="car-type">' . PHP_EOL;
  $html .= '      <option>Compact car</option>' . PHP_EOL;
  $html .= '      <option>Midsize car</option>' . PHP_EOL;
  $html .= '      <option>Full size car</option>' . PHP_EOL;
  $html .= '      <option>SUV</option>' . PHP_EOL;
  $html .= '      <option>Luxury</option>' . PHP_EOL;
  $html .= '      <option>Truck</option>' . PHP_EOL;
  $html .= '      <option>Van</option>' . PHP_EOL;
  $html .= '    </select>' . PHP_EOL;
  $html .= '    <label for="transmission-standard">Standard</label>' . PHP_EOL;
  $html .= '    <input type="radio" name="transmission" id="transmission-standard">' . PHP_EOL;
  $html .= '    <label for="transmission-automatic">Automatic</label>' . PHP_EOL;
  $html .= '    <input type="radio" name="transmission" id="transmission-automatic">' . PHP_EOL;
  $html .= '    <label for="insurance">Insurance</label>' . PHP_EOL;
  $html .= '    <input type="checkbox" name="insurance" id="insurance">' . PHP_EOL;
  $html .= '    <label for="horizontal-spinner" class="ui-controlgroup-label"># of cars</label>' . PHP_EOL;
  $html .= '    <input id="horizontal-spinner" class="ui-spinner-input">' . PHP_EOL;
  $html .= '    <button>Book Now!</button>' . PHP_EOL;
  $html .= '  </div>' . PHP_EOL;
  $html .= '</fieldset>' . PHP_EOL . PHP_EOL;
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
  pipjqui_demo_checkboxradio();
  pipjqui_demo_controlgroup();
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