<?php
/**
 * Solar System Configurator Shortcode Handler.
 * Shortcode: [solar_configurator]
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function solar_render_configurator_shortcode( $atts ) {
	ob_start();
	?>
	<div class="solar-calc-card solar-configurator-wrapper" id="solar-configurator-app">
		<div class="solar-calc-header">
			<span class="solar-calc-badge">⚡ Instant Solar Calculator</span>
			<h2 class="solar-calc-title">Customize Your Solar System Solution</h2>
			<p class="solar-calc-subtitle">Configure your solar panel array, battery backup, and receive an instant system recommendation and cost estimate.</p>
		</div>

		<form id="solar-configurator-form" class="solar-calc-form" onsubmit="return false;">
			<div class="solar-calc-grid">
				<!-- Monthly Bill Input -->
				<div class="solar-input-group">
					<label for="solar-monthly-bill" class="solar-label">
						Average Monthly Electricity Bill (R)
					</label>
					<div class="solar-input-prefix-wrapper">
						<span class="solar-prefix">R</span>
						<input type="number" id="solar-monthly-bill" name="monthly_bill" class="solar-input" value="2500" min="200" max="100000" step="100" required>
					</div>
					<span class="solar-help-text">Enter your typical monthly spend on power.</span>
				</div>

				<!-- Tariff Rate -->
				<div class="solar-input-group">
					<label for="solar-utility-rate" class="solar-label">
						Utility Rate (R / kWh)
					</label>
					<input type="number" id="solar-utility-rate" name="utility_rate" class="solar-input" value="4.00" min="0.50" max="15.00" step="0.05" required>
					<span class="solar-help-text">Standard municipal tariff is approx R4.00/kWh.</span>
				</div>

				<!-- Sunlight Hours -->
				<div class="solar-input-group">
					<label for="solar-sun-hours" class="solar-label">
						Average Daily Sun Hours
					</label>
					<select id="solar-sun-hours" name="sun_hours" class="solar-select">
						<option value="4.5">4.5 Hours (Coastal / Winter)</option>
						<option value="5.5" selected>5.5 Hours (Average Region / Highveld)</option>
						<option value="6.5">6.5 Hours (Karoo / Northern Cape)</option>
					</select>
					<span class="solar-help-text">Select your location's sunlight profile.</span>
				</div>

				<!-- Battery Storage -->
				<div class="solar-input-group">
					<label for="solar-battery-opt" class="solar-label">
						Include Loadshedding Battery Backup?
					</label>
					<select id="solar-battery-opt" name="battery_option" class="solar-select">
						<option value="no">No — Grid-Tied Only (Outages will shut down system)</option>
						<option value="yes" selected>Yes — 10kWh LiFePO4 Battery Backup (+ R60,000)</option>
					</select>
					<span class="solar-help-text">Store excess energy to bypass Loadshedding.</span>
				</div>
			</div>

			<!-- Live Results Container -->
			<div class="solar-results-box" id="solar-configurator-results">
				<div class="solar-results-grid">
					<div class="solar-result-item">
						<span class="solar-result-label">Recommended System Size</span>
						<span class="solar-result-value" id="res-system-size">4.6 kW</span>
					</div>
					<div class="solar-result-item">
						<span class="solar-result-label">Estimated Solar Panels (400W)</span>
						<span class="solar-result-value" id="res-panel-count">12 Panels</span>
					</div>
					<div class="solar-result-item">
						<span class="solar-result-label">Est. Monthly Savings</span>
						<span class="solar-result-value solar-text-green" id="res-monthly-savings">R2,125 / mo</span>
					</div>
					<div class="solar-result-item highlight">
						<span class="solar-result-label">Estimated Turn-key Cost</span>
						<span class="solar-result-value solar-text-amber" id="res-total-cost">R152,000</span>
					</div>
				</div>

				<div class="solar-action-footer">
					<a href="/contact" id="solar-quote-btn" class="solar-btn solar-btn-primary">
						Request Detailed Custom Proposal →
					</a>
				</div>
			</div>
		</form>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'solar_configurator', 'solar_render_configurator_shortcode' );
