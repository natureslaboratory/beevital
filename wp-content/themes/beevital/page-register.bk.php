<?php get_header(); ?>

<div class="container__outer">
    <div class="container__inner" id="auth">

        <div class="heading">
            <h1><a href="/login">Login</a> or Register</h1>
        </div>

        <div class="form">
            <?php echo do_shortcode('[bv__wc_reg_form]'); ?>
        </div>

    </div>
</div>
<?php get_footer(); ?>
