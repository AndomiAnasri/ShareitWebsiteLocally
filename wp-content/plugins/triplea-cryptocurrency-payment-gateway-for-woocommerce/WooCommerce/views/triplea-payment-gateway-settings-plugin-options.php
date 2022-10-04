<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$plugin_options           = 'woocommerce_' . 'triplea_payment_gateway' . '_settings';
$plugin_settings_defaults = array();
$plugin_settings          = get_option( $plugin_options, $plugin_settings_defaults );
// access plugin settings : $plugin_settings['setting_name']

$tripleaStatuses = array(
	// 'new'       => 'New Order',
	'paid'      => 'Paid (awaiting confirmation)',
	'confirmed' => 'Paid (confirmed)',
	// 'complete'  => 'Complete',
	// 'refunded'  => 'Refunded',  // refunds are possible, will be added to the roadmap
	'invalid'   => 'Invalid',
);
// There is an additional state (on hold) which is set by WooCommerce on order creation.

$statuses = array(
	//'new'       => 'wc-pending-payment',
	'paid'      => 'wc-on-hold',
	'confirmed' => 'wc-processing',
	// 'complete'  => 'wc-processing',
	// 'refunded'  => 'wc-refunded', // refunds are possible, will be added to the roadmap
	'invalid'   => 'wc-failed',
);

$wcStatuses = wc_get_order_statuses();

compact( 'tripleaStatuses', 'statuses', 'wcStatuses' );

$icon_url = TRIPLEA_CRYPTOCURRENCY_PAYMENT_GATEWAY_FOR_WOOCOMMERCE_MAIN_URL_PATH . 'assets/img/' ;
if (is_ssl()) {
   $icon_url = WC_HTTPS::force_https_url( $icon_url );
}

$logo_style = 'style="max-width: 100px !important;max-height: 30px !important;"';
$icon_large = '<img id="triplea_preview_logo_large" src="' . $icon_url . 'bitcoin-full.png' . '" alt="Cryptocurrency logo" ' . $logo_style . ' />';
$icon_short = '<img id="triplea_preview_logo_short" src="' . $icon_url . 'bitcoin.png' . '" alt="Cryptocurrency logo" ' . $logo_style . ' />';
$eth_large = '<img id="triplea_preview_ethlogo_large" src="' . $icon_url . 'eth-full.png' . '" alt="Cryptocurrency logo" ' . $logo_style . ' />';
$eth_short = '<img id="triplea_preview_ethlogo_short" src="' . $icon_url . 'eth-icon.png' . '" alt="Cryptocurrency logo" ' . $logo_style . ' />';
$usdt_large = '<img id="triplea_preview_usdtlogo_large" src="' . $icon_url . 'tether-full.png' . '" alt="Cryptocurrency logo" ' . $logo_style . ' />';
$usdt_short = '<img id="triplea_preview_usdtlogo_short" src="' . $icon_url . 'tether-icon.png' . '" alt="Cryptocurrency logo" ' . $logo_style . ' />';
$default_large = '<img id="triplea_preview_defaultlogo_large" src="' . $icon_url . 'crypto-default-full.png' . '" alt="Cryptocurrency logo" ' . $logo_style . ' />';
$default_short = '<img id="triplea_preview_defaultlogo_short" src="' . $icon_url . 'crypto-default-icon.png' . '" alt="Cryptocurrency logo" ' . $logo_style . ' />';


ob_start();
?>

    <style>
        .submit .woocommerce-save-button {
		    display: none;
	    }
	    .custom.submit .woocommerce-save-button {
		    display: initial;
	    }
    </style>

    <hr>

    <div id="link-plugin-options" class="triplea-menulink-anchor"></div>
    <h1>Plugin settings</h1>

    <table class="form-table">
	    <tr valign="top">
		    <th scope="row" class="titledesc">Display customisation</th>
		    <td class="forminp" id="triplea_order_states">
			    <table class="form-table">
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            Preview
                        </th>
                        <td class="forminp"
                            id="triplea_order_states"
                            style="font-size: 120%; line-height: 35px;">
                            <span id="triplea_preview_text">Pay with Cryptocurrency</span>
                            <?php echo $default_large . $default_short . $icon_large . $icon_short . $eth_large . $eth_short . $usdt_large . $usdt_short; ?>
                            <br>
                            <span id="triplea_preview_description"
                                style="padding-top: 10px; font-size: 90%;">Secure and easy payment with Cryptocurrency</span>
                        </td>
                    </tr>
                    <tr>
                        <th>

                        </th>
                        <td>
                            <hr>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">Cryptocurrency logo</th>
                        <td class="forminp forminp-radio" id="triplea_order_states">
                            <label for="" style="padding-right: 30px;">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="default_large"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( empty( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        || 'default-large-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="default-large-logo">
                                <?php echo $default_large; ?>
                            </label>
                            <label for="" style="padding-right: 30px;">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="default_short"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( isset( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        && 'default-short-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="default-short-logo">
                                <?php echo $default_short; ?>
                            </label>
                            <label for="" style="padding-right: 30px;">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="logo_large"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( empty( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        || 'large-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="large-logo">
                                <?php echo $icon_large; ?>
                            </label>
                            <label for="" style="padding-right: 30px;">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="logo_short"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( isset( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        && 'short-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="short-logo">
                                <?php echo $icon_short; ?>
                            </label>
                            <label for="" style="padding-right: 30px;">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="eth_large"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( isset( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        && 'eth-large-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="eth-large-logo">
                                <?php echo $eth_large; ?>
                            </label>
                            <label for="" style="padding-right: 30px;">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="eth_short"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( isset( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        && 'eth-short-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="eth-short-logo">
                                <?php echo $eth_short; ?>
                            </label>
                            <label for="" style="padding-right: 30px;">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="usdt_large"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( isset( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        && 'usdt-large-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="usdt-short-logo">
                                <?php echo $usdt_large; ?>
                            </label>
                            <label for="" style="padding-right: 30px;">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="usdt_short"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( isset( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        && 'usdt-short-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="usdt-short-logo">
                                <?php echo $usdt_short; ?>
                            </label>
                            <label for="">
                                <input type="radio"
                                    onchange="updatePreviewOnChange()"
                                    id="logo_none"
                                    name="triplea_bitcoin_logo_option"
                                <?php
                                    if ( isset( $plugin_settings['triplea_bitcoin_logo_option'] )
                                        && 'no-logo' === $plugin_settings['triplea_bitcoin_logo_option'] ) {
                                        echo 'checked';
                                    }
                                    ?>
                                    value="no-logo">
                                no logo
                            </label>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">Cryptocurrency payment text</th>
                        <td class="forminp forminp-radio">
                            <fieldset class="">
                                <label for="">
                                    <input type="radio" id="text_default"
                                            onchange="updatePreviewOnChange()"
                                            name="triplea_bitcoin_text_option"
                                        <?php
                                            if ( isset( $plugin_settings['triplea_bitcoin_text_option'] )
                                            && 'default-text' === $plugin_settings['triplea_bitcoin_text_option'] ) {
                                                echo 'checked';
                                            }
                                            ?>
                                            value="default-text">
                                    "<?php echo __( 'Cryptocurrency', 'triplea-cryptocurrency-payment-gateway-for-woocommerce' ); ?>"
                                </label>
                                <br>
                                <label for="">
                                <input type="radio"
                                        id="text_custom"
                                    <?php
                                        if ( isset( $plugin_settings['triplea_bitcoin_text_option'] )
                                        && 'custom-text' === $plugin_settings['triplea_bitcoin_text_option'] ) {
                                            echo 'checked';
                                        }
                                        ?>
                                        onchange="updatePreviewOnChange()"
                                        value="custom-text"
                                        name="triplea_bitcoin_text_option"
                                        style="padding-right: 30px;">
                                Custom text:
                                <br>
                                <input type="text" id="text_custom_value"
                                        onkeyup="updatePreviewOnChange()"
                                        name="triplea_bitcoin_text_custom_value"
                                    <?php
                                        if ( isset( $plugin_settings['triplea_bitcoin_text_custom_value'] ) ) {
                                            echo 'value="' . stripcslashes(htmlentities($plugin_settings['triplea_bitcoin_text_custom_value'])) . '"';
                                        } else {
                                            echo 'value="Pay with Cryptocurrency"';
                                        }
                                        ?>
                                        style="margin-top: 5px; margin-left: 24px">
                                </label>
                            </fieldset>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">Description text</th>
                        <td class="forminp forminp-radio">
                            <fieldset class="">
                                <label for="">
                                <input type="radio" id="desc_default"
                                        onchange="updatePreviewOnChange()"
                                        value="desc-default"
                                    <?php
                                        if ( empty( $plugin_settings['triplea_bitcoin_descriptiontext_option'] ) || 'desc-default' === $plugin_settings['triplea_bitcoin_descriptiontext_option'] ) {
                                            echo 'checked';
                                        }
                                        ?>
                                        name="triplea_bitcoin_descriptiontext_option">
                                "<?php echo __( 'Secure and easy payment with Cryptocurrency', 'triplea-cryptocurrency-payment-gateway-for-woocommerce' ); ?>"
                                </label>
                                <br>
                                <label for="">
                                <input type="radio" id="desc_custom"
                                        onchange="updatePreviewOnChange()"
                                        value="desc-custom"
                                    <?php
                                        if ( isset( $plugin_settings['triplea_bitcoin_descriptiontext_option'] ) && 'desc-custom' === $plugin_settings['triplea_bitcoin_descriptiontext_option'] ) {
                                            echo 'checked';
                                        }
                                        ?>
                                        name="triplea_bitcoin_descriptiontext_option"
                                        style="padding-right: 30px;">
                                Custom text:
                                <br>
                                <input type="text" id="desc_custom_value"
                                        onkeyup="updatePreviewOnChange()"
                                    <?php
                                        if ( isset( $plugin_settings['triplea_bitcoin_descriptiontext_value'] ) ) {
                                            echo 'value="' . stripcslashes(htmlentities($plugin_settings['triplea_bitcoin_descriptiontext_value'])) . '"';
                                        } else {
                                            echo 'value="Pay with your Cryptocurrency wallet!"';
                                        }
                                        ?>
                                        name="triplea_bitcoin_descriptiontext_value"
                                        style="margin-top: 5px; margin-left: 24px">
                                </label>
                            </fieldset>
                        </td>
                    </tr>
			    </table>
		    </td>
	    </tr>
	    <tr valign="top">
		    <th scope="row" class="titledesc">Order States:</th>
		    <td class="forminp" id="triplea_order_states">
			    <table cellspacing="0" cellpadding="0" style="padding:0">
			    <?php foreach ( $tripleaStatuses as $tripleaState => $tripleaName ) : ?>
				    <tr>
					    <th>
						    <label for="triplea_state_<?php echo $tripleaState; ?>"><?php echo $tripleaName; ?></label>
					    </th>
					    <td>
                            <select id="triplea_state_<?php echo $tripleaState; ?>"
                                    onchange="updatePreviewOnChange()"
                                    name="triplea_woocommerce_order_states[<?php echo $tripleaState; ?>]">
                            <?php
                                // $orderStates = get_option('woocommerce_triplea_payment_gateway_triplea_woocommerce_order_states');
                                $orderStates = isset( $plugin_settings['triplea_woocommerce_order_states'] ) ? $plugin_settings['triplea_woocommerce_order_states'] : array();
                                foreach ( $wcStatuses as $wcState => $wcName ) {
                                    $currentOption = isset( $orderStates[ $tripleaState ] ) ? $orderStates[ $tripleaState ] : $statuses[ $tripleaState ];
                                    echo "<option value='$wcState'";
                                    if ( $currentOption === $wcState ) {
                                        echo 'selected';
                                    }
                                    echo ">$wcName</option>";
                                }
                                ?>
                            </select>
					    </td>
                        <?php if(strpos($tripleaName, 'awaiting') !== FALSE): ?>
                        <td>
                        <p>Payment not guaranteed yet at this stage!<br>Do not yet provide the product or service.</p>
                        </td>
                        <?php endif; ?>
				    </tr>
			    <?php endforeach; ?>
			</table>
		 </td>
	    </tr>
    </table>

    <div>
        <p class="custom submit">
            <button name="save"
                    class="button-primary woocommerce-save-button"
                    type="submit"
                    value="Save changes">
                Save changes
            </button>
            <input type="hidden"
                    name="_wp_http_referer"
                    value="/wp-admin/admin.php?page=wc-settings&tab=checkout&section=triplea_payment_gateway">
        </p>
    </div>

    <div id="link-faq" class="triplea-menulink-anchor"></div>
    <style>
        .triplea-faq-list {
            max-width: 900px;
        }

        .triplea-faq-list li {
        }

        .triplea-faq-list li .triplea-faq-collapsible {
            width        : 100%;
            text-align   : left;
            border       : 1px solid lightgray;
            padding      : 8px 10px;
            border-radius: 2px;
            font-weight  : 500;
            background   : white;
            font-size    : 115%;
        }
        .triplea-faq-list li .triplea-faq-content {
            display      : none;
            overflow     : hidden;
            border       : 1px solid lightgray;
            border-top   : none;
            border-radius: 2px;
            background   : white;
            padding      : 5px 20px;
        }
        .triplea-faq-list li .triplea-faq-content p {
            font-size: 110%;
        }

        .triplea-faq-collapsible-active, .triplea-faq-collapsible:hover {
            /*background-color: #cccccc !important;*/
            color       : #0071a1;
            border-color: #0071a1 !important;
        }
    </style>
    
    <script>
        let coll = document.getElementsByClassName("triplea-faq-collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("triplea-faq-collapsible-active");
                let content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    let colls2close = document.getElementsByClassName("triplea-faq-collapsible");
                    var j;
                    for (j = 0; j < colls2close.length; j++) {
                        let content2close = colls2close[j].nextElementSibling;
                        if (content2close.style.display === "block") {
                        colls2close[j].classList.remove('triplea-faq-collapsible-active');
                        content2close.style.display = "none";
                        }
                    }
                    content.style.display = "block";
                }
            });
        }
    </script>

    <div id="link-support-feedback" class="triplea-menulink-anchor"></div>
    <div>
        <hr>
        <br>
        <h2>
            Support & feedback
        </h2>
        <p>
            The F.A.Q. might not be enough. If you have <strong>any issue</strong> or simply want to share a <strong>feature request</strong>, reach out to us at
            <a href="mailto:plugin.support@triple-a.io">plugin.support@triple-a.io</a>.
        </p>
        <p>
            We respond to each email as soon as possible. Due to possible timezone differences, we may reply the next day.
        </p>
        <br>
        <br>
    </div>
    <br>

    <script>
        function updatePreviewOnChange() {
            // Nodes to update
            let textNode             = document.getElementById('triplea_preview_text');
            let descNode             = document.getElementById('triplea_preview_description');
            let logoLargeNode        = document.getElementById('triplea_preview_logo_large');
            let logoShortNode        = document.getElementById('triplea_preview_logo_short');
            let ethlogoLargeNode     = document.getElementById('triplea_preview_ethlogo_large');
            let ethlogoShortNode     = document.getElementById('triplea_preview_ethlogo_short');
            let usdtlogoLargeNode    = document.getElementById('triplea_preview_usdtlogo_large');
            let usdtlogoShortNode    = document.getElementById('triplea_preview_usdtlogo_short');
            let defaultlogoLargeNode = document.getElementById('triplea_preview_defaultlogo_large');
            let defaultlogoShortNode = document.getElementById('triplea_preview_defaultlogo_short');

            // Update logo preview
            if (document.getElementById('logo_short').checked) {
                logoLargeNode.style.display        = 'none';
                logoShortNode.style.display        = 'inline-block';
                ethlogoLargeNode.style.display     = 'none';
                ethlogoShortNode.style.display     = 'none';
                usdtlogoLargeNode.style.display    = 'none';
                usdtlogoShortNode.style.display    = 'none';
                defaultlogoLargeNode.style.display = 'none';
                defaultlogoShortNode.style.display = 'none';
            } else if (document.getElementById('logo_large').checked) {
                logoLargeNode.style.display        = 'inline-block';
                logoShortNode.style.display        = 'none';
                ethlogoLargeNode.style.display     = 'none';
                ethlogoShortNode.style.display     = 'none';
                usdtlogoLargeNode.style.display    = 'none';
                usdtlogoShortNode.style.display    = 'none';
                defaultlogoLargeNode.style.display = 'none';
                defaultlogoShortNode.style.display = 'none';
            } else if (document.getElementById('eth_large').checked) {
                ethlogoLargeNode.style.display     = 'inline-block';
                ethlogoShortNode.style.display     = 'none';
                logoLargeNode.style.display        = 'none';
                logoShortNode.style.display        = 'none';
                usdtlogoLargeNode.style.display    = 'none';
                usdtlogoShortNode.style.display    = 'none';
                defaultlogoLargeNode.style.display = 'none';
                defaultlogoShortNode.style.display = 'none';
            } else if (document.getElementById('eth_short').checked) {
                ethlogoLargeNode.style.display     = 'none';
                ethlogoShortNode.style.display     = 'inline-block';
                logoLargeNode.style.display        = 'none';
                logoShortNode.style.display        = 'none';
                usdtlogoLargeNode.style.display    = 'none';
                usdtlogoShortNode.style.display    = 'none';
                defaultlogoLargeNode.style.display = 'none';
                defaultlogoShortNode.style.display = 'none';
            } else if (document.getElementById('usdt_large').checked) {
                usdtlogoLargeNode.style.display    = 'inline-block';
                usdtlogoShortNode.style.display    = 'none';
                logoLargeNode.style.display        = 'none';
                logoShortNode.style.display        = 'none';
                ethlogoLargeNode.style.display     = 'none';
                ethlogoShortNode.style.display     = 'none';
                defaultlogoLargeNode.style.display = 'none';
                defaultlogoShortNode.style.display = 'none';
            } else if (document.getElementById('usdt_short').checked) {
                usdtlogoLargeNode.style.display    = 'none';
                usdtlogoShortNode.style.display    = 'inline-block';
                logoLargeNode.style.display        = 'none';
                logoShortNode.style.display        = 'none';
                ethlogoLargeNode.style.display     = 'none';
                ethlogoShortNode.style.display     = 'none';
                defaultlogoLargeNode.style.display = 'none';
                defaultlogoShortNode.style.display = 'none';
            } else if (document.getElementById('default_large').checked) {
                defaultlogoLargeNode.style.display = 'inline-block';
                defaultlogoShortNode.style.display = 'none';
                logoLargeNode.style.display        = 'none';
                logoShortNode.style.display        = 'none';
                ethlogoLargeNode.style.display     = 'none';
                ethlogoShortNode.style.display     = 'none';
                usdtlogoLargeNode.style.display    = 'none';
                usdtlogoShortNode.style.display    = 'none';
            } else if (document.getElementById('default_short').checked) {
                defaultlogoLargeNode.style.display = 'none';
                defaultlogoShortNode.style.display = 'inline-block';
                logoLargeNode.style.display        = 'none';
                logoShortNode.style.display        = 'none';
                ethlogoLargeNode.style.display     = 'none';
                ethlogoShortNode.style.display     = 'none';
                usdtlogoLargeNode.style.display    = 'none';
                usdtlogoShortNode.style.display    = 'none';
            } else {
                logoLargeNode.style.display = 'none';
                logoShortNode.style.display = 'none';
            }

            // Update description
            if (document.getElementById('desc_default').checked) {
                descNode.innerText = "Secure and easy payment with Cryptocurrency";
                descNode.innerText = "<?php echo __( 'Secure and easy payment with Cryptocurrency', 'triplea-cryptocurrency-payment-gateway-for-woocommerce' ); ?>";
            } else {
                descNode.innerText = document.getElementById('desc_custom_value').value;
            }

            // Update text (payment option title)
            if (document.getElementById('text_default').checked) {
                textNode.innerText = "<?php echo __( 'Cryptocurrency', 'triplea-cryptocurrency-payment-gateway-for-woocommerce' ); ?>";
            } else {
                textNode.innerText = document.getElementById('text_custom_value').value;
            }
        }

        updatePreviewOnChange();
    </script>

<?php
$output = ob_get_contents();
ob_end_clean();
return $output;
