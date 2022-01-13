<?php get_header(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146">
        <div id="page_intro">
            <div class="heading large">
                <?php
                echo "<h1>" . ucwords("Blog");
                echo "</h1>"; ?>
            </div>
        </div>
        <div class="c-blog-posts">
            <!-- Loop Begins -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content/taxonomy-post-tag') ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php 
        	
            // posts_nav_link();
            $prevLink = get_previous_posts_link("<i class='far fa-chevron-left'></i> Newer");
            $nextLink = get_next_posts_link("Older <i class='far fa-chevron-right'></i>");
        ?>
        <div class="c-pagination">
            <?= $prevLink ? $prevLink : "<a class='disabled'><i class='far fa-chevron-left'></i> Newer</a>" ?>
            <?= $nextLink ? $nextLink : "<a class='disabled'>Older <i class='far fa-chevron-right'></i></a>" ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>