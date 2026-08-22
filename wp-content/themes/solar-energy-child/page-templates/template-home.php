<?php
/**
 * Template Name: Solar Homepage
 * Description: Modern, trustworthy homepage layout for Solar Energy Solutions.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main solar-home-page">

	<!-- Hero Section -->
	<section class="solar-hero-section">
		<div class="solar-hero-container">
			<div class="solar-hero-content">
				<span class="solar-calc-badge">Clean Energy Technology</span>
				<h1 class="solar-hero-title">Empowering Your Future with Clean, Renewable Solar Power</h1>
				<p class="solar-hero-subtitle">Turn-key solar panel installation, commercial battery storage, and smart energy maintenance backed by a 25-year performance warranty.</p>
				<div class="solar-hero-cta-group">
					<a href="#solar-configurator-app" class="solar-btn solar-btn-primary">Build Your Solar System →</a>
					<a href="/shop" class="solar-btn solar-btn-secondary">Explore Equipment Store</a>
				</div>
				<div class="solar-hero-trust-bar">
					<span>✔️ 25-Year Warranty</span>
					<span>✔️ Tier-1 Solar Panels</span>
					<span>✔️ Certified Local Installers</span>
				</div>
			</div>
			<div class="solar-hero-image-wrapper">
				<div class="solar-hero-card-preview">
					<div class="solar-card-header">
						<span>⚡ Live System Performance</span>
						<span class="solar-status-pill green">99.4% Efficiency</span>
					</div>
					<div class="solar-card-stat">
						<span class="stat-num">8.4 kW</span>
						<span class="stat-label">Daily Average Production</span>
					</div>
					<div class="solar-card-mini-grid">
						<div><strong>$185/mo</strong><span>Est. Savings</span></div>
						<div><strong>14.2 Tons</strong><span>CO2 Avoided</span></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Solar Services Grid -->
	<section class="solar-services-section">
		<div class="solar-section-container">
			<div class="solar-section-header text-center">
				<h2>Complete Solar Energy Solutions</h2>
				<p>From initial site inspection to lifelong maintenance subscriptions, we cover every stage of your clean energy transition.</p>
			</div>

			<div class="solar-services-grid">
				<div class="solar-service-card">
					<div class="solar-service-icon">☀️</div>
					<h3>Turn-Key Residential Installation</h3>
					<p>Custom rooftop & ground-mount solar arrays engineered for maximum energy offset and rapid ROI.</p>
					<a href="/services/installation" class="solar-link">Learn More →</a>
				</div>

				<div class="solar-service-card">
					<div class="solar-service-icon">🔋</div>
					<h3>Battery Storage & Microgrids</h3>
					<p>Seamless backup power solutions using Lithium Iron Phosphate (LiFePO4) battery technology.</p>
					<a href="/services/batteries" class="solar-link">Learn More →</a>
				</div>

				<div class="solar-service-card">
					<div class="solar-service-icon">🛠️</div>
					<h3>Maintenance & Remote Diagnostics</h3>
					<p>24/7 automated monitoring, panel washing, inverter maintenance, and technician dispatch.</p>
					<a href="/services/maintenance" class="solar-link">Learn More →</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Embedded Solar Configurator Widget -->
	<section class="solar-calculator-embed-section" id="configurator-section">
		<div class="solar-section-container">
			<?php echo do_shortcode( '[solar_configurator]' ); ?>
		</div>
	</section>

	<!-- Scalable Future Energy Sectors -->
	<section class="solar-future-energy-section">
		<div class="solar-section-container">
			<div class="solar-section-header">
				<span class="solar-calc-badge blue">Future-Proof Energy Network</span>
				<h2>Engineered to Scale with Tomorrow's Clean Technologies</h2>
				<p>Our modular grid integration platform is designed to incorporate additional renewable energy assets as our commercial portfolio expands.</p>
			</div>

			<div class="solar-future-grid">
				<div class="solar-future-item">
					<span class="future-icon">💨</span>
					<h4>Wind Micro-Turbines</h4>
					<p>Modular wind generation pairing seamlessly with existing solar inverter setups.</p>
				</div>
				<div class="solar-future-item">
					<span class="future-icon">🌱</span>
					<h4>Biogas Systems</h4>
					<p>Agricultural & commercial waste-to-energy conversion modules.</p>
				</div>
				<div class="solar-future-item">
					<span class="future-icon">⚡</span>
					<h4>Smart EV Chargers</h4>
					<p>High-speed Level 2 & DC Fast Charging stations powered directly by rooftop solar.</p>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
