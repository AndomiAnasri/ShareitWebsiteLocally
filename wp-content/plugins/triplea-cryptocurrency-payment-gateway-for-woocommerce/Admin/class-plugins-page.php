<?php
/**
 * The plugins page functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce
 * @subpackage TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce/admin
 */

namespace TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce\Admin;

/**
 * The plugins page functionality of the plugin.
 *
 * Adds Settings link on the plugins page.
 *
 * @package    TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce
 * @subpackage TripleA_Cryptocurrency_Payment_Gateway_for_WooCommerce/admin
 * @author     TripleA <andy.hoebeke@triple-a.io>
 */
class Plugins_Page {

	/**
	 * Add a link to the configuration under WooCommerce's payment gateway settings page.
	 *
	 * TODO: When deactivate_plugin is forced, the Settings link still appears.
	 *
	 * @hooked plugin_action_links_{plugin basename}
	 * @see \WP_Plugins_List_Table::display_rows()
	 *
	 * @param string[] $links The links that will be shown below the plugin name on plugins.php.
	 *
	 * @return string[]
	 */
	public function display_plugin_action_links( $links ) {
		$setting_link    = admin_url( 'admin.php?page=wc-settings&tab=checkout&section=triplea_payment_gateway' );
		$conversion_link = admin_url( 'admin.php?page=wc-settings&tab=checkout&section=triplea_payment_gateway#conversion' );
		$plugin_faq_link = 'https://triple-a.io/plugin-faq/';
		$plugin_links    = array(
			'<a href="' . $setting_link . '">' . __( 'Settings', 'triplea-cryptocurrency-payment-gateway-for-woocommerce' ) . '</a>',
            '<a href="' . $plugin_faq_link . '" style="font-weight:600;" target="_blank">' . __( 'F.A.Q.', 'triplea-cryptocurrency-payment-gateway-for-woocommerce' ) . '</a>',
		);
		return array_merge( $plugin_links, $links );
	}

    public function general_admin_notice(){
        global $pagenow;
        if ( $pagenow == 'plugins.php' ) {
            $dismissBtn = esc_url( add_query_arg( 'triplea_dismiss_notice', '1', self::triplea_current_admin_url() ) );
            echo '<div class="notice notice-error is-dismissible">
                    <p>TripleA Cryptocurrency Payments: Settlement to <strong>personal BTC Wallet (expert mode)</strong> has been deprecated as of 
                    <strong>June 13th, 2022</strong>. If you wish to sign up for our custodial crypto payment service, please reach out to 
                    <a href="mailto:support@triple-a.io">support@triple-a.io</a></p>
                    <p><a href="'.$dismissBtn.'">Dismiss Notice!</a></p>
                </div>';
        }
    }

    public function review_admin_notice(){
        global $pagenow;
        if ( $pagenow == 'plugins.php' ) {
            $rated = esc_url( add_query_arg( 'triplea_rated', '1', self::triplea_current_admin_url() ) );

            $notice = '<div class="notice notice-info is-dismissible">';
                $notice .= '<h3>Enjoying our Crypto Payment Gateway for WooCommerce?</h3>';
                $notice .= '<p>Thank you for choosing Crypto Payment Gateway for WooCommerce. If your business and customers have benefited from crypto payments, 
                            please consider giving us a 5-star rating on WordPress.org. It would mean the world to us.</p>';
                $notice .= '<div class="triple-a-crypto-notice__actions" style="padding:0 0 15px">';
                    $notice .= '<a href="https://wordpress.org/support/plugin/triplea-cryptocurrency-payment-gateway-for-woocommerce/reviews/?rate=5#new-post" class="triplea-review-button triplea-review-button--cta" target="_blank"><span>👍 Yes, You Deserve It!</span></a>';
                    $notice .= '<a href="' . $rated . '" class="triplea-review-button triplea-review-button--cta" style="margin-left:15px;"><span>🙌 Already Rated!</span></a>';
                $notice .= '</div>';
            $notice .= '</div>';
            echo $notice;
        }
    }

    protected static function triplea_current_admin_url() {
        $uri = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
        $uri = preg_replace( '|^.*/wp-admin/|i', '', $uri );

        if ( ! $uri ) {
            return '';
        }
        return remove_query_arg( [ '_wpnonce', '_wc_notice_nonce', 'wc_db_update', 'wc_db_update_nonce', 'wc-hide-notice' ], admin_url( $uri ) );
    }

    // remove the notice for the user if review already done or if the user does not want to
    public function triplea_void_spare_me() {

        if ( isset( $_GET['triplea_rated'] ) && ! empty( $_GET['triplea_rated'] ) ) {
            $triplea_rated = $_GET['triplea_rated'];
            if ( 1 == $triplea_rated ) {
                update_option( 'triplea_rated', 'yes' );
                wp_redirect( admin_url( 'plugins.php' ) );
            }
        }
        if ( isset( $_GET['triplea_dismiss_notice'] ) && ! empty( $_GET['triplea_dismiss_notice'] ) ) {
            $triplea_dismiss_notice = $_GET['triplea_dismiss_notice'];
            if ( 1 == $triplea_dismiss_notice ) {
                update_option( 'triplea_dismiss_notice', 'yes' );
                wp_redirect( admin_url( 'plugins.php' ) );
            }
        }
    }
}
