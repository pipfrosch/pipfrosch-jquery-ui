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


== WordPress Theme Developers ==

At the bottom of the `inc/functions.php` file are two functions you can use to override the default jQuery UI theme if your WordPress theme either prefers a specific jQuery UI theme or if your WordPress theme has a custom jQuery UI theme included.


== Update Policy ==

I will try to update this plugin when new versions of jQuery UI are released but it may not be as fast as some may like. You can bug me by leaving sending an e-mail to pipfroshpress[AT]gmail[DOT]com.

Please note updates to this plugin with new versions of jQuery UI will not be pushed until that majority of the supported CDNs have the file.

Based upon recent activity on the jQuery UI github, I suspect that jQuery UI 1.13.x will be released within the next few months, it appears from the pull requests that the primary goal is to deal with deprecation warnings when used in conjunction with jQuery 3.5.x but it looks like there are some other fixes in it as well.

Development takes place on github at https://github.com/pipfrosch/pipfrosch-jquery-ui

The `master` branch will usually be exactly the same as what is distributed through WordPress except it will have a small `README.md` file. The branch `pipjqui` is where I develop and may not always be stable. When a new release ready *and tested* from the `pipjqui` branch, it will be merged with `master` and then repacked for distribution through WordPress.

Please use the distribution from WordPress rather than from github. The version from WordPress is audited by more eyes than my github.


== Versioning Scheme ==

Versions use an `Major.Minor.Tweak` scheme` using integers for each. Code in github may have a `pre` appended at the end to indicate is not a released version and should not be used on production systems.

= Tweak bump =

The __Tweak__ is incremented by one when a minor change is made, such as adding a new language to the translation support. Generally you can ignore upgrading this plugin when there is just a *Tweak* bump.

= Minor bump =

The __Minor__ is incremented by one when a functional bug is fixed or when an update to jQuery or the jQuery Migrate plugin is made that is not a substantial jQuery change. When *Minor* is bumped, *Tweak* will reset to `0`. Generally you should upgrade when *Minor* is bumped.

= Major bump =

The __Major__ will be incremented when there is an upgrade to jQuery that is significant in nature. Both *Minor* and *Tweak* are reset to `0` when *Major*
is bumped.

Generally you should test an update to *Major* before updating on a production system just in case some of your jQuery code needs tweaks before deployment.


== Translations ==

This plugin is ready for translations but so far does not actually have any. Note that the only strings where translations are beneficial require administrative privileges to see (the Settings). Hopefully translations will soon be made for the benefit of WordPress administrators who have a preferred written language other than English.


== Frequently Asked Questions ==

= Does this plugin require your Pipfrosch jQuery plugin? =

No. It will work using the version of jQuery that ships as part of WordPress.

= I wrote a custom jQuery UI theme, can I get it included in this plugin? =

If you submit it to jQuery UI for inclusion with their standard themes, then it will be available in a future release of this package.

= The complete jQuery UI library as a single file is large. Can you make a version with individual libraries for individual feature? =

If you use a Public CDN then with many visitors to your site, they will already have it cached making the file size irrelevant. Furthermore, a prefetch link is automatically created for pages on a WordPress site that do not use jQuery UI, increasing the odds that users who do not already have it cached will have it cached when visiting a page on your site that needs it. Most of the Public CDNs do not serve the individual components, I only found one that does. Single file is better for Public CDN use and Public CDN use is faster for your users even though the file is bigger and contains features you might not be using.

== Screenshots ==

Stuff goes here


== Changelog ==

= 1.0.0 ( ???? ) =
* Initial Release

== Upgrade Notice ==

Initial release of this WordPress plugin
