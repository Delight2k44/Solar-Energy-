<?php
/**
 * WooCommerce Custom Integration Hooks & Enhancements.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Declare WooCommerce Support in Child Theme.
 */
function solar_energy_child_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'solar_energy_child_woocommerce_setup' );

/**
 * Add Solar Warranty & Specifications Badge to Single Product Pages.
 */
function solar_energy_add_product_trust_badges() {
	echo '<div class="solar-product-trust-badges">
		<div class="solar-trust-badge">
			<span class="solar-badge-icon">🛡️</span>
			<div>
				<strong>25-Year Performance Warranty</strong>
				<p>Guaranteed 85% power output after 25 years.</p>
			</div>
		</div>
		<div class="solar-trust-badge">
			<span class="solar-badge-icon">🚚</span>
			<div>
				<strong>Certified Tech Delivery & Setup</strong>
				<p>Available nationwide with real-time tracking.</p>
			</div>
		</div>
	</div>';
}
add_action( 'woocommerce_single_product_summary', 'solar_energy_add_product_trust_badges', 25 );
