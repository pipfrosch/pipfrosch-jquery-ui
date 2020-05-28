=== Pipfrosch jQuery UI ===
Contributors: pipfroschpress
Tags: jQuery
Donate link: https://pipfrosch.com/donate
Requires at least: 4.1.0
Tested up to: 5.4.1
Stable tag: trunk
Requires PHP: 7.0
License: MIT
License URI: https://opensource.org/licenses/MIT

Use jQuery UI 1.12.1 including standard themes with your WordPress powered website with a third party CDN if so desired.


== Description ==

The jQuery UI that currently ships with WordPress is version 1.11.4 and is packaged within WordPress as a bunch of individual scripts for each feature. WordPress also lacks the collection of standard themes, only having CSS files for the dialog feature. This plugin provides jQuery 1.12.1 a single file with all features and provides all the standard themes.

This plugin also optionally allows you to securely select a public CDN for jQuery UI and the standard themes, including the appropriate Subresource Integrity (SRI) and CrossOrigin attributes. Using a CDN can speed up the loading of your website as there is a good chance a client visiting your website already has the identical file in their browser cache and does not need to fetch it again.

When a CDN is used, a small amount of code is added to your pages to provide a fallback where jQuery UI and the jQuery UI theme are served from your site if either the CDN can not be reached by the client or if the SRI check fails.

The plugin will detect when jQuery UI is used and enqueue a theme automatically. You can select which jQuery UI theme is used by default but note that WordPress themes may choose to override the default set when configuring this plugin.

Due to the size of a single library (around 250 kB) loaded in the head node of WordPress pages where it is a render blocking resource, this plugin will add a prefetch link to pages that do not use jQuery UI in order to increase the odds a browser already has the file cached when it loads a page on your site that does use jQuery UI. It is also highly recommended that you enable the Public CDN option so that many of the users who visit a page with jQuery UI as the first page on your site they visit will likely already have it cached.

The updated jQuery UI will not replace the core jQuery for administration pages. This is to avoid potential breakage of administrative pages.

The options for this plugin are managed from the WordPress ‘Dashboard’ in the ‘Settings’ area, using the ‘jQuery Options’ menu option within the ‘Settings’ area if also have the Pipfrosch jQuery plugin installed, and the ‘jQuery UI Options’ menu option within the ‘Settings’ area if you do not have that plugin installed.


== Plugin Options ==

There are five configurable options you can customize.

= ‘Use Content Distribution Network’ option =

By default, the updated jQuery UI script and themes are served from within this WordPress plugin. This is because responsible plugin and theme developers do not (in my opinion) utilize third party resources by default.

I recommend you enable this option however doing so will result in frontend pages being served that reference a Third Party Resource. Links to those services and their privacy policies follows the section on Plugin Options.

Note that if you have the Pipfrosch jQuery plugin installed, this plugin will use the CDN option set by that plugin.

= ‘Use Subresource Integrity’ option =

Enabled by default.

This option only has meaning when the ‘Use Content Distribution Network’ option is enabled.

This option will add a Subresource Integrity hash that browsers can use to verify the resource retrieved is valid opposed to a modified possible trojan.

The only logical reason I can think of to disable this option is if you already have a different plugin that manages Subresource Integrity.

Note that if you have the Pipfrosch jQuery plugin installed, this plugin will use the SRI option set by that plugin.

= ‘Select Public CDN Service’ option =

Set to ‘jQuery.com CDN’ by default.

This option only has meaning when the ‘Use Content Distribution Network’ option is enabled.

This option lets you select which public CDN you wish to use from a list of five Public CDN services that are listed at https://jquery.com/download/#using-jquery-with-a-cdn

For many websites, the default ‘jQuery.com CDN’ is *probably* the best choice but it may not be the best choice for all websites, depending upon where the majority of your users are located geographically and which public CDN has a better response time in that geographical region.

Note that if you have the Pipfrosch jQuery plugin installed, this plugin will use the CDN option set by that plugin.

= ‘Enable jQuery UI Demo’ option =

Disabled by default.

This option when enabled allows you to use the `[jqueryui-demo]` shortcode on a page or blog post to test jQuery UI on your blog. This is also very useful for seeing what jQuery UI themes visually look good with your WordPress theme. The demo in my experience looks best when the short code is used with a full page template.

Please note that with some WordPress themes, CSS from the theme may interfere with CSS from the demo.

= ‘Select Default UI Theme’ option =

Set to the Base theme by default.

This option allows you to select which jQuery UI theme is used by default when jQuery UI is used.


== External Third Party Services ==

When you enable the CDN option (recommended but disabled by default) a third party service will be used. You should make sure your website Privacy Policy makes users are aware of this. In the current version of WordPress (WP 5.4.1), the default Privacy Policy does make users aware of this, but you have to actually publish that policy and you should check it yourself in case it has been modified or in case the policy you have predates that policy and does not include a Third Party Resource notice.

This plugin *always* sets the `crossorigin="anonymous"` attribute in association with the Third Party Service, which instructs the browser not to send cookies or any other authentication information to the third party when retrieving the resource.

By default, the plugin will set the `integrity="[[expected base64 encoded hash]]"` attribute in association with the Third Party Service, which instruct the browser not to use the downloaded resource if the hatch does not match, protecting your users from trojans.

This plugin uses the hashes associated with the files as provided by https://jqueryui.com/download/all/

These are the potential third party services:

= jQuery.com CDN =

The default CDN used by this plugin when a CDN is enabled.

Link to service: https://code.jquery.com/

jQuery.com CDN is actually powered by StackPath.

Link to service: https://www.stackpath.com/
Privacy Policy: https://www.stackpath.com/legal/privacy-statement/

= CloudFlare CDNJS =

When you have a CDN enabled and have selected the CloudFlare CDNJS option then
the CloudFlare CDNJS service will be used.

Link to service: https://cdnjs.com/libraries/jquery/

For jQuery, CDNJS is powered by CloudFlare.

Link to service: https://www.cloudflare.com/
Terms of Use: https://www.cloudflare.com/website-terms/
Privacy Policy: https://www.cloudflare.com/privacypolicy/

= jsDelivr CDN =

When you have a CDN enabled and have selected the jsDelivr option then the
jsDelivr CDN will be used.

Link to service: https://www.jsdelivr.com/
Privacy Policy: https://www.jsdelivr.com/privacy-policy-jsdelivr-net

= Microsoft CDN =

When you have a CDN enabled and have selected the Microsoft CDN option then the Microsoft CDN will be used.

Link to service: https://docs.microsoft.com/en-us/aspnet/ajax/cdn/overview
Terms of Use: https://docs.microsoft.com/en-us/legal/termsofuse
Privacy Policy: https://privacy.microsoft.com/en-us/privacystatement

= Google CDN =

When you have a CDN enabled and have selected the Google CDN option then the Google CDN will be used.

Link to service: https://developers.google.com/speed/libraries
Terms of Use: https://developers.google.com/terms/site-terms
Privacy Policy: https://policies.google.com/privacy


== Hard-coded SRI Hashes ==

This plugin includes hard-coded Subresource Identity public hashes for the minified versions of the jQuery UI library and the jQuery UI themes.

The hard-coded hash for the jQuery UI library can be verified against what is published at the https://code.jquery.com/ website.

For the themes, within the `themes/` directory is a bash shell script called `mksri.sh` that was used the generate the SRI hashes. It can be run in the `themes` directory of the official download to verify the SRI hashes.

These SRI hashes are in the file `versions.php`.


== Plugin / Theme Developers ==

Stuff goes here




== Update Policy ==

Stuff goes here

== Versioning Scheme ==

Stuff goes here.

== Translations ==

Stuff goes here

== Frequently Asked Questions ==

= Question =

Answer

== Screenshots ==

Stuff goes here

== Developers ==

Stuff goes here

== Changelog ==

Stuff goes here

== Upgrade Notice ==

Stuff goes here
