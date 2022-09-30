<?php
/**
 * Interior Designs functions and definitions
 *
 * @package Interior Designs
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if ( ! function_exists( 'interior_designs_setup' ) ) :

function interior_designs_setup() {

	$GLOBALS['content_width'] = apply_filters( 'interior_designs_content_width', 640 );

	load_theme_textdomain( 'interior-designs', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('interior-designs-homepage-thumb',240,145,true);
	
       register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'interior-designs' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
	
	add_theme_support('responsive-embeds');

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),
			'sidebar-2' => array(
				'text_business_info',
			),
			'sidebar-3' => array(
				'text_about',
				'search',
			),
			'footer-1' => array(
				'text_about',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'text_business_info',
			),
			'footer-4' => array(
				'search',
			),
		),

		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
		),

		'theme_mods' => array(
			'interior_designs_text' => __('Welcome to Interior Designs.', 'interior-designs' ),
			'interior_designs_call_text' => __('Phone No.', 'interior-designs' ),
			'interior_designs_call' => __('987456321', 'interior-designs' ),
			'interior_designs_location_text' => __('Location', 'interior-designs' ),
			'interior_designs_location' => __('Your City, Country', 'interior-designs' ),
			'interior_designs_time' => __('8:00am - 5:00pm', 'interior-designs' ),
			'interior_designs_day' => __('Mon to Fri', 'interior-designs' ),
			'interior_designs_facebook_url' => 'www.facebook.com',
			'interior_designs_twitter_url' => 'www.twitter.com',
			'interior_designs_google_url' => 'www.googleplus.com',
			'interior_designs_insta_url' => 'www.instagram.com',
			'interior_designs_linkdin_url' => 'www.linkedin.com',
			'interior_designs_youtube_url' => 'www.youtube.com',
			'interior_designs_footer_copy' => __('By ThemesCaliber', 'interior-designs' )
		),

		'nav_menus' => array(
			'primary' => array(
				'name' => __( 'Primary Menu', 'interior-designs' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
    ));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', interior_designs_font_url() ) );

	// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'interior_designs_activation_notice' );
	}	

}

endif;
add_action( 'after_setup_theme', 'interior_designs_setup' );

// Dashboard Theme Notification
function interior_designs_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dimdissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'interior-designs' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our Interior Designs theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'interior-designs' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=interior_designs_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'interior-designs' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function interior_designs_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'interior-designs' ),
		'description'   => __( 'Appears on blog page sidebar', 'interior-designs' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'interior-designs' ),
		'description'   => __( 'Appears on page sidebar', 'interior-designs' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Thid Column Sidebar', 'interior-designs' ),
		'description'   => __( 'Appears on page sidebar', 'interior-designs' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$interior_designs_widget_areas = get_theme_mod('interior_designs_footer_widget_layout', '4');
	for ($i=1; $i<=$interior_designs_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'interior-designs' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-2">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title py-2">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'interior_designs_widgets_init' );

/* Theme Font URL */
function interior_designs_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'ABeeZee:400,400i';
	$font_family[] = 'Montserrat::100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Ubuntu:300,300i,400,400i,500,500i,700,700i';
	$font_family[] = 'Kavoon';
	$font_family[] = 'Poppins::100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900';
	$font_family[] = 'Playfair+Display:400,400i,700,700i,900,900i';
	$font_family[] = 'PT Sans:400,400i,700,700i';
	$font_family[] = 'PT Serif:400,400i,700,700i';
	$font_family[] = 'Roboto::100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
	$font_family[] = 'Roboto Condensed:300,300i,400,400i,700,700i';
	$font_family[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
	$font_family[] = 'Overpass:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:400';
	$font_family[] = 'Alegreya::400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal:400,400i,700,700i';
	$font_family[] = 'Arvo:400,400i,700,700i';
	$font_family[] = 'Slabo';
	$font_family[] = 'Sen:400,700,800';
	$font_family[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
	$font_family[] = 'Overpass Mono:300,400,500,600,700';
	$font_family[] = 'Source Sans Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather:300,300i,400,400i,700,700i,900,900i';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Lora:400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin:400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Arimo:400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Playfair Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Quicksand:300,400,500,600,700';
	$font_family[] = 'Padauk:400,700';
	$font_family[] = 'Muli';
	$font_family[] = 'Mulish:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Inconsolata:200,300,400,500,600,700,800,900';
	$font_family[] = 'Bitter:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis:200,300,400,500,600,700,800';
	$font_family[] = 'Frank Ruhl Libre:300,400,500,700,900';
	$font_family[] = 'Gabriela:400';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen:300,400,700';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif:400,400i,700,700i';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text:400,400i,600,600i,700,700i';
	$font_family[] = 'Yanone Kaffeesatz:200,300,400,500,600,700';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville:400,400i,700';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Jost:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum:400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Rokkitt:100,200,300,400,500,600,700,800,900';
	$font_family[] = 'Vollkorn:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron:400,500,600,700,800,900';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Allura:400';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Quattrocento Sans:400,400i,700,700i';
	$font_family[] = 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Archivo:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda:400,700';
	$font_family[] = 'Righteous';
	$font_family[] = 'Saira:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Lobster Two:400,400i,700,700i';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Heebo:100,200,300,400,500,700,800,900';
	$font_family[] = 'Hind:300,400,500,600,700';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash:400,700';
	$font_family[] = 'Cormorant Garamond:300,300i,400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica:400,400i,700,700i';
	$font_family[] = 'Fira Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo:400,400i,700';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre:300,300i,400,400i,700,700i';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher:400,400i,700,700i';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Krub:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Spartan:100,200,300,400,500,600,700,800,900';
	$font_family[] = 'Staatliches';
	$font_family[] = 'Tangerine:400,700';
	$font_family[] = 'Trirong:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov:400,400i,700,700i';
	$font_family[] = 'Work Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';
	$font_family[] = 'ZCOOL XiaoWei';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}
	
/* Theme enqueue scripts */
function interior_designs_scripts() {
	wp_enqueue_style( 'interior-designs-font', interior_designs_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()).'/css/bootstrap.css' );
	wp_enqueue_style( 'interior-designs-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'interior-designs-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
	wp_enqueue_style( 'interior-designs-block-style', esc_url(get_template_directory_uri()).'/css/block-style.css' );

	// Paragraph
    $interior_designs_paragraph_color = get_theme_mod('interior_designs_paragraph_color', '');
    $interior_designs_paragraph_font_family = get_theme_mod('interior_designs_paragraph_font_family', '');
    $interior_designs_paragraph_font_size = get_theme_mod('interior_designs_paragraph_font_size', '');
	// "a" tag
	$interior_designs_atag_color = get_theme_mod('interior_designs_atag_color', '');
    $interior_designs_atag_font_family = get_theme_mod('interior_designs_atag_font_family', '');
	// "li" tag
	$interior_designs_li_color = get_theme_mod('interior_designs_li_color', '');
    $interior_designs_li_font_family = get_theme_mod('interior_designs_li_font_family', '');
	// H1
	$interior_designs_h1_color = get_theme_mod('interior_designs_h1_color', '');
    $interior_designs_h1_font_family = get_theme_mod('interior_designs_h1_font_family', '');
    $interior_designs_h1_font_size = get_theme_mod('interior_designs_h1_font_size', '');
	// H2
	$interior_designs_h2_color = get_theme_mod('interior_designs_h2_color', '');
    $interior_designs_h2_font_family = get_theme_mod('interior_designs_h2_font_family', '');
    $interior_designs_h2_font_size = get_theme_mod('interior_designs_h2_font_size', '');
	// H3
	$interior_designs_h3_color = get_theme_mod('interior_designs_h3_color', '');
    $interior_designs_h3_font_family = get_theme_mod('interior_designs_h3_font_family', '');
    $interior_designs_h3_font_size = get_theme_mod('interior_designs_h3_font_size', '');
	// H4
	$interior_designs_h4_color = get_theme_mod('interior_designs_h4_color', '');
    $interior_designs_h4_font_family = get_theme_mod('interior_designs_h4_font_family', '');
    $interior_designs_h4_font_size = get_theme_mod('interior_designs_h4_font_size', '');
	// H5
	$interior_designs_h5_color = get_theme_mod('interior_designs_h5_color', '');
    $interior_designs_h5_font_family = get_theme_mod('interior_designs_h5_font_family', '');
    $interior_designs_h5_font_size = get_theme_mod('interior_designs_h5_font_size', '');
	// H6
	$interior_designs_h6_color = get_theme_mod('interior_designs_h6_color', '');
    $interior_designs_h6_font_family = get_theme_mod('interior_designs_h6_font_family', '');
    $interior_designs_h6_font_size = get_theme_mod('interior_designs_h6_font_size', '');
    $interior_designs_theme_color_first = get_theme_mod('interior_designs_theme_color_first', '');
    $interior_designs_theme_color_second = get_theme_mod('interior_designs_theme_color_second', '');

	$interior_designs_custom_css ='
		p,span{
		    color:'.esc_attr($interior_designs_paragraph_color).'!important;
		    font-family: '.esc_attr($interior_designs_paragraph_font_family).'!important;
		    font-size: '.esc_attr($interior_designs_paragraph_font_size).'!important;
		}
		a{
		    color:'.esc_attr($interior_designs_atag_color).'!important;
		    font-family: '.esc_attr($interior_designs_atag_font_family).';
		}
		li{
		    color:'.esc_attr($interior_designs_li_color).'!important;
		    font-family: '.esc_attr($interior_designs_li_font_family).';
		}
		h1{
		    color:'.esc_attr($interior_designs_h1_color).'!important;
		    font-family: '.esc_attr($interior_designs_h1_font_family).'!important;
		    font-size: '.esc_attr($interior_designs_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_attr($interior_designs_h2_color).'!important;
		    font-family: '.esc_attr($interior_designs_h2_font_family).'!important;
		    font-size: '.esc_attr($interior_designs_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_attr($interior_designs_h3_color).'!important;
		    font-family: '.esc_attr($interior_designs_h3_font_family).'!important;
		    font-size: '.esc_attr($interior_designs_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_attr($interior_designs_h4_color).'!important;
		    font-family: '.esc_attr($interior_designs_h4_font_family).'!important;
		    font-size: '.esc_attr($interior_designs_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_attr($interior_designs_h5_color).'!important;
		    font-family: '.esc_attr($interior_designs_h5_font_family).'!important;
		    font-size: '.esc_attr($interior_designs_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_attr($interior_designs_h6_color).'!important;
		    font-family: '.esc_attr($interior_designs_h6_font_family).'!important;
		    font-size: '.esc_attr($interior_designs_h6_font_size).'!important;
		}
		.top-header,#comments input[type="submit"].submit,.footertown .tagcloud a,#comments a.comment-reply-link, .metabox,.search-box,li.woocommerce-MyAccount-navigation-link.woocommerce-MyAccount-navigation-link, .primary-navigation ul ul a, .service-btn a, .toggle-menu, .disc-btn a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .footertown input[type="submit"],input[type="submit"], .footertown th, #sidebar th, .page-links a:hover, .pagination .current,.page-links .current, .woocommerce span.onsale, #footer, #sidebar .tagcloud a:hover, #sidebar input[type="submit"], .primary-navigation a:hover, a.button, .woocommerce-product-search button[type="submit"], .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.pagination a:hover, .page-links a:hover, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]:hover{
		    background-color:'.esc_attr($interior_designs_theme_color_first).';
		}
		@media screen and (max-width:1000px){
			.side-menu{
			    background-color:'.esc_attr($interior_designs_theme_color_first).';
			}
		}

		.logo p,.textwidget a,.pagination a,.tags a:hover, a,.woocommerce a.button:hover, .call i,.location i,#discover h1,.time i, #discover h3, .woocommerce ul.products li.product .price,  .footertown .widget h3, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .services-box:hover i,.topbox i:hover, #header .nav ul li:hover > ul li a:hover,h3.widget-title a,  .woocommerce-MyAccount-content a, .woocommerce-info a, span.entry-author a, form.woocommerce-cart-form a, #comments a.comment-reply-link:hover, .pagination span, .footertown .tagcloud a:hover, .primary-navigation ul ul a:hover, .scrollup, .scrollup:focus, .scrollup:hover, .footertown .widget ul li a:hover, #sidebar ul li a:hover, .service-btn a:hover {
		    color:'.esc_attr($interior_designs_theme_color_first).';
		}
		.woocommerce a.button:hover, .primary-navigation ul ul a:hover, .primary-navigation ul li a:hover{
			color:'.esc_attr($interior_designs_theme_color_first).'!important;
		}
		#header .nav ul li:hover > ul{
		    border-top-color:'.esc_attr($interior_designs_theme_color_first).';
		}
		.footertown input.search-field{
			border-color:'.esc_attr($interior_designs_theme_color_first).';
		}
		.services-box:hover, .full-header, .serach_inner form.search-form{
		    border-color:'.esc_attr($interior_designs_theme_color_first).'!important;
		}
		.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover.woocommerce a.button:hover.woocommerce a.button:hover,.woocommerce button.button:hover, #header, #comments a.comment-reply-link:hover, .footertown, .primary-navigation ul ul a:hover, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, #discover, .pagination span, .fixed-header, .woocommerce a.button:hover, .pagination span, .pagination a, #content-ma ol li:before{
			background-color:'.esc_attr($interior_designs_theme_color_second).';
		}
		
		#header, #discover, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .primary-navigation ul ul a:hover,
		.primary-navigation ul ul a:hover, .primary-navigation ul li a:hover{
		    background-color:'.esc_attr($interior_designs_theme_color_second).'!important;
		}
		.tags a{
			border-color:'.esc_attr($interior_designs_theme_color_second).'!important;
		}
		a.showcoupon,.woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .woocommerce button.button,span.entry-author a, .logo p, .services-box:hover i, .topbox i:hover, #services h2, #sidebar th, .primary-navigation a:hover, .primary-navigation ul ul a, .woocommerce .product p.price, .woocommerce div.product span.price,.product_meta a, form.woocommerce-cart-form a, #sidebar ul li a, .woocommerce a.button, .toggle-menu i, .disc-btn a:hover, .pagination a:hover, .page-links a:hover, .services-box h2 a, #content-ma .services-box h3 a, #sidebar .tagcloud a, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]:hover{
		    color:'.esc_attr($interior_designs_theme_color_second).';
		}
		.woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .topbox i:hover, .woocommerce ul.products li.product .price, a.showcoupon, .woocommerce .woocommerce-breadcrumb a, .woocommerce-MyAccount-content a{
		    color:'.esc_attr($interior_designs_theme_color_second).' !important;
		}
		@media screen and (max-width: 1000px){
			.primary-navigation ul li a{
				color:'.esc_attr($interior_designs_theme_color_second).';
			}
		}
		.service-btn a, .middle-align h1,code,h1.entry-title,.pagination .current,.page-links a:hover,.tags a,span.post-title,span.meta-nav,.metabox a,#sidebar input[type="submit"],.footertown th,.footertown input[type="submit"], input[type="submit"],.woocommerce span.onsale,.metabox .entry-author a,.entry-content a,.logo p a ,.upper-box a,span.entry-author a, .metabox .entry-author a,.metabox,.metabox .entry-author a, h1.product_title.entry-title,#tab-description h2,#reviews h2,h2#reply-title, .site-text span, .social-media i, .logo h1 a, p.infotext, .call p,.location p,.time p, #services h3, h1.woocommerce-products-header__title.page-title, .services-box h2 a, #sidebar h3,  #comments a.comment-reply-link, #sidebar h3 a, #sidebar caption, #sidebar td#prev a, .primary-navigation ul li a:hover, .sidebar .closebtn, .woocommerce-product-search button[type="submit"], .footertown .tagcloud a, .disc-btn a, .entry-content a, #sidebar .textwidget a, #content-ma a{
		    color:'.esc_attr($interior_designs_theme_color_second).';
		}
	';

	wp_add_inline_style( 'interior-designs-basic-style',$interior_designs_custom_css );

	require get_parent_theme_file_path( '/tc-style.php' );
	wp_add_inline_style( 'interior-designs-basic-style',$interior_designs_custom_css );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()) . '/js/bootstrap.js' );
	wp_enqueue_script( 'interior-designs-custom-jquery', esc_url(get_template_directory_uri()) . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'interior_designs_scripts' );

/*radio button sanitization*/

function interior_designs_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function interior_designs_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );

  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function interior_designs_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'interior_designs_loop_columns');
if (!function_exists('interior_designs_loop_columns')) {
	function interior_designs_loop_columns() {
		$columns = get_theme_mod( 'interior_designs_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'interior_designs_shop_per_page', 9 );
function interior_designs_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'interior_designs_product_per_page', 9 );
	return $cols;
}

// URL DEFINES
define('INTERIOR_DESIGNS_FREE_THEME_DOC',__('https://themescaliber.com/demo/doc/free-interior-designs/','interior-designs'));
define('INTERIOR_DESIGNS_SUPPORT',__('https://wordpress.org/support/theme/interior-designs/','interior-designs'));
define('INTERIOR_DESIGNS_REVIEW',__('https://wordpress.org/support/theme/interior-designs/reviews/','interior-designs'));
define('INTERIOR_DESIGNS_BUY_NOW',__('https://www.themescaliber.com/themes/interior-design-wordpress-theme','interior-designs'));
define('INTERIOR_DESIGNS_LIVE_DEMO',__('https://www.themescaliber.com/interior-designs-pro','interior-designs'));
define('INTERIOR_DESIGNS_PRO_DOC',__('https://themescaliber.com/demo/doc/interior-designs-pro/','interior-designs'));
define('INTERIOR_DESIGNS_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','interior-designs'));
define('INTERIOR_DESIGNS_SITE_URL',__('https://www.themescaliber.com/themes/free-interior-design-wordpress-theme/', 'interior-designs'));
function interior_designs_credit_link() {
    echo "<a href=".esc_url(INTERIOR_DESIGNS_SITE_URL)." target='_blank'>".esc_html__('Interior WordPress Theme','interior-designs')."</a>";
}

function interior_designs_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function interior_designs_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function interior_designs_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/** Posts navigation. */
if ( ! function_exists( 'interior_designs_post_navigation' ) ) {
	function interior_designs_post_navigation() {
		$interior_designs_pagination_type = get_theme_mod( 'interior_designs_post_navigation_type', 'numbers' );
		if ( $interior_designs_pagination_type == 'numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation( array(
	            'prev_text'          => __( 'Previous page', 'interior-designs' ),
	            'next_text'          => __( 'Next page', 'interior-designs' ),
	            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'interior-designs' ) . ' </span>',
	        ) );
		}
	}
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the get started page */
require get_template_directory() . '/inc/dashboard/getstart.php';

/* Webfonts */
require get_template_directory() . '/wptt-webfont-loader.php';