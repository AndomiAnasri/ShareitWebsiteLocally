=== Cryptocurrency Payment Gateway for WooCommerce ===

Contributors: tripleatechnology, BrianHenryIE, adnanshawkat
Donate link: https://triple-a.io/
Tags: altcoin woocommerce, bitcoin payments, bitcoin, crypto payment gateway, crypto payments
Requires at least: 5.0
Tested up to: 6.0
Stable tag: 1.8.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Start accepting Cryptocurrencies now on your website and diversify your revenue right away. Powered by TripleA.

== Description ==

Secure and Easy way to accept cryptocurrencies on your store.

In under one minute, you can enjoy a user-friendly interface, fast payment, and all the benefits that cryptocurrency payments bring you and your customers.

#### TripleA for WooCommerce

Benefits of installing this plugin:

-   Accept a wide range of cryptocurrencies such as Bitcoin, Lightning Bitcoin, Ethereum, USDC, and USDT.
-   Allow you to receive in local currency (USD, EUR, GBP, or any of our supported [Fiat currencies)](https://triplea-technologies.stoplight.io/docs/triplea-api-doc/6ff5db26b3b16-supported-fiat-currencies)
-   Get settled via bank transfer or withdraw as crypto.
-   Instant confirmation once payment is made.
-   Zero chargebacks.
-   No additional set up cost
-   Lowest 1% Settlement fee
-   Dashboard access for detailed transaction information.

#### Customer’s Journey:

 1. Customer proceeds to checkout and selects one of the displayed cryptocurrencies that you have enabled.
 2. A QR code payment form will be generated and the user complete the payment. We have a 25 minutes fixed locked-in exchange rate to protect customers from price fluctuations.
 3. Once the payment has been made, we provide instant confirmation and the merchant will receive a notification of successful payment.

Watch demo video [here](https://www.youtube.com/watch?v=Y3JZi3WHpYQ)

#### Merchant’s Journey:

 1. Once payment is successful, the merchant will receive their funds on TripleA’s dashboard.
 2. If you chose to settle in fiat, the funds will be sent to your bank account after one business day.
 3. If you chose to settle in crypto, you can withdraw funds to any wallet from your dashboard account


**You can create your account & start accepting crypto payments instantly however you’ll need to finish KYB & KYC (Business Verification) before we can start settling on your account. Please contact** [**sales@triple-a.io**](mailto:sales@triple-a.io)**

#### About TripleA

TripleA helps businesses increase their revenue by enabling crypto payments and payouts, leveraging on the fast-growing 300m+ people using cryptocurrencies.
The company is licensed by MAS, the Monetary Authority of Singapore (Singapore's Central Bank), allowing partners to operate in a fully compliant and regulated environment.
As a licensed entity, terms and conditions apply to settlements and AML, etc. Find out more about us at [Triple-A.io](https://triple-a.io/ "TripleA Payment Gateway website")

== Installation ==

1. Install via the searchable Plugin Directory within your WordPress site's plugin page.
1. (Or: Upload `triplea-cryptocurrency-payment-gateway-for-woocommerce.php` to the `/wp-content/plugins/` directory.)
1. Activate the plugin through the 'Plugins' menu in WordPress.

#### Using a TripleA local currency wallet:

1. Provide merchant key, client id, and client secret on the settings page.
2. Click 'Proceed'. Your TripleA local currency account will be connected to your TripleA dashboard.
3. Settings will be saved, the page will reload automatically and you will be good to go!

#### Customise look & feel

We like to keep things short, clear, and simple.
If you require more than customizing the payment gateway text and logo, let us know at <a href="mailto:plugin.support@triple-a.io">plugin.support@triple-a.io</a>.

Certain WooCommerce plugins might add custom order statuses. We have tried to accommodate this, however carefully test a payment if you change the default settings, and let us know if you're uncertain about anything.

== Frequently Asked Questions ==

= Can customers pay with cryptocurrencies without registering on my website? =

There is no account needed for your clients to pay with cryptocurrencies. They just scan the payment QR code and enter the right amount to pay. Very Easy.

= Which cryptocurrency wallet do you support? =

We support all wallets allowing public keys, meaning BIP 44-compatible HD wallets.

= Can you help me to integrate cryptocurrency payments into my website? =

Of course, our support team is always here to help. <a href="mailto:plugin.support@triple-a.io">Contact us by e-mail</a>.


== Screenshots ==

1. Seamless integration with WooCommerce checkout - Cryptocurrency Payment Gateway by TripleA
2. Appeal and cater to an international audience - Cryptocurrency Payment Gateway by TripleA
3. New settings page


== Changelog ==

= 1.8.1 =
Removed: Personal wallet option was removed & cannot be used anymore.

= 1.8 =
Removed: The signup option was removed from the plugin settings page.
Added: New fields added to add your merchant into the WooCommerce ecosystem.
Fixed: Some minor technical issues fixed.

= 1.7.6 =
Added: Debug logs security enhancement. Users will be asked to enable specific options to print sensitive information into the log
Updated: Language files updated.

= 1.7.5 =
Added: Review notice option dismiss functionality added.
Fix: Some minor bugs with frontend code.
= 1.7.4 =
Removed: Personal Wallet [Expert Mode] is removed though existing user can use this feature but consider updating your wallet to local currency.
Added: Admin notice added.
Fix: Minor code fixation.
Fix: Payment form loading view issue fix.

= 1.7.3 =
Added: Support for choosing preferred currency for settlement from TripleA dashboard while signing up from the plugin.
Fix: Bug in checkout page while debuging is on.

= 1.7.2 =
Added: Preserve settings options added to keep the record of plugin settings in db after deactivating or uninstalling

= 1.7.1 =
Added: Improved compatibility with 3rd party WooCommerce plugins such as 'Payment Gateway Based Fees and Discounts'.
Fix: Some minor bug with api update

= 1.7 =
Added: Allowed multi-crypto payments (ETH, USDT, LNBVC)
Update: Updated the strings to crypto instead of bitcoin
Update: Translate files updated
Fix: Some minor fix to backend option

= 1.6.5 =
Fix: Order pay page checkout issue resolved
Fix: Undefined offset issue on class-rest issue resolved
Update: Strong message added to pay in full on checkout option

= 1.6.4 =
Message update for Master public key of your cryptocurrency wallet field instruction on expert mode.

= 1.6.3 =
Disabling the "place order"(/"waiting for payment") button the on Checkout page when our payment method is selected, to avoid confusing customers.
Added a fix for some sites where our payment gateway shows up for subscription products (it should not appear for these).
Updated real-time updates due to API update.

= 1.6.2 =
Security updates to code dependencies. No change to plugin's features.

= 1.6.1 =
Adding support for testnet cryptocurrency public keys (starting with upub and vpub).

= 1.6.0 =
Improvements to translations. Added/updated French, Spanish, Portuguese, Dutch. Some more text made translatable.
Some important bug fixes added.

= 1.5.7 =
Made a fix allowing the plugin to be disabled :)
Adding debug log messages for checkout form validation.

= 1.5.6 =
Important small fix for merchants experiencing real-time update issues for their orders.

= 1.5.5 =
Minor fix for sites experiencing issues displaying the payment form.

= 1.5.3 =
Minor fix for sites experiencing issues getting the OTP.

= 1.5.2 =
Better public key validation and clearer error messages to assist users having issues with account activation.

= 1.5.1 =
WooCommerce Bundled Products compatibility fix.

= 1.5.0 =
Upgraded the plugin to use a new API by TripleA.
Instant confirmation available when using local currency settlement.
Better checkout page integration, less UI/CSS bugs thanks to iframe loading, and more.
Better account management (sandbox payments available; better email notifications; integration credentials provided..).

= 1.4.8 =
Small change in debug info display.

= 1.4.7 =
Qr code not updated when user paid too little.

= 1.4.6 =
CSS styling improvement to avoid interference with qr code size on some sites.

= 1.4.5 =
Bug fix for users experiencing problems updating product images while other plugins (such as Tera Wallet) are also enabled.

= 1.4.3 =
Minor bug fixes and plugin file structure improvements.

= 1.4.0 =
Payment form expiry now at 25 minutes instead of 15.
Minor QR code related bug fix.
Plugin stability and performance improvements, thanks to open-source contributors.

= 1.3.1 =
Added configuration options for bitcoin payment option in checkout page.
Added order status customisation (only for those who know exactly what they're doing!).
Added debug log settings (enable/disable logging, easily view log, easily clear log).

= 1.2.1 =
Confirmed working with latest WooCommerce v4.0.1 and latest Wordpress (v5.3.2)

= 1.2.0 =
Overhauled plugin settings page, to make things simpler, clearer and hopefully much less confusing for some users.

= 1.1.3 =
Fixed T&C not appearing on some sites with our plugin enabled.

= 1.1.2 =
QR code is now a link. Click or tap to open with default bitcoin wallet (should work on mobile, depends on mobile setup and app used).
Minor improvement added for sites with custom checkout submit buttons.


== Upgrade Notice ==

= 1.8.1 =
Take backup before installing the update

= 1.8 =
Take backup before installing the update

= 1.7.6 =
Simply install the update. No further action needed.

= 1.7.5 =
Simply install the update. No further action needed.

= 1.7.4 =
Simply install the update. No further action needed.

= 1.7.3 =
If you want to choose your preferred currency for settlement from Triple A dashboard then you need to uninstall the plugin & install then signup again.

= 1.7.2 =
Simply install the update. No further action needed.

= 1.7.1 =
Simply install the update. No further action needed.

= 1.7 =
Simply install the update. No further action needed.

= 1.6.5 =
Simply install the update. No further action needed.

= 1.6.4 =
Simply install the update. No further action needed.

= 1.6.3 =
Simply install the update. No further action needed.

= 1.6.2 =
Simply install the update. No further action needed.

= 1.6.1 =
Simply install the update. No further action needed.

= 1.6.0 =
Simply install the update. No further action needed.

= 1.5.7 =
Simply update. No further action needed.

= 1.5.5 =
Minor fixes for sites experiencing issues displaying the payment form.

= 1.5.3 =
Minor fix for sites experiencing issues getting the OTP.

= 1.5.2 =
Better public key validation and clearer error messages to assist users having issues with account activation.

= 1.5.1 =
WooCommerce Bundled Products compatibility fix.

= 1.5.0 =
Upgraded the plugin to use a new API by TripleA.
Instant confirmation available when using local currency settlement.
Better checkout page integration, less UI/CSS bugs thanks to iframe loading, and more.
Better account management (sandbox payments available; better email notifications; integration credentials provided..).

= 1.4.8 =
Small change in debug info display.

= 1.4.7 =
Qr code not updated when user paid too little.

= 1.4.6 =
CSS styling improvement to avoid interference with qr code size on some sites.

= 1.4.5 =
Bug fix for users experiencing problems updating product images while other plugins (such as Tera Wallet) are also enabled.

= 1.4.3 =
No need to update unless the "place order/pay with cryptocurrency" button on your checkout page is misbehaving.

= 1.4.0 =
Please update this plugin, to ensure the best experience for yourself and your customers.
Plugin stability and performance improved. Minor bugfixes included.
Simply let WordPress update the plugin for you, no further action required.

= 1.3.1 =
Apologies for the required bugfix for the encryption system used.
Please update this plugin, to ensure you no users experience problems with placing orders.

= 1.3.0 =
Please update this plugin, to ensure you benefit from the latest improvements.
After updating, no further action is needed but it is recommended that you have a look at the improved settings page and save your preferences.
