<?php get_header(); ?>
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_cart_actions' ); ?>
    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
    <div class="container__outer" id="basket">

        <?php do_action( 'woocommerce_before_cart' ); ?>

        <div class="container__inner mw_1146">

            <!-- PAGE INTRO -->
            <div id="page_intro_wrapper">

                <div id="page_intro">

                    <div class="heading large">
                        <h1>Basket</h1>
                    </div>

                    <div class="text">
                        <p>
                            You have <strong><?php echo WC()->cart->get_cart_contents_count(); ?></strong> items at <strong><?php echo WC()->cart->get_cart_subtotal(); ?></strong>
                        </p>
                    </div>

                </div>

            </div>
            <!-- END OF PAGE INTRO -->

            <!-- BANNER -->
            <div id="banner" class="stacked  container__inner mw_1366">

                <div class="column">

                    <div class="icon">
                        <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/secured_payments.png'); ?>" />
                    </div>

                    <div class="text">
                        <div class="sub_heading">Secured payments</div>
                        <p>We accept all major credit cards</p>
                        <a href="/delivery-and-returns" class="inline_cta">Read more<i class="far fa-long-arrow-right"></i></a>
                    </div>

                </div>

                <div class="separator"></div>

                <div class="column">

                    <div class="icon">
                        <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/free_uk_delivery.png'); ?>" />
                    </div>

                    <div class="text">
                        <div class="sub_heading">Free UK delivery</div>
                        <p>Free delivery on orders over &pound;20</p>
                        <a href="/delivery-and-returns" class="inline_cta">Read more<i class="far fa-long-arrow-right"></i></a>
                    </div>

                </div>

                <div class="separator"></div>

                <div class="column">

                    <div class="icon">
                        <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/free_returns.png'); ?>" />
                    </div>

                    <div class="text">
                        <div class="sub_heading">Free returns</div>
                        <p>30-days free return policy</p>
                        <a href="/customer-service" class="inline_cta">Read more<i class="far fa-long-arrow-right"></i></a>
                    </div>

                </div>

            </div>
            <!-- END OF BANNER -->

            <!-- BASKET LISTINGS -->
            <div id="basket_listings">


                <?php if(WC()->cart->get_cart_contents_count() > 0) : ?>
                    <div class="row header">
                        <div class="column product">Product</div>
                        <div class="column quantity">Quantity</div>
                        <div class="column price">Price</div>
                    </div>

                    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        $wcProduct = new WC_Product($cart_item['product_id']);
                        //echo '<pre>';die(print_r($cart_item));
                        ?>

                        <div class="row">

                            <div class="column product">

                                <div class="image">
                                    <?php echo get_the_post_thumbnail($product_id,'post-thumbnail'); ?>
                                </div>

                                <?php if(isset($cart_item['variation_id']) && is_numeric($cart_item['variation_id']) && $cart_item['variation_id'] > 0) : ?>
                                    <div class="name"><p><?php echo bv__getVariationNameById($cart_item['variation_id']); ?></p></div>

                                <?php else: ?>
                                    <div class="name"><p><?php echo $wcProduct->get_title(); ?></p></div>
                                <?php endif; ?>

                            </div>

                            <div class="column quantity">

                                <div class="quantity_select">

                                    <a href="#" class="btn minus">
                                        <i class="fas fa-minus"></i>
                                    </a>

                                    <input type="number" name="cart[<?php echo $cart_item_key; ?>][qty]" step="any" min="1" value="<?php echo $cart_item['quantity']; ?>" />

                                    <a href="#" class="btn plus">
                                        <i class="fas fa-plus"></i>
                                    </a>

                                </div>

                                <a href="<?php echo wc_get_cart_remove_url($cart_item_key); ?>" class="inline_cta">
                                    <i class="far fa-trash"></i>Remove
                                </a>

                            </div>

                            <div class="column price">

                                <p>
                                    <?php
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                    ?>
                                </p>

                            </div>

                        </div>
                    <?php
                    endforeach; ?>

                    <br/>
                    <button disabled="" type="submit" class="block_cta" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
                <?php else:
                    do_action( 'woocommerce_cart_is_empty' );
                endif; ?>


            </div>
            <!-- END OF BASKET LISTINGS -->

            <!-- BASKET CODE INPUT -->
            <?php if(WC()->cart->get_cart_contents_count() > 0) : ?>



                <?php if ( wc_coupons_enabled() ) : ?>
                    <?php bv__woocommerce_checkout_coupon_form(); ?>

                <?php endif; ?>
                <!-- END OF BASKET CODE INPUT -->

                <!-- BASKET FOOTER -->
                <div id="basket_footer">

                    <div class="column delivery_estimate">

                        <div class="sub_heading">
                            Delivery estimate
                        </div>

                        <div class="table">

<!--                            <div class="row">-->
<!---->
<!--                                <div class="column">-->
<!--                                    <p>Order</p>-->
<!---->
<!--                                </div>-->
<!---->
<!--                                <div class="column price">-->
<!--                                    <p>--><?php //echo WC()->cart->get_cart_total(); ?><!--</p>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->

<!--                            <div class="row">-->
<!---->
<!--                                <div class="column">-->
<!--                                    <p>V.A.T</p>-->
<!--                                </div>-->
<!---->
<!--                                <div class="column price">-->
<!--                                    <p>--><?php //echo get_woocommerce_currency_symbol() . number_format(WC()->cart->get_total_tax(),2); ?><!--</p>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->

                            <div class="row">

                                <div class="column">
                                    <p>Subtotal</p>

                                </div>
                                <div class="column price">
                                    <p><?php echo WC()->cart->get_cart_subtotal(); ?></p>
                                </div>
                            </div>
                            <div class="row">

                                <div class="column">
                                    <p>Delivery</p>

                                </div>
                                <div class="column price">
                                    <p><?php echo get_woocommerce_currency_symbol() . WC()->cart->get_shipping_total(); ?></p>
                                </div>
                            </div>
                            <div class="row">

                                <div class="column">
                                    <p>Discount</p>

                                </div>
                                <div class="column price">
                                    <?php if(!empty(WC()->cart->applied_coupons)) :
                                        foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                        <p><?php wc_cart_totals_coupon_label( $coupon ); ?>: <?php wc_cart_totals_coupon_html( $coupon ); ?></p>
                                        <?php endforeach;
                                    else: ?>
                                        <p><?php echo get_woocommerce_currency_symbol(); ?>0.00</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">


                            </div>

                        </div>

                        <!--<div class="sub_heading">
                            Change country
                        </div>

                        <select>
                            <option value="United Kingdom" selected>United Kingdom</option>
                        </select>-->

                    </div>

                    <div class="column continue_to_checkout">

                        <div class="sub_heading">
                            Total
                        </div>

                        <div class="price">
                            <?php wc_cart_totals_order_total_html(); ?>
                        </div>

                        <a href="/checkout" class="block_cta">
                            Continue to checkout<i class="far fa-long-arrow-right"></i>
                        </a>

                        <div class="delivery_time">
<!--
                            <p>
                                Super express delivery in 1-2 days, express delivery in 2-3 days or standard delivery in 3-4 days from our UK warehouse
                            </p>
-->
                        </div>

                        <a href="/products" class="inline_cta">
                            <i class="far fa-long-arrow-left"></i>Back to shopping
                        </a>

                    </div>

                </div>
                <!-- END OF BASKET FOOTER -->

                <!-- BASKET RECOMMENDATIONS -->
                <!--<div id="basket_recommendations">

                    <div class="sub_heading">
                        We recommend
                    </div>

                    <div class="product">

                        <div class="image">
                            <img src="<?php bv__getThemeImageUrl('global/placeholder__product.jpg'); ?>" />
                        </div>

                        <div class="product_details">

                            <div class="name">
                                Propolis Tincture 500ml
                            </div>

                            <p>
                                (Brief marketing message, including benefit of recommendation)
                            </p>

                        </div>

                    </div>

                    <a href="#" class="block_cta">
                        Add to basket - &pound;64.94
                    </a>

                </div>-->
                <!-- END OF BASKET RECOMMENDATIONS -->
            <?php endif; ?>

        </div>
    </div>


</form>
<script>
    jQuery(document).ready(($) => {

        $('.quantity_select .btn').on('click', function(e) {
            e.preventDefault();



            const oldVal = $(this).parent().find('input').val();
            let newVal;


            if ($(this).hasClass('plus')) {
                newVal = parseFloat(oldVal) + 1;
            } else {
                if (oldVal > 1) {
                    newVal = parseFloat(oldVal) - 1;
                } else {
                    newVal = 1;
                }
            }

            $(this).parent().find('input').val(newVal);

            if(newVal !== oldVal){
                $('button[name="update_cart"]').prop('disabled',false);
            }else{
                $('button[name="update_cart"]').prop('disabled',true);
            }
        });
    })
</script>
<?php get_footer(); ?>
