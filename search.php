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
		$counter = 0;
		if ( have_posts() ) : 
		?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'adler' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post();

				/* if the first post from search results has featured image, it displays it on full width */
				if ( has_post_thumbnail($posts[0]->ID) && ($counter == 0)) {
					get_template_part( 'content', 'hero' );
					$counter++;
					continue;
				}

				if ($counter%2 == 1) {
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

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>