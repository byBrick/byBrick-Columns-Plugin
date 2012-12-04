<?php
/*
Plugin Name: byBrick Columns
Plugin URI: https://github.com/byBrick/byBrick-Columns-Plugin
Description: A plugin that enables for column based shortcodes.
Version: 1.4
Author: byBrick
Author URI: http://www.bybrick.se/
License: GNU General Public License (GPLv3)
*/

/**
 * Our shortcodes
 *
 */
function bb_one_third( $atts, $content = null ) {
   return '<div class="one_third bbcol">' . do_shortcode($content) . '</div>';
}

function bb_one_third_last( $atts, $content = null ) {
   return '<div class="one_third column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_two_third( $atts, $content = null ) {
   return '<div class="two_third bbcol">' . do_shortcode($content) . '</div>';
}

function bb_two_third_last( $atts, $content = null ) {
   return '<div class="two_third column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_one_half( $atts, $content = null ) {
   return '<div class="one_half bbcol">' . do_shortcode($content) . '</div>';
}

function bb_one_half_last( $atts, $content = null ) {
   return '<div class="one_half column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}


function bb_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth bbcol">' . do_shortcode($content) . '</div>';
}

function bb_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth bbcol">' . do_shortcode($content) . '</div>';
}

function bb_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_one_fifth( $atts, $content = null ) {
   return '<div class="one_fift bbcolh">' . do_shortcode($content) . '</div>';
}

function bb_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth bbcol">' . do_shortcode($content) . '</div>';
}

function bb_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth bbcol">' . do_shortcode($content) . '</div>';
}

function bb_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth bbcol">' . do_shortcode($content) . '</div>';
}

function bb_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth bbcol">' . do_shortcode($content) . '</div>';
}

function bb_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function bb_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth bbcol">' . do_shortcode($content) . '</div>';
}

function bb_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth column-last bbcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

$bbcodes = array('one_third', 'one_third_last', 'two_third', 'two_third_last', 'one_half', 'one_half_last', 'one_fourth', 'one_fourth_last', 'three_fourth', 'three_fourth_last', 'one_fifth', 'one_fifth_last', 'two_fifth', 'two_fifth_last', 'three_fifth', 'three_fifth_last', 'four_fifth', 'four_fifth_last', 'one_sixth', 'one_sixth_last', 'five_sixth', 'five_sixth_last');

function bb_make_shortcodes() {	
	foreach ($GLOBALS["bbcodes"] as $bbcode) {		
		$function_name = "bb_" . $bbcode;
		add_shortcode($bbcode, $function_name);
	}
};
add_action('init', 'bb_make_shortcodes');


/**
 * Load our files
 *
 */
function bb_scripts() {
	wp_enqueue_style( 'bybrick-columns', plugins_url() . '/bybrick-columns/css/bybrick-columns-style.css' );
	wp_enqueue_script( 'bybrick-columns', plugins_url() . '/bybrick-columns/js/bybrick-columns-frontend.js', array( 'jquery' ), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'bb_scripts' );

/**
 * Button in TinyMCE
 *
 */
function register_button( $buttons ) {
	array_push( $buttons, "|", "columns" );
	return $buttons;
}
function add_plugin( $plugin_array ) {
	$plugin_array['columns'] = plugins_url('/js/bybrick-columns-backend.js', __FILE__);
	return $plugin_array;
}
function bb_columns_button() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		return;
	}
	if ( get_user_option('rich_editing') == 'true' ) {
		add_filter( 'mce_external_plugins', 'add_plugin' );
		add_filter( 'mce_buttons', 'register_button' );
	}
}
add_action('init', 'bb_columns_button');

?>