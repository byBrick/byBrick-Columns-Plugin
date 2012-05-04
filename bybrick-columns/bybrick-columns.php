<?php
/*
Plugin Name: byBrick Columns
Plugin URI: https://github.com/byBrick/byBrick-Columns-Plugin
Description: A plugin that enables for column based shortcodes.
Version: 1.3
Author: byBrick
Author URI: http://www.bybrick.se/
License: GNU General Public License (GPLv3)
*/

/*
byBrick Accordion Plugin
Written by David Pausson (@davidpaulsson) & Emil Tullstedt (@sakjur)
*/

$bbcodes = array('one_third', 'one_third_last', 'two_third', 'two_third_last', 'one_half', 'one_half_last', 'one_fourth', 'one_fourth_last', 'three_fourth', 'three_fourth_last', 'one_fifth', 'one_fifth_last', 'two_fifth', 'two_fifth_last', 'three_fifth', 'three_fifth_last', 'four_fifth', 'four_fifth_last', 'one_sixth', 'one_sixth_last', 'five_sixth', 'five_sixth_last');

add_filter('the_posts', 'bb_include_style_if_needed');

function bb_include_style_if_needed($posts) {

	if (empty($posts)) return $posts;

	$bb_style_required = false;
	foreach ($posts as $post) {
		foreach ($GLOBALS["bbcodes"] as $bbcode) {
			if (stripos($post->post_content, $bbcode)) {
				$bb_style_required = true;
				break;
			}
		}
	}

	if ($bb_style_required) {
		$style = plugins_url('/bb-columns-style.min.css', __FILE__);
	    wp_enqueue_style("bb-column-style", $style);
	} 

	return $posts;
	
}

function bb_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}

function bb_one_third_last( $atts, $content = null ) {
   return '<div class="one_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}

function bb_two_third_last( $atts, $content = null ) {
   return '<div class="two_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}

function bb_one_half_last( $atts, $content = null ) {
   return '<div class="one_half column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}


function bb_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}

function bb_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}

function bb_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}

function bb_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}

function bb_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}

function bb_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}

function bb_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}

function bb_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}

function bb_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_make_shortcodes() {
	
	foreach ($GLOBALS["bbcodes"] as $bbcode) {		
		$function_name = "bb_" . $bbcode;
		add_shortcode($bbcode, $function_name);
	}
};

bb_make_shortcodes();

/*
Button in TinyMCE
*/

function register_button( $buttons ) {
	array_push( $buttons, "|", "columns" );
	return $buttons;
}
function add_plugin( $plugin_array ) {
	$plugin_array['columns'] = plugins_url('/bybrick-columns.js', __FILE__);
	return $plugin_array;
}

function my_recent_posts_button() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		return;
	}
	if ( get_user_option('rich_editing') == 'true' ) {
		add_filter( 'mce_external_plugins', 'add_plugin' );
		add_filter( 'mce_buttons', 'register_button' );
	}
}

add_action('init', 'my_recent_posts_button');