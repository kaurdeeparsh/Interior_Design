<?php
/**
 * Initialize example plugin
 */
function icon_element_admin_init() {

	// Initialize Sunrise
	$admin = new Sunrise7( array(
			// Sunrise file path
			'file' => __FILE__,
			// Plugin slug (should be equal to plugin directory name)
			'slug' => 'iconelement',
			// Plugin prefix
			'prefix' => 'icon-element',
			// Plugin textdomain
			'textdomain' => 'icon-element',
			// Custom CSS assets folder
			'css' => '',
			// Custom JS assets folder
			'js' => '',
		) );

	// Prepare array with options
	$options = array(

		// Open tab: Regular fields
		array(
			'type' => 'opentab',
			'name' => __( 'Widgets', 'icon-element' ),
		),
		array(
			'type' => 'openflex',
		),

		// Checkbox
		array(
			'id'      => 'ie-material-design',
			'type'    => 'checkbox',
			'default' => 'yes',
			'name'    => __( 'Material Design', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'https://material.io/resources/icons/?style=baseline'
		),

		array(
			'id'      => 'ie-metrize',
			'type'    => 'checkbox',
			'default' => 'yes',
			'name'    => __( 'Metrize', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'http://www.alessioatzeni.com/metrize-icons/'
		),

		array(
			'id'      => 'ie-captain',
			'type'    => 'checkbox',
			'default' => 'yes',
			'name'    => __( 'Captain', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'https://mariodelvalle.github.io/CaptainIconWeb/'
		),

		array(
			'id'      => 'ie-ionicons',
			'type'    => 'checkbox',
			'default' => 'on',
			'name'    => __( 'Ionicons', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'https://ionicons.com/'
		),

		array(
			'id'      => 'ie-dripicons-icons',
			'type'    => 'checkbox',
			'default' => 'on',
			'name'    => __( 'Dripicons Icons', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'http://demo.amitjakhu.com/dripicons/'
		),

		array(
			'id'      => 'ie-simpline',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Simpline', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'https://github.com/thesabbir/simple-line-icons'
		),

		array(
			'id'      => 'ie-bootstrap',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Bootstrap', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://icons.getbootstrap.com/#icons'
		),

		array(
			'id'      => 'ie-wppagebuilder',
			'type'    => 'checkbox',
			'default' => 'on',
			'name'    => __( 'Wp Pagebuilder', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'https://builder.themeum.com/wppbicon/'
		),

		array(
			'id'      => 'ie-linea-music',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Linea Music', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://linea.io/'
		),

		array(
			'id'      => 'ie-boxicons-icons',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Boxicons', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://github.com/atisawd/boxicons'
		),

		array(
			'id'      => 'ie-elegant-font',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Elegant Font', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://www.elegantthemes.com/blog/resources/elegant-icon-font'
		),

		array(
			'id'      => 'ie-et-line',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'ET Line', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://www.elegantthemes.com/blog/freebie-of-the-week/free-line-style-icons'
		),

		array(
			'id'      => 'ie-gonzo-font',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Gonzo', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://www.gonzodesign.nl/gonzocons/'
		),

		array(
			'id'      => 'ie-icomoon-font',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Icomoon', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://icomoon.io/#preview-free'
		),

		array(
			'id'      => 'ie-iconmonstr-font',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Iconmonstr', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://iconmonstr.com/'
		),

		array(
			'id'      => 'ie-io7-icon',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'iOS7', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'http://akira-miyake.github.io/iOS7-icon-font/'
		),

		array(
			'id'      => 'ie-linea_basic',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Linea Basic', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://linea.io/'
		),

		array(
			'id'      => 'ie-linea_elaboration',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Linea Elaboration', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://linea.io/'
		),

		array(
			'id'      => 'ie-linea_ecommerce',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Linea Ecommerce', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://linea.io/'
		),

		array(
			'id'      => 'ie-linearicons',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Linearicons', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://linearicons.com/free'
		),

		array(
			'id'      => 'ie-lineawesone-regular',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Lineawesome', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://icons8.com/line-awesome'
		),

		array(
			'id'      => 'ie-lineicons',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Lineicons', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://lineicons.com/'
		),

		array(
			'id'      => 'ie-mobirise',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Mobirise', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://mobiriseicons.com/cheatsheet.html'
		),

		array(
			'id'      => 'ie-rivolicon',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Rivolicon', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://rivolicons.hadrien.co/free/'
		),

		array(
			'id'      => 'ie-themify-icons',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Themify-icons', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://themify.me/themify-icons'
		),

		array(
			'id'      => 'ie-tilda',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Tilda', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://tilda.cc/free-icons/'
		),

		array(
			'id'      => 'ie-elementor',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Elementor', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'https://elementor.github.io/elementor-icons/'
		),

		array(
			'id'      => 'ie-vscode',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'VsCode Icon', 'icon-element' ),
			'pro'	  => '',
			'preview' => 'https://www.figma.com/community/file/768673354734944365'
		),

		array(
			'id'      => 'ie-tabler',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Tabler Icon', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://tablericons.com/'
		),

		array(
			'id'      => 'ie-antdesign',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => __( 'Antdesign Icon', 'icon-element' ),
			'pro'	  => 'yes',
			'preview' => 'https://ant.design/components/icon/'
		),

		array(
			'id'      => 'ie-chart',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Chart', 'xltab' ),
			'pro'	  => 'yes',
			'preview' => 'https://www.figma.com/file/0Gtw7eOrDnbNxPpveO183k/Chart-Icons---Outline-(Community)?node-id=275%3A6576'	
		),

		array(
			'id'      => 'ie-mapicon',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Map Icon', 'xltab' ),
			'pro'	  => 'yes',
			'preview' => 'http://map-icons.com/'	
		),

		array(
			'id'      => 'ie-devicon',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Devicon', 'xltab' ),
			'pro'	  => 'yes',
			'preview' => 'https://devicon.dev/'	
		),

		array(
			'id'      => 'ie-androidmaterial',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Android material', 'xltab' ),
			'pro'	  => 'yes',
			'preview' => 'https://www.androidicons.com/'	
		),

		array(
			'id'      => 'ie-androidholo',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Android holo', 'xltab' ),
			'pro'	  => 'yes',
			'preview' => 'https://www.androidicons.com/'	
		),

		array(
			'id'      => 'ie-evaicon',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Evaicon', 'xltab' ),
			'pro'	  => 'yes',
			'preview' => 'https://www.figma.com/file/T08qYmPlqINqGdU9ElXdXZ/Icon-Design-System---Eva-Icons-(Community)?node-id=0%3A1'	
		),

		array(
			'id'      => 'ie-iconicool',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Iconi cool', 'xltab' ),
			'pro'	  => 'yes',
			'preview' => 'https://www.figma.com/file/2jUsVzQgltQG4LXBYabU71/Iconicool-%7C-Free-Iconset-(Community)?node-id=3%3A250'	
		),

		array(
			'id'      => 'ie-feather',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Feather', 'xltab' ),
			'pro'	  => '',
			'preview' => 'https://feathericons.com/'	
		),

		array(
			'id'      => 'ie-elementplus',
			'type'    => 'checkbox',
			'default' => '',
			'name'    => esc_html__( 'Element plus', 'xltab' ),
			'pro'	  => 'yes',
			'preview' => 'https://element-plus.org/en-US/component/icon.html#icon-collection'	
		),

		array(
			'type' => 'closeflex',
		),

		// Close tab: Regular fields
		array(
			'type' => 'closetab',
		),
	);

	// Add sub-menu (like Dashboard -> Settings -> Permalinks)
	$admin->add_submenu( array(
			// Settings page <title>
			'page_title' => __( 'Icon Element', 'icon-element' ),
			// Menu title, will be shown in left dashboard menu
			'menu_title' => __( 'Icon Element', 'icon-element' ),
			// Unique page slug, you can use here the slug of parent page, which you've already created
			'slug' => 'iconelement',
			// Slug of the parent page (see above)
			'parent_slug' => 'themes.php',
			// Array with options available on this page
			'options' => $options,
		) );
}

// Hook to plugins_loaded
add_action( 'plugins_loaded', 'icon_element_admin_init' );
