<?php get_header(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146" id="content-page" <?= $post->post_name == "faq" ? "style='max-width: 800px'" : null ?>>
        <h1 class="heading large"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>
