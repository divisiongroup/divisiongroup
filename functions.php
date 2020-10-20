<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'divisiongroup_setup' );
function divisiongroup_setup()
{
load_theme_textdomain( 'divisiongroup', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'divisiongroup' ) )
);
}

//Hide WordPress Version Number from Generator Meta Tag
remove_action('wp_head', 'wp_generator');
// END ENQUEUE PARENT ACTION

add_action( 'wp_enqueue_scripts', 'my_custom_script_load', 1000 );
function my_custom_script_load(){
	wp_enqueue_style( 'override-style', get_stylesheet_directory_uri() . '/css/app.css', array( 'style' ) );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/css/foundation.min.css' );

	wp_enqueue_script( 'what-input', get_stylesheet_directory_uri() . '/scripts/what-input.js', array( 'jquery' ), '', true );
  	wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/scripts/foundation.min.js', array( 'jquery' ), '', true );
  	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/scripts/app.js', array( 'jquery' ),'', true );
}


//Defer JavaScript
function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );





