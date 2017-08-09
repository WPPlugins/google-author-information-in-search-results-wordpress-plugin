<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

if ( ! WP_UNINSTALL_PLUGIN ) {
	exit();
}

/**
 * @var wpdb $wpdb
 */
global $wpdb;

if ( is_a( $wpdb, 'wpdb' ) ) {
	// Deletes user meta stuff (like closed meta boxes, etc.)
	$wpdb->prepare( 'DELETE FROM ' . $wpdb->usermeta . ' WHERE meta_key LIKE %s', '%' . $wpdb->esc_like( 'gpaisr' ) . '%' );
}

delete_option( 'gpaisr' );
delete_option( 'gpaisr_gplus_link_move' );
delete_option( 'gpaisr_notice_checked' );

# do not remove the users Google+ profile URL as this could be used by other plugins, too.

