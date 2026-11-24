<?php
/**
 * Right Buttons Panel.
 *
 * @package bridal_dresses
 */
?>
<div class="panel-right">
	<div class="pro-btn theme-btn">
		<div class="screenshot">
			<img src="<?php echo esc_url(get_template_directory_uri()) .'/theme-library/getting-started/images/pro-screenshot.png'; ?>" />
		</div>
		<br>
		<div class="theme-info">
			<h3><?php esc_html_e( 'Bridal Dresses WordPress Theme', 'bridal-dresses' ); ?></h3>
			<div class="theme-price">
				<span class="price-text"><?php esc_html_e( 'Price:', 'bridal-dresses' ); ?></h6>
				<del><?php esc_html_e( '$49', 'bridal-dresses' ); ?></del>
				<span><?php esc_html_e( '$39', 'bridal-dresses' ); ?></span>
			</div>
			<div class="panelbutton">
				<a class="button button-primary" href="<?php echo esc_url( BRIDAL_DRESSES_PREMIUM_PAGE ); ?>" title="<?php esc_attr_e( 'Go Pro', 'bridal-dresses' ); ?>" target="_blank"><?php esc_html_e( 'Try Premium', 'bridal-dresses' ); ?></a>

				<a class="button button-primary" href="<?php echo esc_url( BRIDAL_DRESSES_PRO_DEMO ); ?>" title="<?php esc_attr_e( 'Live Demo', 'bridal-dresses' ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'bridal-dresses' ); ?></a>
			</div>
			<a class="button button-primary pro-doc" href="<?php echo esc_url( BRIDAL_DRESSES_PREMIUM_DOCUMENTATION ); ?>" title="<?php esc_attr_e( 'Pro Documentation', 'bridal-dresses' ); ?>" target="_blank"><?php esc_html_e( 'Pro Documentation', 'bridal-dresses' ); ?></a>
		</div>
	</div>
	<div class="pro-btn bundle-btn">
		<div class="bundle-img">
			<img src="<?php echo esc_url(get_template_directory_uri()) .'/theme-library/getting-started/images/bundle.png'; ?>" />
		</div>
		<br>
		<h3><?php esc_html_e( 'WP Theme Bundle', 'bridal-dresses' ); ?></h3>
		<p><?php esc_html_e( 'Get access to a collection of premium WordPress themes in one bundle. Enjoy effortless website building, full customization, and dedicated customer support for a smooth, professional web experience.', 'bridal-dresses' ); ?></p>
		<a class="button button-primary" href="<?php echo esc_url( BRIDAL_DRESSES_BUNDLE_PAGE ); ?>" title="<?php esc_attr_e( 'Go Pro', 'bridal-dresses' ); ?>" target="_blank">
            <?php esc_html_e( 'Exclusive Theme Bundle - $99', 'bridal-dresses' ); ?>
        </a>
	</div>
</div>