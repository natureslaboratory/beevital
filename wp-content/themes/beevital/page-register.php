<?php get_header(); the_post(); ?>
<?php global $post; ?>
<div class="container__outer">
    <div class="container__inner" id="auth">

        <div class="heading">
            <h1><a href="/login">Login</a> or Register</h1>
        </div>

        <div class="form">
            <?php the_content(); ?>
        </div>

    </div>
</div>
<?php get_footer(); ?>
