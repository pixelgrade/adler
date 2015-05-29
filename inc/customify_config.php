<?php

/**
 * This filter is used to change the Customizer Options
 * You can also copy this function inside your functions.php
 * file but DO NOT FORGET TO CHANGE ITS NAME
 *
 * @param $config array This holds required keys for the plugin config like 'opt-name', 'panels', 'settings'
 *
 * @return $config
 */

function adler_add_customify_base_options( $config ) {

	$config['opt-name'] = 'adler_options';

	$config['sections'] = array();

	$config['panels'] = array(
		'general_settings' => array(
			'title'    => __( 'General Settings', 'customify_txtd' ),
			'sections' => array(
				'section_id'     => array(
					'title'   => __( 'Logo', 'customify_txtd' ),
					'options' => array(
						'main_logo' => array(
							'type'  => 'image',
							'label' => __( 'Main Logo', 'customify_txtd' ),
						),
					)
				),
				'colors_section' => array(
					'title'   => __( 'Colors', 'customify_txtd' ),
					'options' => array(
						'links_color'    => array(
							'type'    => 'color',
							'label'   => __( 'Links Color', 'customify_txtd' ),
							'live'    => true,
							'default' => '#45525a',
							'css'     => array(
								array(
									'property' => 'color',
									'selector' => 'a, .entry-meta a',
								),
							)
						),
						'headings_color' => array(
							'type'    => 'color',
							'label'   => __( 'Headings Color', 'customify_txtd' ),
							'live'    => true,
							'default' => '#0e364f',
							'css'     => array(
								array(
									'property' => 'color',
									'selector' => '.no-thumbnail .site-header a, h1, h2, h3, h4, h5, h6,
												h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
												.widget-title,
												a:hover, .entry-meta a:hover'
								)
							)
						),
						'body_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Body Color', 'customify_txtd' ),
							'live'    => true,
							'default' => '#45525a',
							'css'     => array(
								array(
									'selector' => 'body',
									'property' => 'color'
								)
							)
						)
					)
				)
			)
		)
	);

	return $config;
}

add_filter( 'customify_filter_fields', 'adler_add_customify_base_options' ); ?>