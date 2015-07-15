<?php
/**
 * The template for displaying search results pages.
 *
 * @package Adler
 */
get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php 
		$adler_post_counter = 0;
		if ( have_posts() ) : 
		?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'adler' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post();
				get_template_part( 'content', 'notop' );
				$adler_post_counter++;
			endwhile;

			the_posts_navigation(); 

		else : 

			get_template_part( 'content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>