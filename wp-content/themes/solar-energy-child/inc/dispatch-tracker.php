<?php
/**
 * Technician Dispatch & TrackShip Order Status Integration.
 *
 * @package Solar_Energy_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom WooCommerce Order Statuses for Solar Technician Dispatch.
 */
function solar_register_dispatch_order_statuses() {
	register_post_status( 'wc-tech-assigned', array(
		'label'                     => _x( 'Technician Assigned', 'Order status', 'solar-energy-child' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_singular( 'Technician Assigned <span class="count">(%s)</span>', 'Technician Assigned <span class="count">(%s)</span>', 'solar-energy-child' ),
	) );

	register_post_status( 'wc-inspection-done', array(
		'label'                     => _x( 'Site Inspection Complete', 'Order status', 'solar-energy-child' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_singular( 'Site Inspection Complete <span class="count">(%s)</span>', 'Site Inspection Complete <span class="count">(%s)</span>', 'solar-energy-child' ),
	) );
}
add_action( 'init', 'solar_register_dispatch_order_statuses' );

/**
 * Add Custom Statuses to WooCommerce Admin Dropdown.
 */
function solar_add_dispatch_statuses_to_wc( $order_statuses ) {
	$new_order_statuses = array();
	foreach ( $order_statuses as $key => $status ) {
		$new_order_statuses[ $key ] = $status;
		if ( 'wc-processing' === $key ) {
			$new_order_statuses['wc-tech-assigned']  = __( 'Technician Assigned', 'solar-energy-child' );
			$new_order_statuses['wc-inspection-done'] = __( 'Site Inspection Complete', 'solar-energy-child' );
		}
	}
	return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'solar_add_dispatch_statuses_to_wc' );
