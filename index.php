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
 * @package The Adler
 */

get_header(); ?>

<div id="primary" class="content-area">
	<?php get_template_part( 'templates/archive/hero' ); ?>
	<main id="main" class="site-main" role="main">
		<?php
		$counter = 0;
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			//The hero is already previewing the latest post. Excluding from the archive
			if ($counter++ < 1) {
				continue;
			}

			get_template_part( 'content', get_post_format() );
		endwhile;
			the_posts_navigation();
		else : get_template_part( 'content', 'none' );  endif;
		?>
	</main>
	<!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
