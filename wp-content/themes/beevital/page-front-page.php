<?php /* Template Name: Home Page */ ?>
<?php get_header(); ?>

<div class="container__outer overflow_hidden">

    <!-- HERO -->
    <div id="hero">

        <div class="container__inner mw_1146">

            <div class="content">

                <div class="text">

                    <div class="hashtag">
                        #beevital
                    </div>

                    <div class="heading large">
                        <h1>Propolis</h1>
                        <h2><strong>21st century natural medicine</strong></h2>
                    </div>

                    <p>
                        BeeVital are world-leaders in the development of propolis-based health supplements, supported by the latest scientific research.
                    </p>

                </div>

                <a href="/products" class="block_cta">
                    Shop now
                </a>

                <div class="separator"></div>

                <div class="made_in">
                    <p>
                        Made in Whitby
                        <span class="new_line">United Kingdom</span>
                    </p>
                </div>

            </div>

        </div>

        <div class="image">
            <img src="<?php bv__getThemeImageUrl('home/tincture.webp'); ?>" alt="Propolis Tincture" />
        </div>

        <?php bv__includeTemplate('partials/vertical_icons') ?>

    </div>
    <!-- END OF HERO -->

</div>
<div class="container__outer">

    <!-- BANNER -->
    <div id="banner" class="container__inner mw_1366">

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/free_uk_delivery.webp'); ?>" alt="Delivery" loading="lazy" />
            </div>

            <div class="text">
                <div class="sub_heading">Free UK delivery</div>
                <p>Free delivery on orders over &pound;20</p>
            </div>

        </div>

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/free_returns.webp'); ?>" alt="Returns" loading="lazy" />
            </div>

            <div class="text">
                <div class="sub_heading">Free returns</div>
                <p>30-days free return policy</p>
            </div>

        </div>

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/secured_payments.webp'); ?>" alt="Payments" loading="lazy" />
            </div>

            <div class="text">
                <div class="sub_heading">Secured payments</div>
                <p>We accept all major credit cards</p>
            </div>

        </div>

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/customer_service.webp'); ?>" alt="Service" loading="lazy" />
            </div>

            <div class="text">
                <div class="sub_heading">Customer service</div>
                <p>Excellent customer care</p>
            </div>

        </div>

    </div>
    <!-- END OF BANNER -->

    <!-- SHOP RANGES CTA -->
    <div class="shop_ranges_cta container__inner mw_1366" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/images/home/shop_ranges_bg.webp');">

        <div class="container__inner mw_1146">

            <div class="intro">

                <div class="heading">
                    Enjoy life and <strong>value good health</strong>
                </div>

                <div class="text">
                    <p>
                        Propolis supports the body's natural immune system. Take it as a regular supplement, or apply topically directly to the skin.
                    </p>
                </div>

            </div>

            <ul class="nav">

                <li>
                    <a href="/products/whole-health">
                        Whole Health
                    </a>
                </li>

                <li>
                    <a href="/products/oral-health">
                        Oral Health
                    </a>
                </li>

                <li>
                    <a href="/products/skincare">
                        Skincare
                    </a>
                </li>

                <li>
                    <a href="/products/pollen">
                        Pollen
                    </a>
                </li>

                <li>
                    <a href="/products/honey">
                        Honey
                    </a>
                </li>

            </ul>

            <a href="/products" class="block_cta">
                Shop product ranges
            </a>

            <div class="separator"></div>

            <div class="play_cta">

                <div class="btn_wrapper">
                    <a data-fancybox data-type="html" href="https://www.youtube.com/watch?v=2NZ63-2lnfw" class="btn">
                        <span>Watch a Video</span>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" class="svg-inline--fa fa-play fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
                    </a>
                </div>

                <div class="caption">

                    <div class="sub_heading">
                        Watch our introduction to propolis
                    </div>

                    <p>
                        Our CEO, James Fearnley, is a leading expert in propolis.
                    </p>

                </div>

            </div>

        </div>

    </div>
    <!-- END OF SHOP RANGES CTA -->

    <?php if ($popular = bv__getPopularProducts()) : ?>
        <!-- MOST POPULAR PRODUCTS -->
        <div class="products_partial container__inner mw_1366">

            <div class="container__inner mw_1146">

                <div class="intro">

                    <div class="heading">
                        <strong>Most popular</strong> products
                    </div>

                </div>

            </div>

            <div class="product_listings">

                <?php foreach ($popular as $popularProduct) :

                    $product = bv__isProductVariableById($popularProduct->ID) ? new WC_Product_Variable($popularProduct->ID) : new WC_Product($popularProduct->ID);

                ?>
                    <div class="product">

                        <div class="image">
                            <?= get_the_post_thumbnail($popularProduct->ID, 'medium'); ?>
                        </div>

                        <a href="<?= get_permalink($product->get_id()); ?>" title="<?= $product->get_title(); ?>">
                            <div class="overlay">

                                <div class="name__price">
                                    <div class="name"><?= $product->get_title(); ?></div>
                                    <?php if (bv__isProductVariableById($popularProduct->ID)) : ?>
                                        <div class="price">From <?= wc_price(wc_get_price_including_tax($product)); ?></div>
                                    <?php else : ?>
                                        <div class="price"><?= wc_price(wc_get_price_including_tax($product)); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="block_cta">
                                    <i class="fas fa-plus"></i>View Product
                                </div>
                            </div>
                        </a>

                    </div>
                <?php endforeach; ?>

            </div>

        </div>
        <!-- END OF MOST POPULAR PRODUCTS -->
    <?php endif; ?>

    <!-- NATURES PHARMACIST -->
    <div id="natures_pharmacist" class="container__inner mw_1146">

        <div class="intro">

            <div class="heading">
                Nature’s <strong>pharmacist</strong>
            </div>

            <div class="text">
                <p>
                    The honey bee is nature’s pharmacist, turning plant chemicals into powerful compounds that can help maintain a strong immune system.
                </p>
            </div>

        </div>

        <div class="columns">

            <div class="column">

                <div class="product_type">

                    <div class="sub_heading">
                        Propolis
                    </div>

                    <p>
                        Produced by the honey bee as a natural defence for the beehive, propolis is an astounding material.
                    </p>

                    <p>
                        Comprised of hundreds of chemical compounds, propolis provides all kinds of benefits for bees - and for humans too!
                    </p>

                </div>

            </div>

            <div class="column honey_bee">
                <img src="<?php bv__getThemeImageUrl('home/natures_pharmacist/honey_bee.webp'); ?>" alt="Honey" loading="lazy" />
            </div>

            <div class="column">

                <div class="product_type">

                    <div class="sub_heading">
                        Pollen
                    </div>

                    <p>
                        Bees collect pollen from plants which is then taken back to the hive and stored. Eating pollen can support the body's natural immune defenses.
                    </p>

                </div>

                <div class="product_type">

                    <div class="sub_heading">
                        Honey
                    </div>

                    <p>
                        Honey is known as a delicacy the world over. Our range of pollen and propolis honeys combine various bee products for maximum benefit.
                    </p>

                </div>

            </div>

        </div>

        <a href="/remedies/cold-and-flu" class="block_cta">
            <i class="fas fa-plus"></i>Shop remedies
        </a>

    </div>
    <!-- END OF NATURES PHARMACIST -->

    <!-- SPLIT CTA -->
    <div class="split_cta align_stretch  container__inner mw_1366">

        <div class="box">
            <div>

                <div class="heading">
                    Modern <strong>scientific</strong> techniques, <strong>cutting-edge</strong> health products
                </div>

                <p>
                    We believe in the power of nature and use modern scientific techniques to develop cutting-edge health products. But don’t just take our word for it, why not take a look at the research yourself.
                </p>

                <a href="/propolis" class="inline_cta">
                    Discover more about propolis<i class="far fa-long-arrow-right"></i>
                </a>

            </div>
        </div>

        <div class="image_wrapper">

            <div class="image" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/images/home/scientific_techniques.webp');"></div>

            <div class="caption">
                We Undertake Extensive Research Ourselves and Work with Leading Universities
            </div>

        </div>

    </div>
    <!-- END OF SPLIT CTA -->

    <!-- ACCREDITATION LOGOS -->
    <div class="accreditation_logos">

        <div class="logo">
            <img src="<?php bv__getThemeImageUrl('home/accreditation_logos/iso.webp'); ?>" alt="ISO" loading="lazy" />
        </div>

        <div class="logo">
            <img src="<?php bv__getThemeImageUrl('home/accreditation_logos/soil_association_organic.webp'); ?>" loading="lazy" alt="Organic Certification" />
        </div>

        <div class="logo">
            <img src="<?php bv__getThemeImageUrl('home/accreditation_logos/living_wage_employer.webp'); ?>" loading="lazy" alt="Living Wage Employer" />
        </div>

    </div>
    <!-- END OF ACCREDITATION LOGOS -->

    <!-- SPLIT CTA -->
    <div class="split_cta container__inner mw_1366">

        <div class="image_wrapper">

            <div class="image" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/images/home/james_fearnley.webp');"></div>

            <div class="caption">
                James Fearnley, CEO of BeeVital
            </div>

        </div>

        <div class="split_columns">

            <div class="column">

                <div class="heading">
                    <h2>
                        What exactly is <strong>propolis?</strong>
                    </h2>
                </div>

                <p>
                    Propolis is composed of resin and wax, combined with essential oils and enzymes. It is produced by honey bees as a natural defense for the hive - guarding against bacterial infection.
                </p>

                <a href="/what-is-propolis/" class="inline_cta">
                    Find out more <i class="far fa-long-arrow-right"></i>
                </a>

            </div>

            <div class="column">

                <div class="heading">
                    <h2>
                        How does <strong>propolis</strong> work?
                    </h2>
                </div>

                <p>
                    Propolis is not like a modern pharmaceutical drug. It works by supporting and strengthening the body's natural immune system - helping the body defend itself and repair damage.
                </p>

                <a href="/how-does-propolis-work/" class="inline_cta">
                    Read more about propolis <i class="far fa-long-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>
    <!-- END OF SPLIT CTA -->

</div>
<div class="container__outer">
    <?php if ($posts = bv__getLatestBlogPosts(5, false)) : $p = 0 ?>
        <div class="container__inner mw_1146">

            <?php foreach ($posts as $post) :  ?>
                <div class="remedy_tab_section">

                    <?php if ($p % 2 == 0) : ?>
                        <div class="column text">

                            <div class="heading">
                                <?php echo apply_filters('the_title', $post->post_title); ?>
                            </div>

                            <p>
                                <?php
                                $excerpt = substr(strip_tags($post->post_content), 0, 320);
                                echo $excerpt . "&hellip;";
                                ?>
                            </p>

                            <a href="<?php echo get_permalink($post->ID); ?>" class="inline_cta" title="<?php echo $post->post_title; ?>">
                                <?php echo $post->post_title; ?><i class="far fa-long-arrow-right"></i>
                            </a>

                        </div>


                        <div class="column image">

                            <img src="<?php echo the_post_thumbnail($post->ID, 'large'); ?>" loading="lazy" alt="" />

                        </div>

                    <?php else : ?>

                        <div class="column image">
                            <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                        </div>

                        <div class="column text">

                            <div class="heading">
                                <?php echo apply_filters('the_title', $post->post_title); ?>
                            </div>

                            <p>
                                <?php
                                $excerpt = substr(strip_tags($post->post_content), 0, 320);
                                echo $excerpt . "&hellip;";
                                ?>
                            </p>

                            <a href="<?php echo get_permalink($post->ID); ?>" class="inline_cta" title="<?php echo $post->post_title; ?>">
                                <?php echo $post->post_title; ?><i class="far fa-long-arrow-right"></i>
                            </a>

                        </div>
                    <?php endif; ?>


                </div>
            <?php
                $p++;
            endforeach;
            ?>

        </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>