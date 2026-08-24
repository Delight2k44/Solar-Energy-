<?php
/**
 * Template Name: Solar Homepage
 * Description: Premium, modern e-commerce homepage layout for Solar Energy Solutions.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main solar-home-page">

	<!-- Announcement Bar for WordPress -->
	<div class="preview-announcement-bar" style="background-color: var(--solar-slate-900); color: #ffffff; padding: 0.5rem 1.5rem; text-align: center; font-size: 0.85rem; font-weight: 600;">
		<span style="background: var(--solar-secondary); color: var(--solar-slate-900); padding: 0.15rem 0.5rem; border-radius: 4px; font-size: 0.75rem; font-weight: 800; margin-right: 0.5rem; text-transform: uppercase;">Stage 6 Loadshedding Protection</span> Save up to R5,000 on turn-key installation bookings this month!
	</div>

	<!-- Centered Glassy Hero Section -->
	<section class="solar-hero-section">
		<div class="orb orb-1"></div>
		<div class="orb orb-2"></div>
		<div class="solar-hero-container">
			<div class="solar-glass-card">
				<div class="solar-hero-content">
					<span class="solar-calc-badge amber">Premium Solar E-Commerce Store</span>
					<h1 class="solar-hero-title">Power Your Life with Smart Solar Energy</h1>
					<p class="solar-hero-subtitle">Welcome to Kinetix Engineering Solutions. We provide certified high-yield monocrystalline solar panels, smart hybrid inverters, and modular lithium battery storage kits. Order online with nationwide shipping and optional professional installation.</p>
					<div class="solar-hero-cta-group">
						<a href="#configurator-section" class="solar-btn solar-btn-primary">Size Your Solar System ZAR →</a>
						<a href="#shop-section" class="solar-btn solar-btn-outline" style="color: #ffffff !important; border-color: rgba(255,255,255,0.4);">Shop Solar Hardware</a>
					</div>
					<div class="solar-hero-trust-bar">
						<span>✓ 25-Year Panel Warranty</span>
						<span>✓ Sunsynk & Victron Partners</span>
						<span>✓ Certified Local SA Installers</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="solar-section-container">
		
		<!-- Value Propositions Grid -->
		<div class="preview-value-props" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 2rem; margin-bottom: 5rem; margin-top: -2rem;">
			<div class="preview-value-prop-card" style="background: #ffffff; border: 1px solid var(--solar-slate-200); border-radius: 12px; padding: 1.5rem; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.01);">
				<div class="preview-value-prop-icon" style="margin-bottom: 0.5rem; display: flex; justify-content: center;">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:24px;height:24px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.195-.39.77-.39.965 0l2.364 4.73 5.215.757c.433.063.606.596.293.9l-3.774 3.684.89 5.197c.074.433-.38.763-.767.558L12 18.252l-4.664 2.454c-.387.205-.84-.125-.768-.558l.89-5.197-3.774-3.684c-.313-.304-.14-.837.292-.9l5.216-.758 2.36-4.73z" /></svg>
				</div>
				<h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 0.5rem;">Tier-1 Rated Hardware</h4>
				<p style="font-size: 0.85rem; color: var(--solar-slate-600); margin: 0;">We source only high-performance panels, inverters, and lithium battery storage packs.</p>
			</div>
			<div class="preview-value-prop-card" style="background: #ffffff; border: 1px solid var(--solar-slate-200); border-radius: 12px; padding: 1.5rem; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.01);">
				<div class="preview-value-prop-icon" style="margin-bottom: 0.5rem; display: flex; justify-content: center;">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:24px;height:24px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>
				</div>
				<h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 0.5rem;">10-Year Battery Warranty</h4>
				<p style="font-size: 0.85rem; color: var(--solar-slate-600); margin: 0;">Rest assured with durable LiFePO4 cells designed for active daily cycles.</p>
			</div>
			<div class="preview-value-prop-card" style="background: #ffffff; border: 1px solid var(--solar-slate-200); border-radius: 12px; padding: 1.5rem; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.01);">
				<div class="preview-value-prop-icon" style="margin-bottom: 0.5rem; display: flex; justify-content: center;">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:24px;height:24px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.357.205a1.125 1.125 0 01-1.4-.205 19.154 19.154 0 01-3.08-5.187m6.3-8.318A19.16 19.16 0 007.24 2.82a1.125 1.125 0 00-1.4 1.205c.182.7.464 1.383.842 2.03m3.658-.696c-.253.962-.584 1.892-.985 2.783a1.125 1.125 0 01-.81.657l-.31.066a1.125 1.125 0 00-.77 1.419c.143.463.313.915.51 1.355m4.353-8.293a12.015 12.015 0 0110.843 10.843m0 0a12.015 12.015 0 01-10.843 10.843m10.843-10.843H12" /></svg>
				</div>
				<h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 0.5rem;">Full NERSA Registration</h4>
				<p style="font-size: 0.85rem; color: var(--solar-slate-600); margin: 0;">Our electrical engineers handle all grid connection approvals and paperwork.</p>
			</div>
			<div class="preview-value-prop-card" style="background: #ffffff; border: 1px solid var(--solar-slate-200); border-radius: 12px; padding: 1.5rem; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.01);">
				<div class="preview-value-prop-icon" style="margin-bottom: 0.5rem; display: flex; justify-content: center;">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:24px;height:24px;color:var(--solar-primary);"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" /></svg>
				</div>
				<h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 0.5rem;">R0 Down Financing</h4>
				<p style="font-size: 0.85rem; color: var(--solar-slate-600); margin: 0;">Flexible financing solutions with prime interest rates for certified buyers.</p>
			</div>
		</div>

		<!-- Solar Services Grid with Images -->
		<h2 class="text-center" id="services" style="font-size: 2.25rem; font-weight: 900; margin-bottom: 0.5rem;">Premium Solar Solutions</h2>
		<p class="text-center" style="font-size: 1.1rem; color: var(--solar-slate-600); margin-bottom: 3.5rem;">Engineered specifically for South African residential grid conditions and load shedding resilience.</p>
		
		<div class="solar-services-grid" style="margin-bottom: 5rem;">
			<div class="solar-service-card">
				<img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=600&h=350&q=80" alt="Rooftop Solar Panels">
				<div class="solar-service-card-body">
					<h3>Residential Solar Installation</h3>
					<p>High-efficiency monocrystalline solar panel arrays designed to maximize daily yield and offset Eskom utility rates. Includes full engineering assessment.</p>
					<a href="/schedule-inspection" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">Get Site Inspection</a>
				</div>
			</div>

			<div class="solar-service-card">
				<img src="https://images.unsplash.com/photo-1620714223084-8fcacc6dfd8d?auto=format&fit=crop&w=600&h=350&q=80" alt="Loadshedding Hybrid Batteries">
				<div class="solar-service-card-body">
					<h3>Loadshedding Battery Backup</h3>
					<p>Sunsynk and Deye inverters paired with modular Freedom Won Lithium Iron Phosphate (LiFePO4) storage batteries for uninterrupted protection.</p>
					<a href="/shop" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">View Battery Bundles</a>
				</div>
			</div>

			<div class="solar-service-card">
				<img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=600&h=350&q=80" alt="Solar Maintenance Technician">
				<div class="solar-service-card-body">
					<h3>Service & Care Subscriptions</h3>
					<p>Annual physical checks, panel washes, wiring audits, and automated remote monitoring diagnostics to guarantee maximum efficiency.</p>
					<a href="/services/maintenance" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">Select Maintenance Plan</a>
				</div>
			</div>
		</div>

		<!-- E-COMMERCE PRODUCTS SHOWCASE -->
		<h2 class="text-center" id="shop-section" style="font-size: 2.25rem; font-weight: 900; margin-bottom: 0.5rem;">Featured Solar Equipment Shop</h2>
		<p class="text-center" style="font-size: 1.1rem; color: var(--solar-slate-600); margin-bottom: 3.5rem;">Buy tier-1 solar components directly online. Nationwide shipping and certified optional local installation.</p>
		
		<div class="solar-products-grid" style="margin-bottom: 5rem;">
			<?php
			$woocommerce_active = class_exists( 'WooCommerce' );
			$products_found = false;

			if ( $woocommerce_active ) {
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => 4,
				);
				$loop = new WP_Query( $args );

				if ( $loop->have_posts() ) {
					$products_found = true;
					while ( $loop->have_posts() ) {
						$loop->the_post();
						global $product;
						$price = $product->get_price();
						$image_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
						if ( ! $image_url ) {
							$image_url = wc_placeholder_img_src();
						}
						?>
						<div class="solar-product-card">
							<span class="solar-product-badge">Featured</span>
							<div class="solar-product-image-container">
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
							</div>
							<div class="solar-product-info">
								<span class="solar-product-category">Hardware</span>
								<h3 class="solar-product-title"><?php the_title(); ?></h3>
								<div class="solar-product-rating">
									★★★★★ <span class="review-count">(Local Setup)</span>
								</div>
								<div class="solar-status-pill green">
									<span class="solar-status-dot"></span><?php echo $product->is_in_stock() ? 'In Stock' : 'Backorder'; ?>
								</div>
								<div class="solar-product-footer">
									<div class="solar-product-price">
										<span class="solar-price-label">Price</span>
										<span class="solar-price-value"><?php echo number_format( $price, 2 ); ?></span>
									</div>
									<a href="?add-to-cart=<?php the_ID(); ?>" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">Add to Cart</a>
								</div>
							</div>
						</div>
						<?php
					}
					wp_reset_postdata();
				}
			}

			// Output realistic fallback e-commerce cards if WooCommerce products aren't configured yet
			if ( ! $products_found ) {
				?>
				<!-- Fallcard 1: Solar Panel -->
				<div class="solar-product-card">
					<span class="solar-product-badge">Best Seller</span>
					<div class="solar-product-image-container">
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/solar_panel.jpg' ); ?>" alt="JA Solar Panel">
					</div>
					<div class="solar-product-info">
						<span class="solar-product-category">Solar Panels</span>
						<h3 class="solar-product-title">JA Solar 550W DeepBlue 3.0 Monocrystalline Panel</h3>
						<div class="solar-product-specs-pills">
							<span class="solar-spec-pill">550W</span>
							<span class="solar-spec-pill">Monocrystalline</span>
							<span class="solar-spec-pill">21.3% Eff</span>
						</div>
						<div class="solar-product-rating">
							★★★★★ <span class="review-count">(34 reviews)</span>
						</div>
						<div class="solar-status-pill green">
							<span class="solar-status-dot"></span>In Stock — Dispatch Today
						</div>
						<div class="solar-product-footer">
							<div class="solar-product-price">
								<span class="solar-price-label">Price</span>
								<span class="solar-price-value">3,299</span>
							</div>
							<a href="/shop" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">Add to Cart</a>
						</div>
					</div>
				</div>

				<!-- Fallcard 2: Inverter -->
				<div class="solar-product-card">
					<span class="solar-product-badge">Popular</span>
					<div class="solar-product-image-container">
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/inverter.jpg' ); ?>" alt="Sunsynk 8kW Inverter">
					</div>
					<div class="solar-product-info">
						<span class="solar-product-category">Hybrid Inverters</span>
						<h3 class="solar-product-title">Sunsynk 8kW Hybrid Inverter (Single Phase)</h3>
						<div class="solar-product-specs-pills">
							<span class="solar-spec-pill">8kW</span>
							<span class="solar-spec-pill">IP65 Waterproof</span>
							<span class="solar-spec-pill">Dual MPPT</span>
						</div>
						<div class="solar-product-rating">
							★★★★★ <span class="review-count">(19 reviews)</span>
						</div>
						<div class="solar-status-pill green">
							<span class="solar-status-dot"></span>In Stock — Tech Setup Available
						</div>
						<div class="solar-product-footer">
							<div class="solar-product-price">
								<span class="solar-price-label">Price</span>
								<span class="solar-price-value">28,499</span>
							</div>
							<a href="/shop" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">Add to Cart</a>
						</div>
					</div>
				</div>

				<!-- Fallcard 3: Battery -->
				<div class="solar-product-card">
					<span class="solar-product-badge hot">Highly Rated</span>
					<div class="solar-product-image-container">
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/battery.jpg' ); ?>" alt="Freedom Won LiFePO4 Battery">
					</div>
					<div class="solar-product-info">
						<span class="solar-product-category">Energy Storage</span>
						<h3 class="solar-product-title">Freedom Won Lite Home 10/8 LiFePO4 Battery</h3>
						<div class="solar-product-specs-pills">
							<span class="solar-spec-pill">10kWh</span>
							<span class="solar-spec-pill">LiFePO4</span>
							<span class="solar-spec-pill">10-Year Warranty</span>
						</div>
						<div class="solar-product-rating">
							★★★★★ <span class="review-count">(22 reviews)</span>
						</div>
						<div class="solar-status-pill green">
							<span class="solar-status-dot"></span>In Stock — Fast Courier Delivery
						</div>
						<div class="solar-product-footer">
							<div class="solar-product-price">
								<span class="solar-price-label">Price</span>
								<span class="solar-price-value">58,999</span>
							</div>
							<a href="/shop" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">Add to Cart</a>
						</div>
					</div>
				</div>

				<!-- Fallcard 4: Complete Kit -->
				<div class="solar-product-card">
					<span class="solar-product-badge">Saver Combo</span>
					<div class="solar-product-image-container">
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/inverter.jpg' ); ?>" alt="Complete Loadshedding Kit">
					</div>
					<div class="solar-product-info">
						<span class="solar-product-category">Solar Kits</span>
						<h3 class="solar-product-title">Sunsynk 5kW Hybrid Inverter + 5kWh Battery Starter Kit</h3>
						<div class="solar-product-specs-pills">
							<span class="solar-spec-pill">5kW Inverter</span>
							<span class="solar-spec-pill">5kWh Battery</span>
							<span class="solar-spec-pill">Full Protection</span>
						</div>
						<div class="solar-product-rating">
							★★★★★ <span class="review-count">(47 reviews)</span>
						</div>
						<div class="solar-status-pill green">
							<span class="solar-status-dot"></span>In Stock — Free Shipping
						</div>
						<div class="solar-product-footer">
							<div class="solar-product-price">
								<span class="solar-price-label">Price</span>
								<span class="solar-price-value">74,999</span>
							</div>
							<a href="/shop" class="solar-btn solar-btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">Add to Cart</a>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>

		<!-- How it Works Section -->
		<h2 class="text-center" style="font-size: 2.25rem; font-weight: 900; margin-bottom: 0.5rem;">How To Get Started</h2>
		<p class="text-center" style="font-size: 1.1rem; color: var(--solar-slate-600); margin-bottom: 3.5rem;">A seamless process from selecting components to turning on your loadshedding backup system.</p>
		
		<div class="solar-timeline" style="margin-bottom: 5rem;">
			<div class="solar-timeline-item">
				<div class="solar-timeline-step">1</div>
				<h3>Size Your System</h3>
				<p>Use our interactive sizing configurator below to estimate the required panel kW and battery capacity.</p>
			</div>
			
			<div class="solar-timeline-item">
				<div class="solar-timeline-step">2</div>
				<h3>Schedule Site Audit</h3>
				<p>Book a slot for a certified technician to inspect your roof, wiring, and main distribution board.</p>
			</div>
			
			<div class="solar-timeline-item">
				<div class="solar-timeline-step">3</div>
				<h3>Receive Proposal</h3>
				<p>Our engineering team delivers a tailored 3D solar proposal and official pricing quote.</p>
			</div>
			
			<div class="solar-timeline-item">
				<div class="solar-timeline-step">4</div>
				<h3>Install & Power Up</h3>
				<p>We install the equipment, handle municipal registration, and hand over your certificate of compliance (CoC).</p>
			</div>
		</div>

	</div>

	<!-- Embedded Solar Configurator Widget -->
	<section class="solar-calculator-embed-section" id="configurator-section" style="padding: 4rem 1.5rem; background: var(--solar-slate-100);">
		<div class="solar-section-container" style="padding: 0;">
			<?php echo do_shortcode( '[solar_configurator]' ); ?>
		</div>
	</section>

	<!-- Brands Trust Showcase -->
	<section class="solar-brands-showcase" style="padding: 3rem 1.5rem; background: #ffffff; border-top: 1px solid var(--solar-slate-200); border-bottom: 1px solid var(--solar-slate-200); text-align: center;">
		<div style="max-width: 1200px; margin: 0 auto;">
			<h4 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--solar-slate-400); font-weight: 700; margin-bottom: 2rem;">Compatible Tier-1 Brands We Support & Install</h4>
			<div style="display: flex; justify-content: center; gap: 4rem; align-items: center; flex-wrap: wrap; opacity: 0.75;">
				<span style="font-size: 1.35rem; font-weight: 800; color: var(--solar-slate-600);">SUNSYNK</span>
				<span style="font-size: 1.35rem; font-weight: 800; color: var(--solar-slate-600);">VICTRON ENERGY</span>
				<span style="font-size: 1.35rem; font-weight: 800; color: var(--solar-slate-600);">FREEDOM WON</span>
				<span style="font-size: 1.35rem; font-weight: 800; color: var(--solar-slate-600);">DEYE HYBRID</span>
			</div>
		</div>
	</section>

	<!-- Testimonials Section with Avatars -->
	<section class="solar-testimonials-section" style="padding: 5rem 1.5rem; background: var(--solar-slate-50);">
		<div class="solar-section-container" style="padding: 0; max-width: 1200px; margin: 0 auto;">
			<div class="solar-section-header text-center" style="text-align: center; margin-bottom: 3.5rem;">
				<h2 style="font-size: 2.25rem; font-weight: 800; color: var(--solar-slate-900); margin-bottom: 1rem;">What Our Clients Say</h2>
				<p style="color: var(--solar-slate-600); font-size: 1.1rem; max-width: 700px; margin: 0 auto;">See how we helped families and local businesses secure independent power.</p>
			</div>

			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
				<!-- Testimonial 1 -->
				<div style="background: #ffffff; padding: 2.5rem; border-radius: 16px; border: 1px solid var(--solar-slate-200); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.01);">
					<p style="color: var(--solar-slate-600); font-style: italic; line-height: 1.6; margin-bottom: 2rem; font-size: 0.95rem;">"We used to dread Stage 6 loadshedding. The team installed a 5kW Sunsynk hybrid inverter with 10kWh Freedom Won batteries. Now our TVs, WiFi, fridge, and lights never skip a beat. Excellent job!"</p>
					<div style="display: flex; align-items: center; gap: 1rem;">
						<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&h=100&q=80" alt="Johan Vorster" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
						<div>
							<strong style="color: var(--solar-slate-900); display: block; font-size: 0.95rem; font-weight: 800;">Johan Vorster</strong>
							<span style="color: var(--solar-slate-400); font-size: 0.8rem; font-weight: 600;">Pretoria East</span>
						</div>
					</div>
				</div>

				<!-- Testimonial 2 -->
				<div style="background: #ffffff; padding: 2.5rem; border-radius: 16px; border: 1px solid var(--solar-slate-200); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.01);">
					<p style="color: var(--solar-slate-600); font-style: italic; line-height: 1.6; margin-bottom: 2rem; font-size: 0.95rem;">"The solar configurator was incredibly accurate! It estimated my residential system at 6.4kW, which is exactly what our engineering site auditor recommended. Highly professional team."</p>
					<div style="display: flex; align-items: center; gap: 1rem;">
						<img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&h=100&q=80" alt="Lerato Nkosi" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
						<div>
							<strong style="color: var(--solar-slate-900); display: block; font-size: 0.95rem; font-weight: 800;">Lerato Nkosi</strong>
							<span style="color: var(--solar-slate-400); font-size: 0.8rem; font-weight: 600;">Bryanston, Sandton</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
