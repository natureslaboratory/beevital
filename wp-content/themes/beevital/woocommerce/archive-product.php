<?php get_header(); ?>
<div class="container__outer">

    <!-- PAGE INTRO -->
    <div id="page_intro_wrapper">

        <div id="page_intro" class="container__inner mw_1146">

            <div class="heading large">
                Products
            </div>

            <div class="text">
                <p class="large">
                    Browse our full range or propolis products below, or select a category to refine your options.
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
                        <strong><?php echo is_shop() ? 'All' : single_term_title(); ?></strong> <?php echo is_shop() ? 'products' : 'range'; ?>
                    </div>

                    <div class="text">
                        <?php do_action( 'woocommerce_archive_description' ); ?>
                    </div>

                </div>

            </div>

            <div class="product_listings">

                <?php if($products = bv__getProductsForCurrentCategory()) :
                    foreach($products as $_product) : $product = bv__isProductVariableById($_product->ID) ? new WC_Product_Variable($_product->ID) : new WC_Product($_product->ID); ?>
                        <div class="product woocommerce">
                            <div class="image">
                                <?php echo get_the_post_thumbnail($product->get_id(),'medium'); ?>
                            </div>
                            <div class="overlay">
                                <div class="name__price">
                                    <div class="name"><?php echo $product->get_title(); ?></div>

                                    <?php if(bv__isProductVariableById($_product->ID)): ?>
                                        <div class="price">From <?php echo wc_price(wc_get_price_including_tax($product)) ?></div>
                                    <?php else: ?>
                                        <div class="price"><?php echo wc_price(wc_get_price_including_tax($product) ); ?></div>
                                    <?php endif; ?>
                                    <?= wc_review_ratings_enabled() ? wc_get_rating_html( $product->get_average_rating() ) : "" ?>
                                </div>
                                <a href="<?php echo get_permalink($product->get_id()); ?>" class="block_cta">
                                    <i class="fas fa-plus"></i>Read More
                                </a>
                            </div>
                        </div>
                    <?php endforeach;

                endif; ?>

            </div>

        </div>
        <!-- END OF ALL PRODUCTS -->


    </div>

    <!-- BECOME A STOCKIST -->
    <div class="become_stockist_cta">

        <div class="logo">
            <img src="<?php bv__getThemeImageUrl('global/misc/beevital_logo.png'); ?>" />
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
