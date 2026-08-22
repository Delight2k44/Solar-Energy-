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

	<!-- Hero Section with Background Image -->
	<section class="solar-hero-section" style="background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.95)), url('https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1200&q=80') no-repeat center center/cover; color: #ffffff; padding: 6rem 2rem; text-align: center;">
		<div class="solar-hero-container" style="max-width: 1000px; margin: 0 auto;">
			<div class="solar-hero-content">
				<span class="solar-calc-badge" style="background: #f59e0b; color: #0f172a; margin-bottom: 1.5rem;">Loadshedding Protection Systems</span>
				<h1 class="solar-hero-title" style="font-size: 3rem; font-weight: 800; line-height: 1.2; margin-bottom: 1.5rem; text-wrap: balance;">Beat Loadshedding with Premium Hybrid Solar & Battery Solutions</h1>
				<p class="solar-hero-subtitle" style="font-size: 1.25rem; color: #94a3b8; line-height: 1.6; margin-bottom: 2.5rem; text-wrap: pretty;">Get seamless Stage 6 backup protection. Custom residential solar panel installation, certified Freedom Won battery packs, and smart inverter setups. 25-Year Performance Warranty.</p>
				<div class="solar-hero-cta-group" style="display: flex; gap: 1.25rem; justify-content: center; margin-bottom: 3rem;">
					<a href="#solar-configurator-app" class="solar-btn solar-btn-primary" style="padding: 1rem 2rem; font-size: 1.05rem;">Size Your Solar System ZAR →</a>
					<a href="/shop" class="solar-btn" style="background: #334155; color: #ffffff; padding: 1rem 2rem; font-size: 1.05rem; border-radius: 8px; text-decoration: none;">Explore Solar Shop</a>
				</div>
				<div class="solar-hero-trust-bar" style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; color: #cbd5e1; font-size: 0.95rem; font-weight: 600;">
					<span>🛡️ 25-Year Panel Warranty</span>
					<span>⚡ Sunsynk & Victron Partners</span>
					<span>🇿🇦 Certified Local SA Installers</span>
				</div>
			</div>
		</div>
	</section>

	<!-- Solar Services Grid with Images -->
	<section class="solar-services-section" style="padding: 4rem 1rem; background: #ffffff;">
		<div class="solar-section-container" style="max-width: 1100px; margin: 0 auto;">
			<div class="solar-section-header text-center" style="text-align: center; margin-bottom: 3.5rem;">
				<h2 style="font-size: 2.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem;">Premium Solar Solutions for South African Homes & Businesses</h2>
				<p style="color: #64748b; font-size: 1.1rem; max-width: 700px; margin: 0 auto;">From initial engineering site audits to automatic backup dispatch, we secure your energy independence.</p>
			</div>

			<div class="solar-services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
				<!-- Card 1 -->
				<div class="solar-service-card" style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; background: #f8fafc; transition: transform 0.2s ease;">
					<img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=600&h=350&q=80" alt="Rooftop Solar Installation" style="width: 100%; height: 220px; object-fit: cover;">
					<div style="padding: 1.75rem;">
						<h3 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin-bottom: 0.75rem;">Residential Solar Installation</h3>
						<p style="color: #475569; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1.5rem;">Engineered rooftop panel arrays designed for maximum daily yield and Eskom tariff offset. Full NERSA compliance registration included.</p>
						<a href="/services/installation" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.6rem 1.2rem;">Book Free Site Audit</a>
					</div>
				</div>

				<!-- Card 2 -->
				<div class="solar-service-card" style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; background: #f8fafc; transition: transform 0.2s ease;">
					<img src="https://images.unsplash.com/photo-1620714223084-8fcacc6dfd8d?auto=format&fit=crop&w=600&h=350&q=80" alt="LiFePO4 Backup Batteries" style="width: 100%; height: 220px; object-fit: cover;">
					<div style="padding: 1.75rem;">
						<h3 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin-bottom: 0.75rem;">Loadshedding Battery Backup</h3>
						<p style="color: #475569; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1.5rem;">Sunsynk, Deye, and Victron inverters paired with Freedom Won batteries. Under-20ms transfer time ensures your power never blinks.</p>
						<a href="/services/batteries" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.6rem 1.2rem;">Explore Hybrid Bundles</a>
					</div>
				</div>

				<!-- Card 3 -->
				<div class="solar-service-card" style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; background: #f8fafc; transition: transform 0.2s ease;">
					<img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=600&h=350&q=80" alt="Solar Maintenance" style="width: 100%; height: 220px; object-fit: cover;">
					<div style="padding: 1.75rem;">
						<h3 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin-bottom: 0.75rem;">Subscription Care & Cleaning</h3>
						<p style="color: #475569; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1.5rem;">Annual panel washing, electrical testing, firmware updates, and remote diagnostic monitoring to prevent power drops.</p>
						<a href="/services/maintenance" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.6rem 1.2rem;">Select Maintenance Plan</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Embedded Solar Configurator Widget -->
	<section class="solar-calculator-embed-section" id="configurator-section" style="padding: 4rem 1rem; background: #f1f5f9;">
		<div class="solar-section-container" style="max-width: 1100px; margin: 0 auto;">
			<?php echo do_shortcode( '[solar_configurator]' ); ?>
		</div>
	</section>

	<!-- Brands Trust Showcase -->
	<section class="solar-brands-showcase" style="padding: 3rem 1rem; background: #ffffff; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; text-align: center;">
		<div style="max-width: 1100px; margin: 0 auto;">
			<h4 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: #94a3b8; font-weight: 700; margin-bottom: 2rem;">Compatible Tier-1 Brands We Support & Install</h4>
			<div style="display: flex; justify-content: center; gap: 4rem; align-items: center; flex-wrap: wrap; opacity: 0.75;">
				<span style="font-size: 1.35rem; font-weight: 800; color: #475569;">☀️ SUNSYNK</span>
				<span style="font-size: 1.35rem; font-weight: 800; color: #475569;">🔌 VICTRON ENERGY</span>
				<span style="font-size: 1.35rem; font-weight: 800; color: #475569;">🔋 FREEDOM WON</span>
				<span style="font-size: 1.35rem; font-weight: 800; color: #475569;">⚡ DEYE HYBRID</span>
			</div>
		</div>
	</section>

	<!-- Testimonials Section with Avatars -->
	<section class="solar-testimonials-section" style="padding: 5rem 1rem; background: #f8fafc;">
		<div class="solar-section-container" style="max-width: 1100px; margin: 0 auto;">
			<div class="solar-section-header text-center" style="text-align: center; margin-bottom: 3.5rem;">
				<h2 style="font-size: 2.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem;">What Our Clients Say</h2>
				<p style="color: #64748b; font-size: 1.1rem; max-width: 700px; margin: 0 auto;">See how we helped families and local businesses secure independent power.</p>
			</div>

			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
				<!-- Testimonial 1 -->
				<div style="background: #ffffff; padding: 2rem; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);">
					<p style="color: #475569; font-style: italic; line-height: 1.6; margin-bottom: 1.5rem;">"We used to dread Stage 6 loadshedding. Antigravity installed a 5kW Sunsynk hybrid inverter with 10kWh Freedom Won batteries. Now our TVs, WiFi, fridge, and lights never skip a beat. Excellent job!"</p>
					<div style="display: flex; align-items: center; gap: 1rem;">
						<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&h=100&q=80" alt="Johan Vorster" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
						<div>
							<strong style="color: #0f172a; display: block; font-size: 0.95rem;">Johan Vorster</strong>
							<span style="color: #94a3b8; font-size: 0.8rem;">Pretoria East</span>
						</div>
					</div>
				</div>

				<!-- Testimonial 2 -->
				<div style="background: #ffffff; padding: 2rem; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);">
					<p style="color: #475569; font-style: italic; line-height: 1.6; margin-bottom: 1.5rem;">"The solar configurator was incredibly accurate! It estimated my residential system at 6.4kW, which is exactly what our engineering site auditor recommended. Highly professional team."</p>
					<div style="display: flex; align-items: center; gap: 1rem;">
						<img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&h=100&q=80" alt="Lerato Nkosi" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
						<div>
							<strong style="color: #0f172a; display: block; font-size: 0.95rem;">Lerato Nkosi</strong>
							<span style="color: #94a3b8; font-size: 0.8rem;">Bryanston, Sandton</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
