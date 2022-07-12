<?php get_header(); ?>
<?php

global $wp_query;
// echo "<pre>" . print_r($wp_query, true) . "</pre>"
?>

<div class="container__outer">

    <!-- PAGE INTRO -->
    <div id="page_intro_wrapper">

        <div id="page_intro" class="container__inner mw_1146">

            <div class="heading large">
                Immune Support Medicines
            </div>

            <div class="text">
                <p class="large">
                	Natural medicines which support your whole health. Backed by over 20 years of scientific research, formulated &amp; manufactured by our expert team.
                </p>
            </div>

        </div>

        <?php bv__includeTemplate('partials/vertical_icons') ?>


    </div>
    <!-- END OF PAGE INTRO -->

    <!-- TABS NAV -->
    <div class="tabs_nav_wrapper">

        <ul class="tabs_nav container__inner mw_1146" id="products_tabs_nav">

            <li>
                <a href="/products" class="<?php echo is_shop() ? 'active' : ''; ?>">
                    All products
                </a>
            </li>

            <li>
                <a href="/products/whole-health/" class="<?php echo bv__isProductCategory('whole-health') ? 'active' : '' ?>">
                    Whole Health
                </a>
            </li>

            <li>
                <a href="/products/oral-health" class="<?php echo bv__isProductCategory('oral-health') ? 'active' : '' ?>">
                    Oral Health
                </a>
            </li>

            <li>
                <a href="/products/skincare" class="<?php echo bv__isProductCategory('skincare') ? 'active' : '' ?>">
                    Skincare
                </a>
            </li>

            <li>
                <a href="/products/pollen" class="<?php echo bv__isProductCategory('pollen') ? 'active' : '' ?>">
                    Pollen
                </a>
            </li>

            <li>
                <a href="/products/honey" class="<?php echo bv__isProductCategory('honey') ? 'active' : '' ?>">
                    Honey
                </a>
            </li>

            <li>
                <a href="/products/books" class="<?php echo bv__isProductCategory('books') ? 'active' : '' ?>">
                    Books
                </a>
            </li>

        </ul>

        <select class="tabs_mobile_nav" id="products_tabs_mobile_nav">
            <option value="/products" <?php echo is_shop() ? 'selected' : ''; ?>>All products</option>
            <option value="/products/whole-health" <?php echo bv__isProductCategory('whole-health') ? 'selected' : ''; ?>>Whole Health</option>
            <option value="/products/oral-health" <?php echo bv__isProductCategory('oral-health') ? 'selected' : ''; ?>>Oral Health</option>
            <option value="/products/skincare" <?php echo bv__isProductCategory('skincare') ? 'selected' : ''; ?>>Skincare</option>
            <option value="/products/pollen" <?php echo bv__isProductCategory('pollen') ? 'selected' : ''; ?>>Pollen</option>
            <option value="/products/honey" <?php echo bv__isProductCategory('honey') ? 'selected' : ''; ?>>Honey</option>
        </select>

    </div>
    <!-- END OF TABS NAV -->


    <div class="container__inner mw_1366">

        <!-- ALL PRODUCTS -->
        <div id="all_products_tab" class="tab active main">

            <div class="container__inner mw_1146">

                <div class="main_header">

                    <div class="heading">
                        <h1><strong><?php echo is_shop() ? 'All' : single_term_title(); ?></strong> <?php echo is_shop() ? 'our medicines' : 'range'; ?></h1>
                    </div>

                    <div class="text">
                        <?php do_action('woocommerce_archive_description'); ?>
                    </div>

                </div>

            </div>

            <div class="product_listings">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php global $product; ?>
                        <div class="product woocommerce">
                            <div class="image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <a href="<?= get_permalink($product->get_id()); ?>" title="<?= $product->get_title(); ?>">
                                <div class="overlay">
                                    <div class="name__price">
                                        <div class="name"><?= $product->get_title(); ?></div>
                                        <?php if (bv__isProductVariableById(get_the_ID())) : ?>
                                            <?php
                                                $variation_ids = $product->get_children();
                                                $in_stock = false;
                                                foreach ($variation_ids as $id) {
                                                    $variation = wc_get_product($id);
                                                    if ($variation->is_in_stock()) {
                                                        $in_stock = true;
                                                        break;
                                                    }
                                                }
                                                if (!$in_stock) {
                                                    echo "<p class='product__out-of-stock'>Out Of Stock</p>";
                                                }
                                            ?>
                                            <div class="price">From <?= wc_price(wc_get_price_including_tax($product)) ?></div>
                                        <?php else : ?>
                                            <?= $product->is_in_stock() ? "" : "<p class='product__out-of-stock'>Out Of Stock</p>"; ?>
                                            <div class="price"><?= wc_price(wc_get_price_including_tax($product)); ?></div>
                                        <?php endif; ?>
                                        <?= wc_review_ratings_enabled() ? wc_get_rating_html($product->get_average_rating()) : "" ?>
                                    </div>
                                    <div class="block_cta">
                                        <i class="fas fa-plus"></i>Read More
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile;
                else : ?>
                    <li><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></li>
                <?php endif; ?>
            </div>
            <?php do_action('woocommerce_after_shop_loop'); ?>

        </div>
        <!-- END OF ALL PRODUCTS -->


    </div>

    <!-- BECOME A STOCKIST -->
    <div class="become_stockist_cta">

        <div class="logo">
            <img src="<?php bv__getThemeImageUrl('global/misc/beevital_logo.png'); ?>" alt="BeeVital Propolis" />
        </div>

        <div class="text">

            <div class="heading">
                Become a stockist
            </div>

            <p>
                Would you like to stock BeeVital products in your physical shop or online? We're looking to partner with health practitioners and retailers.
            </p>

            <a href="/become-a-stockist" class="inline_cta">
                How to apply to become a stockist<i class="far fa-long-arrow-right"></i>
            </a>

        </div>

    </div>
    <!-- END OF BECOME A STOCKIST -->

</div>
<script>
    jQuery(document).ready(($) => {

        $('#products_tabs_mobile_nav').change(function() {

            const url = $(this).val();

            window.location.href = url;
        });

    });
</script>
<?php get_footer(); ?>