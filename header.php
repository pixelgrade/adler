<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package The Adler
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site <?php if ( has_post_thumbnail() ) { ?>has-thumbnail<?php } else { ?>no-thumbnail<?php } ?>">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a class="logo" href="<?php echo home_url(); ?>">
				<?php
				$main_logo_url = adler::get_customify_option( 'main_logo' );
				?>
				<?php if ( ! empty( $main_logo_url ) ) { ?>
					<?php echo '<img src="' . $main_logo_url . '"/>'; ?>
				<?php } else { ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php } ?>
			</a>
		</div>
		<!-- .site-branding -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php _e( 'Primary Menu', 'adler_txtd' ); ?>
			</button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>
		<!-- #site-navigation -->
	</header>
	<!-- #masthead -->

	<div id="content" class="site-content">