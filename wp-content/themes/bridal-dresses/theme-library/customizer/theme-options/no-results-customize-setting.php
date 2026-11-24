<?php
/**
 * No Results page
 *
 * @package bridal_dresses
 */

/*=========================================
No Results Page
=========================================*/
$wp_customize->add_section(
	'no_results_pg_options', array(
		'title' => esc_html__( 'No Results Page', 'bridal-dresses' ),
		'panel' => 'bridal_dresses_theme_options',
	)
);

//  Title // 
$wp_customize->add_setting(
	'bridal_dresses_pg_no_results_ttl',
	array(
        'default'			=> __('Nothing Found','bridal-dresses'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'bridal_dresses_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'bridal_dresses_pg_no_results_ttl',
	array(
	    'label'   => __('No Results Title','bridal-dresses'),
	    'section' => 'no_results_pg_options',
		'type'           => 'text',
	)  
);

//  Text // 
$wp_customize->add_setting(
	'bridal_dresses_pg_no_results_text',
	array(
        'default'			=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','bridal-dresses'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'bridal_dresses_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'bridal_dresses_pg_no_results_text',
	array(
	    'label'   => __('No Results Text','bridal-dresses'),
	    'section' => 'no_results_pg_options',
		'type'           => 'text',
	)  
);