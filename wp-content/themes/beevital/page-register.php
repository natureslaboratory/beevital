<?php get_header(); ?>

<div class="container__outer">
    <div class="container__inner" id="auth">

        <div class="heading">
            <a href="/login">Login</a> or Register
        </div>

        <div class="form">
            <?php echo do_shortcode('[bevital__wc_reg_form]'); ?>

        </div>

    </div>
</div>
<?php get_footer(); ?>
