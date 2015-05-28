<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Adler
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function adler_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'adler_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
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

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'adler' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'adler_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function adler_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'adler_render_title' );
endif;


//Split the title into two equal strings
function adler_split_title_half( $string, $center = 0.4 ) {
	$length2 = strlen( $string ) * $center;
	$tmp     = explode( ' ', $string );
	$index   = 0;
	$result  = Array( 0 => '', 1 => '' );
	foreach ( $tmp as $word ) {
		if ( ! $index && strlen( $result[0] ) > $length2 ) {
			$index ++;
		}
		$result[ $index ] .= $word . ' ';
	}

	return $result;
}

if ( ! function_exists( 'adler_fonts_url' ) ) :

	/**
	 * Generate the Google Fonts URL
	 *
	 * Based on this article http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
	 */
	function adler_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* Translators: If there are characters in your language that are not
		* supported by Droid Serif, translate this to 'off'. Do not translate
		* into your own language.
		*/
		if ( 'off' !== _x( 'on', 'Droid Serif font: on or off', 'adler' ) ) {
			$fonts[] = 'Droid Serif:400,700,400italic,700italic';
		}

		/* Translators: If there are characters in your language that are not
		* supported by Permanent Marker, translate this to 'off'. Do not translate
		* into your own language.
		*/
		if ( 'off' !== _x( 'on', 'Permanent Marker font: on or off', 'adler' ) ) {
			$fonts[] = 'Permanent Marker:400';
		}

		/* Translators: If there are characters in your language that are not
		* supported by Droid Sans Mono, translate this to 'off'. Do not translate
		* into your own language.
		*/
		if ( 'off' !==  _x( 'on', 'Droid Sans Mono font: on or off', 'adler' ) ) {
			$fonts[] = 'Droid Sans Mono:400';
		}

		/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'adler' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}


		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif; ?>