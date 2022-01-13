<div class="remedy_tab_section">
	<div class="column text">
		<div class="heading">
			<?php the_title(); ?>
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
		<?php echo get_the_post_thumbnail($post->ID,'large'); ?>
	</div>
</div>