<?php get_header(); ?>
<div class="container__outer">

    <!-- PAGE INTRO -->
    <div id="page_intro_wrapper">

        <div id="page_intro" class="container__inner mw_1146">

            <div class="heading large">
                Search results
            </div>

            <div class="text">
                <p class="large">
                    Below are your search results for "<?php echo $_GET['s']; ?>". You can navigate between tabs to see products, information or news.
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
                <a href="#" class="active" data-tab="products_tab">
                    Products
                </a>
            </li>

            <li>
                <a href="#" data-tab="information_tab">
                    Information
                </a>
            </li>

            <li>
                <a href="#" data-tab="news_tab">
                    Articles
                </a>
            </li>

        </ul>

        <select class="tabs_mobile_nav" id="products_tabs_mobile_nav">
            <option data-tab="products_tab">Products</option>
            <option data-tab="information_tab">Information</option>
            <option data-tab="news_tab">Articles</option>
        </select>

    </div>
    <!-- END OF TABS NAV -->


    <div class="container__inner mw_1366">


        <div id="products_tab" class="tab active  main">

            <div class="container__inner mw_1146">

                <div class="main_header">

                    <div class="heading">
                        <strong>Products</strong> results
                    </div>


                    <?php if($products = bv__getSearchProductResults()) : ?>
                        <div class="product_listings">
                            <?php foreach($products as $product) : ?>
                                <div class="product">
                                    <div class="image">
                                        <?php echo get_the_post_thumbnail($product->get_id(),'medium'); ?>
                                    </div>
                                    <div class="overlay">
                                        <div class="name__price">
                                            <div class="name"><?php echo $product->get_title(); ?></div>

                                            <?php if(bv__isProductVariableById($product->get_id())): ?>
                                                <div class="price"><?php echo get_woocommerce_currency_symbol() .  $product->get_variation_regular_price('min') . ' - ' . get_woocommerce_currency_symbol() .  $product->get_variation_regular_price('max'); ?></div>
                                            <?php else: ?>
                                                <div class="price"><?php echo $product->get_price_html(); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <a href="<?php echo get_permalink($product->get_id()); ?>" class="block_cta">
                                            <i class="fas fa-plus"></i>Read More
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No Products Found</p>
                    <?php endif; ?>


                </div>

            </div>
        </div>

        <div id="information_tab" class="tab main">

            <div class="container__inner mw_1146">

                <div class="main_header">

                    <div class="heading">
                        <strong>Information</strong> results
                    </div>

                    <?php if($pages = bv__getSearchPageResults()) : ?>

                        <?php foreach($pages as $page) : ?>
                            <div class="text">
                                <p>
                                    <a href="<?php echo get_permalink($page->ID); ?>"><?php echo apply_filters('the_title',$page->post_title); ?></a>
                                </p>
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <p>No Information Found.</p>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <div id="news_tab" class="tab main">

            <div class="container__inner mw_1146">

                <div class="main_header">

                    <div class="heading">
                        <strong>Article</strong> results
                    </div>

                    <?php if($posts = bv__getSearchPostResults()) : ?>

                        <?php foreach($posts as $post) : ?>
                            <div class="column text">

                                <div class="heading">
                                    <?php echo apply_filters('the_title',$post->post_title); ?>
                                </div>
                                
								<p>
                                <?php 
								$excerpt = substr(strip_tags($post->post_content),0,320);
								echo $excerpt."&hellip;"; 
								?>
								</p>

                                <a href="<?php echo get_permalink($post->ID); ?>" class="inline_cta" title="<?php echo $post->post_title; ?>">
                                    Read more<i class="far fa-long-arrow-right"></i>
                                </a>
								<br /><br /><br /><br /><br /><br />
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <p>No relevant articles found.</p>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</div>
<script>

    jQuery(document).ready(($)=> {

        // TABS

        $('#products_tabs_nav li a').click(function (e) {
            e.preventDefault();

            const tabID = $(this).attr('data-tab');

            $('#products_tabs_nav li a').removeClass('active');
            $('.tab').removeClass('active');

            $(this).addClass('active');
            $('#' + tabID).addClass('active');
        });

        $('#products_tabs_mobile_nav').change(function () {
            const tabID = $(this).find(':selected').attr('data-tab');

            $('.tab').removeClass('active');
            $('#' + tabID).addClass('active');
        });
    });

</script>
<?php get_footer(); ?>
