<?php get_header(); the_post(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146" id="content-page" style="max-width: 800px">
		<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h1 class="heading large" itemprop="name"><?php the_title(); ?></h1>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
				<div itemprop="text">
				<?php the_content(); ?>
				</div>
			</div>
		</div>
    </div>
</div>
<?php get_footer(); ?>
