<?php
/**
 * The Adler functions and definitions
 *
 * @package The Adler
 */

if ( ! function_exists( 'the_adler_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function the_adler_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on The Adler, use a find and replace
		 * to change 'the-adler' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'the-adler', get_template_directory() . '/languages' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'adler_txtd' ),
			'footer'  => __( 'Footer Menu', 'adler_txtd' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif; // the_adler_setup
add_action( 'after_setup_theme', 'the_adler_setup' );

/**
 * Enqueue scripts and styles.
 */
function the_adler_scripts() {

	//FontAwesome Stylesheet
	wp_enqueue_style( 'the-adler-font-awesome-style', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css', array(), '4.2.0' );

	wp_enqueue_style( 'the-adler-style', get_stylesheet_uri(), array('the-adler-font-awesome-style') );

	wp_enqueue_script( 'the-adler-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'the-adler-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Default Fonts
	wp_enqueue_style( 'hive-fonts', adler_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'the_adler_scripts' );

//Add logo feature in Customizer

function adler_logo_option( $wp_customize ) {
	$wp_customize->add_section( 'adler_txtd_logo_section', array(
			'title'       => __( 'Logo', 'adler_txtd' ),
			'priority'    => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
		)
	);
	$wp_customize->add_setting( 'adler_txtd_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'adler_txtd_logo', array(
				'label'    => __( 'Logo', 'adler_txtd' ),
				'section'  => 'adler_txtd_logo_section',
				'settings' => 'adler_txtd_logo',
			)
		)
	);
}

add_action( 'customize_register', 'adler_logo_option' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
