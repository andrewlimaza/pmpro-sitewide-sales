<?php
/**
 * Plugin Name: Paid Memberships Pro - Sitewide Sale Add On
 * Plugin URI: https://www.paidmembershipspro.com/add-ons/sitewide-sale/
 * Description: Run a sitewide sale (Black Friday, Cyber Monday, etc.) with Paid Memberships Pro
 * Author: strangerstudios, dlparker1005, pbrocks
 * Author URI: https://www.paidmembershipspro.com
 * Version: .1.3.2
 * Plugin URI:
 * License: GNU GPLv2+
 * Text Domain: pmpro-sitewide-sale
 *
 * @package pmpro-sitewide-sale
 */

define( 'PMPROSWS_DIR', dirname( __FILE__ ) );
define( 'PMPROSWS_BASENAME', plugin_basename( __FILE__ ) );

// require_once PMPROSWS_DIR . '/includes/checkout.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-banners.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-checkout.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-dev-info.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-metaboxes.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-post-types.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-reports.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-settings.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-setup.php';
require_once PMPROSWS_DIR . '/includes/classes/class-pmpro-sws-templates.php';

PMPro_SWS_Banners::init();
PMPro_SWS_Checkout::init();
PMPro_SWS_Dev_Info::init();
PMPro_Fold_into_Core::init();
PMPro_SWS_Reports::init();
PMPro_SWS_Settings::init();
PMPro_SWS_Setup::init();


/**
 * Enqueues selectWoo
 */
function pmpro_sws_admin_scripts() {
	$screen = get_current_screen();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_register_script( 'selectWoo', plugins_url( 'includes/js/selectWoo.full' . $suffix . '.js', __FILE__ ), array( 'jquery' ), '1.0.4' );
	wp_enqueue_script( 'selectWoo' );
	wp_register_style( 'selectWooCSS', plugins_url( 'includes/css/selectWoo' . $suffix . '.css', __FILE__ ) );
	wp_enqueue_style( 'selectWooCSS' );
}
add_action( 'admin_enqueue_scripts', 'pmpro_sws_admin_scripts' );

/**
 * Enqueues selectWoo
 */
function pmpro_sws_frontend_scripts() {
	wp_register_style( 'frontend', plugins_url( 'includes/css/frontend.css', __FILE__ ), '1.1' );
	wp_enqueue_style( 'frontend' );
}
add_action( 'wp_enqueue_scripts', 'pmpro_sws_frontend_scripts' );
