<?php
/**
 * Kinetix Solar Child Theme Functions
 * Modular architecture for future energy sectors
 * 
 * @package Kinetix_Solar
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ============================================
// THEME SETUP
// ============================================
add_action( 'after_setup_theme', 'knx_theme_setup' );
function knx_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'kinetix-solar' ),
        'footer'  => __( 'Footer Menu', 'kinetix-solar' ),
        'mobile'  => __( 'Mobile Menu', 'kinetix-solar' ),
    ) );
    
    add_image_size( 'knx-product-card', 600, 450, true );
    add_image_size( 'knx-hero-bg', 1920, 1080, true );
    add_image_size( 'knx-avatar', 96, 96, true );
}

// ============================================
// ENQUEUE ASSETS
// ============================================
add_action( 'wp_enqueue_scripts', 'knx_enqueue_assets', 20 );
function knx_enqueue_assets() {
    $version = wp_get_theme()->get( 'Version' );
    
    wp_enqueue_style( 'kadence-parent', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'knx-main', get_stylesheet_directory_uri() . '/style.css', array('kadence-parent'), $version );
    wp_enqueue_script( 'knx-main-js', get_stylesheet_directory_uri() . '/assets/js/knx-main.js', array(), $version, true );
    
    wp_localize_script( 'knx-main-js', 'knxData', array(
        'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
        'nonce'      => wp_create_nonce( 'knx_nonce' ),
        'restUrl'    => rest_url( 'knx/v1/' ),
        'themeUrl'   => get_stylesheet_directory_uri(),
        'isLoggedIn' => is_user_logged_in(),
    ) );
    
    if ( is_page_template( 'page-templates/template-configurator.php' ) ) {
        wp_enqueue_script( 'knx-configurator', get_stylesheet_directory_uri() . '/assets/js/knx-configurator.js', array('knx-main-js'), $version, true );
    }
}

// ============================================
// CUSTOM POST TYPES (Modular for future sectors)
// ============================================
add_action( 'init', 'knx_register_post_types' );
function knx_register_post_types() {
    
    // Solar Products (pattern: [sector]_product)
    register_post_type( 'solar_product', array(
        'labels' => array(
            'name'          => __( 'Solar Products', 'kinetix-solar' ),
            'singular_name' => __( 'Solar Product', 'kinetix-solar' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array( 'slug' => 'solar-products' ),
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_icon'    => 'dashicons-superhero',
        'show_in_rest' => true,
        'taxonomies'   => array( 'product_category', 'energy_sector' ),
    ) );
    
    // Testimonials
    register_post_type( 'testimonial', array(
        'labels' => array(
            'name' => __( 'Testimonials', 'kinetix-solar' ),
            'singular_name' => __( 'Testimonial', 'kinetix-solar' ),
        ),
        'public'      => false,
        'show_ui'     => true,
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'   => 'dashicons-format-quote',
    ) );
    
    // Installers (for dispatch system)
    register_post_type( 'installer', array(
        'labels' => array(
            'name' => __( 'Installers', 'kinetix-solar' ),
            'singular_name' => __( 'Installer', 'kinetix-solar' ),
        ),
        'public'      => false,
        'show_ui'     => true,
        'supports'    => array( 'title', 'thumbnail', 'custom-fields' ),
        'menu_icon'   => 'dashicons-admin-users',
    ) );
}

// ============================================
// TAXONOMIES (Energy Sector = scalable)
// ============================================
add_action( 'init', 'knx_register_taxonomies' );
function knx_register_taxonomies() {
    register_taxonomy( 'product_category', array( 'solar_product', 'product' ), array(
        'labels' => array(
            'name' => __( 'Product Categories', 'kinetix-solar' ),
        ),
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => array( 'slug' => 'product-category' ),
        'show_in_rest' => true,
    ) );
    
    // Energy Sector taxonomy enables future sectors (wind, biogas, battery)
    register_taxonomy( 'energy_sector', array( 'solar_product', 'page' ), array(
        'labels' => array(
            'name'          => __( 'Energy Sectors', 'kinetix-solar' ),
            'singular_name' => __( 'Energy Sector', 'kinetix-solar' ),
        ),
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => array( 'slug' => 'energy-sector' ),
        'show_in_rest' => true,
    ) );
}

// ============================================
// ACF FIELDS (if ACF installed)
// ============================================
add_action( 'acf/init', 'knx_register_acf_fields' );
function knx_register_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
    
    // Solar Product Specs
    acf_add_local_field_group( array(
        'key'   => 'group_solar_product',
        'title' => 'Solar Product Specifications',
        'fields' => array(
            array(
                'key'   => 'field_wattage',
                'label' => 'Wattage (W)',
                'name'  => 'wattage',
                'type'  => 'number',
            ),
            array(
                'key'   => 'field_efficiency',
                'label' => 'Efficiency (%)',
                'name'  => 'efficiency',
                'type'  => 'number',
                'step'  => 0.1,
            ),
            array(
                'key'   => 'field_warranty',
                'label' => 'Warranty (Years)',
                'name'  => 'warranty_years',
                'type'  => 'number',
            ),
            array(
                'key'   => 'field_dimensions',
                'label' => 'Dimensions (mm)',
                'name'  => 'dimensions',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_weight',
                'label' => 'Weight (kg)',
                'name'  => 'weight',
                'type'  => 'number',
                'step'  => 0.1,
            ),
            array(
                'key'     => 'field_certifications',
                'label'   => 'Certifications',
                'name'    => 'certifications',
                'type'    => 'checkbox',
                'choices' => array(
                    'iec61215' => 'IEC 61215',
                    'iec61730' => 'IEC 61730',
                    'mcs'      => 'MCS Certified',
                    'sapvia'   => 'SAPVIA Member',
                    'nersa'    => 'NERSA Licensed',
                ),
            ),
            array(
                'key'     => 'field_stock',
                'label'   => 'Stock Status',
                'name'    => 'stock_status',
                'type'    => 'select',
                'choices' => array(
                    'in_stock'     => 'In Stock',
                    'low_stock'    => 'Low Stock',
                    'out_of_stock' => 'Out of Stock',
                    'pre_order'    => 'Pre-Order',
                ),
                'default_value' => 'in_stock',
            ),
            array(
                'key'   => 'field_featured',
                'label' => 'Featured on Homepage',
                'name'  => 'featured_homepage',
                'type'  => 'true_false',
                'ui'    => true,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'solar_product',
                ),
            ),
        ),
    ) );
    
    // Testimonial Fields
    acf_add_local_field_group( array(
        'key'   => 'group_testimonial',
        'title' => 'Testimonial Details',
        'fields' => array(
            array(
                'key'   => 'field_rating',
                'label' => 'Star Rating',
                'name'  => 'rating',
                'type'  => 'number',
                'min'   => 1,
                'max'   => 5,
                'step'  => 1,
                'default_value' => 5,
            ),
            array(
                'key'   => 'field_customer_name',
                'label' => 'Customer Name',
                'name'  => 'customer_name',
                'type'  => 'text',
                'required' => true,
            ),
            array(
                'key'   => 'field_location',
                'label' => 'Location',
                'name'  => 'location',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_verified',
                'label' => 'Verified Purchase',
                'name'  => 'verified_purchase',
                'type'  => 'true_false',
                'ui'    => true,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'testimonial',
                ),
            ),
        ),
    ) );
    
    // Installer Fields
    acf_add_local_field_group( array(
        'key'   => 'group_installer',
        'title' => 'Installer Details',
        'fields' => array(
            array(
                'key'   => 'field_installer_phone',
                'label' => 'Phone',
                'name'  => 'phone',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_installer_email',
                'label' => 'Email',
                'name'  => 'email',
                'type'  => 'email',
            ),
            array(
                'key'     => 'field_installer_region',
                'label'   => 'Service Region',
                'name'    => 'region',
                'type'    => 'select',
                'choices' => array(
                    'gauteng'        => 'Gauteng',
                    'western_cape'   => 'Western Cape',
                    'kwazulu_natal'  => 'KwaZulu-Natal',
                    'eastern_cape'   => 'Eastern Cape',
                    'mpumalanga'     => 'Mpumalanga',
                    'limpopo'        => 'Limpopo',
                    'north_west'     => 'North West',
                    'free_state'     => 'Free State',
                    'northern_cape'  => 'Northern Cape',
                ),
            ),
            array(
                'key'     => 'field_installer_certs',
                'label'   => 'Certifications',
                'name'    => 'certifications',
                'type'    => 'checkbox',
                'choices' => array(
                    'pvwatts' => 'PV GreenCard',
                    'sapsea'  => 'SAPVIA Installer',
                    'ecsa'    => 'ECSA Registered',
                ),
            ),
            array(
                'key'     => 'field_installer_status',
                'label'   => 'Availability',
                'name'    => 'status',
                'type'    => 'select',
                'choices' => array(
                    'available' => 'Available',
                    'busy'      => 'Currently Busy',
                    'on_leave'  => 'On Leave',
                ),
                'default_value' => 'available',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'installer',
                ),
            ),
        ),
    ) );
}

// ============================================
// AJAX: SOLAR SYSTEM CALCULATOR
// ============================================
add_action( 'wp_ajax_knx_calculate_system', 'knx_ajax_calculate_system' );
add_action( 'wp_ajax_nopriv_knx_calculate_system', 'knx_ajax_calculate_system' );
function knx_ajax_calculate_system() {
    check_ajax_referer( 'knx_nonce', 'nonce' );
    
    $monthly_kwh = floatval( $_POST['monthly_kwh'] ?? 0 );
    $province = sanitize_text_field( $_POST['province'] ?? 'gauteng' );
    $battery_needed = boolval( $_POST['battery_needed'] ?? true );
    
    // SA peak sun hours by province
    $sun_hours = array(
        'gauteng' => 5.5, 'western_cape' => 5.8, 'kwazulu_natal' => 5.2,
        'eastern_cape' => 5.4, 'mpumalanga' => 5.3, 'limpopo' => 5.7,
        'north_west' => 5.6, 'free_state' => 5.5, 'northern_cape' => 6.2,
    );
    
    $daily_kwh = $monthly_kwh / 30;
    $peak_sun = $sun_hours[$province] ?? 5.5;
    $system_kw = ceil( ( $daily_kwh / $peak_sun ) * 1.3 ); // 30% buffer
    
    $panels_needed = ceil( $system_kw * 1000 / 550 ); // 550W panels
    $inverter_size = ceil( $system_kw * 1.2 );
    $battery_kwh = $battery_needed ? ceil( $daily_kwh * 1.5 ) : 0;
    
    // Dynamic pricing from admin settings
    $panel_price = get_option( 'knx_price_per_panel', 4500 );
    $inverter_price = get_option( 'knx_inverter_price_per_kw', 8500 );
    $battery_price = get_option( 'knx_battery_price_per_kwh', 18000 );
    $install_base = get_option( 'knx_install_base_price', 15000 );
    
    $total = ( $panels_needed * $panel_price ) 
           + ( $inverter_size * $inverter_price )
           + ( $battery_kwh * $battery_price )
           + $install_base;
    
    wp_send_json_success( array(
        'system_kw'      => $system_kw,
        'panels_needed'  => $panels_needed,
        'inverter_size'  => $inverter_size,
        'battery_kwh'    => $battery_kwh,
        'total_price'    => number_format( $total, 0, '.', ' ' ),
        'monthly_saving' => number_format( $monthly_kwh * 2.5, 0, '.', ' ' ),
        'payback_years'  => round( $total / ( $monthly_kwh * 2.5 * 12 ), 1 ),
        'co2_saved'      => round( $monthly_kwh * 12 * 0.9, 0 ),
    ) );
}

// ============================================
// AJAX: GET INSTALLERS BY REGION
// ============================================
add_action( 'wp_ajax_knx_get_installers', 'knx_ajax_get_installers' );
add_action( 'wp_ajax_nopriv_knx_get_installers', 'knx_ajax_get_installers' );
function knx_ajax_get_installers() {
    check_ajax_referer( 'knx_nonce', 'nonce' );
    
    $region = sanitize_text_field( $_POST['region'] ?? '' );
    
    $args = array(
        'post_type'      => 'installer',
        'posts_per_page' => 10,
        'meta_query'     => array(
            array( 'key' => 'region', 'value' => $region, 'compare' => '=' ),
            array( 'key' => 'status', 'value' => 'available', 'compare' => '=' ),
        ),
    );
    
    $installers = get_posts( $args );
    $data = array();
    
    foreach ( $installers as $installer ) {
        $data[] = array(
            'id'    => $installer->ID,
            'name'  => get_the_title( $installer->ID ),
            'phone' => get_post_meta( $installer->ID, 'phone', true ),
            'email' => get_post_meta( $installer->ID, 'email', true ),
            'certs' => get_post_meta( $installer->ID, 'certifications', true ),
        );
    }
    
    wp_send_json_success( $data );
}

// ============================================
// WOOCOMMERCE CUSTOMIZATIONS
// ============================================
add_action( 'woocommerce_single_product_summary', 'knx_add_solar_specs', 25 );
function knx_add_solar_specs() {
    global $product;
    
    $wattage = get_post_meta( $product->get_id(), 'wattage', true );
    $efficiency = get_post_meta( $product->get_id(), 'efficiency', true );
    $warranty = get_post_meta( $product->get_id(), 'warranty_years', true );
    
    if ( $wattage || $efficiency || $warranty ) : ?>
        <div class="knx-product-specs-bar" style="display:flex;gap:1.5rem;margin:1.5rem 0;padding:1rem;background:rgba(255,255,255,0.03);border-radius:12px;">
            <?php if ( $wattage ) : ?>
                <div style="text-align:center;">
                    <div style="font-size:1.25rem;font-weight:800;color:#fff;"><?php echo esc_html( $wattage ); ?>W</div>
                    <div style="font-size:0.75rem;color:#94a3b8;">Power Output</div>
                </div>
            <?php endif; ?>
            <?php if ( $efficiency ) : ?>
                <div style="text-align:center;">
                    <div style="font-size:1.25rem;font-weight:800;color:#fff;"><?php echo esc_html( $efficiency ); ?>%</div>
                    <div style="font-size:0.75rem;color:#94a3b8;">Efficiency</div>
                </div>
            <?php endif; ?>
            <?php if ( $warranty ) : ?>
                <div style="text-align:center;">
                    <div style="font-size:1.25rem;font-weight:800;color:#fff;"><?php echo esc_html( $warranty ); ?>yr</div>
                    <div style="font-size:0.75rem;color:#94a3b8;">Warranty</div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif;
}

add_action( 'woocommerce_single_product_summary', 'knx_add_trust_bar', 35 );
function knx_add_trust_bar() { ?>
    <div class="knx-product-trust" style="display:flex;flex-wrap:wrap;gap:0.75rem;margin-top:1rem;">
        <div class="knx-trust-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
            Free Delivery Nationwide
        </div>
        <div class="knx-trust-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
            25-Year Panel Warranty
        </div>
        <div class="knx-trust-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
            Certified SA Installers
        </div>
    </div>
<?php }

// ============================================
// SHORTCODES
// ============================================
add_shortcode( 'knx_stats', 'knx_shortcode_stats' );
function knx_shortcode_stats( $atts ) {
    $atts = shortcode_atts( array(
        'number' => '0',
        'label'  => '',
        'suffix' => '',
    ), $atts );
    
    ob_start(); ?>
    <div class="knx-glass knx-stat knx-animate">
        <div class="knx-stat__number" data-target="<?php echo esc_attr( $atts['number'] ); ?>" data-suffix="<?php echo esc_attr( $atts['suffix'] ); ?>">0</div>
        <div class="knx-stat__label"><?php echo esc_html( $atts['label'] ); ?></div>
    </div>
    <?php return ob_get_clean();
}

add_shortcode( 'knx_testimonials', 'knx_shortcode_testimonials' );
function knx_shortcode_testimonials( $atts ) {
    $atts = shortcode_atts( array( 'count' => 3 ), $atts );
    
    $testimonials = get_posts( array(
        'post_type'      => 'testimonial',
        'posts_per_page' => intval( $atts['count'] ),
    ) );
    
    ob_start(); ?>
    <div class="knx-grid knx-grid--3">
        <?php foreach ( $testimonials as $t ) : 
            $rating = get_post_meta( $t->ID, 'rating', true ) ?: 5;
            $name = get_post_meta( $t->ID, 'customer_name', true ) ?: get_the_title( $t->ID );
            $location = get_post_meta( $t->ID, 'location', true );
            $verified = get_post_meta( $t->ID, 'verified_purchase', true );
        ?>
        <div class="knx-glass knx-testimonial knx-animate">
            <div class="knx-testimonial__stars">
                <?php for ( $i = 0; $i < 5; $i++ ) : ?>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="<?php echo $i < $rating ? 'currentColor' : 'none'; ?>" stroke="currentColor" stroke-width="1.5">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                <?php endfor; ?>
            </div>
            <p class="knx-testimonial__quote">"<?php echo esc_html( get_the_excerpt( $t->ID ) ); ?>"</p>
            <div class="knx-testimonial__author">
                <?php echo get_the_post_thumbnail( $t->ID, 'knx-avatar', array( 'class' => 'knx-testimonial__avatar' ) ); ?>
                <div>
                    <div class="knx-testimonial__name"><?php echo esc_html( $name ); ?></div>
                    <?php if ( $location ) : ?>
                        <div class="knx-testimonial__location"><?php echo esc_html( $location ); ?></div>
                    <?php endif; ?>
                </div>
                <?php if ( $verified ) : ?>
                    <span class="knx-badge knx-badge--green" style="margin-left:auto">Verified</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php return ob_get_clean();
}

add_shortcode( 'knx_faq', 'knx_shortcode_faq' );
function knx_shortcode_faq() {
    $faqs = array(
        array(
            'q' => 'How long does solar panel installation take?',
            'a' => 'Most residential installations are completed within 1-3 days, depending on system size and roof complexity. Our certified installers handle everything from mounting to grid connection.',
        ),
        array(
            'q' => 'What is the payback period for a solar system?',
            'a' => 'With current electricity rates in South Africa, most homeowners see a payback period of 4-7 years. Our configurator provides a personalized estimate based on your usage and location.',
        ),
        array(
            'q' => 'Do you offer financing options?',
            'a' => 'Yes, we partner with major SA banks to offer solar financing plans. Options include rent-to-own, green loans, and home improvement bonds.',
        ),
        array(
            'q' => 'What happens during load shedding?',
            'a' => 'Our hybrid inverter + battery systems automatically switch to battery power during outages. Essential circuits stay powered for 4-12 hours depending on battery size.',
        ),
        array(
            'q' => 'Are your installers certified?',
            'a' => 'All Kinetix installers are SAPVIA-registered, PV GreenCard certified, and ECSA-registered electrical contractors. We also carry comprehensive liability insurance.',
        ),
    );
    
    ob_start(); ?>
    <div class="knx-faq-list">
        <?php foreach ( $faqs as $i => $faq ) : ?>
        <div class="knx-glass knx-faq-item knx-animate" data-faq="<?php echo $i; ?>">
            <button class="knx-faq-item__question" type="button">
                <?php echo esc_html( $faq['q'] ); ?>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div class="knx-faq-item__answer">
                <?php echo esc_html( $faq['a'] ); ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php return ob_get_clean();
}

// ============================================
// ADMIN: PRICING SETTINGS PAGE
// ============================================
add_action( 'admin_menu', 'knx_add_admin_menu' );
function knx_add_admin_menu() {
    add_menu_page(
        __( 'Kinetix Settings', 'kinetix-solar' ),
        __( 'Kinetix', 'kinetix-solar' ),
        'manage_options',
        'kinetix-settings',
        'knx_settings_page',
        'dashicons-superhero',
        30
    );
}

function knx_settings_page() {
    if ( isset( $_POST['knx_save_settings'] ) && check_admin_referer( 'knx_settings_nonce' ) ) {
        update_option( 'knx_price_per_panel', floatval( $_POST['price_per_panel'] ?? 4500 ) );
        update_option( 'knx_inverter_price_per_kw', floatval( $_POST['inverter_price_per_kw'] ?? 8500 ) );
        update_option( 'knx_battery_price_per_kwh', floatval( $_POST['battery_price_per_kwh'] ?? 18000 ) );
        update_option( 'knx_install_base_price', floatval( $_POST['install_base_price'] ?? 15000 ) );
        echo '<div class="notice notice-success"><p>Settings saved.</p></div>';
    }
    
    $price_panel = get_option( 'knx_price_per_panel', 4500 );
    $price_inverter = get_option( 'knx_inverter_price_per_kw', 8500 );
    $price_battery = get_option( 'knx_battery_price_per_kwh', 18000 );
    $price_install = get_option( 'knx_install_base_price', 15000 );
    ?>
    <div class="wrap">
        <h1><?php _e( 'Kinetix Solar Settings', 'kinetix-solar' ); ?></h1>
        <form method="post">
            <?php wp_nonce_field( 'knx_settings_nonce' ); ?>
            <table class="form-table">
                <tr>
                    <th>Price per Panel (ZAR)</th>
                    <td><input type="number" name="price_per_panel" value="<?php echo esc_attr( $price_panel ); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th>Inverter Price per kW (ZAR)</th>
                    <td><input type="number" name="inverter_price_per_kw" value="<?php echo esc_attr( $price_inverter ); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th>Battery Price per kWh (ZAR)</th>
                    <td><input type="number" name="battery_price_per_kwh" value="<?php echo esc_attr( $price_battery ); ?>" class="regular-text"/></td>
                </tr>
                <tr>
                    <th>Base Installation Price (ZAR)</th>
                    <td><input type="number" name="install_base_price" value="<?php echo esc_attr( $price_install ); ?>" class="regular-text"/></td>
                </tr>
            </table>
            <?php submit_button( 'Save Settings', 'primary', 'knx_save_settings' ); ?>
        </form>
    </div>
    <?php
}

// ============================================
// REST API ENDPOINTS
// ============================================
add_action( 'rest_api_init', 'knx_register_rest_routes' );
function knx_register_rest_routes() {
    register_rest_route( 'knx/v1', '/products/featured', array(
        'methods'  => 'GET',
        'callback' => 'knx_rest_get_featured_products',
    ) );
}

function knx_rest_get_featured_products() {
    $products = get_posts( array(
        'post_type'      => 'solar_product',
        'posts_per_page' => 6,
        'meta_query'     => array(
            array( 'key' => 'featured_homepage', 'value' => '1', 'compare' => '=' ),
        ),
    ) );
    
    $data = array();
    foreach ( $products as $p ) {
        $data[] = array(
            'id'         => $p->ID,
            'title'      => get_the_title( $p->ID ),
            'excerpt'    => get_the_excerpt( $p->ID ),
            'image'      => get_the_post_thumbnail_url( $p->ID, 'knx-product-card' ),
            'price'      => get_post_meta( $p->ID, '_price', true ),
            'wattage'    => get_post_meta( $p->ID, 'wattage', true ),
            'efficiency' => get_post_meta( $p->ID, 'efficiency', true ),
            'warranty'   => get_post_meta( $p->ID, 'warranty_years', true ),
            'stock'      => get_post_meta( $p->ID, 'stock_status', true ),
        );
    }
    
    return rest_ensure_response( $data );
}

// ============================================
// SECURITY: CLEAN UP WP HEAD
// ============================================
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
