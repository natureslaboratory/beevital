<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="container__outer">
    <div class="container__inner mw_1146" id="checkout">

        <div id="page_intro_wrapper">

            <div id="page_intro">

                <div class="heading large">
                    Payment
                </div>

                <div class="text">
                    <p>
                        We use PayPal and Sage Pay to take credit or debit card payments
                    </p>
                </div>

            </div>

        </div>
        <div id="checkout_steps">
            <?php



            do_action( 'thwmsc_multi_step_tabs', $checkout );
            //do_action( 'thwmsc_multi_step_before_tab_panels', $checkout );
            wc_print_notices();
            ?>

            </div>




            <?php
            /**
            wc_print_notices();

            do_action( 'woocommerce_before_checkout_form', $checkout );

            // If checkout registration is disabled and not logged in, the user cannot checkout
            if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
                echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
                return;
            }

            do_action( 'thwmsc_multi_step_tabs', $checkout );
            do_action( 'thwmsc_multi_step_before_tab_panels', $checkout );
            ?>

            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
            <?php
            do_action( 'thwmsc_multi_step_tab_panels', $checkout );
            **/
            ?>

            <?php //do_action( 'thwmsc_multi_step_after_tab_panels', $checkout ); ?>
            <?php //do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
        </div>
        <?php if(!is_user_logged_in()): ?>
            <div class="section">

                <div id="checkout_intro">

                    <div class="sub_heading">
                        Complete your order faster
                    </div>
                    <p class="woocommerce-form-login-toggle">
                        <a class="showlogin" href="#">Login</a> and use your saved delivery details to speed up the checkout process.
                    </p>

                </div>

            </div>
        <?php endif; ?>
        <div class="section" id="checkout_delivery_options">

            <?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
                <div id="thwmsc-tab-panels" class="thwmsc-tab-panels">

                    <?php do_action( 'thwmsc_multi_step_before_tab_panels', $checkout ); ?>

                    <?php do_action( 'thwmsc_multi_step_tab_panels', $checkout ); ?>

                    <?php do_action( 'thwmsc_multi_step_after_tab_panels', $checkout ); ?>

                </div>
            </form>

            <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
        </div>
    </div>
</div>
