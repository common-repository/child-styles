=== Plugin Name ===
Contributors: Philippe Gras
Donate link: http://www.paul-emploi.biz/
Tags: buddypress, stylesheet, seo, styles, CSS, search engine optimization, Page Speed, YSlow, cascading style sheets, accelerate, design
Requires at least: 2.9
Tested up to: 3.2
Stable tag: 1.0 

Makes your styles shorter. Retrieve your WordPress or BuddyPress theme's stylesheet to display a new one according of the browsered page.

== Description ==

This plugin delivers a different stylesheet in the header of each page type, which allows the site administrator to manage their styles even more original, but also easier. Child Styles is particularly suitable for large sites, such as those managed with BuddyPress, or supporting many graphic plugins, the other advantage is speed up page loading by reducing considerably the size of each style sheet. The gain for each style sheet can be up to three quarters of the original file size!

== Installation ==

Beware! Make sure you first have sufficient rights on the CSS file of your theme, and if it is called `style.css`. Otherwise, you must copy it 6 or 16 times (if you use BuddyPress) in the `child-styles` by renaming them according to the $files array, defined in the PHP file plugin. You may also edit each stylesheet by removing unused CSS lines.

Important ! Assurez-vous d’abord de posséder les droits suffisants sur la feuille de style de votre thème, et qu’elle se nomme `style.css`. Sinon, vous devrez la copier 6 ou 16 fois (si vous utilisez BuddyPress) dans le dossier `child-styles` en la renommant selon le tableau $files, défini dans le fichier PHP de l’extension. Vous pouvez éditer ensuite chaque feuille de style en éliminant les lignes de code CSS superflues.

== Frequently Asked Questions ==

= Installation of Child Styles triggered a fatal error =

I do not have permission to copy the stylesheet of my theme automatically, I must do it manually.

= I do not see the style files in the file extension =

It's quite normal, there is none to begin with. There are hundreds of different themes online, and the plugin's directory can't have them all together. The stylesheet of the theme is reproduced at the time of installation, or an error occurred during activation.

= The stylesheet has not been copied during installation =

Multiple errors can occur depending on the security implemented by the various hosts. So, it was not possible to test them all. The stylesheet must be copied manually as all occurrences of the $files array, for each type of page on my site, and set in the PHP Child Styles file. I did not need to have as many style sheets as provided for BuddyPress if I did not use this plugin. The first 6 are enough for a blog that only uses WordPress.

= There is no style file for my `custom post types` =

Styles Child does not yet support `custom post types`, but it will be done in the next version, if there is a demand. Same problem for bbPress ... A temporary solution is to gather all the styles for the new `single.css` or `style.css` files copied in the plugin.

= Copied stylesheets are all the same =

After verifying that my theme displays correctly all page types using these files, I have to delete unused styles. It may be helpful to use GTmetrix (http://gtmetrix.com/) or PageSpeed ​​(https://developers.google.com/speed/pagespeed/insights) to point all unused CSS lines, and to delete them one by one. I do then work my styles and make them more readable for browsers, and further improve the efficiency of my site.

= A new and useless `style.css` stylesheet has been copied =

It's quite normal, and it serves as a spare in case of non-standard page. It is best to leave it as it for safety.

== Screenshots ==

1. GTmetrix results page before activation of Child Styles
2. GTmetrix results page after enabling Child Styles