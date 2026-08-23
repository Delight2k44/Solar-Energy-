<?php
/**
 * Programmatic Demo Content, Page Seeding, and WooCommerce Products Setup.
 *
 * @package Solar_Energy_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Automatically Create Default Site Pages & Assign Custom Templates.
 */
function solar_energy_setup_default_pages() {
	$pages = array(
		'Home' => array(
			'title'    => 'Home',
			'slug'     => 'home',
			'template' => 'page-templates/template-home.php',
			'content'  => 'Solar Energy Homepage',
		),
		'Solar System Configurator' => array(
			'title'    => 'Solar System Configurator',
			'slug'     => 'solar-configurator',
			'template' => 'page-templates/template-configurator.php',
			'content'  => '[solar_configurator]',
		),
		'Financing & Rebates' => array(
			'title'    => 'Financing & Rebates',
			'slug'     => 'financing',
			'template' => 'page-templates/template-financing.php',
			'content'  => '[solar_financing_calculator]',
		),
		'Book Installation Inspection' => array(
			'title'    => 'Book Installation Inspection',
			'slug'     => 'schedule-inspection',
			'template' => 'page-templates/template-scheduling.php',
			'content'  => 'Schedule your on-site inspection.',
		),
		'Client Portal' => array(
			'title'    => 'Client Portal',
			'slug'     => 'client-portal',
			'template' => 'page-templates/template-portal.php',
			'content'  => 'Client energy dashboard.',
		),
	);

	foreach ( $pages as $page_info ) {
		$existing = get_page_by_path( $page_info['slug'] );
		if ( ! $existing ) {
			$page_id = wp_insert_post( array(
				'post_title'   => $page_info['title'],
				'post_name'    => $page_info['slug'],
				'post_content' => $page_info['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
			) );

			if ( $page_id && ! is_wp_error( $page_id ) ) {
				update_post_meta( $page_id, '_wp_page_template', $page_info['template'] );
				if ( 'home' === $page_info['slug'] ) {
					update_option( 'show_on_front', 'page' );
					update_option( 'page_on_front', $page_id );
				}
			}
		}
	}
}
register_activation_hook( SOLAR_CORE_FILE, 'solar_energy_setup_default_pages' );

/**
 * Seed Sample WooCommerce Products into WordPress Database.
 */
function solar_energy_create_sample_products() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	$sample_products = array(
		'ja-solar-550w' => array(
			'title'       => 'JA Solar 550W DeepBlue 3.0 Monocrystalline Panel',
			'price'       => '3299',
			'sku'         => 'SOL-PAN-JA550',
			'description' => 'High-efficiency monocrystalline solar panel engineered for maximum daily yield and long-term durability.',
		),
		'sunsynk-8kw' => array(
			'title'       => 'Sunsynk 8kW Hybrid Inverter (Single Phase)',
			'price'       => '28499',
			'sku'         => 'SOL-INV-SS8',
			'description' => 'Smart hybrid inverter with advanced touch screen, dual MPPT inputs, and certified loadshedding protection.',
		),
		'freedom-won-10kwh' => array(
			'title'       => 'Freedom Won Lite Home 10/8 LiFePO4 Battery',
			'price'       => '58999',
			'sku'         => 'SOL-BAT-FW10',
			'description' => 'Modular lithium iron phosphate storage battery pack featuring a 10-year warranty and high-cycle longevity.',
		),
		'starter-kit-5kw' => array(
			'title'       => 'Sunsynk 5kW Hybrid Inverter + 5kWh Battery Starter Kit',
			'price'       => '74999',
			'sku'         => 'SOL-KIT-START5',
			'description' => 'A complete starter combo kit designed to keep your essential household loads online during Stage 6 loadshedding.',
		),
	);

	foreach ( $sample_products as $slug => $data ) {
		$product_id = wc_get_product_id_by_sku( $data['sku'] );
		if ( ! $product_id ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $data['title'],
				'post_content' => $data['description'],
				'post_status'  => 'publish',
				'post_type'    => 'product',
			) );

			if ( $post_id && ! is_wp_error( $post_id ) ) {
				$product = wc_get_product( $post_id );
				if ( $product ) {
					$product->set_sku( $data['sku'] );
					$product->set_regular_price( $data['price'] );
					$product->set_price( $data['price'] );
					$product->set_manage_stock( true );
					$product->set_stock_quantity( 15 );
					$product->set_stock_status( 'instock' );
					$product->save();
				}
			}
		}
	}
}

/**
 * Master Setup Engine - Runs on admin initialization to seed database.
 */
function solar_energy_run_demo_setup() {
	if ( 'yes' === get_option( 'solar_demo_setup_completed' ) ) {
		return;
	}

	// Setup pages
	solar_energy_setup_default_pages();

	// Setup WooCommerce Products
	if ( class_exists( 'WooCommerce' ) ) {
		solar_energy_create_sample_products();
		update_option( 'solar_demo_setup_completed', 'yes' );
	}
}
add_action( 'admin_init', 'solar_energy_run_demo_setup' );
