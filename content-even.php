<?php
/**
 * @package The Adler
 */
$split_titles = split_title_half( get_the_title() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'even-post' ); ?>>
	<div class="entry-wrapper">
		<header class="entry-header">
			<a href="<?php the_permalink(); ?>">
				<h1 class="hero__title">
					<span class="title"><?php echo $split_titles[0]; ?></span>
					<span class="sub-title"><?php echo $split_titles[1]; ?></span>
				</h1>
			</a>
		</header>
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>
		<!-- .entry-header -->
		<div class="main-wrapper">
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div>
			<!-- .entry-content -->
			<footer class="entry-footer">
				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php the_adler_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				<?php the_adler_entry_footer(); ?>
			</footer>
		</div>
		<!-- .entry-footer -->
	</div>
</article><!-- #post-## -->