<div class="container__inner" id="auth">

    <div class="heading">
        Login or <a href="/register">Register</a>
    </div>

    <div class="form">

        <form action="<?php echo wp_login_url(); ?>">

            <div class="field">
                <label for="username">Username or email address</label>
                <input type="text" id="username" />
            </div>

            <div class="field">

                <label for="password" class="flex">
                    <div>Password</div>
                    <a href="/my-account/lost-password">I forgot my password</a>
                </label>

                <div class="password_input">
                    <input type="password" id="password" />
                    <a href="#" class="inline_cta"><i class="fas fa-eye-slash"></i>Show</a>
                </div>

            </div>

            <button type="submit" class="block_cta">
                Login
            </button>
        </form>

    </div>

    <div class="checkbox_field" id="remember_me">

        <input type="checkbox" id="remember_me_checkbox">

        <label for="remember_me_checkbox">
            <div class="checkbox tick"></div>
            <p>Remember me</p>
        </label>

    </div>

</div>
