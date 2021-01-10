<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="stylesheet" href="https://use.typekit.net/vyr8bjx.css">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="off-canvas-wrapper">
<header class="header" role="banner">
		<div class="logo">
			<?php echo csl_CustomSiteLogo_show_logo(); ?>
			<div id="site-description"><?php bloginfo( 'description' ); ?></div>
		</div>
		<nav id="menu" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>
		<button class="menu-icon" type="button" data-toggle="offCanvas"></button>
</header>
<div id="offCanvas" class="off-canvas position-right" data-off-canvas data-transition="overlap">
  <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'menu mobile-menu'  ) ); ?>
</div>
<div id="container" class="off-canvas-content" data-off-canvas-content>