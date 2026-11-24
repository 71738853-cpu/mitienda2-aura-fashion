<?php
/**
 * Bridal Dresses functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bridal_dresses
 */

$bridal_dresses_theme_data = wp_get_theme();

if( ! defined( 'BRIDAL_DRESSES_THEME_VERSION' ) ) define ( 'BRIDAL_DRESSES_THEME_VERSION', $bridal_dresses_theme_data->get( 'Version' ) );
if( ! defined( 'BRIDAL_DRESSES_THEME_NAME' ) ) define( 'BRIDAL_DRESSES_THEME_NAME', $bridal_dresses_theme_data->get( 'Name' ) );
if( ! defined( 'BRIDAL_DRESSES_THEME_TEXTDOMAIN' ) ) define( 'BRIDAL_DRESSES_THEME_TEXTDOMAIN', $bridal_dresses_theme_data->get( 'TextDomain' ) );

if ( ! defined( 'BRIDAL_DRESSES_VERSION' ) ) {
	define( 'BRIDAL_DRESSES_VERSION', '3.1.1' );
}
if ( ! function_exists( 'bridal_dresses_setup' ) ) :
	
	function bridal_dresses_setup() {
		
		load_theme_textdomain( 'bridal-dresses', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'bridal-dresses' ),
				'social'  => esc_html__( 'Social', 'bridal-dresses' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio', 
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'bridal_dresses_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );

		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		add_editor_style( '/resource/css/editor-style.css' );

		/*  Demo Import */
		require get_parent_theme_file_path( '/theme-wizard/config.php' );
	}
endif;
add_action( 'after_setup_theme', 'bridal_dresses_setup' );

function bridal_dresses_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bridal_dresses_content_width', 640 );
}
add_action( 'after_setup_theme', 'bridal_dresses_content_width', 0 );

function bridal_dresses_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bridal-dresses' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bridal-dresses' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	$bridal_dresses_footer_widget_column = get_theme_mod('bridal_dresses_footer_widget_column','4');
	for ($bridal_dresses_i=1; $bridal_dresses_i<=$bridal_dresses_footer_widget_column; $bridal_dresses_i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'bridal-dresses' )  . $bridal_dresses_i,
			'id' => 'bridal-dresses-footer-widget-' . $bridal_dresses_i,
			'description' => __( 'The Footer Widget Area', 'bridal-dresses' )  . $bridal_dresses_i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'bridal_dresses_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bridal_dresses_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'bridal-dresses-slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Owl Carousel style.
	wp_enqueue_style( 'bridal-dresses-owl-carousel-css', get_template_directory_uri() . '/resource/css/owl.carousel' . '.css', array(), '2.3.4' );

	// Fontawesome style.
	wp_enqueue_style( 'bridal-dresses-font-awesome-css', esc_url(get_template_directory_uri())."/resource/css/fontawesome-all.css" );

	// Main style.
	wp_enqueue_style( 'bridal-dresses-style', get_template_directory_uri() . '/style.css', array(), BRIDAL_DRESSES_VERSION );

	// RTL style.
	wp_style_add_data('bridal-dresses-style', 'rtl', 'replace');

	if (get_theme_mod('bridal_dresses_enable_animation', true) == true){
		// Animate CSS
		wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/resource/css/animate.css' );
		// Wow script.
		wp_enqueue_script( 'wow-jquery', get_template_directory_uri() . '/resource/js/wow.js', array('jquery'),'' ,true );
	}

	// Navigation script.
	wp_enqueue_script( 'bridal-dresses-navigation-script', get_template_directory_uri() . '/resource/js/navigation.js', array(), BRIDAL_DRESSES_VERSION, true );

	// Owl Carousel.
	wp_enqueue_script( 'bridal-dresses-owl-carouselscript', get_template_directory_uri() . '/resource/js/owl.carousel' . '.js', array( 'jquery' ), '2.3.4', true );

	// Slick script.
	wp_enqueue_script( 'bridal-dresses-slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'bridal-dresses-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), BRIDAL_DRESSES_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style(
		'Playfair Display',
		Bridal_Dresses_wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap' ),
		array(),
		'1.0'
	);

	// Load the webfont.
	wp_enqueue_style(
		'Open Sans',
		Bridal_Dresses_wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'bridal_dresses_scripts' );

//Change number of products per page 
add_filter( 'loop_shop_per_page', 'bridal_dresses_products_per_page' );
function bridal_dresses_products_per_page( $cols ) {
  	return  get_theme_mod( 'bridal_dresses_products_per_page',9);
}

// Change number or products per row 
add_filter('loop_shop_columns', 'bridal_dresses_loop_columns');
	if (!function_exists('bridal_dresses_loop_columns')) {
	function bridal_dresses_loop_columns() {
		return get_theme_mod( 'bridal_dresses_products_per_row', 3 );
	}
}

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/theme-library/function-files/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/theme-library/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Customizer Settings Functions
*/
require get_template_directory() . '/theme-library/function-files/customizer-settings-functions.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';

function bridal_dresses_links_setup() {
	if ( ! defined( 'BRIDAL_DRESSES_PREMIUM_PAGE' ) ) {
	define('BRIDAL_DRESSES_PREMIUM_PAGE',__('https://asterthemes.com/products/bridal-dresses-wordpress-theme','bridal-dresses'));
	}
	if ( ! defined( 'BRIDAL_DRESSES_THEME_PAGE' ) ) {
		define('BRIDAL_DRESSES_THEME_PAGE',__('https://asterthemes.com/products/bridal-dresses','bridal-dresses'));
	}
	if ( ! defined( 'BRIDAL_DRESSES_SUPPORT' ) ) {
	define('BRIDAL_DRESSES_SUPPORT',__('https://wordpress.org/support/theme/bridal-dresses/','bridal-dresses'));
	}
	if ( ! defined( 'BRIDAL_DRESSES_REVIEW' ) ) {
	define('BRIDAL_DRESSES_REVIEW',__('https://wordpress.org/support/theme/bridal-dresses/reviews/','bridal-dresses'));
	}
	if ( ! defined( 'BRIDAL_DRESSES_PRO_DEMO' ) ) {
	define('BRIDAL_DRESSES_PRO_DEMO',__('https://demo.asterthemes.com/bridal-dresses/','bridal-dresses'));
	}
	if ( ! defined( 'BRIDAL_DRESSES_THEME_DOCUMENTATION' ) ) {
	define('BRIDAL_DRESSES_THEME_DOCUMENTATION',__('https://demo.asterthemes.com/docs/bridal-dresses-free/','bridal-dresses'));
	}
	if ( ! defined( 'BRIDAL_DRESSES_PREMIUM_DOCUMENTATION' ) ) {
	define('BRIDAL_DRESSES_PREMIUM_DOCUMENTATION',__('https://demo.asterthemes.com/docs/bridal-dresses-pro/','bridal-dresses'));
	}
	if ( ! defined( 'BRIDAL_DRESSES_BUNDLE_PAGE' ) ) {
		define('BRIDAL_DRESSES_BUNDLE_PAGE',__('https://asterthemes.com/products/wp-theme-bundle','bridal-dresses'));
	}
}
add_action('after_setup_theme', 'bridal_dresses_links_setup');

// Enqueue Customizer live preview script
function bridal_dresses_customizer_live_preview() {
    wp_enqueue_script(
        'bridal-dresses-customizer',
        get_template_directory_uri() . '/resource/js/customizer.js',
        array('jquery', 'customize-preview'),
        '',
        true
    );
}
add_action('customize_preview_init', 'bridal_dresses_customizer_live_preview');

// Featured Image Dimension
function bridal_dresses_blog_post_featured_image_dimension(){
	if(get_theme_mod('bridal_dresses_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

// Reset all theme settings
function bridal_dresses_reset_demo_import_settings() {
    if (current_user_can('manage_options')) {
        // List only demo import-related settings to reset
		remove_theme_mod('bridal_dresses_discount_topbar_text');
		remove_theme_mod('bridal_dresses_trending_product_heading');
		remove_theme_mod('bridal_dresses_services_number');
		remove_theme_mod('bridal_dresses_services_text');
		remove_theme_mod('bridal_dresses_trending_product_category');
		remove_theme_mod('bridal_dresses_banner_button_label_');
		remove_theme_mod('bridal_dresses_banner_slider_content_post_');
		remove_theme_mod('bridal_dresses_banner_button_label_');
		remove_theme_mod('bridal_dresses_banner_button_link_');
		remove_theme_mod('bridal_dresses_enable_service_section');
		remove_theme_mod('bridal_dresses_enable_banner_section');
		remove_theme_mod('bridal_dresses_enable_topbar');

        wp_send_json_success(array('message' => __('Demo import settings have been reset.', 'bridal-dresses')));
    } else {
        wp_send_json_error(array('message' => __('Permission denied.', 'bridal-dresses')));
    }
}
add_action('wp_ajax_bridal_dresses_reset_demo_import_settings', 'bridal_dresses_reset_demo_import_settings');

function bridal_dresses_register_remaining_upgraded_features( $wp_customize ) {
	$upgraded_features_sections = array(
		'404_pg_options' => 'bridal_dresses_404_pg_settings_upgraded_features',
		'background_image' => 'bridal_dresses_background_image_settings_upgraded_features',
		'bridal_dresses_excerpt_options' => 'bridal_dresses_excerpt_settings_upgraded_features',
		'bridal_dresses_footer_icon_options' => 'bridal_dresses_footer_icon_settings_upgraded_features',
		'bridal_dresses_footer_options' => 'bridal_dresses_footer_settings_upgraded_features',
		'bridal_dresses_general_options' => 'bridal_dresses_general_settings_upgraded_features',
		'bridal_dresses_page_title_options' => 'bridal_dresses_page_title_settings_upgraded_features',
		'bridal_dresses_post_options' => 'bridal_dresses_post_settings_upgraded_features',
		'bridal_dresses_related_post_options' => 'bridal_dresses_related_post_settings_upgraded_features',
		'bridal_dresses_reset_theme_options' => 'bridal_dresses_reset_theme_settings_upgraded_features',
		'bridal_dresses_sidebar_position' => 'bridal_dresses_sidebar_position_settings_upgraded_features',
		'bridal_dresses_single_post_options' => 'bridal_dresses_single_post_settings_upgraded_features',
		'bridal_dresses_typography_setting' => 'bridal_dresses_typography_setting_settings_upgraded_features',
		'bridal_dresses_woocommerce_settings' => 'bridal_dresses_woocommerce_settings_upgraded_features',
		'colors' => 'bridal_dresses_colors_settings_upgraded_features',
		'no_results_pg_options' => 'bridal_dresses_no_results_pg_settings_upgraded_features',
		'title_tagline' => 'bridal_dresses_site_identity_settings_upgraded_features',
	);

	foreach ( $upgraded_features_sections as $section_id => $setting_id ) {
		if ( ! $wp_customize->get_section( $section_id ) || $wp_customize->get_setting( $setting_id ) || $wp_customize->get_control( $setting_id ) ) {
			continue;
		}

		$wp_customize->add_setting(
			$setting_id,
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'type'        => 'hidden',
				'description' => "
					<div class='customizer-upgraded-features'>
						<i class='fas fa-info-circle'></i>
						<span class='pro-text'>
							Unlock Premium <strong>Features</strong> ?<br>
							<a target='_blank' href='" . esc_url( BRIDAL_DRESSES_PREMIUM_PAGE ) . " '>Upgrade Pro</a>
						</div>
					</div>
				",
				'section'     => $section_id,
			)
		);
	}
}
add_action( 'customize_register', 'bridal_dresses_register_remaining_upgraded_features', 1000 );
