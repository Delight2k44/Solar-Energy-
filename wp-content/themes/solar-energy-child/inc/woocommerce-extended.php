<?php
/**
 * WooCommerce Extended Hooks & Custom Product Specs.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Custom Technical Specifications Tab to WooCommerce Products.
 */
function solar_energy_add_tech_specs_tab( $tabs ) {
	$tabs['solar_specs'] = array(
		'title'    => __( 'Technical Specifications', 'solar-energy-child' ),
		'priority' => 15,
		'callback' => 'solar_energy_render_tech_specs_tab',
	);
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'solar_energy_add_tech_specs_tab' );

/**
 * Render Technical Specs Content.
 */
function solar_energy_render_tech_specs_tab() {
	global $product;
	?>
	<h3>Solar Equipment & Performance Specifications</h3>
	<table class="solar-specs-table">
		<tr>
			<th>Power Output Rating</th>
			<td>400 Watts Peak (STC)</td>
		</tr>
		<tr>
			<th>Cell Efficiency</th>
			<td>22.4% Monocrystalline PERC</td>
		</tr>
		<tr>
			<th>Inverter Compatibility</th>
			<td>Compatible with Enphase Microinverters & SolarEdge Hybrid</td>
		</tr>
		<tr>
			<th>Operating Temperature</th>
			<td>-40°C to +85°C (-40°F to 185°F)</td>
		</tr>
		<tr>
			<th>Performance Warranty</th>
			<td>25 Years linear power warranty (≥85% output at Year 25)</td>
		</tr>
	</table>
	<?php
}

/**
 * ATUM Inventory Stock Status Pill.
 */
function solar_energy_display_atum_stock_badge() {
	global $product;
	if ( ! $product ) {
		return;
	}

	if ( $product->is_in_stock() ) {
		echo '<span class="solar-status-pill green">✔️ In Stock — Ready for Technician Dispatch</span>';
	} else {
		echo '<span class="solar-status-pill amber">⏳ Backorder — Dispatched in 3-5 Days</span>';
	}
}
add_action( 'woocommerce_single_product_summary', 'solar_energy_display_atum_stock_badge', 12 );
