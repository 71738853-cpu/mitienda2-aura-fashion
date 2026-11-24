<?php
/**
 * Reset Theme Settings
 *
 * @package bridal_dresses
 */

$wp_customize->add_section(
	'bridal_dresses_reset_theme_options',
	array(
		'panel' => 'bridal_dresses_theme_options',
		'title' => esc_html__( 'Reset Theme Settings', 'bridal-dresses' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'bridal_dresses_reset_theme_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Bridal_Dresses_Separator_Custom_Control( $wp_customize, 'bridal_dresses_reset_theme_separators', array(
	'label' => __( 'Reset Theme', 'bridal-dresses' ),
	'section' => 'bridal_dresses_reset_theme_options',
	'settings' => 'bridal_dresses_reset_theme_separators',
)));

//Reset Demo Import
$wp_customize->add_setting( 'bridal_dresses_reset_demo_import_settings', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('bridal_dresses_reset_demo_import_settings',array(
        'label'   => __( 'Reset Demo Import', 'bridal-dresses' ),
        'section' => 'bridal_dresses_reset_theme_options',
        'type'    => 'button',
        'input_attrs' => array(
            'onclick' => 'ResetDemoSettings()',
        ),
));

//Reset Global Color
$wp_customize->add_setting('bridal_dresses_reset_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('bridal_dresses_reset_color', array(
    'type'    => 'button',
    'label'   => __('Reset Global Color', 'bridal-dresses'),
    'section' => 'bridal_dresses_reset_theme_options',
    'input_attrs' => array(
        'onclick' => 'ResetGlobalColor()',
    ),
));