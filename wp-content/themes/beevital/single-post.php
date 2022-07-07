<?php get_header(); the_post(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146" id="content-page">
	    <article>
        <h1 class="heading large"><?php the_title(); ?></h1>
        <!-- <ul id="categories-list"><?php bv__outputPostCategoryList(get_the_ID()); ?></ul> -->
        <?php the_content(); ?>
        	<aside>
	        	<div>
		        	<h2>About the Author</h2>
		        	<p>Jack lives in Whitby with his family. He loves long distance running, live music and enjoying the great outdoors. Since joining 
			        	BeeVital in 2021 he's taken a keen interest in propolis, with particular interest in how it can be used to support the body's 
			        	immune system and improve the immune response.</p>
	        	</div>
	        	<div>
	        		<h2>Get Great Articles in Your Inbox</h2>
		        	<form
					  action="https://buttondown.email/api/emails/embed-subscribe/beevital"
					  method="post"
					  target="popupwindow"
					  onsubmit="window.open('https://buttondown.email/beevital', 'popupwindow')"
					  class="embeddable-buttondown-form"
					>
					  <label for="bd-email">Enter your email</label>
					  <input type="email" name="email" id="bd-email" placeholder="you@example.com" />
					  <input type="submit" value="Sign Up" />
					</form>
	        	</div>
	        	<div>
		        	<h2>Follow Us for Health &amp; Wellbeing Tips</h2>
		        	<ul>
                        <li><a href="https://www.facebook.com/beevitalpropolis" target="_blank">Facebook</a></li>
                        <li><a href="https://twitter.com/beevitaluk" target="_blank">Twitter</a></li>
                        <li><a href="https://www.instagram.com/beevitalpropolis/" target="_blank">Instagram</a></li>
                    </ul>
	        	</div>
        	</aside>
	    </article>
        <h3>Previous/Next Post</h3>
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
