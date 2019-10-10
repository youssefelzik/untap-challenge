<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<meta name="google-site-verification" content="qGuLFmXuybnGF6P0J_0K__YXtr4szuzteiPqwsc8N84" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="hfeed site" id="page">
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
		<nav class="navbar navbar-expand-lg">
			<div class="container">

					<!-- Your site title as branding in the menu -->
					<div class="logo">
							<?php the_custom_logo(); ?>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
							<span class="navbar-toggler-icon"></span>
							<span class="navbar-toggler-icon"></span>
					</button>
						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'menu' => 'Main',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav mr-auto text-center f-18px',
								'fallback_cb'     => '',
								'menu_id'         => 'MainMenu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>



				<?php if (is_user_logged_in()) { ?>
					<a class="login_button" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
				<?php } else { ?>
					<a class="login_button" href="<?php echo site_url().'/login'; ?>">Login</a>
					<a class="login_button" href="<?php echo site_url().'/sign-up'; ?>">sign up</a>
				<?php } ?>
			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
