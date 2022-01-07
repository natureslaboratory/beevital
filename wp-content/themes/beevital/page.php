<?php get_header(); the_post(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146 <?php if (is_blog()) { echo 'mw_800'; } ?>" id="content-page">
        <h1 class="heading large"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>
