<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

    <div class="product_listings">


        <?php /** @var WC_Product_Simple $related_product */
        foreach ( $related_products as $related_product ) : ?>

            <div class="product">
                <div class="image">
                    <?php echo get_the_post_thumbnail($related_product->get_id(),'medium'); ?>
                </div>

                <div class="overlay">

                    <div class="name__price">
                        <div class="name"><a href="<?php echo get_permalink($related_product->get_id()); ?>" title="<?php echo $related_product->get_title(); ?>"><?php echo $related_product->get_title(); ?></a></div>
                        <?php if(bv__isProductVariableById($related_product->get_id())): ?>
                            <div class="price">From <?php echo woocommerce_price($related_product->get_variation_regular_price('min',1)); ?></div>
                        <?php else: ?>
                            <div class="price"><?php echo woocommerce_price($related_product->get_price_including_tax()); ?></div>
                        <?php endif; ?>
                    </div>

                    <a href="<?php echo get_permalink($related_product->get_id()); ?>" class="block_cta">
                        <i class="fas fa-plus"></i>Read more
                    </a>

                </div>
            </div>


        <?php endforeach; ?>



    </div>

	<?php
endif;

wp_reset_postdata();
