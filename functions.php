<?php
add_action( 'after_setup_theme', 'foodistrict_setup' );

if ( ! function_exists( 'foodistrict_setup' ) ):

function foodistrict_setup() {
	add_editor_style('editor-style-custom-20.css');

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'foodistrict' ),
	) );
	register_nav_menus( array(
		'social' => __( 'Social', 'foodistrict' ),
	) );
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'foodistrict_header_image_width', 590 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'foodistrict_header_image_height', 220 ) );
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
}
endif;

function fb_image(){
	global $post;
	$img_id = ( has_post_thumbnail($post->ID) ) ? get_post_thumbnail_id($post->ID) : "";
	$src = "";
	if ($img_id) {
		$image = wp_get_attachment_image_src( $img_id, "facebook" );
		$src = $image[0];
		echo '<meta property="http://ogp.me/ns#image" content="'.$src.'" />';
	} else {
		$src = get_bloginfo("template_url").'/image/logo.png';
	}
	echo '<link rel="image_src" href="'.$src.'" />';
}

add_action('wp_head', 'fb_image');


function foodistrict_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'foodistrict_excerpt_length' );

function foodistrict_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'me' ) . '</a>';
}

function foodistrict_auto_excerpt_more( $more ) {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'foodistrict_auto_excerpt_more' );

function foodistrict_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'foodistrict_remove_recent_comments_style' );
//MIME TYPES
function my_mime_types($mime_types){
    $mime_types['doc'] = 'application/msword';
    $mime_types['docx'] = 'application/msword';
    return $mime_types;
}
add_filter('upload_mimes', 'my_mime_types');

//ADMIN
if (is_admin()) include('inc/admin.php');
//FUNCTIONS
include('inc/images.php');
//include('inc/menu.php');
include('inc/misc.php');
include('inc/scripts.php');
//include('inc/shortcode.php');
//include('inc/tinymce.php');
include('inc/uri.php');
//include('inc/widgets.php');