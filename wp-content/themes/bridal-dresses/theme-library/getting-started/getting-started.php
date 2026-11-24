<?php
/**
 * Getting Started Page.
 *
 * @package bridal_dresses
 */


if( ! function_exists( 'bridal_dresses_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function bridal_dresses_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'bridal-dresses' ),
		__( 'Getting Started', 'bridal-dresses' ),
		'manage_options',
		'bridal-dresses-getting-started',
		'bridal_dresses_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'bridal_dresses_getting_started_menu' );

if( ! function_exists( 'bridal_dresses_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function bridal_dresses_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_bridal-dresses-getting-started' != $hook ) return;

    wp_enqueue_style( 'bridal-dresses-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, BRIDAL_DRESSES_THEME_VERSION );

    wp_enqueue_script( 'bridal-dresses-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), BRIDAL_DRESSES_THEME_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'bridal_dresses_getting_started_admin_scripts' );

if( ! function_exists( 'bridal_dresses_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function bridal_dresses_getting_started_page(){ 
	$bridal_dresses_theme = wp_get_theme();?>
	<div class="wrap getting-started container">
		<div class="getting-info">
			<div class="theme-intro">
				<div class="intro-wrap">
					<div class="intro cointaner">
						<div class="intro-content">
							<h3><?php echo esc_html( 'Welcome to', 'bridal-dresses' );?> <span class="theme-name"><?php echo esc_html( BRIDAL_DRESSES_THEME_NAME ); ?></span></h3>
							<p class="about-text">
								<?php
								// Remove last sentence of description.
								$bridal_dresses_description = explode( '. ', $bridal_dresses_theme->get( 'Description' ) );

								$bridal_dresses_description = implode( '. ', $bridal_dresses_description );

								echo esc_html( $bridal_dresses_description . '' );
							?></p>
							<div class="btns-getstart">
								<a href="<?php echo esc_url( BRIDAL_DRESSES_PREMIUM_PAGE ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Get Premium', 'bridal-dresses' ); ?></a>
								<a href="<?php echo esc_url( BRIDAL_DRESSES_PRO_DEMO ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Demo', 'bridal-dresses' ); ?></a>
								<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'bridal-dresses' ); ?></a>
							</div>
							<?php
							$bridal_dresses_demo_option = 'is-demo-imported-' . get_stylesheet();
							?>

							<div class="btns-wizard">
								<?php if ( ! get_option( $bridal_dresses_demo_option ) ) : ?>
									<a href="<?php echo esc_url( admin_url( 'themes.php?page=bridaldresses-wizard' ) ); ?>" class="button button-primary wizard">
										<?php esc_html_e( 'Import Theme Demo', 'bridal-dresses' ); ?>
									</a>
								<?php else : ?>
									<a target="_blank" href="<?php echo esc_url( home_url() ); ?>" class="button button-primary view-site">
										<?php esc_html_e( 'Visit Your Website', 'bridal-dresses' ); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
						<div class="intro-img">
							<img src="<?php echo esc_url(get_template_directory_uri()) .'/theme-library/getting-started/images/bundle.png'; ?>" />										
							<br>
							<h4 class="bundle-text"><?php esc_html_e( 'WP Theme Bundle', 'bridal-dresses' ); ?></h4>
							<p class="about-text"><?php esc_html_e('Get access to a collection of premium WordPress themes in one bundle. Enjoy effortless website building, full customization, and dedicated customer support for a smooth, professional web experience.', 'bridal-dresses'); ?></p>
							<a class="button button-primary" href="<?php echo esc_url( BRIDAL_DRESSES_BUNDLE_PAGE ); ?>" title="<?php esc_attr_e( 'Go Pro', 'bridal-dresses' ); ?>" target="_blank">
								<?php esc_html_e( 'Exclusive Theme Bundle - $99', 'bridal-dresses' ); ?>
							</a>
						</div>
					</div>
				</div>
				<div class="cointaner panels">
					<ul class="inline-list">
						<li class="current">
							<a id="help" href="javascript:void(0);">
								<?php esc_html_e( 'Getting Started', 'bridal-dresses' ); ?>
							</a>
						</li>
						<li>
							<a id="free-pro-panel" href="javascript:void(0);">
								<?php esc_html_e( 'Free Vs Pro', 'bridal-dresses' ); ?>
							</a>
						</li>
					</ul>
					<div id="panel" class="panel">
						<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
						<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
						<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
					</div>
				</div>
			</div>
			<div class="icons-info">
				<div class="icon-img">									
					<a href="<?php echo esc_url( BRIDAL_DRESSES_REVIEW ); ?>" title="<?php esc_attr_e( 'Review Theme', 'bridal-dresses' ); ?>" target="_blank">
						<img src="<?php echo esc_url(get_template_directory_uri()) .'/theme-library/getting-started/images/icon1.png'; ?>" />	
						<?php esc_html_e( 'Review Theme', 'bridal-dresses' ); ?>
					</a>
				</div>
				<div class="icon-img">									
					<a href="<?php echo esc_url( BRIDAL_DRESSES_SUPPORT ); ?>" title="<?php esc_attr_e( 'Contact Support', 'bridal-dresses' ); ?>" target="_blank">
						<img src="<?php echo esc_url(get_template_directory_uri()) .'/theme-library/getting-started/images/icon2.png'; ?>" />	
						<?php esc_html_e( 'Contact Support', 'bridal-dresses' ); ?>
					</a>
				</div>
				<div class="icon-img">									
					<a href="<?php echo esc_url( BRIDAL_DRESSES_THEME_DOCUMENTATION ); ?>" title="<?php esc_attr_e( 'Free Theme Documentation', 'bridal-dresses' ); ?>" target="_blank">
						<img src="<?php echo esc_url(get_template_directory_uri()) .'/theme-library/getting-started/images/icon3.png'; ?>" />	
						<?php esc_html_e( 'Free Theme Documentation', 'bridal-dresses' ); ?>
					</a>
				</div>
			</div>	
		</div>	
	</div>
	<?php
}
endif;