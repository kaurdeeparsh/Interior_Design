<?php
/**
 * VW Interior Designs: Block Patterns
 *
 * @package VW Interior Designs
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-interior-designs',
		array( 'label' => __( 'VW Interior Designs', 'vw-interior-designs' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-interior-designs/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-interior-designs' ),
			'categories' => array( 'vw-interior-designs' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":716,\"dimRatio\":50,\"minHeight\":500,\"isDark\":false,\"align\":\"full\",\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover alignfull is-light banner-section\" style=\"min-height:500px\"><span aria-hidden=\"true\" class=\"wp-block-cover__gradient-background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-716\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"m-0\"} -->\n<div class=\"wp-block-columns alignwide m-0\"><!-- wp:column {\"width\":\"20%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:20%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"60%\",\"className\":\"banner-main\"} -->\n<div class=\"wp-block-column banner-main\" style=\"flex-basis:60%\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":45}},\"textColor\":\"white\",\"className\":\"mb-3\"} -->\n<h1 class=\"has-text-align-center mb-3 has-white-color has-text-color\" style=\"font-size:45px\">LOREM IPSUM IS SIMPLY DUMMY</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":15}},\"textColor\":\"white\",\"className\":\"text-center\"} -->\n<p class=\"has-text-align-center text-center has-white-color has-text-color\" style=\"font-size:15px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"className\":\"text-center\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons text-center\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"border\":{\"radius\":\"0px\"}},\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-white-color has-text-color\" style=\"border-radius:0px\">VIEW MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"20%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:20%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-interior-designs/about-section',
		array(
			'title'      => __( 'About Section', 'vw-interior-designs' ),
			'categories' => array( 'vw-interior-designs' ),
			'content'    => "<!-- wp:columns {\"align\":\"wide\",\"className\":\"about-section mx-0 py-5\"} -->\n<div class=\"wp-block-columns alignwide about-section mx-0 py-5\"><!-- wp:column {\"className\":\"mb-md-0 mb-4\"} -->\n<div class=\"wp-block-column mb-md-0 mb-4\"><!-- wp:group {\"className\":\"about-content p-4 pe-md-5\"} -->\n<div class=\"wp-block-group about-content p-4 pe-md-5\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":28},\"color\":{\"text\":\"#313040\"}},\"className\":\"mb-3\"} -->\n<h2 class=\"mb-3 has-text-color\" style=\"color:#313040;font-size:28px\">LOREM IPSUM IS SIMPLY DUMMY</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":14},\"color\":{\"text\":\"#888a96\"}}} -->\n<p class=\"has-text-color\" style=\"color:#888a96;font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#313040\"},\"border\":{\"radius\":\"0px\"}},\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color\" style=\"border-radius:0px;color:#313040\">VIEW MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"about-img ms-0\"} -->\n<div class=\"wp-block-column about-img ms-0\"><!-- wp:embed {\"url\":\"https://youtu.be/yAoLSRbwxL8\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://youtu.be/yAoLSRbwxL8\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}