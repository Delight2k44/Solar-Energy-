<?php
/**
 * Plugin Name: Solar Energy Core
 * Plugin URI: https://github.com/Delight2k44/Solar-Energy-
 * Description: Core plugin for custom post types (Maintenance Plans, Diagnostic Alerts, Technician Dispatches) & automated page setup for Solar Energy Solutions.
 * Version: 1.1.0
 * Author: Delight2k44
 * Author URI: https://github.com/Delight2k44
 * Text Domain: solar-energy-core
 * License: GPLv2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SOLAR_CORE_FILE', __FILE__ );
define( 'SOLAR_CORE_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Register Maintenance Plans Custom Post Type.
 */
function solar_register_maintenance_cpt() {
	$labels = array(
		'name'               => _x( 'Maintenance Plans', 'Post Type General Name', 'solar-energy-core' ),
		'singular_name'      => _x( 'Maintenance Plan', 'Post Type Singular Name', 'solar-energy-core' ),
		'menu_name'          => __( 'Maintenance Plans', 'solar-energy-core' ),
		'add_new_item'       => __( 'Add New Maintenance Plan', 'solar-energy-core' ),
		'edit_item'          => __( 'Edit Maintenance Plan', 'solar-energy-core' ),
	);

	$args = array(
		'label'               => __( 'Maintenance Plan', 'solar-energy-core' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-shield-alt',
		'show_in_nav_menus'   => true,
		'has_archive'         => true,
		'show_in_rest'        => true,
	);

	register_post_type( 'solar_maintenance', $args );
}
add_action( 'init', 'solar_register_maintenance_cpt', 0 );

/**
 * Load Demo Setup Script.
 */
require_once SOLAR_CORE_DIR . 'inc/demo-data.php';
