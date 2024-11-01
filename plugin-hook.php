<?php 

	/*
	Plugin Name: Super Accordion
	Description: Very easy and powerful collapsible accordion plugin for post and page.
	Plugin URI: http://wpengineer.net/demo-super-accordion/
	Author: Shadow Vault	
	Author URI: http://wpengineer.net
	Version: 6.0
	License: GPL2
	*/
	
	/*
	
	    Copyright (C) 2016  shadowvault23@gmail.com
	
	    This program is free software; you can redistribute it and/or modify
	    it under the terms of the GNU General Public License, version 2, as
	    published by the Free Software Foundation.
	
	    This program is distributed in the hope that it will be useful,
	    but WITHOUT ANY WARRANTY; without even the implied warranty of
	    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	    GNU General Public License for more details.
	
	    You should have received a copy of the GNU General Public License
	    along with this program; if not, write to the Free Software
	    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/
	
/***********************************************************************************************/
/* Define Constant */
/***********************************************************************************************/
define('SUPER_ACCORDION_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );






/***********************************************************************************************/
/* Adding jQuery */
/***********************************************************************************************/
function super_accordion_jquery_include() {

	wp_enqueue_script('jquery');
	wp_enqueue_script('super-accordion-orginal-jquery', SUPER_ACCORDION_PLUGIN_PATH.'assets/js/jquery.collapse.js', array('jquery') , 1.1, true);
	wp_enqueue_script('super-accordion-main-jquery', SUPER_ACCORDION_PLUGIN_PATH.'assets/js/super.accordion.js', array('jquery') , 1.0, true);
}

add_action('init', 'super_accordion_jquery_include');





/***********************************************************************************************/
/* Adding CSS */
/***********************************************************************************************/
function super_accordion_css_include() {

	wp_enqueue_style('super-accordion-main-css', SUPER_ACCORDION_PLUGIN_PATH.'assets/css/style.css');

}

add_action('init', 'super_accordion_css_include');





/***********************************************************************************************/
/* Active Shortcode */
/***********************************************************************************************/
/* Generates Toggles Shortcode */
function super_accordion_warp($atts, $content = null) {
	return ('<div id="smooth-accordion-warp" data-collapse="accordion">'.do_shortcode($content).'</div>');
}
add_shortcode ("sawarp", "super_accordion_warp");

function super_accordion_warp_content($atts, $content = null) {
	extract(shortcode_atts(array(
        'title'      => ''
    ), $atts));
	
	return ('<h3>' . $title . '</h3><div><div class="smooth-accordion-warp-content">' . $content . '</div></div>');
}
add_shortcode ("sawcon", "super_accordion_warp_content");





/***********************************************************************************************/
/* Shortcode Button */
/***********************************************************************************************/

function super_accordion_shortcode_button() {
	add_filter ("mce_external_plugins", "super_accordion_shortcode_button_script");
	add_filter ("mce_buttons", "smacshortbtn");
}

function super_accordion_shortcode_button_script($plugin_array) {
	$plugin_array['wptuts'] = plugins_url('assets/js/super.accordion.js', __FILE__);
	return $plugin_array;
}

function smacshortbtn($buttons) {
	array_push ($buttons, 'smabutton');
	return $buttons;
}
add_action ('init', 'super_accordion_shortcode_button'); 


























?>