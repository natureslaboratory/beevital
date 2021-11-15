<?php get_header(); ?>
<form action="<?php echo wp_login_url('/my-account'); ?>" method="post">
<div class="container__outer">

    <div class="container__inner" id="auth">

        <div class="heading">
            Login or <a href="/register">Register</a>
        </div>

        <div class="form">


            <div class="field">
                <label for="username">Username or email address</label>
                <input type="text" id="username" name="log"/>
            </div>

            <div class="field">

                <label for="password" class="flex">
                    <div>Password</div>
                    <a href="/my-account/lost-password">I forgot my password</a>
                </label>

                <div class="password_input">
                    <input type="password" id="password" name="pwd" />

                </div>

            </div>

            <button type="submit" class="block_cta">
                Login
            </button>

        </div>

        <div class="checkbox_field" id="remember_me">

            <input type="checkbox" id="remember_me_checkbox" name="rememberme">

            <label for="remember_me_checkbox">
                <div class="checkbox tick"></div>
                <p>Remember me</p>
            </label>

        </div>

    </div>

</div>
    <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
</form>
<?php get_footer(); ?>
