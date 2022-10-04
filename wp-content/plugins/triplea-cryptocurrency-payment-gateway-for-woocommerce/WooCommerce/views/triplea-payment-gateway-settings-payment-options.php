<?php
if (!defined('ABSPATH')) {
   exit;
}

$payment_mode         = $this->get_option('triplea_payment_mode');
$sandbox_payment_mode = $this->get_option('triplea_sandbox_payment_mode');

//$notifications_email          = $this->get_option('triplea_notifications_email');
$fiat_merchant_key            = $this->get_option('triplea_btc2fiat_merchant_key');
$fiat_client_id               = $this->get_option('triplea_btc2fiat_client_id');
$fiat_client_secret           = $this->get_option('triplea_btc2fiat_client_secret');
$fiat_merchant_name           = $this->get_option('triplea_btc2fiat_merchant_name');
$fiat_merchant_email          = $this->get_option('triplea_btc2fiat_merchant_email');
$fiat_merchant_phone          = $this->get_option('triplea_btc2fiat_merchant_phone');
$fiat_merchant_local_currency = $this->get_option('triplea_btc2fiat_merchant_local_currency');
$fiat_oauth_token             = $this->get_option('triplea_btc2fiat_oauth_token');

//deprecating on June 13th 2022
$btc_merchant_key             = $this->get_option('triplea_btc2btc_merchant_key');
$btc_client_id                = $this->get_option('triplea_btc2btc_client_id');
$btc_client_secret            = substr($this->get_option('triplea_btc2btc_client_secret'), 0, 5) . '...';
$btc_merchant_name            = $this->get_option('triplea_btc2btc_merchant_name');
$btc_merchant_email           = $this->get_option('triplea_btc2btc_merchant_email');
$btc_merchant_phone           = $this->get_option('triplea_btc2btc_merchant_phone');
$btc_pubkey                   = $this->get_option('triplea_btc2btc_pubkey');
$btc_sandbox_merchant_key     = $this->get_option('triplea_btc2btc_sandbox_merchant_key');
$btc_sandbox_client_id        = $this->get_option('triplea_btc2btc_sandbox_client_id');
$btc_sandbox_client_secret    = substr($this->get_option('triplea_btc2btc_sandbox_client_secret'), 0, 5) . '...';
$btc_sandbox_merchant_name    = $this->get_option('triplea_btc2btc_sandbox_merchant_name');
$btc_sandbox_merchant_email   = $this->get_option('triplea_btc2btc_sandbox_merchant_email');
$btc_sandbox_merchant_phone   = $this->get_option('triplea_btc2btc_sandbox_merchant_phone');
$btc_sandbox_pubkey           = $this->get_option('triplea_btc2btc_sandbox_pubkey');
//deprecating on June 13th 2022

// BTC-2-BTC mode
$triplea_btc2btc_sandbox_api_id = $this->get_option('triplea_btc2btc_sandbox_api_id');
$triplea_btc2btc_api_id         = $this->get_option('triplea_btc2btc_api_id');
$output_btc2btc_api_id          = '';
if (!empty($triplea_btc2btc_api_id)) {
   $output_btc2btc_api_id = '<p>Your bitcoin-to-bitcoin API ID is <strong><u>' . $triplea_btc2btc_api_id . '</u></strong> .</p><br>';
}
// BTC-2-Cash conversion mode
$triplea_btc2fiat_sandbox_api_id = $this->get_option('triplea_btc2fiat_sandbox_api_id');
$triplea_btc2fiat_api_id         = $this->get_option('triplea_btc2fiat_api_id');
$output_btc2fiat_api_id          = '';
if (!empty($triplea_btc2fiat_api_id)) {
   $output_btc2fiat_api_id = '<p>Your bitcoin-to-local currency API ID is <strong><u>' . $triplea_btc2fiat_api_id . '</u></strong> .</p><br>';
}

// Only if no need for upgrade..
$btc2fiat_is_active    = FALSE;
$btc2btc_is_active     = FALSE;
$triplea_active_api_id = $this->get_option('triplea_active_api_id');
$btc2fiat_is_active    = (!empty($triplea_active_api_id) && ($triplea_active_api_id === $triplea_btc2fiat_api_id || $triplea_active_api_id === $triplea_btc2fiat_sandbox_api_id));
$btc2btc_is_active     = (!empty($triplea_active_api_id) && ($triplea_active_api_id === $triplea_btc2btc_api_id || $triplea_active_api_id === $triplea_btc2btc_sandbox_api_id));

if ($btc2btc_is_active && $triplea_active_api_id === $triplea_btc2btc_sandbox_api_id) {
   $sandbox_payment_mode = true;
}
elseif ($btc2fiat_is_active && $triplea_active_api_id === $triplea_btc2fiat_sandbox_api_id) {
   $sandbox_payment_mode = true;
}

$return_url     = get_rest_url(NULL, 'triplea/v1/tx_update/' . get_option('triplea_api_endpoint_token'));
$local_currency = strtoupper(get_woocommerce_currency());
if (in_array($local_currency, ['BTC','TBTC','TESTBTC'])) {
   $local_currency = 'USD';
}
$site_info      = get_bloginfo('name') ?: 'no_name';


//$triplea_notifications_email = $this->get_option('triplea_notifications_email');
//if (empty($triplea_notifications_email)) {
//   $triplea_notifications_email = '';
//}
//$triplea_dashboard_email = $this->get_option('triplea_dashboard_email');
//if (empty($triplea_dashboard_email)) {
//   $triplea_dashboard_email = '';
//}
$tmp_old_btc_id = $this->get_option('triplea_pubkey_id');
$old_btc2btc_sandbox_api_id = $tmp_old_btc_id; // '';
$old_btc2btc_api_id = $tmp_old_btc_id; //'';
//if (!empty($tmp_old_btc_id)) {
//   if (substr_compare($tmp_old_btc_id, "_t", -2, 2) === 0 ) {
//      $old_btc2btc_sandbox_api_id = $tmp_old_btc_id;
//      $old_btc2btc_api_id = '';
//   }
//   else {
//      $old_btc2btc_sandbox_api_id = '';
//      $old_btc2btc_api_id = $tmp_old_btc_id;
//   }
//}
$old_btc2fiat_api_id = $this->get_option('triplea_pubkey_id_for_conversion');
$old_active_api_id = $this->get_option('triplea_active_pubkey_id');
$old_btc2fiat_is_active = isset($old_active_api_id) && !empty($old_active_api_id) && $old_active_api_id === $old_btc2fiat_api_id;
$old_btc2btc_is_active = isset($old_active_api_id) && !empty($old_active_api_id) && ($old_active_api_id === $old_btc2btc_api_id || $old_active_api_id === $old_btc2btc_sandbox_api_id);
$old_payment_mode = $old_btc2fiat_is_active ? 'bitcoin-to-cash' : 'bitcoin-to-cash';
$old_sandbox_payment_mode = !empty($old_btc2btc_sandbox_api_id);


$debug_log_enabled = 'yes' === $this->get_option('debug_log_enabled');
$info_data         = [
   'type'      => 'woocommerce',
   'name'      => substr(get_bloginfo('name'), 0, 100),
   'url'       => substr(get_bloginfo('url'), 0, 250),
   'admin'     => substr(get_bloginfo('admin_email'), 0, 60),
   'wp_v'      => substr(get_bloginfo('version'), 0, 15),
   'lang'      => substr(get_bloginfo('language'), 0, 8),
   'plugin_v'  => TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_VERSION,
   'debug_log' => $debug_log_enabled ? 1 : 0,
   'php_v'     => phpversion(),
];

ob_start();
?>
    <style>
        .triplea-plugin-settings-menu li {
            display: inline-block;
            padding: 10px;
        }

        .triplea-plugin-settings-menu li:first-child {
            padding-left: 0;
        }

        .triplea-fiat-settings {
            background-color: #fff;
            padding: 30px 20px;
            width: 420px;
            overflow: hidden;
        }

        .triplea-fiat-settings .triplea-notice {
            padding: 10px;
            border: 1px solid #cdcdcd;
            margin: 5px 10px;
        }

        .triplea-fiat-settings .control-group {
            padding: 10px;
            border-bottom: 1px solid #fff3f3;
            width: 96%;
            display: grid;
        }

        .triplea-fiat-settings .control-group label {
            display: block;
            margin-bottom: 10px;
        }

        .triplea-fiat-settings .control-group input,
        .triplea-fiat-settings .control-group select {
            width: 100%;
            margin-bottom: 10px;
        }

        .triplea-fiat-settings input[type="button"] {
            width: 400px ;
        }
    </style>
    <div>
        <hr>
        <div>
            <ul class="triplea-plugin-settings-menu">
                <li><a href="#link-account-setup">Account setup</a></li>
                <li><a href="#link-plugin-options">Plugin options</a></li>
                <li><a href="#link-support-feedback">Support & feedback</a></li>
                <li><a href="https://triple-a.io/plugin-faq/" target="_blank">F.A.Q.</a></li>
            </ul>
        </div>
    </div>
    <hr>
    <?php //echo 'sandbox mode: ' . $sandbox_payment_mode; ?>
    <div class="triplea-fiat-settings">
        <div class="triplea-notice"><p><?php echo sprintf( esc_html( 'Fill in the information below from your email or create a new account by clicking %s','triplea-cryptocurrency-payment-gateway-for-woocommerce' ), '<a href="https://triple-a.io/signup/" target="_blank">here</a>' ); ?></p></div>
        <!-- <form action="#"> -->
        <div class="control-group">
            <label for="paymentmode"><?php _e('Payment Mode: ', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'); ?></label>
            <select name="payment_mode" id="paymentmode">
                <option value="live" <?php echo ( !$sandbox_payment_mode ) ? 'selected' : '' ?>>Live</option>
                <option value="test" <?php echo ( $sandbox_payment_mode ) ? 'selected' : '' ?>>Sandbox</option>
            </select>
        </div>
        <div class="control-group">
            <label for="merchantkey"><?php _e('Merchant Key: ', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'); ?></label>
            <input id="merchantkey" type="text" name="mkey" value="<?php echo ( isset( $fiat_merchant_key ) ) ? $fiat_merchant_key : ''; ?>">
        </div>
        <div class="control-group">
            <label for="clientid"><?php _e('Client ID: ', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'); ?></label>
            <input id="clientid" type="text" name="clientID" value="<?php echo ( isset( $fiat_client_id ) ) ? $fiat_client_id : ''; ?>">
        </div>
        <div class="control-group">
            <label for="clientsecret"><?php _e('Client Secret: ', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'); ?></label>
            <input id="clientsecret" type="text" name="clientSecret" value="<?php echo ( isset( $fiat_client_secret ) ) ? $fiat_client_secret : ''; ?>">
        </div>
        <div class="control-group">
            <label for="liveapiid"><?php _e('BTC API ID: ', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'); ?></label>
            <input id="liveapiid" type="text" name="liveapiId" value="<?php echo ( isset( $triplea_btc2fiat_api_id ) ) ? $triplea_btc2fiat_api_id : ''; ?>">
        </div>
        <div class="control-group">
            <label for="testapiid"><?php _e('Sandbox API ID: ', 'triplea-cryptocurrency-payment-gateway-for-woocommerce'); ?></label>
            <input id="testapiid" type="text" name="testapiId" value="<?php echo ( isset( $triplea_btc2fiat_sandbox_api_id ) ) ? $triplea_btc2fiat_sandbox_api_id : ''; ?>">
        </div>
        <div class="control-group">
            <input id="proceed-btn" type="button" class="button-primary" value="Proceed">
        </div>
        <!-- </form> -->
    </div>
    <script type="text/javascript">
        const settingsPrefix = 'woocommerce_triplea_payment_gateway';

        jQuery( '#proceed-btn' ).on( 'click', function (){
            console.log(document.getElementById("merchantkey").value);
            console.log( 'clicked' );
            let hiddenPaymentMode   = document.getElementById(settingsPrefix + '_' + 'triplea_payment_mode');
            hiddenPaymentMode.value = 'bitcoin-to-cash';

            let hiddenNodeMerchantKey   = document.getElementById(settingsPrefix + '_' + 'triplea_btc2fiat_merchant_key');
            hiddenNodeMerchantKey.value = document.getElementById("merchantkey").value;

            let hiddenNodeClientId   = document.getElementById(settingsPrefix + '_' + 'triplea_btc2fiat_client_id');
            hiddenNodeClientId.value = document.getElementById("clientid").value;

            let hiddenNodeClientSecret   = document.getElementById(settingsPrefix + '_' + 'triplea_btc2fiat_client_secret');
            hiddenNodeClientSecret.value = document.getElementById("clientsecret").value;

            let liveapiIdNode   = document.getElementById(settingsPrefix + '_' + 'triplea_btc2fiat_api_id');
            liveapiIdNode.value = document.getElementById("liveapiid").value;

            let testapiIdNode   = document.getElementById(settingsPrefix + '_' + 'triplea_btc2fiat_sandbox_api_id');
            testapiIdNode.value = document.getElementById("testapiid").value;

            let activeApiIdAuthResetNode   = document.getElementById(settingsPrefix + '_' + 'triplea_active_api_id_auth_reset');
            activeApiIdAuthResetNode.value = 'true';

            let sandboxValue = true;
            if( document.getElementById("paymentmode").value == 'live' ) {
                sandboxValue = false;
                apiId = document.getElementById("liveapiid").value;
            } else {
                sandboxValue = true;
                apiId = document.getElementById("testapiid").value;
            }
            let sandboxPaymentModeNode = document.getElementById(settingsPrefix + '_' + 'triplea_sandbox_payment_mode');
            sandboxPaymentModeNode.value = sandboxValue;

            let activeApiIdNode   = document.getElementById(settingsPrefix + '_' + 'triplea_active_api_id');
            activeApiIdNode.value = apiId;

            let hiddenNodeForceEnabled = document.getElementById(settingsPrefix + '_' + 'force_enabled');
            hiddenNodeForceEnabled.value = 'yes';

            <?php if ( empty( $fiat_oauth_token ) ) : ?>
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var urlencoded = new URLSearchParams();
            urlencoded.append("client_id", "oacid-ckzp6kcns1iaxj9thcz1sb61o");
            urlencoded.append("grant_type", "client_credentials");
            urlencoded.append("client_secret", "c5b4a2ba26e3b6a7f59b03226a780a195b01d8be5a6fd0aef206a02822b25ee4");

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: urlencoded,
                redirect: 'follow'
            };

            //console.log(requestOptions);

            fetch("https://api.triple-a.io/api/v2/oauth/token", requestOptions)
            .then(response => response.json())
            .then(result => {
                //console.log( 'results here! ' + result + result.access_token );
                let activeApiIdAuthToken   = document.getElementById(settingsPrefix + '_' + 'triplea_btc2fiat_oauth_token');
                activeApiIdAuthToken.value = result.access_token;

                let activeApiIdAuthTokenExpires   = document.getElementById(settingsPrefix + '_' + 'triplea_btc2fiat_oauth_token_expiry');
                activeApiIdAuthTokenExpires.value = result.expires_in;
            })
            .catch(error => console.log('error', error));
            <?php endif; ?>

            document.getElementsByName('save')[0].click();
        })
    </script>
<?php
$output = ob_get_contents();
ob_end_clean();
return $output;