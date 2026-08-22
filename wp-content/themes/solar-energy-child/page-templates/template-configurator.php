<?php
/**
 * Template Name: Solar Configurator Page
 * Description: Dedicated page template for the interactive Solar System Configurator.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main solar-configurator-page">
	<div class="solar-page-banner">
		<div class="solar-section-container">
			<h1 class="solar-page-title">Interactive Solar System Configurator</h1>
			<p class="solar-page-lead">Calculate your recommended solar array kW size, estimated panel count, battery storage requirements, and instant pricing.</p>
		</div>
	</div>

	<div class="solar-section-container">
		<?php echo do_shortcode( '[solar_configurator]' ); ?>

		<!-- Forminator Lead Capture Container -->
		<div class="solar-lead-capture-box margin-top-2rem">
			<h3>Ready for an Official Engineering Site Plan?</h3>
			<p>Submit your custom configuration results to our engineering team for a free on-site shading & roof assessment.</p>
			<?php
			if ( shortcode_exists( 'forminator_form' ) ) {
				echo do_shortcode( '[forminator_form id="solar_quote_form"]' );
			} else {
				echo '<div class="solar-form-fallback">
					<p>Fill out your details to receive an official PDF proposal:</p>
					<form action="/contact" method="get" class="solar-simple-form">
						<input type="text" placeholder="Your Full Name" required class="solar-input">
						<input type="email" placeholder="Your Email Address" required class="solar-input">
						<input type="tel" placeholder="Phone Number" required class="solar-input">
						<button type="submit" class="solar-btn solar-btn-primary">Submit for Free Site Assessment</button>
					</form>
				</div>';
			}
			?>
		</div>
	</div>
</main>

<?php
get_footer();
