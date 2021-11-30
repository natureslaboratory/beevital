<?php get_header();

global $product;
if (!is_object($product)) {
    $product = wc_get_product(get_the_ID());
}


?>
<div class="container__outer" id="product-<?php the_ID(); ?>">

    <?php do_action('woocommerce_before_single_product'); ?>
    <!-- PRODUCT MAIN -->
    <div id="product_main_wrapper">

        <div id="product_main" <?php wc_product_class("container__inner mw_1366", $product); ?>>

            <div class="image">
                <?php // echo get_the_post_thumbnail(get_the_ID(), 'large'); 
                ?>
                <?php do_action('woocommerce_before_single_product_summary'); ?>
            </div>


            <div class="description">

                <a href="<?php echo get_permalink(bv__getShopPageID()); ?>" class="back_cta">
                    <i class="fas fa-arrow-left"></i>Back
                </a>

                <div class="type">
                    <?php echo wc_get_product_category_list(get_the_ID()); ?>
                    <!-- WHOLE HEALTH -->
                </div>

                <div class="heading">
                    <?php the_title(); ?>
                </div>


                <div class="price">
                    <?= wc_price(wc_get_price_including_tax($product)) ?>
                </div>

                <div class="woocommerce c-rating">
                    <?php woocommerce_template_single_rating() ?>
                </div>
                <!-- Not even tried here have they -->
                <!-- <div class="rating">
                    <div class="stars">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="label">
                        Be the first to rate this
                    </div>

                </div> -->

                <div class="excerpt">

                    <p>
                        <?php echo $product->get_short_description(); ?>
                    </p>

                </div>

                <?php if ($remedies = bv__getRemediesForProduct($product)) : ?>
                    <div class="remedy_list">

                        <div class="label">
                            Remedy for:
                        </div>

                        <div class="remedies">

                            <?php /** @var WP_Term $remedy */ foreach ($remedies as $remedy) : ?>
                                <div class="icon">
                                    <img src="<?php echo bv__getRemedyIconUrl($remedy); ?>" />
                                </div>
                            <?php endforeach; ?>



                        </div>

                    </div>
                <?php endif; ?>

                <?php do_action('woocommerce_template_single_add_to_cart'); ?>



            </div>

        </div>

        <div class="vertical_icons">

            <div class="icon">
                <i class="far fa-seedling"></i>
            </div>

            <div class="icon">
                <i class="fas fa-plus"></i>
            </div>

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/vertical_icons/bee.png'); ?>" />
            </div>

            <div class="icon">
                <i class="fas fa-equals"></i>
            </div>

            <div class="icon">
                <i class="far fa-heart"></i>
            </div>

        </div>

    </div>
    <!-- END OF PRODUCT MAIN -->

    <!-- PRODUCT TABS -->
    <div id="product_tabs">

        <div class="tabs_nav_wrapper">

            <div class="container__inner mw_1146">

                <ul class="tabs_nav">

                    <li>
                        <a href="javascript:void(0)" class="active" data-tab="description_tab">
                            Description
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0)" data-tab="how_to_take_tab">
                            How to take
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0)" data-tab="reviews_tab">
                            Reviews
                        </a>
                    </li>

                </ul>

            </div>

        </div>

        <div class="container__inner mw_1146">

            <!-- DESCRIPTION -->
            <div id="description_tab" class="tab active">

                <div class="sub_heading">
                    Description
                </div>

                <div id="product_description">

                    <div class="column">

                        <?php echo apply_filters('the_content', $product->get_description()); ?>


                    </div>

                    <div class="column box">

                        <?php if ($ingredients = bv__getExtraProductData($product->get_id(), 'ingredients')) : ?>
                            <div class="sub_heading">
                                Ingredients
                            </div>

                            <p>
                                <?php echo $ingredients; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($packaging = bv__getExtraProductData($product->get_id(), 'packaging')) : ?>
                            <div class="sub_heading">
                                Packaging
                            </div>

                            <p>
                                <?php echo $packaging; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($manufactured = bv__getExtraProductData($product->get_id(), 'manufactured')) : ?>
                            <div class="sub_heading">
                                Manufactured
                            </div>

                            <p>
                                <?php echo $manufactured; ?>
                            </p>
                        <?php endif; ?>

                    </div>

                </div>
                <?php

                $ingredients = get_field("ingredients_list");
                function show_ingredients($ingredients)
                {
                    foreach ($ingredients as $i) { ?>
                        <div class="c-ingredient">
                            <img src="<?= $i["ingredient_image"] ?>" alt="">
                            <a href="<?= $i["ingredient_link"] ?>">
                                <h3><?= $i["ingredient_name"] ?></h3>
                            </a>
                            <p><?= $i["ingredient_description"] ?></p>
                        </div>
                    <?php }
                }

                if ($ingredients) { ?>
                    <div class="c-ingredients__wrapper">
                        <div class="l-restrict c-ingredients">
                            <div class="heading c-ingredients__heading">
                                Key <strong>ingredients</strong>
                            </div>
                            <div class="c-ingredients__grid">
                                <?php show_ingredients($ingredients) ?>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>

            </div>
            <!-- END OF DESCRIPTION -->

            <?php if ($howToTake = bv__getExtraProductData($product->get_id(), 'howtotake')) : ?>
                <!-- HOW TO TAKE -->
                <div id="how_to_take_tab" class="tab">

                    <div class="sub_heading">
                        How to take
                    </div>

                    <?php echo apply_filters('the_content', $howToTake); ?>

                </div>
                <!-- END OF HOW TO TAKE -->
            <?php endif; ?>

            <?php if (comments_open()) : ?>
                <!-- REVIEWS -->
                <div id="reviews_tab" class="tab woocommerce">
                    <?php comments_template(); ?>
                    <div class="clear"></div>
                </div>
                <!-- END OF REVIEWS -->
            <?php endif; ?>

        </div>

    </div>
    <!-- END OF PRODUCT TABS -->



    <!-- KEY BENEFITS -->
    <?php if ($benefits = bv__getBenefitsOfPropolis()) : ?>
        <div id="key_benefits_wrapper">

            <div id="key_benefits" class="container__inner mw_1146">

                <div class="heading">
                    4 key <strong>benefits of propolis</strong>
                </div>

                <div class="benefits">
                    <?php foreach ($benefits as $key => $benefit) : ?>
                        <div class="benefit">

                            <div class="number">
                                <?php echo str_pad(((int)$key + 1), 2, '0', STR_PAD_LEFT); ?>.
                            </div>

                            <div class="text">

                                <div class="sub_heading">
                                    <?php echo apply_filters('the_title', $benefit->post_title); ?>
                                </div>

                                <?php echo apply_filters('the_content', $benefit->post_content); ?>

                            </div>

                        </div>

                    <?php endforeach; ?>
                </div>

                <div class="footer">
                    <p>
                        Learn more about the <a href="/propolis" class="inline_cta">benefits of propolis<i class="far fa-long-arrow-right"></i></a>
                    </p>
                </div>

            </div>

        </div>
    <?php endif; ?>
    <!-- END OF KEY BENEFITS -->

    <!-- BANNER -->
    <div id="banner" class="stacked  container__inner mw_1366">

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
                <a href="/delivery-and-returns" class="inline_cta">Read more<i class="far fa-long-arrow-right"></i></a>
            </div>

        </div>

        <div class="separator"></div>

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/customer_service.png'); ?>" />
            </div>

            <div class="text">
                <div class="sub_heading">Customer service</div>
                <p>Excellent customer care</p>
                <a href="/customer-service" class="inline_cta">Read more<i class="far fa-long-arrow-right"></i></a>
            </div>

        </div>

    </div>
    <!-- END OF BANNER -->

    <div class="container__inner mw_1366">

        <!-- RELATED PRODUCTS -->
        <div class="products_partial">

            <div class="container__inner mw_1146">

                <div class="intro">

                    <div class="heading">
                        <strong>Related</strong> products
                    </div>

                </div>

            </div>

            <?php do_action('woocommerce_output_related_products'); ?>

        </div>
        <!-- END OF RELATED PRODUCTS -->

    </div>
</div>
<script>
    jQuery(document).ready(($) => {
        // QUANTITY CHANGER

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
        });


        // TABS

        $('#product_tabs .tabs_nav li a').click(function(e) {
            e.preventDefault();

            const tabID = $(this).attr('data-tab');

            $('#product_tabs .tabs_nav li a').removeClass('active');
            $('.tab').removeClass('active');

            $(this).addClass('active');
            $('#' + tabID).addClass('active');
        });
    })
</script>
<?php get_footer(); ?>