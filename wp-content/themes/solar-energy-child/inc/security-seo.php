<?php
/**
 * Security Hardening & Rank Math Compatible Schema Output.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Clean up WordPress Header & Disable XML-RPC for Security.
 */
function solar_energy_security_headers() {
	// Remove RSD & WLW links
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Remove WP Version generator
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'solar_energy_security_headers' );

// Disable XML-RPC pingback vulnerability
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Output JSON-LD Schema.org for Solar Energy Local Business.
 */
function solar_energy_output_json_ld_schema() {
	if ( is_front_page() ) {
		$schema = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'SolarEnergyCompany',
			'name'        => get_bloginfo( 'name' ),
			'url'         => home_url(),
			'logo'        => get_stylesheet_directory_uri() . '/assets/images/logo.png',
			'description' => get_bloginfo( 'description' ),
			'telephone'   => '+1-800-555-SOLAR',
			'address'     => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => '100 Clean Energy Way',
				'addressLocality' => 'Austin',
				'addressRegion'   => 'TX',
				'postalCode'      => '78701',
				'addressCountry'  => 'US',
			),
			'priceRange'  => '$$$',
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'solar_energy_output_json_ld_schema' );
