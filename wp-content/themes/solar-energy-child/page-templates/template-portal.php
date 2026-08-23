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
					<h3>Welcome back, <?php echo esc_html( wp_get_current_user()->display_name ); ?></h3>
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
						<ul class="solar-doc-list" style="list-style:none;padding:0;">
							<li style="margin-bottom:0.5rem;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;display:inline-block;vertical-align:middle;margin-right:6px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg> <a href="#" style="text-decoration:none;color:var(--solar-blue);">25-Year Inverter Warranty Certificate.pdf</a></li>
							<li style="margin-bottom:0.5rem;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;display:inline-block;vertical-align:middle;margin-right:6px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg> <a href="#" style="text-decoration:none;color:var(--solar-blue);">Annual System Inspection Log (June 2026).pdf</a></li>
							<li style="margin-bottom:0.5rem;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;display:inline-block;vertical-align:middle;margin-right:6px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg> <a href="#" style="text-decoration:none;color:var(--solar-blue);">Net Metering Utility Approval.pdf</a></li>
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
