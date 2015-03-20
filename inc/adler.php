<?php
/**
 * General theme class
 */

class adler {
	static function get_customify_option($option, $default=null) {
		global $pixcustomify_plugin;
		return $pixcustomify_plugin::get_option( $option, $default);
	}
}

$adler = new adler();