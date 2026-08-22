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
						Average Monthly Electricity Bill ($)
					</label>
					<div class="solar-input-prefix-wrapper">
						<span class="solar-prefix">$</span>
						<input type="number" id="solar-monthly-bill" name="monthly_bill" class="solar-input" value="180" min="20" max="5000" step="5" required>
					</div>
					<span class="solar-help-text">Enter your typical monthly spend on power.</span>
				</div>

				<!-- Tariff Rate -->
				<div class="solar-input-group">
					<label for="solar-utility-rate" class="solar-label">
						Utility Rate ($ / kWh)
					</label>
					<input type="number" id="solar-utility-rate" name="utility_rate" class="solar-input" value="0.16" min="0.05" max="1.00" step="0.01" required>
					<span class="solar-help-text">Standard default is $0.16/kWh.</span>
				</div>

				<!-- Sunlight Hours -->
				<div class="solar-input-group">
					<label for="solar-sun-hours" class="solar-label">
						Average Daily Sun Hours
					</label>
					<select id="solar-sun-hours" name="sun_hours" class="solar-select">
						<option value="4.0">4.0 Hours (Low Sunlight Region)</option>
						<option value="5.0" selected>5.0 Hours (Average Region)</option>
						<option value="6.0">6.0 Hours (High Sun Region)</option>
					</select>
					<span class="solar-help-text">Select your location's sunlight profile.</span>
				</div>

				<!-- Battery Storage -->
				<div class="solar-input-group">
					<label for="solar-battery-opt" class="solar-label">
						Include Battery Backup System?
					</label>
					<select id="solar-battery-opt" name="battery_option" class="solar-select">
						<option value="no">No — Grid-Tied Only</option>
						<option value="yes">Yes — 10kWh Battery Storage (+ $7,500)</option>
					</select>
					<span class="solar-help-text">Store excess energy for night & outages.</span>
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
						<span class="solar-result-value solar-text-green" id="res-monthly-savings">$153 / mo</span>
					</div>
					<div class="solar-result-item highlight">
						<span class="solar-result-label">Estimated Turn-key Cost</span>
						<span class="solar-result-value solar-text-amber" id="res-total-cost">$11,040</span>
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
