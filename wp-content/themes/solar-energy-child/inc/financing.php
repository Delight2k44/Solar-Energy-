<?php
/**
 * Solar Financing & Rebate Repayment Calculator Shortcode Handler.
 * Shortcode: [solar_financing_calculator]
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function solar_render_financing_shortcode( $atts ) {
	ob_start();
	?>
	<div class="solar-calc-card solar-financing-wrapper" id="solar-financing-app">
		<div class="solar-calc-header">
			<span class="solar-calc-badge blue">💳 Financing & Rebate Calculator</span>
			<h2 class="solar-calc-title">Estimate Monthly Solar Loan Repayments</h2>
			<p class="solar-calc-subtitle">See how government incentives and solar loan terms reduce your monthly investment.</p>
		</div>

		<form id="solar-financing-form" class="solar-calc-form" onsubmit="return false;">
			<div class="solar-calc-grid">
				<!-- System Cost -->
				<div class="solar-input-group">
					<label for="fin-system-cost" class="solar-label">
						Total Solar System Cost ($)
					</label>
					<div class="solar-input-prefix-wrapper">
						<span class="solar-prefix">$</span>
						<input type="number" id="fin-system-cost" name="system_cost" class="solar-input" value="12000" min="1000" max="100000" step="500" required>
					</div>
				</div>

				<!-- Federal / Local Rebates % -->
				<div class="solar-input-group">
					<label for="fin-rebate-pct" class="solar-label">
						Solar Incentive / Tax Credit (%)
					</label>
					<input type="number" id="fin-rebate-pct" name="rebate_pct" class="solar-input" value="30" min="0" max="80" step="1" required>
					<span class="solar-help-text">Default federal clean energy tax credit is 30%.</span>
				</div>

				<!-- Loan Term -->
				<div class="solar-input-group">
					<label for="fin-loan-term" class="solar-label">
						Financing Duration (Months)
					</label>
					<select id="fin-loan-term" name="loan_term" class="solar-select">
						<option value="60">5 Years (60 Months)</option>
						<option value="84">7 Years (84 Months)</option>
						<option value="120" selected>10 Years (120 Months)</option>
						<option value="180">15 Years (180 Months)</option>
					</select>
				</div>

				<!-- Interest Rate -->
				<div class="solar-input-group">
					<label for="fin-interest-rate" class="solar-label">
						Annual Interest Rate / APR (%)
					</label>
					<input type="number" id="fin-interest-rate" name="interest_rate" class="solar-input" value="6.5" min="0.0" max="25.0" step="0.1" required>
				</div>
			</div>

			<!-- Output Results -->
			<div class="solar-results-box blue-theme" id="solar-financing-results">
				<div class="solar-results-grid">
					<div class="solar-result-item">
						<span class="solar-result-label">Rebate Savings</span>
						<span class="solar-result-value solar-text-green" id="fin-res-rebate-savings">-$3,600</span>
					</div>
					<div class="solar-result-item">
						<span class="solar-result-label">Net Financed Amount</span>
						<span class="solar-result-value" id="fin-res-net-amount">$8,400</span>
					</div>
					<div class="solar-result-item highlight blue">
						<span class="solar-result-label">Estimated Payment</span>
						<span class="solar-result-value" id="fin-res-monthly-pay">$95 / mo</span>
					</div>
				</div>

				<div class="solar-action-footer">
					<a href="/financing" class="solar-btn solar-btn-blue">
						Apply for Solar Financing Pre-Approval →
					</a>
				</div>
			</div>
		</form>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'solar_financing_calculator', 'solar_render_financing_shortcode' );
