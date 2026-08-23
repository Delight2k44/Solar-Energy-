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
			<span class="solar-badge-icon">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:20px;height:20px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
			</span>
			<div>
				<strong>25-Year Performance Warranty</strong>
				<p>Guaranteed 85% power output after 25 years.</p>
			</div>
		</div>
		<div class="solar-trust-badge">
			<span class="solar-badge-icon">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:20px;height:20px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177V3.75A2.25 2.25 0 0012 1.5H8.25A2.25 2.25 0 006 3.75V14.25m9 0h-9M12 14.25a2.25 2.25 0 002.25 2.25h1.5a2.25 2.25 0 002.25-2.25V11.25" /></svg>
			</span>
			<div>
				<strong>Certified Tech Delivery & Setup</strong>
				<p>Available nationwide with real-time tracking.</p>
			</div>
		</div>
	</div>';
}
add_action( 'woocommerce_single_product_summary', 'solar_energy_add_product_trust_badges', 25 );
