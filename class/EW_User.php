<?php

class EW_User {

    const SIGNUP_NONCE = "wpUserSignupNonce";
    const SIGNIN_NONCE = "wpUserSigninNonce";

    public static function doLogin($username, $password, $remember = false) {
        $credentials = array();

        $credentials['user_login'] = $username;
        $credentials['user_password'] = $password;
        $credentials['remember'] = $remember;

        $user = wp_signon($credentials, false);

        if (is_wp_error($user))
            return array(
                'status' => false,
                'message' => $user->get_error_message()
            );

        return array(
            'status' => true
        );
    }

    public static function doSignup($email, $password, $remember = false) {
        $username = preg_replace('/@\w+\.+\w+/','', $email);
        $user = wp_create_user($username, $password, $email);

        if(is_wp_error($user))
            return array(
                'status' => false,
                'message' => $user->get_error_message()
            );

        $credentials = array();

        $credentials['user_login'] = $username;
        $credentials['user_password'] = $password;
        $credentials['remember'] = $remember;

        $user = wp_signon($credentials, false);

        if (is_wp_error($user))
            return array(
                'status' => false,
                'message' => $user->get_error_message()
            );

        return array(
            'status' => true
        );
    }

}