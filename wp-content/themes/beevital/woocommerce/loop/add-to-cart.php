<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** @var WC_Product $product */
$product = $args['product'];

/** @var array $originalArgs */
$originalArgs = $args['originalArguments'];

//die($product->add_to_cart_url());

?>

<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="block_cta">
    <i class="fas fa-plus"></i><?php echo esc_html( $product->add_to_cart_text() ); ?>
</a>
<?php
