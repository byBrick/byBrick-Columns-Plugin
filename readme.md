# byBrick Columns
Contributors: davidpaulsson, sakjur
Donate link: -
Tags: column, columns, bybrick
Requires at least: 3.0
Tested up to: 3.4.2
Stable tag: 1.4

A plugin that enables for column based shortcodes.

## Description

A small but simple plugin that enables shortcode support to create columns directly in your posts/pages.

This plugin enables you to divide content in the TinyMCE editor into columns that are either one half, one third, two third, three fourth, one fourth, one fifth, two fifth, three fifth, four fifth, one sixth or five sixth wide.

## Installation

It's quite simple;

1. Upload the 'bybrick-columns' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. ???
4. Profit!

## Frequently Asked Questions

### How does this work?

This plugin enables you to use short codes right in the TinyMCE editor when writing a post and/or page.

For example: If you'd like to divide your content into two columns you would type: 

[one_half] This is the left column [/one_half] [one_half_last] This is the right collumn [/one_half_last]

Remember to "close" your short code, just as you would with HTML. Also; did you see the '_last' add there? That's REALLY important as it will remove the margin on the right side. If you forget it, your columns won't work.

#### How about another example?

[two_third] This area is two thirds wide [/two_third] [one_third_last] This is some more content [/one_third_last]

You can combine the available sizes any how you'd like, just as long as the math adds up. 

#### How do I know these columns width will fit my theme? =

All width is percentage based, so you should be safe!

## Changelog

### 1.4
* Fixed a headers already sent error.
* Columns now stack the way they are supposed to when screen width is smaller than 767px.
* This plugin now fixes that empty <p></p> tag that TinyMCE sometimes adds.

### 1.3
* This plugin now features a button that hooks right onto your TinyMCE editor. Click the button, enter the desired number of columns and voilá! No need to enter the shortcodes by hand ever again (if you wish to use something, for example, like [four_fifth] you'll still need to enter those by hand). Oh; and the CSS file is now minified.

### 1.2
* Fixed a bug with [one_fourth] columns not working. Thanks jmd4eva for noticing.

### 1.1
* Added support for responsive wed design. Meaning; any columns you've created will wrap below each other and be 100% width if the screen width is a minimum of 480px (standard iPhone in landscape mode).

### 1.0
* Launch baby, launch!