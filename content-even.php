<?php
/**
 * @package Adler
 */
$split_titles = adler_split_title_half( get_the_title() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'even-post' ); ?>>
	<div class="entry-wrapper">
		<header class="entry-header">
			<h1 class="hero__title">
				<a href="<?php the_permalink(); ?>">
					<span class="title"><?php echo $split_titles[0]; ?></span>
					<span class="sub-title"><?php echo $split_titles[1]; ?></span>
				</a>
			</h1>
		</header><!-- .entry-header -->

		<?php if ( has_post_thumbnail() ) : ?>

			<div class="entry-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>

		<?php endif; ?>

		<div class="main-wrapper">

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div>

			<div class="entry__read-more">
				<a href="<?php the_permalink(); ?>">READ MORE</a>
			</div><!-- .entry-content -->

			<footer class="entry-footer">

				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php adler_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>

				<?php adler_entry_footer(); ?>

			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-## -->