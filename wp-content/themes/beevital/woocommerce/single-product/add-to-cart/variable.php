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

// do_action('woocommerce_before_add_to_cart_form'); 

?>


<form id="variations_form" class="variations_form cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. 
                                                                                                                                                                                                                                                                                        ?>">
    <?php do_action('woocommerce_before_variations_form'); ?>
    <?php

    // Shows product details
    woocommerce_single_variation();

    ?>

    <?php if (empty($available_variations) && false !== $available_variations) : ?>
        <p class="stock out-of-stock"><?php echo esc_html(apply_filters('woocommerce_out_of_stock_message', __('This product is currently out of stock and unavailable.', 'woocommerce'))); ?></p>
    <?php else : ?>
        <div class="options__wrapper" id="options__wrapper">
            <div class="options variations">

                <?php foreach ($attributes as $attribute_name => $options) : $label = wc_attribute_label($attribute_name); ?>
                    <div class="<?php echo strtolower($attribute_name); ?>">
<!--                         <label class="attribute-label"><?php echo $label; ?>: </label> -->
                        <?php
                        wc_dropdown_variation_attribute_options(
                            array(
                                'options'   => $options,
                                'attribute' => $attribute_name,
                                'product'   => $product,
                                'class' => "variation__dropdown"
                            )
                        );
                        echo end($attribute_keys) === $attribute_name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a id="reset_link" class="reset_variations" href="#" style="display:none;grid-row:3">' . esc_html__('Clear Selection', 'woocommerce') . '</a>')) : '';
                        ?>

                    </div>

                <?php endforeach; ?>
            </div>
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

				<div style="display:none;">
	
	                <div class="quantity__wrapper">
	                    <label for="quantity">Qty:</label>
	                    <select name="quantity" id="quantity" class="qty">
	                        <option value="1">1</option>
	                        <option value="2">2</option>
	                        <option value="3">3</option>
	                        <option value="4">4</option>
	                        <option value="5">5</option>
	                        <option value="6">6</option>
	                        <option value="7">7</option>
	                        <option value="8">8</option>
	                        <option value="9">9</option>
	                        <option value="10">10</option>
	                    </select>
	                </div>
                
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

        <script>
            const resetLink = document.getElementById("reset_link");
            const variationsForm = document.getElementById("variations_form");
            variationsForm.appendChild(resetLink);

            const mainPrice = document.getElementsByClassName("price")[0];
            const variationData = document.getElementsByClassName("single-variation")[0];
            var capsules =  document.getElementsByClassName("pa_container-size-capsules")[0];
			if (typeof(capsules) != 'undefined' && capsules != null)
			{
				const variationDropdown = document.getElementsByClassName("pa_container-size-capsules")[0];
			}else{
				const variationDropdown = document.getElementById("pa_multipack");	
			}

            variationDropdown.addEventListener("change", (e) => {
	            console.log('hello');
                if (e.target.value) {
                    mainPrice.style.display = "none";
                } else {
                    mainPrice.style.display = "block";
                }
            })
            
            
            
            const observer = new MutationObserver(m => {
                m.forEach(mr => {
                    console.log("style changed");
                })
            })
            
		
            //observer.observe(variationData, { attributes: true, attributeFilter: ['style'] });

        </script>
        <style>.heading + .price{display:none;}</style>
        <button type="submit" class="single_add_to_cart_button block_cta">
            <i class="fas fa-plus"></i>Add to basket
        </button>




    <?php endif; ?>

    <?php do_action('woocommerce_after_variations_form'); ?>
</form>

<?php
do_action('woocommerce_after_add_to_cart_form');
