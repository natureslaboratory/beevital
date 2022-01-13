<?php get_header(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146">
	    <div id="page_intro">
		    <div class="heading large">
	        <?php $tag = get_queried_object(); echo "<h1>Tag: " . $tag->name . "</h1>"; print_r($tag);?>
	        <?php $tag->description; ?>
	        <?php $p = 0; ?>
		    </div>
	    </div>

        <div class="c-blog-posts">
        <!-- Loop Begins -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
            <?php get_template_part( 'content/taxonomy-post-tag') ?>
        <?php endwhile; ?>
        </div>

        <?php 
        	
            // posts_nav_link();
            $prevLink = get_previous_posts_link("<i class='far fa-chevron-left'></i> Prev");
            $nextLink = get_next_posts_link("Next <i class='far fa-chevron-right'></i>");
        ?>
        <div class="c-pagination">
            <?= $prevLink ? $prevLink : "<a class='disabled'><i class='far fa-chevron-left'></i> Prev</a>" ?>
            <?= $nextLink ? $nextLink : "<a class='disabled'>Next <i class='far fa-chevron-right'></i></a>" ?>
        </div>

        <?php else : ?>
            
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>