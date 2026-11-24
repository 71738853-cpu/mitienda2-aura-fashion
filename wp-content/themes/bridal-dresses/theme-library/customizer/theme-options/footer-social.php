<?php
/**
 * Footer Social Icons
 *
 * @package bridal_dresses
 */

$wp_customize->add_section(
	'bridal_dresses_footer_icon_options',
	array(
		'panel' => 'bridal_dresses_theme_options',
		'title' => esc_html__( 'Footer Social Icons', 'bridal-dresses' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'bridal_dresses_footer_icon_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Bridal_Dresses_Separator_Custom_Control( $wp_customize, 'bridal_dresses_footer_icon_separators', array(
	'label' => __( 'Footer Icon Settings', 'bridal-dresses' ),
	'section' => 'bridal_dresses_footer_icon_options',
	'settings' => 'bridal_dresses_footer_icon_separators',
)));

// Footer Section - Enable Section.
$wp_customize->add_setting(
	'bridal_dresses_enable_footer_icon_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'bridal_dresses_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bridal_Dresses_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bridal_dresses_enable_footer_icon_section',
		array(
			'label'    => esc_html__( 'Show / Hide Footer Icon', 'bridal-dresses' ),
			'section'  => 'bridal_dresses_footer_icon_options',
			'settings' => 'bridal_dresses_enable_footer_icon_section',
		)
	)
);

// Add setting for Facebook Link
$wp_customize->add_setting(
	'bridal_dresses_footer_facebook_link',
	array(
		'default'           => 'https://www.facebook.com/',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'bridal_dresses_footer_facebook_link',
	array(
		'label'           => esc_html__( 'Facebook Link', 'bridal-dresses'  ),
		'section'         => 'bridal_dresses_footer_icon_options',
		'settings'        => 'bridal_dresses_footer_facebook_link',
		'type'      => 'url'
	)
);

// Add setting for Facebook Icon Changing
$wp_customize->add_setting(
	'bridal_dresses_facebook_icon',
	array(
        'default' => 'fab fa-facebook-f',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Bridal_Dresses_Change_Icon_Control($wp_customize, 
	'bridal_dresses_facebook_icon',
	array(
	    'label'   		=> __('Facebook Icon','bridal-dresses'),
	    'section' 		=> 'bridal_dresses_footer_icon_options',
		'iconset' => 'fb',
	))  
);


// Add setting for Twitter Link
$wp_customize->add_setting(
	'bridal_dresses_footer_twitter_link',
	array(
		'default'           => 'https://x.com/',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'bridal_dresses_footer_twitter_link',
	array(
		'label'           => esc_html__( 'Twitter Link', 'bridal-dresses'  ),
		'section'         => 'bridal_dresses_footer_icon_options',
		'settings'        => 'bridal_dresses_footer_twitter_link',
		'type'      => 'url'
	)
);

// Add setting for Twitter Icon Changing
$wp_customize->add_setting(
	'bridal_dresses_twitter_icon',
	array(
        'default' => 'fab fa-twitter',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Bridal_Dresses_Change_Icon_Control($wp_customize, 
	'bridal_dresses_twitter_icon',
	array(
	    'label'   		=> __('Twitter Icon','bridal-dresses'),
	    'section' 		=> 'bridal_dresses_footer_icon_options',
		'iconset' => 'fb',
	))  
);

// Add setting for Instagram Link
$wp_customize->add_setting(
	'bridal_dresses_footer_instagram_link',
	array(
		'default'           => 'https://www.instagram.com/',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'bridal_dresses_footer_instagram_link',
	array(
		'label'           => esc_html__( 'Instagram Link', 'bridal-dresses'  ),
		'section'         => 'bridal_dresses_footer_icon_options',
		'settings'        => 'bridal_dresses_footer_instagram_link',
		'type'      => 'url'
	)
);

// Add setting for Instagram Icon Changing
$wp_customize->add_setting(
	'bridal_dresses_instagram_icon',
	array(
        'default' => 'fab fa-instagram',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Bridal_Dresses_Change_Icon_Control($wp_customize, 
	'bridal_dresses_instagram_icon',
	array(
	    'label'   		=> __('Instagram Icon','bridal-dresses'),
	    'section' 		=> 'bridal_dresses_footer_icon_options',
		'iconset' => 'fb',
	))  
);

// Add setting for Linkedin Link
$wp_customize->add_setting(
	'bridal_dresses_footer_linkedin_link',
	array(
		'default'           => 'https://in.linkedin.com/',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'bridal_dresses_footer_linkedin_link',
	array(
		'label'           => esc_html__( 'Linkedin Link', 'bridal-dresses'  ),
		'section'         => 'bridal_dresses_footer_icon_options',
		'settings'        => 'bridal_dresses_footer_linkedin_link',
		'type'      => 'url'
	)
);

// Add setting for Linkedin Icon Changing
$wp_customize->add_setting(
	'bridal_dresses_linkedin_icon',
	array(
        'default' => 'fab fa-linkedin',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Bridal_Dresses_Change_Icon_Control($wp_customize, 
	'bridal_dresses_linkedin_icon',
	array(
	    'label'   		=> __('Linkedin Icon','bridal-dresses'),
	    'section' 		=> 'bridal_dresses_footer_icon_options',
		'iconset' => 'fb',
	))  
);

// Add setting for Youtube Link
$wp_customize->add_setting(
	'bridal_dresses_footer_youtube_link',
	array(
		'default'           => 'https://www.youtube.com/',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'bridal_dresses_footer_youtube_link',
	array(
		'label'           => esc_html__( 'Youtube Link', 'bridal-dresses'  ),
		'section'         => 'bridal_dresses_footer_icon_options',
		'settings'        => 'bridal_dresses_footer_youtube_link',
		'type'      => 'url'
	)
);

// Add setting for Youtube Icon Changing
$wp_customize->add_setting(
	'bridal_dresses_youtube_icon',
	array(
        'default' => 'fab fa-youtube',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Bridal_Dresses_Change_Icon_Control($wp_customize, 
	'bridal_dresses_youtube_icon',
	array(
	    'label'   		=> __('Youtube Icon','bridal-dresses'),
	    'section' 		=> 'bridal_dresses_footer_icon_options',
		'iconset' => 'fb',
	))  
);

//Icon Alignment
$wp_customize->add_setting(
	'bridal_dresses_footer_social_align',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'bridal_dresses_footer_social_align',
	array(
		'label' => __('Icon Alignment ','bridal-dresses'),
		'section' => 'bridal_dresses_footer_icon_options',
		'type'			=> 'select',
		'choices' => 
		array(
			'left' => __('Left','bridal-dresses'),
			'right' => __('Right','bridal-dresses'),
			'center' => __('Center','bridal-dresses'),
		),
	)
);