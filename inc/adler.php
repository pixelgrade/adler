<?php

/**
 * General theme class
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

class adler {
	static function get_customify_option( $option, $default = null ) {
		global $pixcustomify_plugin;
		if ( is_plugin_active( 'customify/customify.php' ) ) {
			return $pixcustomify_plugin->get_option( $option, $default );
		}
	}
}

$adler = new adler(); ?>