<?php

/**
 * General theme class
 */
class adler {
	static function get_customify_option( $option, $default = null ) {
		global $pixcustomify_plugin;
		if ( is_plugin_active( 'customify/customify.php' ) ) {
			return $pixcustomify_plugin->get_option( $option, $default );
		}
	}
}

$adler = new adler();