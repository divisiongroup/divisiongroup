<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NZHKXJ');</script>
<!-- End Google Tag Manager -->

<link rel="stylesheet" href="https://use.typekit.net/vyr8bjx.css">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZHKXJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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