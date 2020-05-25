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

function pipjqui_demo_tabs(): void
{
  $html  = '<!-- Tabs -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Tabs</h2>' . PHP_EOL;
  $html .= '<div id="tabs">' . PHP_EOL;
  $html .= '  <ul>' . PHP_EOL;
  $html .= '    <li><a href="#tabs-1">First</a></li>' . PHP_EOL;
  $html .= '    <li><a href="#tabs-2">Second</a></li>' . PHP_EOL;
  $html .= '    <li><a href="#tabs-3">Third</a></li>' . PHP_EOL;
  $html .= '  </ul>' . PHP_EOL;
  $html .= '  <div id="tabs-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>' . PHP_EOL;
  $html .= '  <div id="tabs-2">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</div>' . PHP_EOL;
  $html .= '  <div id="tabs-3">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>' . PHP_EOL;
  $html .= '</div>';
  echo $html;
}

function pipjqui_demo_dialog(): void
{
  $html  = '<!-- Dialog -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Dialog</h2>' . PHP_EOL;
  $html .= '<p>' . PHP_EOL;
  $html .= '  <button id="dialog-link" class="ui-button ui-corner-all ui-widget">' . PHP_EOL;
  $html .= '    <span class="ui-icon ui-icon-newwin"></span>Open Dialog' . PHP_EOL;
  $html .= '  </button>' . PHP_EOL;
  $html .= '</p>' . PHP_EOL . PHP_EOL . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Overlay and Shadow Classes</h2>' . PHP_EOL;
  $html .= '<div style="position: relative; width: 96%; height: 200px; padding:1% 2%; overflow:hidden;" class="fakewindowcontain">' . PHP_EOL;
  $html .= '  <p>Lorem ipsum dolor sit amet,  Nulla nec tortor. Donec id elit quis purus consectetur consequat. </p><p>Nam congue semper tellus. Sed erat dolor, dapibus sit amet, venenatis ornare, ultrices ut, nisi. Aliquam ante. Suspendisse scelerisque dui nec velit. Duis augue augue, gravida euismod, vulputate ac, facilisis id, sem. Morbi in orci. </p><p>Nulla purus lacus, pulvinar vel, malesuada ac, mattis nec, quam. Nam molestie scelerisque quam. Nullam feugiat cursus lacus.orem ipsum dolor sit amet, consectetur adipiscing elit. Donec libero risus, commodo vitae, pharetra mollis, posuere eu, pede. Nulla nec tortor. Donec id elit quis purus consectetur consequat. </p><p>Nam congue semper tellus. Sed erat dolor, dapibus sit amet, venenatis ornare, ultrices ut, nisi. Aliquam ante. Suspendisse scelerisque dui nec velit. Duis augue augue, gravida euismod, vulputate ac, facilisis id, sem. Morbi in orci. Nulla purus lacus, pulvinar vel, malesuada ac, mattis nec, quam. Nam molestie scelerisque quam. </p><p>Nullam feugiat cursus lacus.orem ipsum dolor sit amet, consectetur adipiscing elit. Donec libero risus, commodo vitae, pharetra mollis, posuere eu, pede. Nulla nec tortor. Donec id elit quis purus consectetur consequat. Nam congue semper tellus. Sed erat dolor, dapibus sit amet, venenatis ornare, ultrices ut, nisi. Aliquam ante. </p><p>Suspendisse scelerisque dui nec velit. Duis augue augue, gravida euismod, vulputate ac, facilisis id, sem. Morbi in orci. Nulla purus lacus, pulvinar vel, malesuada ac, mattis nec, quam. Nam molestie scelerisque quam. Nullam feugiat cursus lacus.orem ipsum dolor sit amet, consectetur adipiscing elit. Donec libero risus, commodo vitae, pharetra mollis, posuere eu, pede. Nulla nec tortor. Donec id elit quis purus consectetur consequat. Nam congue semper tellus. Sed erat dolor, dapibus sit amet, venenatis ornare, ultrices ut, nisi. </p>' . PHP_EOL . PHP_EOL . PHP_EOL;
  $html .= '  <!-- ui-dialog -->' . PHP_EOL;
  $html .= '  <div class="ui-widget-overlay ui-front"></div>' . PHP_EOL;
  $html .= '  <div style="position: absolute; width: 320px; left: 50px; top: 30px; padding: 1.2em" class="ui-widget ui-front ui-widget-content ui-corner-all ui-widget-shadow">' . PHP_EOL;
  $html .= '    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' . PHP_EOL;
  $html .= '  </div>' . PHP_EOL . PHP_EOL . PHP_EOL;
  $html .= '</div>' . PHP_EOL;
  $html .= '<!-- ui-dialog -->' . PHP_EOL;
  $html .= '<div id="dialog" title="Dialog Title">' . PHP_EOL;
  $html .= '  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>' . PHP_EOL;
  $html .= '</div>' . PHP_EOL;
  
  echo $html;
}





function pipjqui_demo_shortcode(): void
{
  echo '<div id="pipjqui-demo">' . PHP_EOL;
  echo '<h1>Welcome to jQuery UI via Pipfrosch Press!</h1>' . PHP_EOL;
  echo '<div class="ui-widget">' . PHP_EOL;
  echo '  <p>This page demonstrates some of the capabilities of jQuery UI, as well as the ease of integration into WordPress using the Pipfrosch jQuery UI plugin.<br />This demo page is adapted from the jQuery UI HTML demo in the official download.</p>' . PHP_EOL;
  echo '</div>' . PHP_EOL;
  // include the demos
  pipjqui_demo_accordion();
  pipjqui_demo_autocomplete();
  pipjqui_demo_checkboxradio();
  pipjqui_demo_controlgroup();
  pipjqui_demo_tabs();
  pipjqui_demo_dialog();
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