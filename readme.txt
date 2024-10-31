=== Plugin Name ===
Contributors: Leads Nearby
Tags: location, reviews, check-ins, servicepro
Requires at least: 2.0.2
Tested up to: 3.9
Stable tag: 5.2

The Nearby Now Plugin allows you to display your good customer reviews and tech profiles.
== Description ==

The Nearby Now Reviews Plugin is the easiest way to include both your Nearby Now Reviews and Tech Profiles on your website.

== Installation ==

1. Install the plugin from the [WordPress Plugin Directory]
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add your API token in the settings page - Login to admin.nearbynow.co and click the WordPress tab to get your API Access Token
4. To use the NN reviews plugin, place `[nn-reviews data_count="1" auto_scroll="yes"]` in your templates

###Shortcode Configuration

Simply paste the shortcode below on the page you want to display the widget.
To change the amount of reviews appearing, just change the data_count in the shortcode.

[nn-reviews data_count="1" auto_scroll="yes"]

You can also include the shortcode into your PHP by pasting the code below:

<?php echo do_shortcode('[nn-reviews data_count="1" auto_scroll="yes"]') ?>

Definitions

    data_count - The number of reviews to display (sidebar and full widgets only)
    auto_scroll (yes or no) - This will enable reviews to auto scroll and display only 1 review at a time with fade in/out effects.

How to include Nearby Now Tech Reviews on your website

Simply paste the shortcode below on the page you want to display the widget.
To change the amount of reviews appearing, just change the data_count in the shortcode.

[nn-tech data_count="1" data_tech="email@email.com" data_type="full"]

You can also include the shortcode into your PHP by pasting the code below:

<?php echo do_shortcode('[nn-tech data_count="1" data_tech="email@email.com" data_type="full"]') ?>

Definitions

    data_type - The type of widget you want to display (defaults to mini)
    data_count - The number of reviews to display (sidebar and full widgets only)
    data_tech - The email address of the user who's reviews you want to display


Widget Types

There are three types of widgets available. The default type is "mini". You can supply a type data tag to change the default widget type.
Mini - data_type="mini"

The mini widget displays your accounts aggregate review rating, number of stars, and a count of total reviews. Example
Sidebar - data_type="sidebar"

The sidebar widget displays the mini-widget, plus a lite version of your three most recent reviews. You can change the widget to display more reviews by supplying a count data tag: data-count="5". This widget is great for displaying reviews on your website sidebar.
Full - data_type="full"

The full widget displays the mini-widget, plus your three most recent reviews including the sub-ratings. You can change the widget to display more reviews by supplying a count data tag: data-count="5". Use this widget if you want to display your reviews as the primary content of a page. For example, this widget fits nicely on a home page below your existing home page content.


== Frequently Asked Questions ==

= How do I find my API token? =

Login to admin.nearbynow.co and click the WordPress tab to get your API Access Token. Email us at support@nearbynow.co if you are having trouble and we'll help you out.

* Version 1.0.3 fixes a bug with the count parameter and also adds two new parameters. 1) Show Map and 2) Show Favorites

Show Map allows you to control the visibility of the map.
Show Favorites allows you to display only reviews that you've specifically marked as a favorite from the admin site

== Screenshots ==

1. Example of the NN reviews plugin

== Changelog ==

= 5.1 =
* Update to shortcode

= 5.1 =
* Update to css files

= 5.0 =
* Tech Profiles feature added

= 4.0 =
* Auto Scroll Feature Updated

= 3.0 =
* Auto Scroll Feature added

= 2.0 =
* Version 2.0 released!

= 1.0 =
* Version 1.0 released!
