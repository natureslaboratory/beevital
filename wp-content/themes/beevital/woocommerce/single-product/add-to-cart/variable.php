<?php

/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

defined('ABSPATH') || exit;

global $product;

$attribute_keys  = array_keys($attributes);
$variations_json = wp_json_encode($available_variations);
$variations_attr = function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true);

do_action('woocommerce_before_add_to_cart_form'); ?>

<form class="variations_form cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok.
                                                                                                                                                                                                                                                                                        ?>">
    <?php

    // Shows product details
    woocommerce_single_variation();

    ?>
    <?php do_action('woocommerce_before_variations_form'); ?>

    <?php if (empty($available_variations) && false !== $available_variations) : ?>
        <p class="stock out-of-stock"><?php echo esc_html(apply_filters('woocommerce_out_of_stock_message', __('This product is currently out of stock and unavailable.', 'woocommerce'))); ?></p>
    <?php else : ?>
        <div class="options variations">

            <?php foreach ($attributes as $attribute_name => $options) : $label = wc_attribute_label($attribute_name); ?>
                <div class="<?php echo strtolower($attribute_name); ?>">
                    <label class="attribute-label"><?php echo $label; ?>: </label>
                    <?php
                    wc_dropdown_variation_attribute_options(
                        array(
                            'options'   => $options,
                            'attribute' => $attribute_name,
                            'product'   => $product
                        )
                    );
                    echo end($attribute_keys) === $attribute_name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__('Clear Selection', 'woocommerce') . '</a>')) : '';
                    ?>

                </div>

            <?php endforeach; ?>



            <div class="quantity_select_wrapper">
                <?php
                /**
                 * Hook: woocommerce_before_single_variation.
                 */

                do_action('woocommerce_before_single_variation');

                /**
                 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
                 *
                 * @since 2.4.0
                 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                 */
                //do_action( 'woocommerce_single_variation' );


                do_action('woocommerce_before_add_to_cart_button');

                do_action('woocommerce_before_add_to_cart_quantity'); ?>


                <label for="quantity">Qty:</label>

                <div class="quantity_select">

<!--
                    <a href="#" class="btn minus">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="minus" class="svg-inline--fa fa-minus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span>Reduce Quantity</span>
                    </a>

                    <input type="number" name="quantity" id="quantity" class="qty" step="any" min="1" value="1" />

                    <a href="#" class="btn plus">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        <span>Increase Quantity</span>
                    </a>
-->

					<select name="quantity" id="quantity" class="qty">
						<option vaue="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option valuw="8">8</option>
						<option valuw="9">9</option>
						<option value="10">10</option>						
					</select>

                </div>

                <?php do_action('woocommerce_after_add_to_cart_quantity');

                do_action('woocommerce_after_add_to_cart_button'); ?>


                <input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>" />
                <input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>" />
                <input type="hidden" name="variation_id" class="variation_id" value="0" />

                <?php

                /**
                 * Hook: woocommerce_after_single_variation.
                 */
                do_action('woocommerce_after_single_variation');
                ?>
            </div>

        </div>

        <button type="submit" class="single_add_to_cart_button block_cta">
            <i class="fas fa-plus"></i>Add to basket
        </button>


    <?php endif; ?>

    <?php do_action('woocommerce_after_variations_form'); ?>
</form>

<?php
do_action('woocommerce_after_add_to_cart_form');
