# Green Party WordPress theme

This is an open source WordPress theme for local and state Green
Parties and candidates.  The idea is that everyone should have an
instant website, the day that they declare. We also offer volunteer
managed DreamHost WordPress hosting at cost, or less.  This theme
plays well with NationBuilder and with
[GreenMaps](https://greenmaps.us).

Here is the live site for the California Green Party's ```cagreens```
branch of the repository.  It is under review for adoption. The
exising [California Green Party web site[(https://cagreens.org) has
too many problems to list. We are just about to release 3 more demo
web sites, with a more modern scrolling theme, for local and state
parties and candidates.  

This theme is built on bootstrap 4.  Twitter Bootstrap is the leading
CSS library. The newer green-party branch allows the end users to
customize the menus. Menus for new web sites are expected to change
often.  The California Green Party (cagreens) branch has very large
and complex menus, which would be slow to generate on every page load,
so they are hardcoded using PUG.  They are not expected to change
often.

## Configuration
The site is configured using the default WordPress Customizer panel.

```WordPress Admin->Appearance->Customize->Organization```

And then depending on the options you chose either customize the
candidate or the party forms. 

```WordPress Admin->Appearance->Customize->Candidate```
or
```WordPress Admin->Appearance->Customize->Party```                            
 
The candidate photo should be loaded as the site default image.  Tech
support is privided on [the Green Party Tech Discord
Server](https://discord.gg/keMrNVCu7F)

Here is the original README from the base bootstrap-basic4 theme.  
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
