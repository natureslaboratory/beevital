<?php get_header(); ?>

<?php
	if(is_tag()){
?>
<div class="container__outer">
<?php if ($posts = bv__getLatestBlogPosts(20, false)) : $p = 0 ?>
    <div class="container__inner mw_1146">
	    <div id="page_intro">
		    <div class="heading large">
				<h1>Posts Tagged '<?php echo $tag; ?>'</h1>
		    </div>
	    </div>
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

                        <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>

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
<?php		
	}
?>

<?php get_footer(); ?>
