<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also includes all of the dependencies used by
 * the plugin, registers the activation and deactivation functions, and defines
 * a function that starts the plugin.
 *
 * @link              https://triple-a.io
 * @since             1.0.0
 * @package           TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Crypto Payment Gateway for WooCommerce
 * Plugin URI:        https://triple-a.io/crypto-payments-for-e-commerce
 * Description:       Offer cryptocurrency as a payment option on your website and get access to even more clients. Receive payments in cryptocurrency or in your local currency, directly in your bank account. Enjoy an easy setup, no cryptocurrency expertise required. Powered by TripleA.
 * Version:           1.8.1
 * Author:            TripleA Team
 * Author URI:        https://triple-a.io
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       triplea-cryptocurrency-payment-gateway-for-woocommerce
 * Domain Path:       /languages
 *
 * WC requires at least: 3.5.0
 * WC tested up to: 6.5.1
 */

namespace TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce;

use TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce\WPPB\WPPB_Loader;
use TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce\Includes\TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce;


// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'vendor/autoload.php';

require_once __DIR__ . '/autoload.php';

if ( ! defined( 'TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_VERSION' ) ) {
	define( 'TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_VERSION', '1.8.1' );
}

if ( ! defined( 'TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_MAIN_URL_PATH' ) ) {
	define( 'TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_MAIN_URL_PATH', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_MAIN_PATH' ) ) {
	define( 'TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_MAIN_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_MAIN_FILE' ) ) {
	define( 'TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_MAIN_FILE', __FILE__ );
}

require_once __DIR__ . '/logger.php';

/**
 * The code that runs during plugin activation.
 */
function activate_triplea_cryptocurrency_payment_gateway_for_woocommerce() {

    $installed = get_option('triplea_crypto_plugin_activation_time');
    if( ! $installed ) {
        // add plugin activation time
        $get_activation_time = strtotime("now");
        add_option('triplea_crypto_plugin_activation_time', $get_activation_time);
    }
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_triplea_cryptocurrency_payment_gateway_for_woocommerce() {

}

register_activation_hook( __FILE__, 'TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce\activate_triplea_cryptocurrency_payment_gateway_for_woocommerce' );
register_deactivation_hook( __FILE__, 'TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce\deactivate_triplea_cryptocurrency_payment_gateway_for_woocommerce' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.3.2
 */
function instantiate_triplea_cryptocurrency_payment_gateway_for_woocommerce() {

	$loader = new WPPB_Loader();
	$plugin = new TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce( $loader );

	return $plugin;
}

$GLOBALS['triplea_cryptocurrency_payment_gateway_for_woocommerce'] = $triplea_cryptocurrency_payment_gateway_for_woocommerce = instantiate_triplea_cryptocurrency_payment_gateway_for_woocommerce();
$triplea_cryptocurrency_payment_gateway_for_woocommerce->run();
