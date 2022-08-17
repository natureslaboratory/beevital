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
                        <img src="<?php bv__getThemeImageUrl('home/natures_pharmacist/honey_bee.png'); ?>" alt="Honey Bee" />
                    </div>
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
	                
	                <?php if(bv__isRemedy('cold-and-flu')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/cold_and_flu.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Supports the Immune System
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('joints-and-mobility')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/joints_and_mobility.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Reduces Inflammation and Eases Pain
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('skin-conditions')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/skin_conditions.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Can Help With Eczema, Acne and Psoriasis
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('fatigue-and-recovery')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/fatigue_and_recovery.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Helps the Body Recover
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('respiratory-conditions')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/respiratory_conditions.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Helps With Asthma &amp; Allergies
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('oral-hygiene')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/oral_hygiene.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Helps Keep Your Mouth Clean &amp; Healthy
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('cuts-and-burns')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/cuts_and_burns.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Helps Your Body Heal &amp; Prevents Infection
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('digestive-health')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/digestive_health.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Helps Keep Your Gut Healthy
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('healthy-ageing')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/healthy_ageing.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Helps Keep You Healthy As You Age
                    </div>
                    
					<?php } ?>
					
					<?php if(bv__isRemedy('immune-support')){ ?>

                    <div class="image" style="background-image: url('<?php bv__getThemeImageUrl('remedies/immune_support.jpg'); ?>');"></div>

                    <div class="caption">
                        Propolis Provides Effective Immune Support
                    </div>
                    
					<?php } ?>

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
                                    <?php echo get_the_post_thumbnail($product->get_id(),'medium'); ?>
                                </div>

                                <div class="overlay">

                                    <div class="name__price">
                                        <div class="name"><a href="<?php echo get_permalink($product->get_id()); ?>" title="<?php echo $product->get_title(); ?>"><?php echo $product->get_title(); ?></a></div>

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
                                    <?php echo $post->post_title; ?><i class="far fa-long-arrow-right"></i>
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
