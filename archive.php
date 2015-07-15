<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Adler
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
		<?php
		$adler_post_counter = 0;
		if ( have_posts() ) : ?>
			<header class="page-header">
					<h1 class="page-title">
						<?php
						if ( is_category() ) : ?>
							<span class="screen-reader-text"><?php _e( 'Category Archive:', 'adler' ); ?> </span> <?php single_cat_title();
						elseif ( is_tag() ) :
							single_tag_title();
						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'adler' ), '<span class="vcard">' . get_the_author() . '</span>' );
						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'adler' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'adler' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'adler' ) ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'adler' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'adler' ) ) . '</span>' );
						else :
							_e( 'Archives', 'adler' );
						endif; ?>
					</h1>
				</header><!-- .page-header -->
				<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'notop' );
				$adler_post_counter++;
			endwhile;

			the_posts_navigation();

		else :
			get_template_part( 'content', 'none' );
		endif; ?>
	</main>
	<!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>