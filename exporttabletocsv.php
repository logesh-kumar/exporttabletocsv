<?php
/*
Plugin Name: Export Tables to CSV
Plugin URI: https://wppebbles.com/plugins/export-tables-to-csv/
Description: You can export any html tables to CSV with our shortcode.
Version: 1.0.0
Author: wppebbles
Author URI: https://wppebbles.com/
License: GPL2
*/

/** Adding Shortcode **/
function wpp_etcsv($atts, $content = null)
{
	wp_enqueue_script('etcsvscript', plugins_url('/exporttabletocsv.js', __FILE__), array('jquery'), '1.0.0.', true);
	if (empty($content)) {
		$content = "Download CSV";
	}
	// escape $content to avod security issues 
	echo "<button style='margin-top:12px;' class='btn_csv_export'>" . esc_html($content) . "</button>";
}
add_shortcode('ETCSV', 'wpp_etcsv');

/** Enable shortcode on Text widgets **/
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
