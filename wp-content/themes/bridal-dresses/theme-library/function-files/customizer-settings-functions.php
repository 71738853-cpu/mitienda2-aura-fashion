<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bridal_dresses
 */


// Output inline CSS based on Customizer setting
function bridal_dresses_customizer_css() {
    $bridal_dresses_enable_breadcrumb = get_theme_mod('bridal_dresses_enable_breadcrumb', true);
    ?>
    <style type="text/css">
        <?php if (!$bridal_dresses_enable_breadcrumb) : ?>
            nav.woocommerce-breadcrumb {
                display: none;
            }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_customizer_css');

function bridal_dresses_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'bridal_dresses_primary_color', '#8E4162' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'bridal_dresses_customize_css' );


function bridal_dresses_enqueue_selected_fonts() {
    $bridal_dresses_fonts_url = bridal_dresses_get_fonts_url();
    if (!empty($bridal_dresses_fonts_url)) {
        wp_enqueue_style('bridal-dresses-google-fonts', $bridal_dresses_fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'bridal_dresses_enqueue_selected_fonts');

function bridal_dresses_layout_customizer_css() {
    $bridal_dresses_margin = get_theme_mod('bridal_dresses_layout_width_margin', 50);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($bridal_dresses_margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_layout_customizer_css');

function bridal_dresses_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $bridal_dresses_blog_layout_option = get_theme_mod('bridal_dresses_blog_layout_option_setting', 'Left');

    // Initialize custom CSS variable
    $bridal_dresses_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($bridal_dresses_blog_layout_option === 'Default') {
        $bridal_dresses_custom_css .= '.mag-post-detail { text-align: center; }';
    } elseif ($bridal_dresses_blog_layout_option === 'Left') {
        $bridal_dresses_custom_css .= '.mag-post-detail { text-align: left; }';
    } elseif ($bridal_dresses_blog_layout_option === 'Right') {
        $bridal_dresses_custom_css .= '.mag-post-detail { text-align: right; }';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo wp_kses($bridal_dresses_custom_css, array( 'style' => array(), 'text-align' => array() )); ?>
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_blog_layout_customizer_css');

function bridal_dresses_sidebar_width_customizer_css() {
    $bridal_dresses_sidebar_width = get_theme_mod('bridal_dresses_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($bridal_dresses_sidebar_width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($bridal_dresses_sidebar_width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_sidebar_width_customizer_css');

if ( ! function_exists( 'bridal_dresses_get_page_title' ) ) {
    function bridal_dresses_get_page_title() {
        $bridal_dresses_title = '';

        if (is_404()) {
            $bridal_dresses_title = esc_html__('Page Not Found', 'bridal-dresses');
        } elseif (is_search()) {
            $bridal_dresses_title = esc_html__('Search Results for: ', 'bridal-dresses') . esc_html(get_search_query());
        } elseif (is_home() && !is_front_page()) {
            $bridal_dresses_title = esc_html__('Blogs', 'bridal-dresses');
        } elseif (function_exists('is_shop') && is_shop()) {
            $bridal_dresses_title = esc_html__('Shop', 'bridal-dresses');
        } elseif (is_page()) {
            $bridal_dresses_title = get_the_title();
        } elseif (is_single()) {
            $bridal_dresses_title = get_the_title();
        } elseif (is_archive()) {
            $bridal_dresses_title = get_the_archive_title();
        } else {
            $bridal_dresses_title = get_the_archive_title();
        }

        return apply_filters('bridal_dresses_page_title', $bridal_dresses_title);
    }
}

if ( ! function_exists( 'bridal_dresses_has_page_header' ) ) {
    function bridal_dresses_has_page_header() {
        // Default to true (display header)
        $bridal_dresses_return = true;

        // Custom conditions for disabling the header
        if ('hide-all-devices' === get_theme_mod('bridal_dresses_page_header_visibility', 'all-devices')) {
            $bridal_dresses_return = false;
        }

        // Apply filters and return
        return apply_filters('bridal_dresses_display_page_header', $bridal_dresses_return);
    }
}

if ( ! function_exists( 'bridal_dresses_page_header_style' ) ) {
    function bridal_dresses_page_header_style() {
        $bridal_dresses_style = get_theme_mod('bridal_dresses_page_header_style', 'default');
        return apply_filters('bridal_dresses_page_header_style', $bridal_dresses_style);
    }
}

function bridal_dresses_page_title_customizer_css() {
    $bridal_dresses_layout_option = get_theme_mod('bridal_dresses_page_header_layout', 'left');
    ?>
    <style type="text/css">
        .asterthemes-wrapper.page-header-inner {
            <?php if ($bridal_dresses_layout_option === 'flex') : ?>
                display: flex;
                justify-content: space-between;
                align-items: center;
            <?php else : ?>
                text-align: <?php echo esc_attr($bridal_dresses_layout_option); ?>;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_page_title_customizer_css');

function bridal_dresses_pagetitle_height_css() {
    $bridal_dresses_height = get_theme_mod('bridal_dresses_pagetitle_height', 50);
    ?>
    <style type="text/css">
        header.page-header {
            padding: <?php echo esc_attr($bridal_dresses_height); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_pagetitle_height_css');

function bridal_dresses_site_logo_width() {
    $bridal_dresses_site_logo_width = get_theme_mod('bridal_dresses_site_logo_width', 200);
    ?>
    <style type="text/css">
        .site-logo img {
            max-width: <?php echo esc_attr($bridal_dresses_site_logo_width); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_site_logo_width');

function bridal_dresses_menu_font_size_css() {
    $bridal_dresses_menu_font_size = get_theme_mod('bridal_dresses_menu_font_size', 14);
    ?>
    <style type="text/css">
        .main-navigation a {
            font-size: <?php echo esc_attr($bridal_dresses_menu_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_menu_font_size_css');

//Menu Font Weight
function bridal_dresses_menu_font_weight_css() {
	$bridal_dresses_font_weight = get_theme_mod( 'bridal_dresses_menu_font_weight', 400 );

	$bridal_dresses_custom_css = "
		.main-navigation a {
		    font-weight: {$bridal_dresses_font_weight};
		}
	";

	wp_add_inline_style( 'bridal-dresses-style', $bridal_dresses_custom_css );
}
add_action( 'wp_enqueue_scripts', 'bridal_dresses_menu_font_weight_css' );

function bridal_dresses_menu_text_transform_css() {
    $menu_text_transform = get_theme_mod('bridal_dresses_menu_text_transform', 'uppercase');
    ?>
    <style type="text/css">
        .main-navigation a {
            text-transform: <?php echo esc_attr($menu_text_transform); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_menu_text_transform_css');

// Featured Image Dimension
function bridal_dresses_custom_featured_image_css() {
    $bridal_dresses_dimension = get_theme_mod('bridal_dresses_blog_post_featured_image_dimension', 'default');
    $bridal_dresses_width = get_theme_mod('bridal_dresses_blog_post_featured_image_custom_width', '');
    $bridal_dresses_height = get_theme_mod('bridal_dresses_blog_post_featured_image_custom_height', '');
    
    if ($bridal_dresses_dimension === 'custom' && $bridal_dresses_width && $bridal_dresses_height) {
        $bridal_dresses_custom_css = "body:not(.single-post) .mag-post-single .mag-post-img img { width: {$bridal_dresses_width}px !important; height: {$bridal_dresses_height}px !important; }";
        wp_add_inline_style('bridal-dresses-style', $bridal_dresses_custom_css);
    }
}
add_action('wp_enqueue_scripts', 'bridal_dresses_custom_featured_image_css');

// Featured Image Border Radius
function bridal_dresses_featured_image_border_radius_css() {
    $bridal_dresses_featured_image_border_radius = get_theme_mod('bridal_dresses_featured_image_border_radius', 10);
    ?>
    <style type="text/css">  
        .mag-post-single img {
            border-radius: <?php echo esc_attr($bridal_dresses_featured_image_border_radius); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_featured_image_border_radius_css');

function bridal_dresses_sidebar_widget_font_size_css() {
    $bridal_dresses_sidebar_widget_font_size = get_theme_mod('bridal_dresses_sidebar_widget_font_size', 24);
    ?>
    <style type="text/css">
        h2.wp-block-heading,aside#secondary .widgettitle,aside#secondary .widget-title {
            font-size: <?php echo esc_attr($bridal_dresses_sidebar_widget_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_sidebar_widget_font_size_css');

// Woocommerce Related Products Settings
function bridal_dresses_related_product_css() {
    $bridal_dresses_related_product_show_hide = get_theme_mod('bridal_dresses_related_product_show_hide', true);

    if ( $bridal_dresses_related_product_show_hide != true) {
        ?>
        <style type="text/css">
            .related.products {
                display: none;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'bridal_dresses_related_product_css');

// Woocommerce Product Sale Position 
function bridal_dresses_product_sale_position_customizer_css() {
    $bridal_dresses_layout_option = get_theme_mod('bridal_dresses_product_sale_position', 'left');
    ?>
    <style type="text/css">
        .woocommerce ul.products li.product .onsale {
            <?php if ($bridal_dresses_layout_option === 'left') : ?>
                right: auto;
                left: 0px;
            <?php else : ?>
                left: auto;
                right: 0px;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_product_sale_position_customizer_css'); 

//Footer Social Icon Alignment
function bridal_dresses_footer_icons_alignment_css() {
    $bridal_dresses_footer_social_align = get_theme_mod( 'bridal_dresses_footer_social_align', 'center' );   
    ?>
    <style type="text/css">
        .socialicons {
            text-align: <?php echo esc_attr( $bridal_dresses_footer_social_align ); ?> 
        }

        /* Mobile Specific */
        @media screen and (max-width: 575px) {
            .socialicons {
                text-align: center;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'bridal_dresses_footer_icons_alignment_css' );

//Copyright Alignment
function bridal_dresses_footer_copyright_alignment_css() {
    $bridal_dresses_footer_bottom_align = get_theme_mod( 'bridal_dresses_footer_bottom_align', 'center' );   
    ?>
    <style type="text/css">
        .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
            justify-content: <?php echo esc_attr( $bridal_dresses_footer_bottom_align ); ?> 
        }

        /* Mobile Specific */
        @media screen and (max-width: 575px) {
            .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
                justify-content: center;
                text-align:center;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'bridal_dresses_footer_copyright_alignment_css' );

//Copyright Font Size
function bridal_dresses_copyright_font_size_css() {
    $bridal_dresses_copyright_font_size = get_theme_mod('bridal_dresses_copyright_font_size', 16);
    ?>
    <style type="text/css">
        .site-footer-bottom .site-info span {
            font-size: <?php echo esc_attr($bridal_dresses_copyright_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_copyright_font_size_css');

// Preloader Background Color Setting
function bridal_dresses_preloader_background_colors_css() {
    $bridal_dresses_preloader_background_color_setting = get_theme_mod('bridal_dresses_preloader_background_color_setting', '');
        // Only output CSS if a color is set
        if (empty($bridal_dresses_preloader_background_color_setting)) {
            return;
        }
    ?>
    <style type="text/css">
        #loader {
            background-color: <?php echo esc_attr($bridal_dresses_preloader_background_color_setting); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_preloader_background_colors_css');

// Preloader Background Image Setting
function bridal_dresses_preloader_background_image_css() {
    $bridal_dresses_preloader_background_image_setting = get_theme_mod('bridal_dresses_preloader_background_image_setting', '');
        // Only output CSS if the background image is set
        if (empty($bridal_dresses_preloader_background_image_setting)) {
            return;
        }
    ?>
    <style type="text/css">
        #loader {
            background-image: url('<?php echo esc_url($bridal_dresses_preloader_background_image_setting); ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    <?php
}
add_action('wp_head', 'bridal_dresses_preloader_background_image_css');

//Footer Heading Alignment
function bridal_dresses_footer_heading_alignment_css() {
    $bridal_dresses_footer_header_align = get_theme_mod( 'bridal_dresses_footer_header_align', 'left' );   
    ?>
    <style type="text/css">
        .site-footer h4, footer#colophon h2.wp-block-heading, footer#colophon .widgettitle, footer#colophon .widget-title {
            text-align: <?php echo esc_attr( $bridal_dresses_footer_header_align ); ?> 
        }
    </style>
    <?php
}
add_action( 'wp_head', 'bridal_dresses_footer_heading_alignment_css' );

//First Capital Letter
function bridal_dresses_show_first_caps() {
	$bridal_dresses_first_caps = get_theme_mod('bridal_dresses_show_first_caps', false);
	$bridal_dresses_css = '';
	if ( $bridal_dresses_first_caps ) {
	$bridal_dresses_css .= '
		.mag-post-single .mag-post-detail .mag-post-excerpt p:first-of-type::first-letter {
		    font-size: 55px;
			font-weight: 600;
			margin-right: 6px;
			line-height: 1;
			display: inline-block;
			vertical-align: baseline;
		}';
	} else {
		$bridal_dresses_css .= '
		.mag-post-single .mag-post-detail .mag-post-excerpt p:first-of-type::first-letter {
			display: none;
		}';
	}
	wp_add_inline_style( 'bridal-dresses-style', $bridal_dresses_css );
}
add_action( 'wp_enqueue_scripts', 'bridal_dresses_show_first_caps' );

// Topbar Padding Dynamic CSS
function bridal_dresses_topbar_padding_css(){
	$padding = get_theme_mod('bridal_dresses_topbar_padding');
	$custom_css = ".top-header-part{
		padding-top: {$padding}px !important;
		padding-bottom: {$padding}px !important;
	}";
	wp_add_inline_style('bridal-dresses-style',$custom_css);

}
add_action('wp_enqueue_scripts','bridal_dresses_topbar_padding_css');

// Banner Button Color
function bridal_dresses_banner_button_color_css() {
    $btn_color = get_theme_mod('bridal_dresses_banner_btn_color');
	$btn_bg_color = get_theme_mod('bridal_dresses_banner_btn_bg_color');

	$custom_css = '';
    if ( !empty($btn_color) ) {
		$custom_css .= "
		.banner-slider-btn a.asterthemes-button{
			color: {$btn_color};
		}";
	}

	if ( !empty($btn_bg_color) ) {
		$custom_css .= "
		.banner-slider-btn a.asterthemes-button{
			background-color: {$btn_bg_color};
		}";
	}

	wp_add_inline_style('bridal-dresses-style', $custom_css);
}
add_action('wp_enqueue_scripts','bridal_dresses_banner_button_color_css');

