<?php $post = get_post(); ?>
<?php get_header(); the_post(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146" id="content-page">
	    <article>
		    <h1 class="heading large"><?php the_title(); ?></h1>
		    <?php 
			    if ( function_exists('get_field') && get_field('producthighlight') ):
			        $productObj = get_field('producthighlight');
			        $product = wc_get_product($productObj);
			        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $productObj ), 'single-post-thumbnail' );

			        echo '
			        <div class="product-highlight">
			        <a class="close">&times</a>
			        <p>Product Highlight</p>
			        <a href="/product/'.$product->get_slug().'"><img src="'.$image[0].'" alt="'.$product->get_name().'" /></a>
			        <h2><a href="/product/'.$product->get_slug().'">'.$product->get_name().'</a></h2>
			        <p class="price">&pound;'; 
			        echo number_format($product->get_price()*1.2,2);
			        echo '</p>
			        </div>';

			    endif;
		    ?>
		    <div>
				<!-- <ul id="categories-list"><?php bv__outputPostCategoryList(get_the_ID()); ?></ul> -->
				<?php the_content(); ?>
		    </div>
        	<aside>
	        	<section>
		        	<div>
		        		<h2>BeeVital Newsletter</h2>
		        		<p>Get health tips, news and special offers directly in your inbox, once per month.</p>
			        	<form
						  action="https://buttondown.email/api/emails/embed-subscribe/beevital"
						  method="post"
						  target="popupwindow"
						  onsubmit="window.open('https://buttondown.email/beevital', 'popupwindow')"
						  class="embeddable-buttondown-form"
						>
						  <label for="bd-email">Enter your email</label>
						  <input type="email" name="email" id="bd-email" placeholder="you@example.com" />
						  <button type="submit" class="single_add_to_cart_button block_cta">Sign Up</button>
						</form>
		        	</div>
		        	<div>
			        	<h2>Follow Us</h2>
			        	<ul>
				        	<li>
	                        	<a href="https://facebook.com/beevitalpropolis">
								<span>Facebook</span>
								<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
								</a>
				        	</li>
							<li>
								<a href="https://twitter.com/beevitaluk">
								<span>Twitter</span>
								<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
								</a>
							</li>
							<li>
								<a href="https://instagram.com/beevitalpropolis">
								<span>Instagram</span>
								<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
								</a>
							</li>
	                    </ul>
		        	</div>
		        	<div>
			        	<h2>About Us</h2>
			        	<p>BeeVital are world-leaders in the research and development of <a href="https://beevitalpropolis.com/propolis/">propolis</a> health 
			        	products. Our range is backed by 20 years of scientific research, including collaborations with leading universities.</p>
		        	</div>
<!--
		        	<div class="fixed">
			        	<a class="close">&times;</a>
			        	<h2>Support Your Immune System</h2>
			        	<p>Explore our range of natural immune support medicines &amp; natural oral health products.</p>
			        	<p><a class="single_add_to_cart_button block_cta" href="/products/?ref=blog">Shop Now</a></p>
		        	</div>
-->
	        	</section>
        	</aside>
	    </article>
        <div class="c-pagination c-pagination--wide">
            <div class="c-pagination__link-wrapper"><?= get_previous_post_link() ?></div>
            <div class="c-pagination__link-wrapper"><?= get_next_post_link() ?></div>
        </div>
        <h3>Tags</h3>
        <div class="c-tags">
            <?php 
                $tags = get_tags(); 
                // echo "<pre>" . print_r($tags, true) . "</pre>";
                foreach ($tags as $tag) { ?>
                    <a class="c-tag" href="/tag/<?= $tag->slug ?>/"><?= $tag->name ?></a>
                <?php }
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<script>
	jQuery('a.close').click(function(){
		jQuery('.product-highlight').hide();
	})
</script>