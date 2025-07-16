# WordPress and NationBuilder Bootstrap theme

The California Green Party is (hopefully) migrating off of closed
source and expensive corporate NationBuilder hosted in the US's
collapsing legal  jurisdiction to open source technologies hosted in
privacy protecting Europe.  We hope that other US Green Parties follow suit. 

The first step is to build the "landing pages" in WordPress, while
leaving the "database pages" in NationBuilder.  This theme should work
across platforms, and is expected to be ported to NationBuilder
shortly. It is implemented usng Bootstrap.  Bootstrap is the most
popular CSS library, and is supported by both WordPress and
NationBuilder.

This theme should (eventually) support one, two and three column layout.  Two
columns split the width between the two columns.  On cell phones, in
two column layout, the second column gets pushed below the first
column.  Three column layout gives 1/4 of the width to the first
column, 1/2 to the middle column, and the remaining 1/4 to the third
column.  On tablets, with 3 column layout, the right column gets
pushed below.  On cell phones, with 3 column layout, the middle column
is shown first, the first column is shown next, and the third column
is shown last.

Here is the original README. 
# Bootstrap Basic4

Contributors: okvee, christianoliff
```
Tags: one-column, two-columns, three-columns, left-sidebar, right-sidebar, custom-background, custom-menu, post-formats, threaded-comments, translation-ready
Tested up to: 6.8
Requires at least: 4.0
Requires PHP: 5.5
Stable Tag: 1.3.5
License: MIT
License URI: https://opensource.org/licenses/MIT
Bootstrap Basic4 WordPress theme, Copyright (C) Rundiz.com

Bootstrap Basic4 WordPress theme is licensed under the MIT.
Bootstrap Basic4 Uses Bootstrap https://getbootstrap.com/ , licensed under MIT.
Bootstrap Basic4 Uses Font Awesome https://fontawesome.com , licensed under MIT.
Bootstrap Basic4 Uses Font Awesome (font files) https://fontawesome.com , licensed under SIL OFL 1.1.
Bootstrap Basic4 Uses Flexvideo.css by Zurb Foundation, licensed under MIT.
```
## Description 

Bootstrap v.4 basic theme. For build new theme based on Bootstrap
4. (WordPress 5 or Gutenberg ready.)  The concept is to keep it basic,
no rich features, no additional functions; all of these for theme
developers will be easier to start develop their theme.  If the theme
contain too many options, some of those options maybe no need by the
others it will be waste of time to find and remove.  It is still keep
the same concept as Bootstrap Basic (version 1) which is minimal, just
basic, easy to start build your own theme whether it is for new parent
theme or child theme.

To make Bootstrap 4 work in older Internet Explorer (IE) please create child theme and use this css ( https://github.com/coliff/bootstrap-ie8 ) created by @Coliff.

## More features 

**WordPress Menu** To display menu correctly, please create at least 1
menu and set as primary and save.

**Bootstrap features** This theme can use all Bootstrap classes,
elements and styles.

**Responsive image** For responsive image please add img-fluid class
to img element.

**Responsive video** Cloak video element (video element or embedded
video) with `embed-responsive` and `embed-responsive-xxx` where xxx is
the ratio. Example: `<div class="embed-responsive
embed-responsive-16by9">...your video...</div>`.

You can find theme help message in Admin dashboard > Appearance > Bootstrap Basic4 help.
