<div id="mini-calccontparent">
    <form method="POST">
        <?php do_action('ew_login_error_messages'); ?>
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <div class="form-group checkbox">
            <label><input type="checkbox" name="remember_me" /> Remember Me</label>
        </div>
        <div class="form-submit">
            <?php wp_nonce_field(EW_User::SIGNUP_NONCE, 'nonce'); ?>
            <input type="submit" value="Signup" class="btn btn-success" />&nbsp;<a href="<?php echo add_query_arg('redirect', get_permalink($options['calc_page']), get_permalink($options['signin_page'])); ?>">Already registered?</a>
        </div>
    </form>
</div>