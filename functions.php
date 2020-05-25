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

//Defer CSS
function add_rel_preload($html, $handle, $href, $media) {
    
    if (is_admin())
        return $html;

     $html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
EOT;
    return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );

//Defer JavaScript
function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );



add_action( 'comment_form_before', 'divisiongroup_enqueue_comment_reply_script' );
function divisiongroup_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'divisiongroup_title' );
function divisiongroup_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'divisiongroup_filter_wp_title' );
function divisiongroup_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'divisiongroup_widgets_init' );
function divisiongroup_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'divisiongroup' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function divisiongroup_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'divisiongroup_comments_number' );
function divisiongroup_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}