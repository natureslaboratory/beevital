<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;


/** @var WC_Order $order */
/** @var WC_Order_Item_Product[] $orderItems */
$orderItems = $order->get_items();


?>
<div class="container__outer" id="checkout">
    <div class="container__inner mw_1146">
        <div id="page_intro_wrapper">

            <div id="page_intro">

                <div class="heading large">
                    Thank you <?php echo $order->get_billing_first_name(); ?>
                </div>

                <div class="text">
                    <p>
                        Your order has been placed successfully. We have received your payment and are packing your items for delivery.
                    </p>
                </div>

            </div>

        </div>
        <div id="checkout_steps">

            <div class="column disabled">

                <div class="icon">
                    <img src="<?php echo bevital__getThemeImageUrl('global/misc/banner_icons/free_uk_delivery.png'); ?>" />
                </div>

                <div class="sub_heading">
                    Delivery details
                </div>

            </div>

            <div class="separator"></div>

            <div class="column disabled">

                <div class="icon">
                    <img src="<?php echo bevital__getThemeImageUrl('global/misc/banner_icons/secured_payments.png'); ?>" />
                </div>

                <div class="sub_heading">
                    Payment
                </div>

            </div>

            <div class="separator"></div>

            <div class="column">

                <div class="icon">
                    <img src="<?php echo bevital__getThemeImageUrl('global/misc/banner_icons/secured_payments.png'); ?>" />
                </div>

                <div class="sub_heading">
                    Confirmation
                </div>

            </div>

        </div>
        <!-- END OF CHECKOUT STEPS -->

        <!-- CHECKOUT CONFIRMATION -->
        <div id="checkout_confirmation">

            <div class="section order_details">

                <div class="sub_heading">
                    Order details
                </div>

                <div class="order_details">


                    <?php /** @var WC_Order_Item_Product $orderItem */
                        foreach($orderItems as $orderItem) :  ?>
                            <div class="listing">
                                <div class="product">
                                    <div class="image">
                                        <?php echo get_the_post_thumbnail($orderItem->get_product_id(),'medium'); ?>
                                    </div>
                                    <div class="product_details">

                                        <div class="name"><?php echo $orderItem->get_name(); ?></div>
                                        <div class="code">#<?php echo $orderItem->get_id(); ?></div>
                                        <div class="quantity">Qty: <?php echo $orderItem->get_quantity(); ?></div>

                                    </div>
                                </div>
                                <div class="price">
                                    <?php echo get_woocommerce_currency_symbol() . $orderItem->get_total(); ?>
                                </div>
                            </div>
                    <?php endforeach; ?>


                </div>

            </div>

            <div class="section">

                <div class="sub_heading">
                    Total cost
                </div>

                <div class="total_cost">

                    <div class="row">
                        <div class="column">Order</div>
                        <div class="column price">&pound;<?php echo $order->get_subtotal(); ?></div>
                    </div>

                    <div class="row">
                        <div class="column">Discount</div>
                        <div class="column price"><?php echo get_woocommerce_currency_symbol() . $order->get_discount_total(); ?></div>
                    </div>

                    <div class="row">
                        <div class="column"><?php echo $order->get_shipping_method(); ?></div>
                        <div class="column price"><?php echo get_woocommerce_currency_symbol() . $order->get_shipping_total(); ?></div>
                    </div>
                    <div class="row">
                        <div class="column">VAT</div>
                        <div class="column price">&pound;<?php echo $order->get_total_tax(); ?></div>
                    </div>
                    <div class="row">
                        <div class="column">Total</div>
                        <div class="column price">&pound;<?php echo $order->get_total(); ?></div>
                    </div>

                </div>

            </div>

            <div class="section">

                <div class="addresses">

                    <div class="address">

                        <div class="sub_heading">
                            Shipping address
                        </div>

                        <p>

                            <?php echo $order->get_formatted_shipping_address(); ?>

                        </p>

                    </div>

                    <div class="address">

                        <div class="sub_heading">
                            Billing address
                        </div>

                        <p>
                            <?php echo $order->get_formatted_billing_address(); ?>
                        </p>

                    </div>

                </div>

            </div>

            <div class="section">

                <div class="sub_heading">
                    Payment method
                </div>

                <div class="payment_method">
                    <?php echo $order->get_payment_method_title(); ?>

                </div>

            </div>

        </div>
    </div>
</div>
