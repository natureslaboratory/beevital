<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
        <div class="options">
            <div class="quantity_select_wrapper">
                <?php
                do_action('woocommerce_before_add_to_cart_button');

                do_action( 'woocommerce_before_add_to_cart_quantity' ); ?>

				<div style="display:none">

	                <label for="quantity">Qty:</label>
	
	                <div class="quantity_select">
	
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

                <?php do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>
            </div>

        </div>

        <button type="submit" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button block_cta" name="add-to-cart">
            <i class="fas fa-plus"></i>Add to basket - <?= wc_price(wc_get_price_including_tax($product)) ?>
        </button>
        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
