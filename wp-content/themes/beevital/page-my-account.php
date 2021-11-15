<?php get_header(); the_post(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146" id="content-page">
        <div id="my-account-page">
            <h1 class="heading large"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
