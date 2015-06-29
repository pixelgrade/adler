<?php
/**
 * Adler functions and definitions
 *
 * @package Adler
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600; /* pixels */
}

if ( ! function_exists( 'adler_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adler_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on The Adler, use a find and replace
		 * to change 'adler' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'adler', get_template_directory() . '/languages' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		add_theme_support( "title-tag" );
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'adler' ),
			'footer'  => __( 'Footer Menu', 'adler' ),
			'social' => __( 'Social Menu', 'adler')
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
			)
		);

		/*
		 * Add editor custom style to make it look more like the frontend
		 * Also enqueue the custom Google Fonts also
		 */
		add_editor_style( array( 'editor-style.css', adler_fonts_url() ) );

		$defaults = array(
			'default-color' => '#FFF'
		);
		add_theme_support( 'custom-background', $defaults );
	}
endif; // adler_setup
add_action( 'after_setup_theme', 'adler_setup' );

/**
 * Enqueue scripts and styles.
 */
function adler_scripts() {

	//FontAwesome Stylesheet
	wp_enqueue_style( 'adler-font-awesome-style', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css', array(), '4.3.0' );

	wp_enqueue_style( 'adler-style', get_stylesheet_uri(), array('adler-font-awesome-style') );

	wp_enqueue_script( 'adler-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'adler-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20120209', true );

	wp_enqueue_script( 'adler-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Default Fonts
	wp_enqueue_style( 'adler-fonts', adler_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'adler_scripts' );

//Registering Sidebar

function adler_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer Area', 'adler' ),
		'id' => 'footer-area',
		'description' => __( 'Widgets in this area will be shown in the footer of the page.', 'adler' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}

add_action( 'widgets_init', 'adler_widgets_init' );


/**
* Filters wp_title to print a neat <title> tag based on what is being viewed.
*
* @param string $title Default title text for current view.
* @param string $sep Optional separator.
* @return string The filtered title.
*/
function adler_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
   }
   global $page, $paged;

   // Add a page number if necessary:
   if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
	   	$title .= " $sep " . sprintf( __( 'Page %s', 'adler' ), max( $paged, $page ) );
   }
   return $title;
}

add_filter( 'wp_title', 'adler_wp_title', 10, 2 );

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
 * Load Adler Class
 */
require get_template_directory() . '/inc/adler.php';

/**
 * Load Customify plugin configuration
 */
require get_template_directory() . '/inc/customify_config.php';

/**
 * Load Recommended/Required plugins notification
 */
require get_template_directory() . '/inc/required-plugins/required-plugins.php';

