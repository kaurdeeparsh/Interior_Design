<?php
/**
 * Theme functions and definitions
 *
 * @package Furniture Designs
 */ 

if ( ! function_exists( 'furniture_interior_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function furniture_interior_enqueue_styles() {
		wp_enqueue_style( 'furniture-interior-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'furniture-interior-style', get_stylesheet_directory_uri() . '/style.css', array( 'furniture-interior-style-parent' ), '1.0.0' );
		require get_parent_theme_file_path( '/tc-style.php' );
		wp_add_inline_style( 'furniture-interior-style',$interior_designs_custom_css );
		require get_theme_file_path( '/tc-style.php' );
		wp_add_inline_style( 'furniture-interior-style',$interior_designs_custom_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'furniture_interior_enqueue_styles', 99 );

/* Customizer */
require get_stylesheet_directory() . '/inc/customizer.php';

function furniture_interior_customize_register() {
	global $wp_customize;
	$wp_customize->remove_setting( 'interior_designs_theme_color_first' );
	$wp_customize->remove_control( 'interior_designs_theme_color_first' );
	$wp_customize->remove_setting( 'interior_designs_theme_color_second' );
	$wp_customize->remove_control( 'interior_designs_theme_color_second' );
	$wp_customize->remove_section( 'interior_designs_discover' );
	$wp_customize->remove_section( 'interior_designs_services' );
}
add_action( 'customize_register', 'furniture_interior_customize_register', 11 );

/* Theme Setup */
if ( ! function_exists( 'furniture_interior_setup' ) ) :

function furniture_interior_setup() {

	$GLOBALS['content_width'] = apply_filters( 'furniture_interior_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('furniture-interior-homepage-thumb',240,145,true);

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	add_theme_support('responsive-embeds');

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( array( 'css/editor-style.css', interior_designs_font_url() ) );
}

endif;
add_action( 'after_setup_theme', 'furniture_interior_setup' );

function furniture_interior_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'furniture-interior' ),
		'description'   => __( 'Appears on blog page sidebar', 'furniture-interior' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'furniture_interior_widgets_init' );

function furniture_interior_enqueue_comments_reply() {
    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
    }
}
add_action( 'wp_enqueue_scripts', 'furniture_interior_enqueue_comments_reply' );

// url
define('FURNITURE_INTERIOR_SITE_URL',__('https://www.themescaliber.com/themes/free-furniture-interior-wordpress-theme','furniture-interior'));

function furniture_interior_credit_link() {
    echo "<a href=".esc_url(FURNITURE_INTERIOR_SITE_URL)." target='_blank'>".esc_html__('Furniture Interior WordPress Theme','furniture-interior')."</a>";
}