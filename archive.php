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
		$counter = 0;
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				if ( has_post_thumbnail( $posts[0]->ID ) && ( 0 == $counter ) ) {
					get_template_part( 'content', 'hero' );
					$counter++;
					continue;
				}
				if ( 1 == $counter % 2 ) {
					get_template_part( 'content', 'odd' );
				} else {
					get_template_part( 'content', 'even' );
				}
				$counter++;
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