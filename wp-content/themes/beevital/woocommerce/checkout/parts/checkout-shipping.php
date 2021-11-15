<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$formatted_destination    = isset( $formatted_destination ) ? $formatted_destination : WC()->countries->get_formatted_address( $package['destination'], ', ' );
$has_calculated_shipping  = ! empty( $has_calculated_shipping );
$show_shipping_calculator = ! empty( $show_shipping_calculator );
$calculator_text          = '';


?>
<div class="section" id="checkout_delivery_options">

    <div class="sub_heading">
        Delivery options
    </div>

    <div class="checkbox_fields">

        <?php if ( $available_methods ) : ?>
            <ul id="shipping_method" class="woocommerce-shipping-methods">
                <?php foreach ( $available_methods as $method ) : ?>
                    <div class="checkbox_field">

                        <input type="radio" name="shipping_method[<?php echo $index; ?>]" data-index="<?php echo $index; ?>" id="shipping_method_<?php echo $index; ?>_<?php echo esc_attr( sanitize_title( $method->id ) ); ?>" value="<?php echo esc_attr( $method->id ); ?>" class="shipping_method" <?php checked( $method->id, $chosen_method, true ); ?> />

                        <!--<input type="radio" name="delivery" id="standard_delivery" checked>-->

                        <label for="shipping_method_<?php echo $index; ?>_<?php echo esc_attr( sanitize_title( $method->id ) ); ?>">

                            <div class="checkbox"></div>

                            <div class="text">
                                <p>
                                    <?php echo wc_cart_totals_shipping_method_label( $method ); ?>
                                </p>
                            </div>


                        </label>

                    </div>

                <?php do_action( 'woocommerce_after_shipping_rate', $method, $index ); endforeach; ?>
            </ul>
        <?php endif; ?>

    </div>

</div>
