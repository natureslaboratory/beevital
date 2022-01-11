<?php get_header(); ?>
<div class="color_bg">
    <div class="container__outer">
        <!-- PAGE INTRO -->
        <div id="page_intro_wrapper">

            <div id="page_intro" class="with_image remedies  container__inner mw_1146">

                <div>

                    <div class="heading large">
                        Remedies
                    </div>

                    <div class="text">
                        <p class="large">
                             Propolis offers an array of benefits for many ailments and is one of nature’s richest sources of bioflavonoids for immune support. 
                        </p>
                    </div>

                </div>

                <div class="image_wrapper">
                    <div class="image">
                        <img src="<?php bv__getThemeImageUrl('home/natures_pharmacist/honey_bee.png'); ?>"/>
                    </div>
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
                    <img src="<?php bv__getThemeImageUrl('global/misc/vertical_icons/bee.png'); ?>"/>
                </div>

                <div class="icon">
                    <i class="fas fa-equals"></i>
                </div>

                <div class="icon">
                    <i class="far fa-heart"></i>
                </div>

            </div>

        </div>
        <!-- END OF PAGE INTRO -->

        <!-- TABS NAV -->
        <div class="tabs_nav_wrapper dark">

            <ul class="tabs_nav container__inner mw_1366" id="remedies_tabs_nav">

                <li>
                    <a href="/remedies/cold-and-flu" class="<?php echo bv__isRemedy('cold-and-flu') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/cold_and_flu.png'); ?>"/>
                        </div>
                        Cold <span class="new_line">and flu</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/joints-and-mobility" class="<?php echo bv__isRemedy('joints-and-mobility') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/joints_and_mobility.png'); ?>"/>
                        </div>
                        Joints <span class="new_line">and mobility</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/skin-conditions" class="<?php echo bv__isRemedy('skin-conditions') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/skin_conditions.png'); ?>"/>
                        </div>
                        Skin <span class="new_line">conditions</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/fatigue-and-recovery" class="<?php echo bv__isRemedy('fatigue-and-recovery') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/fatigue_and_recovery.png'); ?>"/>
                        </div>
                        Fatigue <span class="new_line">and recovery</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/respiratory-conditions" class="<?php echo bv__isRemedy('respiratory-conditions') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/respiratory_conditions.png'); ?>"/>
                        </div>
                        Respiratory <span class="new_line">conditions</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/oral-hygiene" class="<?php echo bv__isRemedy('oral-hygiene') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/oral_hygiene.png'); ?>"/>
                        </div>
                        Oral <span class="new_line">hygiene</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/cuts-and-burns" class="<?php echo bv__isRemedy('cuts-and-burns') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/cuts_and_burns.png'); ?>"/>
                        </div>
                        Cuts <span class="new_line">and burns</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/digestive-health" class="<?php echo bv__isRemedy('digestive-health') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/digestive_health.png'); ?>"/>
                        </div>
                        Digestive <span class="new_line">health</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/healthy-ageing" class="<?php echo bv__isRemedy('healthy-ageing') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/healthy_ageing.png'); ?>"/>
                        </div>
                        Healthy <span class="new_line">ageing</span>
                    </a>
                </li>

                <li>
                    <a href="/remedies/immune-support" class="<?php echo bv__isRemedy('immune-support') ? 'active' : ''; ?>">
                        <div class="icon">
                            <img src="<?php bv__getThemeImageUrl('global/misc/remedy_icons/immune_support.png'); ?>"/>
                        </div>
                        Immune <span class="new_line">support</span>
                    </a>
                </li>

            </ul>

            <select class="tabs_mobile_nav" id="remedies_tabs_mobile_nav">
                <option value="/remedies/cold-and-flu" <?php echo bv__isRemedy('cold-and-flu') ? 'selected' : ''; ?>>Cold and flu</option>
                <option value="/remedies/joints-and-mobility" <?php echo bv__isRemedy('joints-and-mobility') ? 'selected' : ''; ?>>Joints and mobility</option>
                <option value="/remedies/skin-conditions" <?php echo bv__isRemedy('skin-conditions') ? 'selected' : ''; ?>>Skin conditions</option>
                <option value="/remedies/fatigue-and-recovery" <?php echo bv__isRemedy('fatigue-and-recovery') ? 'selected' : ''; ?>>Fatigue and recovery</option>
                <option value="/remedies/respiratory-conditions" <?php echo bv__isRemedy('respiratory-conditions') ? 'selected' : ''; ?>>Respiratory conditions</option>
                <option value="/remedies/oral-hygiene" <?php echo bv__isRemedy('oral-hygiene') ? 'selected' : ''; ?>>Oral hygiene</option>
                <option value="/remedies/cuts-and-burns" <?php echo bv__isRemedy('cuts-and-burns') ? 'selected' : ''; ?>>Cuts and burns</option>
                <option value="/remedies/digestive-health" <?php echo bv__isRemedy('digestive-health') ? 'selected' : ''; ?>>Digestive health</option>
                <option value="/remedies/healthy-ageing" <?php echo bv__isRemedy('healthy-ageing') ? 'selected' : ''; ?>>Healthy ageing</option>
                <option value="/remedies/income-support" <?php echo bv__isRemedy('income-support') ? 'selected' : ''; ?>>Immune support</option>
            </select>

        </div>
        <!-- END OF TABS NAV -->
    </div>
</div>
<!-- END OF COLOR BG -->

<div id="cold_and_flu_tab" class="tab active  main">

    <!-- COLOR BG -->
    <div class="color_bg">

        <div class="container__outer">

            <div class="container__inner mw_1146">

                <div class="main_header">

                    <div class="heading">
                        <!--<strong>Cold</strong> and flu-->
                        <h1><?php echo single_term_title(); ?></h1>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- END OF COLOR BG -->

    <div class="container__outer">

        <div class="container__inner mw_1146">

            <div class="main_intro">

                <div class="column mw_410">
                    <?php do_action( 'woocommerce_archive_description' ); ?>



                </div>

                <div class="column image_wrapper">

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/cold_and_flu.jpg'); ?>');"></div>

                    <div class="caption">
                        How Does Propolis Support the Immune System?
                    </div>

                </div>

            </div>

        </div>


        <div class="container__inner mw_1366">

            <!-- COLD AND FLU PRODUCTS -->
            <div class="products_partial">

                <div class="container__inner mw_1146">

                    <div class="intro">

                        <div class="heading">
                            <strong>Browse our</strong> <?php echo bv__getCurrentCategoryName(); ?> products
                        </div>

                    </div>

                </div>

                <div class="product_listings">

                    <?php if($products = bv__getProductsForCurrentRemedy(30,true)) : ?>
                        <?php foreach($products as $_product) : $product = bv__isProductVariableById($_product->ID) ? new WC_Product_Variable($_product->ID) : new WC_Product($_product->ID); ?>
                            <div class="product">

                                <div class="image">
                                    <a href="<?php echo get_permalink($product->get_id()); ?>"
	                                    <?php echo get_the_post_thumbnail($product->get_id(),'medium'); ?>
		                            </a>
                                </div>

                                <div class="overlay">

                                    <div class="name__price">
                                        <div class="name"><?php echo $product->get_title(); ?></div>

                                        <?php if(bv__isProductVariableById($_product->ID)): ?>
                                        <div class="price">From <?php echo woocommerce_price( $product->get_price_including_tax() ); ?></div>
                                    <?php else: ?>
                                        <div class="price"><?php echo woocommerce_price( $product->get_price_including_tax() ); ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <a href="<?php echo get_permalink($product->get_id()); ?>" class="block_cta">
                                        <i class="fas fa-plus"></i>Read More
                                    </a>

                                </div>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

            </div>
            <!-- END OF COLD AND FLU PRODUCTS -->

        </div>
		
		<?php if($posts = bv__getLatestBlogPosts(5,true)) : $p = 0 ?>
            <div class="container__inner mw_1146">

                <?php foreach($posts as $post) :  ?>
                    <div class="remedy_tab_section">

                        <?php if($p % 2 == 0) : ?>
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

                            </div>


                            <div class="column image">

                                <?php echo get_the_post_thumbnail($post->ID,'large'); ?>
								
                            </div>

                        <?php else: ?>

                            <div class="column image">
                                <?php echo get_the_post_thumbnail($post->ID,'large'); ?>
                            </div>

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

                            </div>
                        <?php endif; ?>


                    </div>
                <?php 
				$p++;
				endforeach; 
				?>

            </div>
        <?php endif; ?>
    </div>

</div>

<script>
    jQuery(document).ready(($) => {
        $('#remedies_tabs_mobile_nav').change(function() {

            const url = $(this).val();

            window.location.href = url;
        });
    })
</script>
<?php get_footer(); ?>
