<?php
/**
 * Solar Energy Child Theme functions and definitions.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'SOLAR_CHILD_VERSION', '1.0.0' );
define( 'SOLAR_CHILD_DIR', get_stylesheet_directory() );
define( 'SOLAR_CHILD_URI', get_stylesheet_directory_uri() );

/**
 * Enqueue Parent and Child Theme Styles and Assets.
 */
function solar_energy_child_enqueue_assets() {
	// Enqueue parent stylesheet if parent is Astra
	wp_enqueue_style( 'astra-parent-style', get_template_directory_uri() . '/style.css' );

	// Enqueue Child main stylesheet
	wp_enqueue_style( 'solar-child-style', get_stylesheet_uri(), array( 'astra-parent-style' ), SOLAR_CHILD_VERSION );

	// Enqueue Custom Calculators Styling
	wp_enqueue_style( 'solar-calculators-css', SOLAR_CHILD_URI . '/assets/css/solar-calculators.css', array(), SOLAR_CHILD_VERSION );

	// Enqueue Configurator Script
	wp_enqueue_script(
		'solar-configurator-js',
		SOLAR_CHILD_URI . '/assets/js/solar-configurator.js',
		array( 'jquery' ),
		SOLAR_CHILD_VERSION,
		true
	);

	// Enqueue Financing Script
	wp_enqueue_script(
		'solar-financing-js',
		SOLAR_CHILD_URI . '/assets/js/solar-financing.js',
		array( 'jquery' ),
		SOLAR_CHILD_VERSION,
		true
	);

	// Pass AJAX parameters to JS
	wp_localize_script(
		'solar-configurator-js',
		'SolarData',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'solar_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'solar_energy_child_enqueue_assets' );

/**
 * Include modular logic files.
 */
require_once SOLAR_CHILD_DIR . '/inc/configurator.php';
require_once SOLAR_CHILD_DIR . '/inc/financing.php';
require_once SOLAR_CHILD_DIR . '/inc/woocommerce.php';
