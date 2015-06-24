<div class="toolbar">
	<div class="toolbar__head">
		<nav id="social-navigation" class="toolbar-navigation" role="navigation">
			<ul class="nav  nav--toolbar">
				<li class="nav__item--search"><a href="#"><?php _e( 'Search', 'adler' ); ?></a></li>
			</ul>
			<h5 class="screen-reader-text"><?php _e( 'Social navigation', 'adler' ); ?></h5>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'container'      => '',
					'menu_class'     => 'nav  nav--social  nav--toolbar',
					
				)
			);
			?>

		</nav>
		<!-- #social-navigation -->
	</div>
</div>
<div class="overlay--search">
	<div class="overlay__wrapper">
		<?php get_search_form(); ?>
			<p><?php _e( 'Begin typing your search above and press return to search. Press Esc to cancel.', 'adler' ); ?></p>
	</div>
	<b class="overlay__close"></b>
</div>