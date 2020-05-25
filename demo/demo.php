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

function pipjqui_demo_framework_icons(): void
{
  $html  = '<!-- Framework Icons -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Framework Icons (content color preview)</h2>' . PHP_EOL;
  $html .= '<ul id="icons" class="ui-widget ui-helper-clearfix">' . PHP_EOL;
  
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-1-n"><span class="ui-icon ui-icon-caret-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-1-ne"><span class="ui-icon ui-icon-caret-1-ne"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-1-e"><span class="ui-icon ui-icon-caret-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-1-se"><span class="ui-icon ui-icon-caret-1-se"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-1-s"><span class="ui-icon ui-icon-caret-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-1-sw"><span class="ui-icon ui-icon-caret-1-sw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-1-w"><span class="ui-icon ui-icon-caret-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-1-nw"><span class="ui-icon ui-icon-caret-1-nw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-2-n-s"><span class="ui-icon ui-icon-caret-2-n-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-caret-2-e-w"><span class="ui-icon ui-icon-caret-2-e-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-1-n"><span class="ui-icon ui-icon-triangle-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-1-ne"><span class="ui-icon ui-icon-triangle-1-ne"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-1-e"><span class="ui-icon ui-icon-triangle-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-1-se"><span class="ui-icon ui-icon-triangle-1-se"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-1-s"><span class="ui-icon ui-icon-triangle-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-1-sw"><span class="ui-icon ui-icon-triangle-1-sw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-1-w"><span class="ui-icon ui-icon-triangle-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-1-nw"><span class="ui-icon ui-icon-triangle-1-nw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-2-n-s"><span class="ui-icon ui-icon-triangle-2-n-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-triangle-2-e-w"><span class="ui-icon ui-icon-triangle-2-e-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-1-n"><span class="ui-icon ui-icon-arrow-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-1-ne"><span class="ui-icon ui-icon-arrow-1-ne"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-1-e"><span class="ui-icon ui-icon-arrow-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-1-se"><span class="ui-icon ui-icon-arrow-1-se"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-1-s"><span class="ui-icon ui-icon-arrow-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-1-sw"><span class="ui-icon ui-icon-arrow-1-sw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-1-w"><span class="ui-icon ui-icon-arrow-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-1-nw"><span class="ui-icon ui-icon-arrow-1-nw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-2-n-s"><span class="ui-icon ui-icon-arrow-2-n-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-2-ne-sw"><span class="ui-icon ui-icon-arrow-2-ne-sw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-2-e-w"><span class="ui-icon ui-icon-arrow-2-e-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-2-se-nw"><span class="ui-icon ui-icon-arrow-2-se-nw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowstop-1-n"><span class="ui-icon ui-icon-arrowstop-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowstop-1-e"><span class="ui-icon ui-icon-arrowstop-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowstop-1-s"><span class="ui-icon ui-icon-arrowstop-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowstop-1-w"><span class="ui-icon ui-icon-arrowstop-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-1-n"><span class="ui-icon ui-icon-arrowthick-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-1-ne"><span class="ui-icon ui-icon-arrowthick-1-ne"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-1-e"><span class="ui-icon ui-icon-arrowthick-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-1-se"><span class="ui-icon ui-icon-arrowthick-1-se"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-1-s"><span class="ui-icon ui-icon-arrowthick-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-1-sw"><span class="ui-icon ui-icon-arrowthick-1-sw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-1-w"><span class="ui-icon ui-icon-arrowthick-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-1-nw"><span class="ui-icon ui-icon-arrowthick-1-nw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-2-n-s"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-2-ne-sw"><span class="ui-icon ui-icon-arrowthick-2-ne-sw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-2-e-w"><span class="ui-icon ui-icon-arrowthick-2-e-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthick-2-se-nw"><span class="ui-icon ui-icon-arrowthick-2-se-nw"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthickstop-1-n"><span class="ui-icon ui-icon-arrowthickstop-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthickstop-1-e"><span class="ui-icon ui-icon-arrowthickstop-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthickstop-1-s"><span class="ui-icon ui-icon-arrowthickstop-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowthickstop-1-w"><span class="ui-icon ui-icon-arrowthickstop-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowreturnthick-1-w"><span class="ui-icon ui-icon-arrowreturnthick-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowreturnthick-1-n"><span class="ui-icon ui-icon-arrowreturnthick-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowreturnthick-1-e"><span class="ui-icon ui-icon-arrowreturnthick-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowreturnthick-1-s"><span class="ui-icon ui-icon-arrowreturnthick-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowreturn-1-w"><span class="ui-icon ui-icon-arrowreturn-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowreturn-1-n"><span class="ui-icon ui-icon-arrowreturn-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowreturn-1-e"><span class="ui-icon ui-icon-arrowreturn-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowreturn-1-s"><span class="ui-icon ui-icon-arrowreturn-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowrefresh-1-w"><span class="ui-icon ui-icon-arrowrefresh-1-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowrefresh-1-n"><span class="ui-icon ui-icon-arrowrefresh-1-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowrefresh-1-e"><span class="ui-icon ui-icon-arrowrefresh-1-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrowrefresh-1-s"><span class="ui-icon ui-icon-arrowrefresh-1-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-4"><span class="ui-icon ui-icon-arrow-4"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-arrow-4-diag"><span class="ui-icon ui-icon-arrow-4-diag"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-extlink"><span class="ui-icon ui-icon-extlink"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-newwin"><span class="ui-icon ui-icon-newwin"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-refresh"><span class="ui-icon ui-icon-refresh"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-shuffle"><span class="ui-icon ui-icon-shuffle"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-transfer-e-w"><span class="ui-icon ui-icon-transfer-e-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-transferthick-e-w"><span class="ui-icon ui-icon-transferthick-e-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-folder-collapsed"><span class="ui-icon ui-icon-folder-collapsed"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-folder-open"><span class="ui-icon ui-icon-folder-open"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-document"><span class="ui-icon ui-icon-document"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-document-b"><span class="ui-icon ui-icon-document-b"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-note"><span class="ui-icon ui-icon-note"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-mail-closed"><span class="ui-icon ui-icon-mail-closed"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-mail-open"><span class="ui-icon ui-icon-mail-open"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-suitcase"><span class="ui-icon ui-icon-suitcase"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-comment"><span class="ui-icon ui-icon-comment"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-person"><span class="ui-icon ui-icon-person"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-print"><span class="ui-icon ui-icon-print"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-trash"><span class="ui-icon ui-icon-trash"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-locked"><span class="ui-icon ui-icon-locked"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-unlocked"><span class="ui-icon ui-icon-unlocked"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-bookmark"><span class="ui-icon ui-icon-bookmark"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-tag"><span class="ui-icon ui-icon-tag"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-home"><span class="ui-icon ui-icon-home"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-flag"><span class="ui-icon ui-icon-flag"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-calculator"><span class="ui-icon ui-icon-calculator"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-cart"><span class="ui-icon ui-icon-cart"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-pencil"><span class="ui-icon ui-icon-pencil"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-clock"><span class="ui-icon ui-icon-clock"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-disk"><span class="ui-icon ui-icon-disk"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-calendar"><span class="ui-icon ui-icon-calendar"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-zoomin"><span class="ui-icon ui-icon-zoomin"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-zoomout"><span class="ui-icon ui-icon-zoomout"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-search"><span class="ui-icon ui-icon-search"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-wrench"><span class="ui-icon ui-icon-wrench"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-gear"><span class="ui-icon ui-icon-gear"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-heart"><span class="ui-icon ui-icon-heart"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-star"><span class="ui-icon ui-icon-star"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-link"><span class="ui-icon ui-icon-link"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-cancel"><span class="ui-icon ui-icon-cancel"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-plus"><span class="ui-icon ui-icon-plus"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-plusthick"><span class="ui-icon ui-icon-plusthick"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-minus"><span class="ui-icon ui-icon-minus"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-minusthick"><span class="ui-icon ui-icon-minusthick"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-close"><span class="ui-icon ui-icon-close"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-closethick"><span class="ui-icon ui-icon-closethick"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-key"><span class="ui-icon ui-icon-key"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-lightbulb"><span class="ui-icon ui-icon-lightbulb"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-scissors"><span class="ui-icon ui-icon-scissors"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-clipboard"><span class="ui-icon ui-icon-clipboard"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-copy"><span class="ui-icon ui-icon-copy"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-contact"><span class="ui-icon ui-icon-contact"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-image"><span class="ui-icon ui-icon-image"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-video"><span class="ui-icon ui-icon-video"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-script"><span class="ui-icon ui-icon-script"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-alert"><span class="ui-icon ui-icon-alert"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-info"><span class="ui-icon ui-icon-info"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-notice"><span class="ui-icon ui-icon-notice"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-help"><span class="ui-icon ui-icon-help"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-check"><span class="ui-icon ui-icon-check"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-bullet"><span class="ui-icon ui-icon-bullet"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-radio-off"><span class="ui-icon ui-icon-radio-off"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-radio-on"><span class="ui-icon ui-icon-radio-on"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-pin-w"><span class="ui-icon ui-icon-pin-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-pin-s"><span class="ui-icon ui-icon-pin-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-play"><span class="ui-icon ui-icon-play"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-pause"><span class="ui-icon ui-icon-pause"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-seek-next"><span class="ui-icon ui-icon-seek-next"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-seek-prev"><span class="ui-icon ui-icon-seek-prev"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-seek-end"><span class="ui-icon ui-icon-seek-end"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-seek-first"><span class="ui-icon ui-icon-seek-first"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-stop"><span class="ui-icon ui-icon-stop"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-eject"><span class="ui-icon ui-icon-eject"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-volume-off"><span class="ui-icon ui-icon-volume-off"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-volume-on"><span class="ui-icon ui-icon-volume-on"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-power"><span class="ui-icon ui-icon-power"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-signal-diag"><span class="ui-icon ui-icon-signal-diag"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-signal"><span class="ui-icon ui-icon-signal"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-battery-0"><span class="ui-icon ui-icon-battery-0"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-battery-1"><span class="ui-icon ui-icon-battery-1"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-battery-2"><span class="ui-icon ui-icon-battery-2"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-battery-3"><span class="ui-icon ui-icon-battery-3"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-plus"><span class="ui-icon ui-icon-circle-plus"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-minus"><span class="ui-icon ui-icon-circle-minus"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-close"><span class="ui-icon ui-icon-circle-close"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-triangle-e"><span class="ui-icon ui-icon-circle-triangle-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-triangle-s"><span class="ui-icon ui-icon-circle-triangle-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-triangle-w"><span class="ui-icon ui-icon-circle-triangle-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-triangle-n"><span class="ui-icon ui-icon-circle-triangle-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-arrow-e"><span class="ui-icon ui-icon-circle-arrow-e"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-arrow-s"><span class="ui-icon ui-icon-circle-arrow-s"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-arrow-w"><span class="ui-icon ui-icon-circle-arrow-w"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-arrow-n"><span class="ui-icon ui-icon-circle-arrow-n"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-zoomin"><span class="ui-icon ui-icon-circle-zoomin"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-zoomout"><span class="ui-icon ui-icon-circle-zoomout"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circle-check"><span class="ui-icon ui-icon-circle-check"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circlesmall-plus"><span class="ui-icon ui-icon-circlesmall-plus"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circlesmall-minus"><span class="ui-icon ui-icon-circlesmall-minus"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-circlesmall-close"><span class="ui-icon ui-icon-circlesmall-close"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-squaresmall-plus"><span class="ui-icon ui-icon-squaresmall-plus"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-squaresmall-minus"><span class="ui-icon ui-icon-squaresmall-minus"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-squaresmall-close"><span class="ui-icon ui-icon-squaresmall-close"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-grip-dotted-vertical"><span class="ui-icon ui-icon-grip-dotted-vertical"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-grip-dotted-horizontal"><span class="ui-icon ui-icon-grip-dotted-horizontal"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-grip-solid-vertical"><span class="ui-icon ui-icon-grip-solid-vertical"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-grip-solid-horizontal"><span class="ui-icon ui-icon-grip-solid-horizontal"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-gripsmall-diagonal-se"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span></li>' . PHP_EOL;
  $html .= '  <li class="ui-state-default ui-corner-all" title=".ui-icon-grip-diagonal-se"><span class="ui-icon ui-icon-grip-diagonal-se"></span></li>' . PHP_EOL;
  $html .= '</ul>' . PHP_EOL;
  
  echo $html;
}

function pipjqui_demo_slider(): void
{
  $html  = '<!-- Slider -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Slider</h2>' . PHP_EOL;
  $html .= '<div id="slider"></div>' . PHP_EOL;
  echo $html;
}

function pipjqui_demo_datepicker(): void
{
  $html  = '<!-- Datepicker -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Datepicker</h2>' . PHP_EOL;
  $html .= '<div id="datepicker"></div>' . PHP_EOL;
  echo $html;
}

function pipjqui_demo_progressbar(): void
{
  $html  = '<!-- Progressbar -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Progressbar</h2>' . PHP_EOL;
  $html .= '<div id="progressbar"></div>' . PHP_EOL . PHP_EOL . PHP_EOL;
  echo $html;
}

function pipjqui_demo_select_menu(): void
{
  $html  = '<!-- Select Menu -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Selectmenu</h2>' . PHP_EOL;
  $html .= '<select id="selectmenu">' . PHP_EOL;
  $html .= '  <option>Slower</option>' . PHP_EOL;
  $html .= '  <option>Slow</option>' . PHP_EOL;
  $html .= '  <option selected="selected">Medium</option>' . PHP_EOL;
  $html .= '  <option>Fast</option>' . PHP_EOL;
  $html .= '  <option>Faster</option>' . PHP_EOL;
  $html .= '</select>' . PHP_EOL;
  echo $html;
}

function pipjqui_demo_spinner(): void
{
  $html  = '<!-- Spinner -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Spinner</h2>' . PHP_EOL;
  $html .= '<input id="spinner">' . PHP_EOL;
  echo $html;
}

function pipjqui_demo_menu(): void
{
  $html  = '<!-- Menu -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Menu</h2>' . PHP_EOL;
  $html .= '<ul style="width:100px;" id="menu">' . PHP_EOL;
  $html .= '  <li><div>Item 1</div></li>' . PHP_EOL;
  $html .= '  <li><div>Item 2</div></li>' . PHP_EOL;
  $html .= '  <li><div>Item 3</div>' . PHP_EOL;
  $html .= '    <ul>' . PHP_EOL;
  $html .= '      <li><div>Item 3-1</div></li>' . PHP_EOL;
  $html .= '      <li><div>Item 3-2</div></li>' . PHP_EOL;
  $html .= '      <li><div>Item 3-3</div></li>' . PHP_EOL;
  $html .= '      <li><div>Item 3-4</div></li>' . PHP_EOL;
  $html .= '      <li><div>Item 3-5</div></li>' . PHP_EOL;
  $html .= '    </ul>' . PHP_EOL;
  $html .= '  </li>' . PHP_EOL;
  $html .= '  <li><div>Item 4</div></li>' . PHP_EOL;
  $html .= '  <li><div>Item 5</div></li>' . PHP_EOL;
  $html .= '</ul>' . PHP_EOL;
  echo $html;
}

function pipjqui_demo_tooltip(): void
{
  $html  = '<!-- Tooltip -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Tooltip</h2>' . PHP_EOL;
  $html .= '<p id="tooltip">' . PHP_EOL;
  $html .= '  <a href="#" title="That&apos;s what this widget is">Tooltips</a> can be attached to any element. When you hover the element with your mouse, the title attribute is displayed in a little box next to the element, just like a native tooltip.' . PHP_EOL;
  $html .= '</p>' . PHP_EOL;
  echo $html;
}

function pipjqui_demo_highlight_error(): void
{
  $html  = '<!-- Highlight / Error -->' . PHP_EOL;
  $html .= '<h2 class="demoHeaders">Highlight / Error</h2>' . PHP_EOL;
  $html .= '<div class="ui-widget">' . PHP_EOL;
  $html .= '  <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">' . PHP_EOL;
  $html .= '    <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>' . PHP_EOL;
  $html .= '    <strong>Hey!</strong> Sample ui-state-highlight style.</p>' . PHP_EOL;
  $html .= '  </div>' . PHP_EOL;
  $html .= '</div>' . PHP_EOL;
  $html .= '<br />' . PHP_EOL;
  $html .= '<div class="ui-widget">' . PHP_EOL;
  $html .= '  <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">' . PHP_EOL;
  $html .= '    <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>' . PHP_EOL;
  $html .= '    <strong>Alert:</strong> Sample ui-state-error style.</p>' . PHP_EOL;
  $html .= '  </div>' . PHP_EOL;
  $html .= '</div>' . PHP_EOL . PHP_EOL . PHP_EOL;
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
  pipjqui_demo_framework_icons();
  pipjqui_demo_slider();
  pipjqui_demo_datepicker();
  pipjqui_demo_progressbar();
  pipjqui_demo_select_menu();
  pipjqui_demo_spinner();
  pipjqui_demo_menu();
  pipjqui_demo_tooltip();
  pipjqui_demo_highlight_error();
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