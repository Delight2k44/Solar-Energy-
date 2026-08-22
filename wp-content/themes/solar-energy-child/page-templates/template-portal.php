<?php
/**
 * Template Name: Customer Portal Page
 * Description: Client portal dashboard template for diagnostics, warranty files, and service history.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main solar-portal-page">
	<div class="solar-page-banner">
		<div class="solar-section-container">
			<h1 class="solar-page-title">Client Energy Portal & Remote Diagnostics</h1>
			<p class="solar-page-lead">Access your real-time solar generation stats, active maintenance plans, technician service logs, and warranty certificates.</p>
		</div>
	</div>

	<div class="solar-section-container">
		<?php if ( is_user_logged_in() ) : ?>
			<div class="solar-portal-dashboard">
				<div class="solar-calc-card">
					<h3>Welcome back, <?php echo esc_html( wp_get_current_user()->display_name ); ?> 👋</h3>
					<div class="solar-portal-quick-stats">
						<div class="solar-result-item">
							<span class="solar-result-label">Active System</span>
							<span class="solar-result-value">8.4 kW Residential</span>
						</div>
						<div class="solar-result-item highlight">
							<span class="solar-result-label">System Health</span>
							<span class="solar-result-value solar-text-green">100% Normal</span>
						</div>
						<div class="solar-result-item">
							<span class="solar-result-label">Maintenance Plan</span>
							<span class="solar-result-value">Gold Protection</span>
						</div>
					</div>

					<div class="margin-top-2rem">
						<h4>My Documents & Service History</h4>
						<ul class="solar-doc-list">
							<li>📄 <a href="#">25-Year Inverter Warranty Certificate.pdf</a></li>
							<li>📄 <a href="#">Annual System Inspection Log (June 2026).pdf</a></li>
							<li>📄 <a href="#">Net Metering Utility Approval.pdf</a></li>
						</ul>
					</div>
				</div>
			</div>
		<?php else : ?>
			<div class="solar-portal-login-box solar-calc-card">
				<h3>Please Log In to Access Your Portal</h3>
				<p>Manage your solar installation, view remote diagnostics, or request priority technician support.</p>
				<?php wp_login_form( array( 'redirect' => get_permalink() ) ); ?>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
