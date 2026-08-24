<?php
/**
 * Template Name: Solar Homepage
 * 
 * @package Kinetix_Solar
 */
get_header();
?>

<!-- HERO SECTION -->
<section class="knx-hero" style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;background:#0f172a;">
    
    <!-- Background -->
    <div style="position:absolute;inset:0;z-index:1;background:linear-gradient(135deg,rgba(15,23,42,0.4) 0%,rgba(15,23,42,0.2) 50%,rgba(15,23,42,0.5) 100%),url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero_house.jpg') no-repeat center center/cover;"></div>
    
    <!-- Ambient Orbs -->
    <div class="knx-orb knx-orb--amber" style="top:-10%;right:-5%;"></div>
    <div class="knx-orb knx-orb--cyan" style="bottom:-5%;left:-5%;"></div>
    
    <!-- Content -->
    <div class="knx-container" style="position:relative;z-index:10;display:flex;align-items:center;justify-content:center;padding:2rem;">
        <div class="knx-glass" style="max-width:800px;width:100%;padding:4rem 3.5rem;text-align:center;">
            
            <span class="knx-badge knx-badge--amber knx-animate knx-animate--delay-1" style="margin-bottom:1.75rem;">
                Premium Solar E-Commerce Store
            </span>
            
            <h1 class="knx-h1 knx-animate knx-animate--delay-2" style="margin-bottom:1.25rem;color:#ffffff;">
                Power Your Life with <span class="knx-gradient-text">Smart Solar Energy</span>
            </h1>
            
            <p class="knx-body knx-animate knx-animate--delay-3" style="margin-bottom:2.5rem;max-width:640px;margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.9);">
                Welcome to Kinetix Engineering Solutions. Certified high-yield monocrystalline panels, smart hybrid inverters, and modular lithium battery storage kits — shipped nationwide with optional professional installation.
            </p>
            
            <div class="knx-hero-cta-group knx-animate knx-animate--delay-4" style="display:flex;gap:1rem;margin-bottom:2.5rem;flex-wrap:wrap;justify-content:center;">
                <a href="#configurator" class="knx-btn knx-btn--primary">
                    Size Your Solar System
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#shop" class="knx-btn knx-btn--ghost">Shop Solar Hardware</a>
            </div>
            
            <div class="knx-animate knx-animate--delay-5" style="display:flex;gap:1.5rem;flex-wrap:wrap;justify-content:center;">
                <div class="knx-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
                    25-Year Panel Warranty
                </div>
                <div class="knx-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
                    Sunsynk & Victron Partners
                </div>
                <div class="knx-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
                    Certified SA Installers
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Hint -->
    <div style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);z-index:10;display:flex;flex-direction:column;align-items:center;gap:0.5rem;color:rgba(255,255,255,0.4);font-size:0.7rem;letter-spacing:0.1em;text-transform:uppercase;animation:bounce 2s infinite;">
        <span>Scroll</span>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
    </div>
</section>

<!-- STATS BAR -->
<section class="knx-section" style="padding:3rem 1.5rem;background:linear-gradient(90deg,rgba(245,158,11,0.05),rgba(56,189,248,0.05));">
    <div class="knx-container">
        <div class="knx-grid knx-grid--4">
            <?php echo do_shortcode('[knx_stats number="15000" suffix="+" label="Systems Installed"]'); ?>
            <?php echo do_shortcode('[knx_stats number="25" suffix="yr" label="Panel Warranty"]'); ?>
            <?php echo do_shortcode('[knx_stats number="98" suffix="%" label="Customer Satisfaction"]'); ?>
            <?php echo do_shortcode('[knx_stats number="9" suffix="" label="SA Provinces Covered"]'); ?>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="knx-section" id="shop">
    <div class="knx-container">
        <div class="knx-section-title knx-animate">
            <h2 class="knx-h2">Featured Solar Hardware</h2>
            <p>Certified high-performance equipment for residential and commercial installations</p>
        </div>
        
        <div class="knx-grid knx-grid--3">
            <?php
            $woocommerce_active = class_exists( 'WooCommerce' );
            $products_found = false;

            if ( $woocommerce_active ) {
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 3,
                );
                $loop = new WP_Query( $args );

                if ( $loop->have_posts() ) {
                    $products_found = true;
                    while ( $loop->have_posts() ) {
                        $loop->the_post();
                        global $product;
                        $price = $product->get_price();
                        $image_url = get_the_post_thumbnail_url( get_the_ID(), 'knx-product-card' );
                        if ( ! $image_url ) {
                            $image_url = wc_placeholder_img_src();
                        }
                        ?>
                        <div class="knx-glass knx-product-card knx-animate">
                            <div class="knx-product-card__image">
                                <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                <span class="knx-badge knx-badge--amber knx-product-card__badge" style="position:absolute;top:1rem;left:1rem;">Featured</span>
                            </div>
                            <div class="knx-product-card__content">
                                <h3 class="knx-product-card__name"><?php the_title(); ?></h3>
                                <div class="knx-product-card__price">R <?php echo number_format( $price, 0, '.', ' ' ); ?></div>
                                <div class="knx-product-card__actions" style="display:flex;gap:0.5rem;margin-top:1rem;">
                                    <a href="<?php the_permalink(); ?>" class="knx-btn knx-btn--ghost" style="flex:1;padding:0.5rem 1rem;font-size:0.85rem;">Details</a>
                                    <a href="?add-to-cart=<?php the_ID(); ?>" class="knx-btn knx-btn--primary" style="flex:1;padding:0.5rem 1rem;font-size:0.85rem;">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
            }

            // Fallback product layout
            if ( ! $products_found ) {
                $fallbacks = array(
                    array(
                        'title' => 'JA Solar 550W DeepBlue 3.0 Monocrystalline Panel',
                        'price' => 3299,
                        'image' => 'solar_panel.jpg',
                        'specs' => '550W | 21.3% Eff | 25yr Wty',
                    ),
                    array(
                        'title' => 'Sunsynk 8kW Hybrid Inverter (Single Phase)',
                        'price' => 28499,
                        'image' => 'inverter.jpg',
                        'specs' => '8kW | IP65 | Dual MPPT',
                    ),
                    array(
                        'title' => 'Freedom Won Lite Home 10/8 LiFePO4 Battery',
                        'price' => 58999,
                        'image' => 'battery.jpg',
                        'specs' => '10kWh | LiFePO4 | 10yr Wty',
                    ),
                );

                foreach ( $fallbacks as $fallback ) : ?>
                    <div class="knx-glass knx-product-card knx-animate">
                        <div class="knx-product-card__image">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/' . $fallback['image'] ); ?>" alt="<?php echo esc_attr( $fallback['title'] ); ?>">
                            <span class="knx-badge knx-badge--amber knx-product-card__badge" style="position:absolute;top:1rem;left:1rem;">Featured</span>
                        </div>
                        <div class="knx-product-card__content">
                            <h3 class="knx-product-card__name"><?php echo esc_html( $fallback['title'] ); ?></h3>
                            <div style="font-size:0.85rem;color:var(--knx-slate-400);margin-bottom:0.75rem;"><?php echo esc_html( $fallback['specs'] ); ?></div>
                            <div class="knx-product-card__price">R <?php echo number_format( $fallback['price'], 0, '.', ' ' ); ?></div>
                            <div class="knx-product-card__actions" style="display:flex;gap:0.5rem;margin-top:1rem;">
                                <a href="#shop" class="knx-btn knx-btn--ghost" style="flex:1;padding:0.5rem 1rem;font-size:0.85rem;">Details</a>
                                <a href="#shop" class="knx-btn knx-btn--primary" style="flex:1;padding:0.5rem 1rem;font-size:0.85rem;">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            }
            ?>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="knx-section">
    <div class="knx-container">
        <div class="knx-section-title knx-animate">
            <h2 class="knx-h2">How It Works</h2>
            <p>From assessment to savings in four simple steps</p>
        </div>
        
        <div class="knx-timeline knx-animate">
            <div class="knx-timeline__step">
                <div class="knx-timeline__number">1</div>
                <h4 class="knx-timeline__title">Assess</h4>
                <p class="knx-timeline__desc">Use our online configurator to size your system based on your usage and location</p>
            </div>
            <div class="knx-timeline__step">
                <div class="knx-timeline__number">2</div>
                <h4 class="knx-timeline__title">Quote</h4>
                <p class="knx-timeline__desc">Receive an instant detailed quote with equipment specs and installation timeline</p>
            </div>
            <div class="knx-timeline__step">
                <div class="knx-timeline__number">3</div>
                <h4 class="knx-timeline__title">Install</h4>
                <p class="knx-timeline__desc">Our certified installers complete the job in 1-3 days with full safety compliance</p>
            </div>
            <div class="knx-timeline__step">
                <div class="knx-timeline__number">4</div>
                <h4 class="knx-timeline__title">Save</h4>
                <p class="knx-timeline__desc">Start saving immediately with reduced electricity bills and protection from load shedding</p>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="knx-section" style="background:linear-gradient(180deg,transparent,rgba(245,158,11,0.03));">
    <div class="knx-container">
        <div class="knx-section-title knx-animate">
            <h2 class="knx-h2">What Our Customers Say</h2>
            <p>Verified reviews from homeowners across South Africa</p>
        </div>
        
        <div class="knx-grid knx-grid--3">
            <div class="knx-glass knx-testimonial knx-animate">
                <div class="knx-testimonial__stars">
                    ★★★★★
                </div>
                <p class="knx-testimonial__quote">"We used to dread Stage 6 loadshedding. The team installed a 5kW Sunsynk hybrid inverter with 10kWh Freedom Won batteries. Now our TVs, WiFi, fridge, and lights never skip a beat. Excellent job!"</p>
                <div class="knx-testimonial__author">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&h=100&q=80" alt="Johan Vorster" class="knx-testimonial__avatar">
                    <div>
                        <div class="knx-testimonial__name">Johan Vorster</div>
                        <div class="knx-testimonial__location">Pretoria East</div>
                    </div>
                </div>
            </div>

            <div class="knx-glass knx-testimonial knx-animate">
                <div class="knx-testimonial__stars">
                    ★★★★★
                </div>
                <p class="knx-testimonial__quote">"The solar configurator was incredibly accurate! It estimated my residential system at 6.4kW, which is exactly what our engineering site auditor recommended. Highly professional team."</p>
                <div class="knx-testimonial__author">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&h=100&q=80" alt="Lerato Nkosi" class="knx-testimonial__avatar">
                    <div>
                        <div class="knx-testimonial__name">Lerato Nkosi</div>
                        <div class="knx-testimonial__location">Bryanston, Sandton</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA BANNER -->
<section class="knx-section" style="background:linear-gradient(135deg,#0f172a 0%,#1e293b 50%,rgba(245,158,11,0.1) 100%);">
    <div class="knx-container" style="text-align:center;">
        <div class="knx-glass knx-animate" style="max-width:700px;margin:0 auto;padding:3rem;">
            <h2 class="knx-h2" style="margin-bottom:1rem;color:#ffffff;">Ready to Go Solar?</h2>
            <p class="knx-body" style="margin-bottom:2rem;color:rgba(255,255,255,0.85);">Get your free, no-obligation quote in under 2 minutes. Our configurator sizes the perfect system for your home.</p>
            <a href="#configurator" class="knx-btn knx-btn--primary" style="font-size:1.1rem;padding:1.25rem 2.5rem;">
                Get Your Free Quote
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="knx-section" id="faq">
    <div class="knx-container">
        <div class="knx-section-title knx-animate">
            <h2 class="knx-h2">Frequently Asked Questions</h2>
            <p>Everything you need to know about going solar with Kinetix</p>
        </div>
        <?php echo do_shortcode('[knx_faq]'); ?>
    </div>
</section>

<?php get_footer(); ?>
