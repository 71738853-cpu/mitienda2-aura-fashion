<?php
/**
 * Header Section Settings
 *
 * @package bridal_dresses
 */

// ---------------------------------------- HEADER OPTIONS ----------------------------------------------------

$wp_customize->add_section(
	'bridal_dresses_header_options',
	array(
		'panel' => 'bridal_dresses_front_page_options',
		'title' => esc_html__( 'Header Options', 'bridal-dresses' ),
        'priority' => 1,
	)
);

// Add setting for sticky header
$wp_customize->add_setting(
	'bridal_dresses_enable_sticky_header',
	array(
		'sanitize_callback' => 'bridal_dresses_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new Bridal_Dresses_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_dresses_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Header', 'bridal-dresses' ),
			'section' => 'bridal_dresses_header_options',
		)
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'bridal_dresses_enable_topbar',
	array(
		'sanitize_callback' => 'bridal_dresses_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Bridal_Dresses_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_dresses_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'bridal-dresses' ),
			'section' => 'bridal_dresses_header_options',
		)
	)
);

// Header Options 
$wp_customize->add_setting(
	'bridal_dresses_discount_topbar_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'bridal_dresses_discount_topbar_text',
	array(
		'label'           => esc_html__( 'Topbar Text', 'bridal-dresses' ),
		'section'         => 'bridal_dresses_header_options',
		'type'            => 'text',
		'active_callback' => 'bridal_dresses_is_topbar_enabled',
	)
);

// Header Options - Enable Social Icons.
$wp_customize->add_setting(
	'bridal_dresses_enable_social',
	array(
		'sanitize_callback' => 'bridal_dresses_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Bridal_Dresses_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_dresses_enable_social',
		array(
			'label'   => esc_html__( 'Enable Social', 'bridal-dresses' ),
			'description' => esc_html__( 'If you want to add a social icon you need to go to Dashboard = Appearance = Menus then create a new menu now add Custom Links then add proper links then choose Social then click Create Menu.', 'bridal-dresses' ),
			'section' => 'bridal_dresses_header_options',
			'active_callback' => 'bridal_dresses_is_topbar_enabled',
		)
	)
);

$wp_customize->add_setting( 'bridal_dresses_menu_font_size', array(
    'default'           => 14,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'bridal_dresses_menu_font_size', array(
    'type'        => 'number',
    'section'     => 'bridal_dresses_header_options',
    'label'       => __( 'Menu Font Size ', 'bridal-dresses' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));

// Add setting for menu font weight
$wp_customize->add_setting('bridal_dresses_menu_font_weight', array(
    'default'           => '400',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add control for menu font weight
$wp_customize->add_control('bridal_dresses_menu_font_weight', array(
    'type'     => 'select',
    'section'  => 'bridal_dresses_header_options', 
    'label'    => __('Menu Font Weight', 'bridal-dresses'),
    'choices'  => array(
		'100' => __('100','bridal-dresses'),
		'200' => __('200','bridal-dresses'),
		'300' => __('300','bridal-dresses'),
		'400' => __('400','bridal-dresses'),
		'500' => __('500','bridal-dresses'),
		'600' => __('600','bridal-dresses'),
		'700' => __('700','bridal-dresses'),
		'800' => __('800','bridal-dresses'),
		'900' => __('900','bridal-dresses'),
    ),
));

$wp_customize->add_setting( 'bridal_dresses_menu_text_transform', array(
    'default'           => 'uppercase', // Default value for text transform
    'sanitize_callback' => 'sanitize_text_field',
) );

// Add control for menu text transform
$wp_customize->add_control( 'bridal_dresses_menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'bridal_dresses_header_options', // Adjust the section as needed
    'label'    => __( 'Menu Text Transform', 'bridal-dresses' ),
    'choices'  => array(
        'none'       => __( 'None', 'bridal-dresses' ),
        'capitalize' => __( 'Capitalize', 'bridal-dresses' ),
        'uppercase'  => __( 'Uppercase', 'bridal-dresses' ),
        'lowercase'  => __( 'Lowercase', 'bridal-dresses' ),
    ),
) );

// Menu Text Color 
$wp_customize->add_setting(
	'bridal_dresses_menu_text_color', 
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 
		'bridal_dresses_menu_text_color', 
		array(
			'label' => __('Menu Color', 'bridal-dresses'),
			'section' => 'bridal_dresses_header_options',
		)
	)
);

// Sub Menu Text Color 
$wp_customize->add_setting(
	'bridal_dresses_sub_menu_text_color', 
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 
		'bridal_dresses_sub_menu_text_color', 
		array(
			'label' => __('Sub Menu Color', 'bridal-dresses'),
			'section' => 'bridal_dresses_header_options',
		)
	)
);

// Topbar Padding Setting
$wp_customize->add_setting('bridal_dresses_topbar_padding',array(
		'default' => '',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control('bridal_dresses_topbar_padding',array(
		'label' => __('Topbar Padding','bridal-dresses'),
		'section' => 'bridal_dresses_header_options',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1
		)
	)
);

$wp_customize->add_setting( 
	'bridal_dresses_header_settings_upgraded_features',
	array(
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'bridal_dresses_header_settings_upgraded_features', 
	array(
		'type'=> 'hidden',
		'description' => "
			<div class='customizer-upgraded-features'>
				<i class='fas fa-info-circle'></i>
				<span class='pro-text'>
					Unlock Premium <strong>Features</strong> ?<br>
					<a target='_blank' href='". esc_url(BRIDAL_DRESSES_PREMIUM_PAGE) ." '>Upgrade Pro</a>
				</div>
			</div>
		",
		'section' => 'bridal_dresses_header_options'
	)
);