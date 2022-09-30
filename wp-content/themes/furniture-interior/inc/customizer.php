<?php
/**
 * Furniture Designs Theme Customizer
 *
 * @package Furniture Designs
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function furniture_designs_customize_register( $wp_customize ) {

	$wp_customize->add_setting('furniture_interior_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('furniture_interior_email',array(
		'label'	=> __('Email','furniture-interior'),
		'section'=> 'interior_designs_topbar',
		'setting'=> 'furniture_interior_email',
		'type'=> 'text'
	));

	//Project Section
	$wp_customize->add_section('furniture_interior_project',array(
		'title'	=> __('Project Section','furniture-interior'),
		'description'	=> __('Add project sections below.','furniture-interior'),
		'priority'   => 60,
		'panel' => 'interior_designs_panel_id',
	));

	$wp_customize->add_setting('furniture_interior_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('furniture_interior_title',array(
		'label'	=> __('Section Title','furniture-interior'),
		'section'=> 'furniture_interior_project',
		'setting'=> 'furniture_interior_title',
		'type'=> 'text'
	));

	$wp_customize->add_setting('furniture_interior_paragraph',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('furniture_interior_paragraph',array(
		'label'	=> __('Section Text','furniture-interior'),
		'section'=> 'furniture_interior_project',
		'setting'=> 'furniture_interior_paragraph',
		'type'=> 'text'
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$posts[]= 'select';
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('furniture_interior_project_post_big',array(
		'sanitize_callback' => 'interior_designs_sanitize_choices',
	));
	$wp_customize->add_control('furniture_interior_project_post_big',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','furniture-interior'),
		'section' => 'furniture_interior_project',
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$posts[]= 'select';
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('furniture_interior_project_post_1',array(
		'sanitize_callback' => 'interior_designs_sanitize_choices',
	));
	$wp_customize->add_control('furniture_interior_project_post_1',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','furniture-interior'),
		'section' => 'furniture_interior_project',
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$posts[]= 'select';
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('furniture_interior_project_post_2',array(
		'sanitize_callback' => 'interior_designs_sanitize_choices',
	));
	$wp_customize->add_control('furniture_interior_project_post_2',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','furniture-interior'),
		'section' => 'furniture_interior_project',
	));
}
add_action( 'customize_register', 'furniture_designs_customize_register' );