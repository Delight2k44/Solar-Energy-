<?php
/**
 * Template Name: Installation Scheduling Page
 * Description: Page template for booking site inspections and installation dates.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main solar-scheduling-page">
	<div class="solar-page-banner">
		<div class="solar-section-container">
			<h1 class="solar-page-title">Schedule Your On-Site Solar Inspection</h1>
			<p class="solar-page-lead">Select a convenient date and time for a certified technician to inspect your roof, main panel, and energy setup.</p>
		</div>
	</div>

	<div class="solar-section-container">
		<div class="solar-calc-card">
			<?php
			if ( shortcode_exists( 'ssa_booking' ) ) {
				echo do_shortcode( '[ssa_booking]' );
			} elseif ( shortcode_exists( 'bookingpress' ) ) {
				echo do_shortcode( '[bookingpress_form]' );
			} else {
				echo '<div class="solar-scheduling-fallback">
					<h3>Book Inspection Appointment</h3>
					<p>Select your preferred inspection window below:</p>
					<form action="/contact" method="get" class="solar-calc-form">
						<div class="solar-calc-grid">
							<div class="solar-input-group">
								<label class="solar-label">Preferred Date</label>
								<input type="date" required class="solar-input">
							</div>
							<div class="solar-input-group">
								<label class="solar-label">Preferred Time Slot</label>
								<select class="solar-select">
									<option>Morning (8:00 AM - 12:00 PM)</option>
									<option>Afternoon (12:00 PM - 4:00 PM)</option>
								</select>
							</div>
							<div class="solar-input-group">
								<label class="solar-label">Property Address</label>
								<input type="text" placeholder="123 Solar Way, City, State" required class="solar-input">
							</div>
						</div>
						<div class="margin-top-1rem">
							<button type="submit" class="solar-btn solar-btn-primary">Confirm Appointment Request</button>
						</div>
					</form>
				</div>';
			}
			?>
		</div>
	</div>
</main>

<?php
get_footer();
