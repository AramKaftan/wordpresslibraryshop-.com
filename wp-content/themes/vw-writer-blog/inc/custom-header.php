<?php
/**
 * @package VW Writer Blog
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_writer_blog_header_style()
*/
function vw_writer_blog_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'vw_writer_blog_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 192,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'vw_writer_blog_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'vw_writer_blog_custom_header_setup' );

if ( ! function_exists( 'vw_writer_blog_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_writer_blog_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'vw_writer_blog_header_style' );
function vw_writer_blog_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #topbar{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'vw-writer-blog-basic-style', $custom_css );
	endif;
}
endif; // vw_writer_blog_header_style