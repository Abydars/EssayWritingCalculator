<?php

class EW_User
{

	const SIGNUP_NONCE = "wpUserSignupNonce";
	const SIGNIN_NONCE = "wpUserSigninNonce";

	public static function doLogin( $username, $password, $remember = false )
	{
		$credentials = array();

		$credentials['user_login']    = $username;
		$credentials['user_password'] = $password;
		$credentials['remember']      = $remember;

		$user = wp_signon( $credentials, false );

		if ( is_wp_error( $user ) ) {
			return array(
				'status'  => false,
				'message' => $user->get_error_message()
			);
		}

		return array(
			'status' => true
		);
	}

	public static function doSignup( $email, $password, $remember = false, $confirmation = false, $data = array() )
	{
		$username = preg_replace( '/@\w+\.+\w+/', '', $email );
		$user     = wp_create_user( $username, $password, $email );

		if ( is_wp_error( $user ) ) {
			return array(
				'status'  => false,
				'message' => $user->get_error_message()
			);
		}

		foreach ( $data as $key => $val ) {
			update_user_meta( $user, $key, $val );
		}

		$credentials = array();

		$credentials['user_login']    = $username;
		$credentials['user_password'] = $password;
		$credentials['remember']      = $remember;

		if ( ! $confirmation ) {
			$user = wp_signon( $credentials, false );

			if ( is_wp_error( $user ) ) {
				return array(
					'status'  => false,
					'message' => $user->get_error_message()
				);
			}
		}

		$token            = rand( 111111, 999999999 );
		$confirmation_url = add_query_arg( array(
			                                   'e'     => $email,
			                                   'token' => $token
		                                   ), get_bloginfo( 'url' ) );
		$from             = get_bloginfo( 'admin_email' );
		$subject          = get_bloginfo( 'name' ) . ' | Registration confirmation';

		$message = '<h2 style="text-align: center;">' . get_bloginfo( 'name' ) . '</h2>';
		$message .= '<a href="' . $confirmation_url . '">' . $confirmation_url . '</a>';

		$headers = array();

		$headers[] = 'From: ' . get_bloginfo( 'name' ) . ' <' . $from . '>';
		$headers[] = 'Content-Type: text/html; charset=UTF-8';

		wp_mail( $email, $subject, $message, $headers );

		update_user_meta( $user, 'confirmed', 0 );
		update_user_meta( $user, 'token', $token );

		return array(
			'status'  => true,
			'message' => "Please check your email for confirmation link."// . $confirmation_url
		);
	}

}