<?php
/**
 * The template for displaying all single posts.
 *
 * @package Adler
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php get_template_part( 'templates/single/hero'); ?>

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post();

	            get_template_part( 'content', 'single' );

	            the_post_navigation();

                // If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>