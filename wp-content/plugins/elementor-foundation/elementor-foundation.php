<?php
/**
 * Plugin Name: Elementor Foundation
 * Description: ...
 * Plugin URI:  ...
 * Version:     1.0.0
 * Author:      Borodkoleg
 * Author URI:  borodkoleg@gmail.com
 * Text Domain: Elementor-Foundation
 * 
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function elementor_test_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Elementor_Foundation\Plugin::instance();

}
add_action( 'plugins_loaded', 'elementor_test_addon' );