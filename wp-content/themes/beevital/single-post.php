<?php get_header(); the_post(); ?>
<div class="container__outer">
    <div class="container__inner mw_1146" id="content-page" style="max-width: 800px">
        <h1 class="heading large"><?php the_title(); ?></h1>
        <!-- <ul id="categories-list"><?php bv__outputPostCategoryList(get_the_ID()); ?></ul> -->
        <?php the_content(); ?>
        <div class="c-pagination c-pagination--wide">
            <div class="c-pagination__link-wrapper"><?= get_previous_post_link() ?></div>
            <div class="c-pagination__link-wrapper"><?= get_next_post_link() ?></div>
        </div>
        <div class="c-tags">
            <?php 
                $tags = get_tags(); 
                // echo "<pre>" . print_r($tags, true) . "</pre>";
                foreach ($tags as $tag) { ?>
                    <a class="c-tag" href="/tag/<?= $tag->slug ?>"><?= $tag->name ?></a>
                <?php }
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
