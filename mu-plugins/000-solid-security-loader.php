<?php
/*
 * Plugin Name: Solid Security Loader
 * Plugin URI: https://ithemes.com/security
 * Description: This MU plugin loads Solid Security earlier in the boot process for better security and optimized performance.
 * Author: SolidWP
 * Author URI: https://solidwp.com
 * Version: 1.0
 */

call_user_func( function () {
	if ( is_multisite() ) {
		$plugins = get_site_option( 'active_sitewide_plugins', [] );
	} else {
		$plugins = get_option( 'active_plugins', [] );
	}

	if ( ! is_array( $plugins ) || ! in_array( 'better-wp-security/better-wp-security.php', $plugins, true ) ) {
		return;
	}

	define( 'ITSEC_LOAD_EARLY', true );
	include_once WP_CONTENT_DIR . '/plugins/better-wp-security/better-wp-security.php';
} );
