<?php

/**
 * This filter is used to change the Customizer Options
 * You can also copy this function inside your functions.php
 * file but DO NOT FORGET TO CHANGE ITS NAME
 *
 * @param $config array This holds required keys for the plugin config like 'opt-name', 'panels', 'settings'
 * @return $config
 */

	function adler_add_customify_base_options( $config ) {

		$config['opt-name'] = 'adler_options';

		$config['sections'] = array(

		);

		$config['panels'] = array(
			'general_settings' => array(
				'title'    => __( 'General Settings', 'customify_txtd' ),
				'sections' => array(
					'section_id' =>array(
						'title'    => __( 'Logos', 'customify_txtd' ),
						'options' => array(
							'main_logo'   => array(
								'type'      => 'image',
								'label'     => __( 'Main Logo', 'customify_txtd' ),
							),
						)
					)
				)
			)
		);

		return $config;
	}


add_filter( 'customify_filter_fields', 'adler_add_customify_base_options' );
