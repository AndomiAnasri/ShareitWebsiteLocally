<?php
// if (!defined('ABSPATH')) {
// exit;
// }

return [
    // deprecated
    'triplea_active_pubkey_id' => [
        'type' => 'hidden',
    ],
    // deprecated
    'triplea_server_public_enc_key_btc' => [
        'type' => 'hidden',
    ],
    // deprecated
    'triplea_server_public_enc_key_conversion' => [
        'type' => 'hidden',
    ],
    // deprecated
    'triplea_dashboard_email' => [
        'type' => 'hidden',
    ],
    // deprecated
    'triplea_notifications_email' => [
        'type' => 'hidden',
    ],
    // Bitcoin to bitcoin or to local currency
    'triplea_payment_mode' => [
        'type' => 'hidden',
    ],
    // Sandbox payments on/off
    'triplea_sandbox_payment_mode' => [
        'type' => 'hidden',
    ],
    // Various API ID variables
    'triplea_active_api_id' => [
        'type' => 'hidden',
    ],
    'triplea_active_api_id_auth_reset' => [
        'type'    => 'hidden',
        'default' => 'false',
    ],
    'triplea_btc2btc_api_id' => [
        'type' => 'hidden',
    ],
    'triplea_btc2btc_sandbox_api_id' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_api_id' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_sandbox_api_id' => [
        'type' => 'hidden',
    ],
    // Local currency settlement data
    'triplea_btc2fiat_merchant_key' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_client_id' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_client_secret' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_merchant_name' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_merchant_email' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_merchant_phone' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_merchant_local_currency' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_oauth_token' => [
        'type' => 'hidden',
    ],
    'triplea_btc2fiat_oauth_token_expiry' => [
        'type' => 'hidden',
    ],
    // Deprecated Options Starts
    // Bitcoin (mainnet) settlement data
    // 'triplea_btc2btc_merchant_key' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_client_id' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_client_secret' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_oauth_token' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_oauth_token_expiry' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_merchant_name' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_merchant_email' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_merchant_phone' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_pubkey' => [
    //     'type' => 'hidden',
    // ],
    // Bitcoin Testnet(sandbox) settlement data
    // 'triplea_btc2btc_sandbox_merchant_key' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_sandbox_client_id' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_sandbox_client_secret' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_sandbox_oauth_token' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_sandbox_oauth_token_expiry' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_sandbox_merchant_name' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_sandbox_merchant_email' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_sandbox_merchant_phone' => [
    //     'type' => 'hidden',
    // ],
    // 'triplea_btc2btc_sandbox_pubkey' => [
    //     'type' => 'hidden',
    // ],
    // Deprecated Options Ends
    // Make sure the payment option is enabled in WooCommerce payment gateways
    'enabled' => [
        'title'   => __('Enable/Disable', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'label'   => __('TripleA Cryptocurrency Payments', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'type'    => 'checkbox',
        'default' => 'yes',
    ],
    // Test mode : payment option in checkout only visible to admins
    'triplea_mode' => [
        'title'   => __('Test or Live Mode', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'type'    => 'hidden',
        'options' => [
            'test' => __('Test Mode', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
            'live' => __('Live Mode', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        ],
        'class'       => 'wc-enhanced-select',
        'description' => __('Select LIVE mode when ready to accept cryptocurrency payments from the public. Payment option will only be visible to Admin users in TEST mode.', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'default'     => 'live',
        'desc_tip'    => FALSE,
    ],
    'triplea_anchor_conversion' => [
        'title' => 'conversion',
        'type'  => 'anchor',
    ],
    'triplea_payment_mode_form' => [
        'title'       => __('Payment mode', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'description' => __('Decide how you want your money to be delivered to you.', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        // 'markup'      => include 'views/triplea-payment-gateway-settings-payment-mode.php',
        'markup'      => include 'views/triplea-payment-gateway-settings-payment-options.php',
        //'type'        => 'custom',
         'type' => 'table_markup'
    ],
    'triplea_pubkeyid_script' => [
        'type' => 'triplea_pubkeyid_script',
    ],

    'force_enabled' => [
        'type'    => 'hidden',
        'default' => 'no',
    ],

    'triplea_plugin_options_form' => [
        'title'       => __('Plugin options', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'description' => __('Plugin options input fields and info', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'markup'      => include 'views/triplea-payment-gateway-settings-plugin-options.php',
        'type'        => 'custom',
    ],
    'debug_log_enabled' => [
        'title'   => __('Enable debug log', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'label'   => __('Enable debug log', 'triplea-cryptocurrency-payment-gateway-for-woocommerce') . ' (<a target="_blank" href="../wp-content/uploads/triplea-bitcoin-payment-logs/triplea-bitcoin-payment-logs.log?' . time() . '">' . __('view log', 'triplea-cryptocurrency-payment-gateway-for-woocommerce') . '</a>)',
        'type'    => 'checkbox',
        'default' => 'no',
    ],

    'admin_debug_log_enabled' => [
        'title'       => __('Enable debug log for TripleA Support', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'label'       => __('Enable debug log for TripleA Support', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'description' => __('Include credentials in debug log, only activate if requested by TripleA Support and clear the debug log after sharing the debug log with the support team.', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'type'        => 'checkbox',
        'default'     => 'no',
    ],

    'preserve_settings' => [
        'title'   => __('Preserve Settings', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'label'   => __('Want to keep the settings after uninstalling the plugin?', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'type'    => 'checkbox',
        'default' => 'no',
    ],
    'debug_log_clear_action' => [
        'title'       => __('Clear debug log', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'label'       => __('Clear the debug log (upon saving this form, log is cleared and this option is then toggled off again)', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'description' => __('On production, if you need to debug, clear the log afterwards!', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'),
        'type'        => 'checkbox',
        'default'     => 'no',
    ],
];
