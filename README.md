Pipfrosch jQuery UI
===================

Currently testing in preparation for submission.

Nutshell is it will bring an updated CDN compatible jQueryUI to WordPress.

A new version of jQuery UI is coming soon that will get rid of current
deprecation warnings and definitely will not need the jQuery Migrate plugin to
work with current jQuery (I think 1.12.1 also does not but I'm not sure)

--------------

WordPress has an older version of jQuery UI and broken up into lots of little
scripts but that is not how content distribution networks provide it, they tend
to provide it as a complete single script.

Even though single script means a larger file is loaded than needed, it also
means less files to download and the size issue is largely mitigated by caching
of the file from a Public CDN anyway.
