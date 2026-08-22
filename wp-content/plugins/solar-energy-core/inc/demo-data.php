<?php
/**
 * Programmatic Demo Content & Default Page Setup.
 *
 * @package Solar_Energy_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Automatically Create Default Site Pages & Assign Custom Templates on Plugin Activation.
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
