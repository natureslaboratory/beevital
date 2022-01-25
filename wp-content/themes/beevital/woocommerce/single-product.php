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
                    <h1><?php the_title(); ?></h1>
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
                                    <img src="<?php echo bv__getRemedyIconUrl($remedy); ?>" alt="BeeVital Propolis" width="38" height="38" />
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
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="leaf" class="svg-inline--fa fa-leaf fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M546.2 9.7c-5.6-12.5-21.6-13-28.3-1.2C486.9 62.4 431.4 96 368 96h-80C182 96 96 182 96 288c0 7 .8 13.7 1.5 20.5C161.3 262.8 253.4 224 384 224c8.8 0 16 7.2 16 16s-7.2 16-16 16C132.6 256 26 410.1 2.4 468c-6.6 16.3 1.2 34.9 17.5 41.6 16.4 6.8 35-1.1 41.8-17.3 1.5-3.6 20.9-47.9 71.9-90.6 32.4 43.9 94 85.8 174.9 77.2C465.5 467.5 576 326.7 576 154.3c0-50.2-10.8-102.2-29.8-144.6z"></path></svg>
            </div>

            <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
            </div>

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/vertical_icons/bee.png'); ?>" alt="Bee Icon" />
            </div>

            <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="equals" class="svg-inline--fa fa-equals fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 304H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32zm0-192H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
            </div>

            <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path></svg>
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
                        <button onclick="javascript:void(0)" class="active" data-tab="description_tab">
                            Description
                        </button>
                    </li>

                    <li>
                        <button onclick="javascript:void(0)" data-tab="how_to_take_tab">
                            How to take
                        </button>
                    </li>

                    <li>
                        <button onclick="javascript:void(0)" data-tab="reviews_tab">
                            Reviews
                        </button>
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

                <div id="product_description" class="product_description">

                    <div class="column">

                        <?php echo apply_filters('the_content', $product->get_description()); ?>
						
						<?php if ($shankar = bv__getExtraProductData($product->get_id(), 'shankar')) : ?>
							<div class="shankar">
	                            <p><strong><a href="/about-us/" title="About Us">Dr. Shankar</a> Says</strong></p>
	                            <a href="/about-us/" title="The Herbal Docs"><img class="herbaldocs" src="/wp-content/themes/beevital/images/products/shankar.webp" alt="Dr Shankar" /></a>
	                            <p>&ldquo;<?php echo $shankar; ?>&rdquo;</p>
							</div>
                        <?php endif; ?>

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
                        
                        <?php if ($herbaldocs = bv__getExtraProductData($product->get_id(), 'herbaldocs')) : ?>
                            <div class="sub_heading">
                                <a href="/herbal-docs/" title="The Herbal Docs">The Herbal Docs</a> Say
                            </div>
							<a href="/herbal-docs/" title="The Herbal Docs"><img class="herbaldocs" src="/wp-content/themes/beevital/images/products/herbaldocs.webp" alt="The Herbal Docs" /></a>
                            <p>&ldquo;<?php echo $herbaldocs; ?>&rdquo;</p>
                        <?php endif; ?>

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
                                    <h2>Key <strong>ingredients</strong></h2>
                                </div>
                                <div class="c-ingredients__grid">
                                    <?php show_ingredients($ingredients) ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>

                </div>

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
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/free_uk_delivery.png'); ?>" alt="Delivery" width="40" height="40" />
            </div>

            <div class="text">
                <div class="sub_heading">Free UK delivery</div>
                <p>Free delivery on orders over &pound;20</p>
                <a href="/delivery-and-returns/" class="inline_cta">Delivery<i class="far fa-long-arrow-right"></i></a>
            </div>

        </div>

        <div class="separator"></div>

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/free_returns.png'); ?>" alt="Returns" width="40" height="40" />
            </div>

            <div class="text">
                <div class="sub_heading">Free returns</div>
                <p>30-days free return policy</p>
                <a href="/delivery-and-returns/" class="inline_cta">Returns<i class="far fa-long-arrow-right"></i></a>
            </div>

        </div>

        <div class="separator"></div>

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/customer_service.png'); ?>" alt="Customer Service" width="40" height="40" />
            </div>

            <div class="text">
                <div class="sub_heading">Customer service</div>
                <p>Excellent customer care</p>
                <a href="/customer-service/" class="inline_cta">Customer Service<i class="far fa-long-arrow-right"></i></a>
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

        $('#product_tabs .tabs_nav li button').click(function(e) {
            e.preventDefault();

            const tabID = $(this).attr('data-tab');

            $('#product_tabs .tabs_nav li button').removeClass('active');
            $('.tab').removeClass('active');

            $(this).addClass('active');
            $('#' + tabID).addClass('active');
        });
    })
</script>
<?php get_footer(); ?>