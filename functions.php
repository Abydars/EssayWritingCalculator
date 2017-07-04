<?php

function ew_authorization()
{
	global $post;

	$options = get_option( 'ew' );

	if ( is_user_logged_in() ) {
		if ( ( isset( $options['signup_page'] ) && $post->ID == $options['signup_page'] ) || isset( $options['signin_page'] ) && $post->ID == $options['signin_page'] ) {
			$redirectUrl = get_bloginfo( 'url' );

			if ( ! empty( $options['calc_page'] ) ) {
				$redirectUrl = get_permalink( $options['calc_page'] );
			}

			wp_redirect( $redirectUrl );
		}
	} else if ( ( isset( $options['calc_page'] ) && $post->ID == $options['calc_page'] ) && ! isset( $options['allow_unauthenticated'] ) ) {
		$redirectUrl = get_bloginfo( 'url' );

		if ( ! empty( $options['signin_page'] ) ) {
			$redirectUrl = get_permalink( $options['signin_page'] );
		}

		wp_redirect( $redirectUrl );
	}

}

function ew_signup_request()
{
	if ( isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], EW_User::SIGNUP_NONCE ) ) {
		$options = get_option( 'ew' );

		$isLoggedIn  = EW_User::doSignup( $_POST['email'], $_POST['password'], isset( $_POST['remember_me'] ) );
		$redirectUrl = ! empty( $_GET['redirect'] ) ? $_GET['redirect'] : "";
		$afterLogin  = ! empty( $options['after_login_page'] ) ? get_permalink( $options['after_login_page'] ) : $redirectUrl;

		if ( empty( $afterLogin ) ) {
			$afterLogin = get_bloginfo( 'url' );
		}

		if ( $isLoggedIn['status'] == true ) {
			wp_redirect( $afterLogin );
			exit;
		} else {
			add_action( 'ew_login_error_messages', function () use ( &$isLoggedIn ) {
				echo apply_filters( 'ew_error_message', $isLoggedIn['message'] );
			} );
		}
	}
}

function ew_signin_request()
{
	if ( isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], EW_User::SIGNIN_NONCE ) ) {
		$options = get_option( 'ew' );

		$isLoggedIn  = EW_User::doLogin( $_POST['email'], $_POST['password'], isset( $_POST['remember_me'] ) );
		$redirectUrl = ! empty( $_GET['redirect'] ) ? $_GET['redirect'] : "";
		$afterLogin  = ! empty( $options['after_login_page'] ) ? get_permalink( $options['after_login_page'] ) : $redirectUrl;

		if ( empty( $afterLogin ) ) {
			$afterLogin = get_bloginfo( 'url' );
		}

		if ( $isLoggedIn['status'] == true ) {
			wp_redirect( $afterLogin );
			exit;
		} else {
			add_action( 'ew_login_error_messages', function () use ( &$isLoggedIn ) {
				echo apply_filters( 'ew_error_message', $isLoggedIn['message'] );
			} );
		}
	}
}

function render_ew_error_message_filter( $message )
{
	return '<div class="alert alert-danger">' . $message . '</div>';
}

function render_ew_success_message_filter( $message )
{
	return '<div class="alert alert-success">' . $message . '</div>';
}

function render_ew_signin()
{
	ob_start();

	// INCLUDE SCRIPTS
	wp_enqueue_script( 'prices', plugins_url( '/assets/js/prices.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap', plugins_url( '/assets/bootstrap/js/bootstrap.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-canvas-blob', plugins_url( '/assets/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-sortable', plugins_url( '/assets/bootstrap-fileinput/js/plugins/sortable.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-purify', plugins_url( '/assets/bootstrap-fileinput/js/plugins/purify.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput', plugins_url( '/assets/bootstrap-fileinput/js/fileinput.min.js', __FILE__ ), array( 'jquery' ) );

	// INCLUDE STYLES
	wp_enqueue_style( 'styles', plugins_url( '/assets/css/styles.css', __FILE__ ) );
	wp_enqueue_style( 'bootstrap', plugins_url( '/assets/bootstrap/css/bootstrap.min.css', __FILE__ ) );
	wp_enqueue_style( 'fileinput', plugins_url( '/assets/bootstrap-fileinput/css/fileinput.min.css', __FILE__ ) );

	$options = get_option( 'ew' );

	include_once( 'shortcodes/ew-signin.php' );
	$contents = ob_get_contents();

	ob_end_clean();

	return $contents;
}

function render_ew_signup()
{
	ob_start();

	// INCLUDE SCRIPTS
	wp_enqueue_script( 'prices', plugins_url( '/assets/js/prices.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap', plugins_url( '/assets/bootstrap/js/bootstrap.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-canvas-blob', plugins_url( '/assets/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-sortable', plugins_url( '/assets/bootstrap-fileinput/js/plugins/sortable.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-purify', plugins_url( '/assets/bootstrap-fileinput/js/plugins/purify.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput', plugins_url( '/assets/bootstrap-fileinput/js/fileinput.min.js', __FILE__ ), array( 'jquery' ) );

	// INCLUDE STYLES
	wp_enqueue_style( 'styles', plugins_url( '/assets/css/styles.css', __FILE__ ) );
	wp_enqueue_style( 'bootstrap', plugins_url( '/assets/bootstrap/css/bootstrap.min.css', __FILE__ ) );
	wp_enqueue_style( 'fileinput', plugins_url( '/assets/bootstrap-fileinput/css/fileinput.min.css', __FILE__ ) );

	$options = get_option( 'ew' );

	include_once( 'shortcodes/ew-signup.php' );
	$contents = ob_get_contents();

	ob_end_clean();

	return $contents;
}

function render_ew_mini_calculator()
{
	ob_start();

	// INCLUDE SCRIPTS
	wp_enqueue_script( 'prices', plugins_url( '/assets/js/prices.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap', plugins_url( '/assets/bootstrap/js/bootstrap.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-canvas-blob', plugins_url( '/assets/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-sortable', plugins_url( '/assets/bootstrap-fileinput/js/plugins/sortable.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-purify', plugins_url( '/assets/bootstrap-fileinput/js/plugins/purify.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput', plugins_url( '/assets/bootstrap-fileinput/js/fileinput.min.js', __FILE__ ), array( 'jquery' ) );

	// INCLUDE STYLES
	wp_enqueue_style( 'styles', plugins_url( '/assets/css/styles.css', __FILE__ ) );
	wp_enqueue_style( 'bootstrap', plugins_url( '/assets/bootstrap/css/bootstrap.min.css', __FILE__ ) );
	wp_enqueue_style( 'fileinput', plugins_url( '/assets/bootstrap-fileinput/css/fileinput.min.css', __FILE__ ) );

	$options = get_option( 'ew' );

	include_once( 'shortcodes/ew-mini-calculator.php' );
	$contents = ob_get_contents();

	ob_end_clean();

	return $contents;
}

function render_ew_calculator()
{
	ob_start();

	// INCLUDE SCRIPTS
	//wp_enqueue_script( 'track', plugins_url( '/assets/js/track.js' , __FILE__ ), array( 'jquery' ) );
	//wp_enqueue_script( 'compact', plugins_url( '/assets/js/compact.min.js' , __FILE__ ), array( 'track' ) );
	//wp_enqueue_script( 'ew-script', plugins_url( '/assets/js/script.js' , __FILE__ ), array( 'compact' ) );
	//wp_enqueue_script( 'steps', plugins_url( '/assets/js/steps.js' , __FILE__ ), array( 'jquery' ) );
	//wp_enqueue_script( 'validator', plugins_url( '/assets/js/validator.js' , __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'prices', plugins_url( '/assets/js/prices.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap', plugins_url( '/assets/bootstrap/js/bootstrap.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-canvas-blob', plugins_url( '/assets/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-sortable', plugins_url( '/assets/bootstrap-fileinput/js/plugins/sortable.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput-purify', plugins_url( '/assets/bootstrap-fileinput/js/plugins/purify.min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'fileinput', plugins_url( '/assets/bootstrap-fileinput/js/fileinput.min.js', __FILE__ ), array( 'jquery' ) );
	//wp_enqueue_script( 'placeholder', plugins_url( '/assets/js/placeholder.js' , __FILE__ ), array( 'prices' ) );
	//wp_enqueue_script( 'form-calc', plugins_url( '/assets/js/form.js' , __FILE__ ), array( 'placeholder' ) );

	// INCLUDE STYLES
	wp_enqueue_style( 'styles', plugins_url( '/assets/css/styles.css', __FILE__ ) );
	wp_enqueue_style( 'bootstrap', plugins_url( '/assets/bootstrap/css/bootstrap.min.css', __FILE__ ) );
	wp_enqueue_style( 'fileinput', plugins_url( '/assets/bootstrap-fileinput/css/fileinput.min.css', __FILE__ ) );
	//wp_enqueue_style( 'form-styles', plugins_url( '/assets/css/form-styles.css' , __FILE__ ) );
	//wp_enqueue_style( 'template-styles', plugins_url( '/assets/css/template-styles.css' , __FILE__ ) );
	//wp_enqueue_style( 'responsive', plugins_url( '/assets/css/responsive.css' , __FILE__ ) );
	//wp_enqueue_style( 'font-awesome', plugins_url( '/assets/css/font-awesome.min.css' , __FILE__ ) );
	//wp_enqueue_style( 'form-animate', plugins_url( '/assets/css/animate.css' , __FILE__) );
	//wp_enqueue_style( 'prices', plugins_url( '/assets/css/prices.css' , __FILE__ ) );
	//wp_enqueue_style( 'steps', plugins_url( '/assets/css/steps.css' , __FILE__ ) );

	include_once( 'shortcodes/ew-calculator.php' );
	$contents = ob_get_contents();

	ob_end_clean();

	return $contents;
}

function admin_order_columns( $columns )
{
	unset( $columns["date"] );
	unset( $columns["title"] );

	$columns['title_']        = __( "Title" );
	$columns['order_date']    = __( "Order Date" );
	$columns['delivery']      = __( "Details" );
	$columns['delivery_date'] = __( "Delivery Date" );
	$columns['cost']          = __( "Cost" );
	$columns['status']        = __( "Status" );
	$columns['is_paid']       = __( "Paid" );

	return $columns;
}

function admin_order_columns_rendering( $column, $post_id )
{
	global $post, $themz;
	switch ( $column ) {
		case "order_date":
			$order_date = $post->post_date;
			echo date('j F Y H:s a', strtotime($order_date));

			break;
		case "status":
			$status = get_post_meta( $post_id, 'status', true );

			if ( ! $status ) {
				$status = 'in-progress';
			}

			echo $status;
			break;
		case "is_paid":
			$is_paid = get_post_meta( $post_id, 'is_paid', true );

			if ( ! $is_paid || $is_paid == "0" ) {
				$is_paid = "No";
			} else {
				$is_paid = "Yes";
			}

			echo $is_paid;
			break;
		case "cost":
			$cost     = get_post_meta( $post_id, 'cost', true );
			$currency = get_post_meta( $post_id, 'currency', true );

			echo $cost . ' ' . $currency;
			break;
		case "delivery_date":
			$delivery_date = get_post_meta( $post_id, 'delivery_date', true );
			echo $delivery_date;
			break;
		case "title_";
			$type_  = get_post_meta( $post_id, 'type', true );
			$value_ = array(
				"title" => $type_["title"],
			);
			$type   = "";
			if ( is_array( $value_ ) ) {
				$exc = array( 'cutoff', 'proofreading_percentage' );
				foreach ( $value_ as $tk => $tv ) {
					if ( $tk == "date" ) {
						$tk = "days";
					}
					$type .= $tv;
				}
			}

			echo '<strong>
					<a class="row-title" href="' . add_query_arg( array(
				                                                                       "post"   => $post_id,
				                                                                       "action" => "edit"
			                                                                       ), admin_url( "post.php" ) ) . '" aria-label="�' . $post->post_title . '� (Edit)">Order #' . $post->ID . '</a><br/>
					<div>' . $type . '</div>
				  </strong>';
			break;
		case "delivery";
			$value = $val = get_post_meta( $post_id, 'delivery', true );

			if ( is_array( $value ) ) {
				$val = '';

				$value_ = array();

				if ( $value["type"] ) {
					$type = json_decode( $value["type"], true );
					$exc  = array( 'cutoff', 'proofreading_percentage' );
					foreach ( $type as $tk => $tv ) {
						if ( $tk == "date" ) {
							$tk = "days";
						}

						if ( ! in_array( $tk, $exc ) ) {
							$value_[ $tk ] = $tv;
						}
					}
				}

				foreach ( $value_ as $vk => $vv ) {
					if ( count( $value_ ) > 1 ) {
						$val .= $vk . ' = ' . $vv . '<br/>';
					} else {
						$val .= $vv;
					}
				}
			}

			echo $val;
			break;
	}
}

function ew_add_options_page()
{
	add_options_page(
		'Calculator Options',
		'Calculator Options',
		'manage_options',
		'calculator-options',
		'calculator_options'
	);
}

function ew_save_options()
{
	if ( isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'ew_options_nonce' ) ) {
		if ( isset( $_POST['order-confirmation-message'] ) ) {
			$_POST['ew']['order-confirmation-message'] = $_POST['order-confirmation-message'];
		}

		update_option( 'ew', $_POST['ew'] );
	}
}

function ew_place_order()
{
	if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], EW_Order::NONCE ) ) {
		$json = file_get_contents( dirname( __FILE__ ) . '/assets/data.json' );
		$data = json_decode( $json, true );

		$prices = $data['prices'];
		$req    = $_REQUEST;
		$ob     = $req['ob'];

		$args = array(
			"type"             => $prices[ $ob['1'] ],
			"delivery"         => $prices[ $ob['5'] ],
			"level"            => $prices[ $ob['2'] ],
			"changes_interval" => $prices[ $ob['6'] ],
			"standard"         => $prices[ $ob['3'] ],
			"length"           => $ob['4'],
			"premier"          => $req['premier'],
			"fullname"         => $req['fullname'],
			"email"            => $req['email'],
			"phone"            => $req['phone'],
			"mobile"           => $req['mobile'],
			"coupon"           => $req['coupon'],
			"question"         => $req['essayquestion'],
			"area_of_study"    => $req['areaofstudy'],
			"referencing"      => $req['referencing'],
			"due"              => $req['due'],
			"suggestedsources" => $req['suggestedsources'],
			"requiredsources"  => $req['requiredsources'],
			"spss"             => ( isset( $req['spss'] ) ? "1" : "0" ),
			"file"             => "",
			"address"          => $req['address'],
			"town"             => $req['town'],
			"county"           => $req['county'],
			"country"          => $req['country'],
			"postcode"         => $req['postcode'],
			"cost"             => $req['price'],
			"currency"         => $req['currency'],
			"delivery_date"    => $req['deliverydate'],
			"status"           => "in-progress",
			"is_paid"          => "0",
			"attachments"      => isset( $req['attachments'] ) ? $req['attachments'] : "",
			"order_date"       => date( 'Y-m-d h:i a' )
		);

		$order = new EW_Order();
		$order->set_data( $args );

		if ( $order->place() ) {

			$args["id"] = $order->get_order_id();

			echo json_encode( array(
				                  "status"   => true,
				                  "order_id" => $order->get_order_id(),
				                  "order"    => $args
			                  ) );
		} else {
			echo json_encode( array(
				                  "status"  => false,
				                  "message" => $order->get_error_message()
			                  ) );
		}
	}
	die();
}

function ew_pricing()
{
	if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], EW_Order::NONCE ) ) {
		$json    = file_get_contents( dirname( __FILE__ ) . '/assets/data.json' );
		$options = get_option( 'ew' );

		$config = json_decode( $json, true );

		$config["return_url"]   = isset( $options["after-payment-url"] ) ? add_query_arg( array( "confirm" => "" ), $options["after-payment-url"] ) : add_query_arg( array( "confirm" => "" ), get_bloginfo( 'url' ) );
		$config["notify_url"]   = isset( $options["after-payment-url"] ) ? add_query_arg( array( "notify" => "" ), $options["after-payment-url"] ) : add_query_arg( array( "notify" => "" ), get_bloginfo( 'url' ) );
		$config["paypal_email"] = isset( $options["paypal_email"] ) ? $options['paypal_email'] : '';
		$config["is_sandbox"]   = isset( $options["is_sandbox"] );

		$config["upload_url"] = add_query_arg( array( "upload_file" => "" ), get_bloginfo( "url" ) );
		$config["currency"]   = isset( $options["currency"] ) ? $options["currency"] : 'GBP';

		if ( ! empty( $options["exchange_rate"] ) ) {
			$config["exchange"][ $config["currency"] ] = $options["exchange_rate"];
		}

		$json = json_encode( $config );

		echo $json;
	}
	die();
}

function check_coupon()
{
	if ( isset( $_REQUEST['coupon'] ) ) {
		$coupons = get_posts( array(
			                      'post_type'  => 'ew_coupon',
			                      'nopaging'   => 1,
			                      'meta_key'   => 'code',
			                      'meta_value' => $_REQUEST['coupon']
		                      ) );
		$amount  = 0;

		if ( isset( $coupons[0] ) ) {
			$coupon = $coupons[0];
			$amount = get_post_meta( $coupon->ID, 'amount', true );
		}

		echo json_encode( array(
			                  "amount" => $amount,
			                  "max"    => $amount
		                  ) );
	}
	die();
}

function calculator_options()
{
	wp_enqueue_style( 'options-css', EW_URL . '/assets/css/options.css' );
	$options = get_option( 'ew' );

	$json = file_get_contents( dirname( __FILE__ ) . '/assets/data.json' );
	$data = json_decode( $json, true );
	?>
    <div class="wrap" id="hz">
        <script>
            var exchange_rates = <?php echo json_encode( $data['exchange'] ); ?>;
        </script>
        <h2>Calculator Options</h2>
        <form method="POST">
            <div class="section">
                <table class="form-table">
                    <tbody>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[calc_page]">Calculator Page</label>
                        </th>
                        <td>
                            <select name="ew[calc_page]">
								<?php foreach ( get_posts( array( 'post_type' => 'page' ) ) as $page ) { ?>
                                    <option<?php echo( ( isset( $options['calc_page'] ) && $options['calc_page'] == $page->ID ) ? " selected" : "" ); ?>
                                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
								<?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[signup_page]">Signup Page</label>
                        </th>
                        <td>
                            <select name="ew[signup_page]">
								<?php foreach ( get_posts( array( 'post_type' => 'page' ) ) as $page ) { ?>
                                    <option<?php echo( ( isset( $options['signup_page'] ) && $options['signup_page'] == $page->ID ) ? " selected" : "" ); ?>
                                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
								<?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[signin_page]">Signin Page</label>
                        </th>
                        <td>
                            <select name="ew[signin_page]">
								<?php foreach ( get_posts( array( 'post_type' => 'page' ) ) as $page ) { ?>
                                    <option<?php echo( ( isset( $options['signin_page'] ) && $options['signin_page'] == $page->ID ) ? " selected" : "" ); ?>
                                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
								<?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[after_login_page]">Redirect After Login</label>
                        </th>
                        <td>
                            <select name="ew[after_login_page]">
								<?php foreach ( get_posts( array( 'post_type' => 'page' ) ) as $page ) { ?>
                                    <option<?php echo( ( isset( $options['after_login_page'] ) && $options['after_login_page'] == $page->ID ) ? " selected" : "" ); ?>
                                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
								<?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[allow_unauthenticated]">Allow unauthenticated users</label>
                        </th>
                        <td>
                            <input type="checkbox" name="ew[allow_unauthenticated]"
                                   value="1"<?php echo( isset( $options['allow_unauthenticated'] ) ? ' checked="checked"' : '' ); ?> />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[currency]">Currency<br/>
                                <small>Default: GBP</small>
                            </label>
                        </th>
                        <td>
                            <select id="currency" name="ew[currency]">
								<?php foreach ( $data['exchange'] as $currency => $rate ) { ?>
                                    <option<?php echo( ( isset( $options['currency'] ) && $options['currency'] == $currency ) ? " selected" : "" ); ?>><?php echo $currency; ?></option>
								<?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[exchange_rate]">Exchange Rate<br/>
                                <small>Default: 1</small>
                            </label>
                        </th>
                        <td>
                            <script>
                                jQuery(function ($) {
                                    $("#currency").on("change", function () {
                                        $("#exchange_rate").val(exchange_rates[$(this).val()]);
                                    });
                                });
                            </script>
                            <input id="exchange_rate" type="number" step="any" name="ew[exchange_rate]"
                                   value="<?php echo( isset( $options['exchange_rate'] ) ? $options['exchange_rate'] : "" ); ?>"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h3>Payment Settings</h3>
                <table class="form-table">
                    <tbody>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[is_sandbox]">Sandbox mode</label>
                        </th>
                        <td>
                            <input type="checkbox" name="ew[is_sandbox]"
                                   value="1"<?php echo( isset( $options['is_sandbox'] ) ? ' checked="checked"' : '' ); ?> />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[paypal_email]">Paypal Email</label>
                        </th>
                        <td>
                            <input type="text" name="ew[paypal_email]"
                                   value="<?php echo( isset( $options['paypal_email'] ) ? $options['paypal_email'] : "" ); ?>">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[after-payment-url]">Paypal Return</label>
                        </th>
                        <td>
                            <input type="text" name="ew[after-payment-url]"
                                   value="<?php echo( isset( $options['after-payment-url'] ) ? $options['after-payment-url'] : "" ); ?>">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h3>Order Email</h3>
                <table class="form-table">
                    <tbody>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[notification-email]">Order Notification Email</label>
                        </th>
                        <td>
                            <input type="text" name="ew[notification-email]"
                                   value="<?php echo( isset( $options['notification-email'] ) ? $options['notification-email'] : "" ); ?>">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="ew[order-confirmation-message]">Order Confirmation Message</label>
                        </th>
                        <td>
							<?php
							$value = "";

							if ( isset( $options['order-confirmation-message'] ) ) {
								$value = stripcslashes( $options['order-confirmation-message'] );
							}

							wp_editor( $value, 'order-confirmation-message' );
							?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
			<?php wp_nonce_field( 'ew_options_nonce', 'nonce' ); ?>
			<?php @submit_button(); ?>
        </form>
    </div>
	<?php
}

function ew_upload_request()
{
	if ( ! empty( $_FILES['files'] ) ) {
		$output = array();

		$files = $_FILES['files'];
		$names = $files['name'];

		for ( $i = 0; $i < count( $names ); $i ++ ) {

			$filename = basename( $names[ $i ] );
			$file     = $files['tmp_name'][ $i ];

			$upload_file = wp_upload_bits( $filename, null, @file_get_contents( $file ) );

			if ( ! $upload_file['error'] ) {
				$wp_filetype = wp_check_filetype( $filename, null );
				$attachment  = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
					'post_content'   => '',
					'post_status'    => 'inherit'
				);

				$attachment_id = wp_insert_attachment( $attachment, $upload_file['file'] );

				if ( ! is_wp_error( $attachment_id ) ) {
					require_once( ABSPATH . "wp-admin" . '/includes/image.php' );

					$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
					wp_update_attachment_metadata( $attachment_id, $attachment_data );

					$output["attachment_id"] = $attachment_id;
				} else {
					$output["error"] = $attachment_id->get_error_message();
				}
			} else {
				$output["error"] = $upload_file['error'];
			}
		}

		//if(!empty($output["error"]))
		//$output["error"] = implode(',', $output["error"]);

		echo json_encode( $output );
		die();
	}
}

function ew_ipn_request()
{
	if ( isset( $_POST['custom'] ) && isset( $_POST['txn_id'] ) && isset( $_GET['notify'] ) ) {

		if ( empty( $_POST['txn_id'] ) ) {
			return;
		}

		$order_data = $_POST['custom'];
		$order      = json_decode( stripcslashes( $order_data ), true );

		$args     = $order;
		$order_id = $args["id"];

		$ew = get_option( 'ew' );

		if ( ! get_post_meta( $order_id, 'txn_id', true ) ) {
			update_post_meta( $order_id, 'txn_id', $_POST['txn_id'] );

			if ( update_post_meta( $order_id, 'is_paid', '1' ) ) {

				$from    = get_bloginfo( 'admin_email' );
				$to      = get_post_meta( $order_id, 'email', true );
				$subject = get_bloginfo( 'name' ) . ' | Order confirmation';

				$admin_to      = isset( $ew["notification-email"] ) ? $ew["notification-email"] : get_bloginfo( 'admin_email' );
				$admin_subject = get_bloginfo( 'name' ) . ' | New Order Received';

				$message       = '<h3>Order Confirmation</h3>';
				$admin_message = '<h3>New Order Received</h3>';

				$message .= '<p>' . $ew["order-confirmation-message"] . '</p>';
				foreach ( $args as $k => $v ) {
					if ( is_array( $v ) ) {
						$v = $v['title'];
					}
					$admin_message .= '<p><strong>' . str_replace( "_", " ", ucwords( $k ) ) . ': </strong><span>' . $v . '</span></p>';
				}
				$admin_message .= '<p><a href="' . admin_url( "edit.php?post_type=ew_order" ) . '">View Orders</a></p>';

				$headers = array();

				$headers[] = 'From: ' . get_bloginfo( 'name' ) . ' <' . $from . '>';
				$headers[] = 'Content-Type: text/html; charset=UTF-8';

				wp_mail( $to, $subject, $message, $headers );
				wp_mail( $admin_to, $admin_subject, $admin_message, $headers );
			}
		}
		die();
	}
}

function ew_register_post_types()
{
	$labels = array(
		'name'               => _x( 'Orders', 'post type general name', 'ew' ),
		'singular_name'      => _x( 'Order', 'post type singular name', 'ew' ),
		'menu_name'          => _x( 'Orders', 'admin menu', 'ew' ),
		'name_admin_bar'     => _x( 'Order', 'add new on admin bar', 'ew' ),
		'add_new'            => _x( 'Add New', 'order', 'ew' ),
		'add_new_item'       => __( 'Add New Order', 'ew' ),
		'new_item'           => __( 'New Order', 'ew' ),
		'edit_item'          => __( 'Edit Order', 'ew' ),
		'view_item'          => __( 'View Order', 'ew' ),
		'all_items'          => __( 'All Orders', 'ew' ),
		'search_items'       => __( 'Search Orders', 'ew' ),
		'parent_item_colon'  => __( 'Parent Orders:', 'ew' ),
		'not_found'          => __( 'No Orders found.', 'ew' ),
		'not_found_in_trash' => __( 'No Orders found in Trash.', 'ew' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'ew' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'order' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'ew_order', $args );

	$labels = array(
		'name'               => _x( 'Coupons', 'post type general name', 'ew' ),
		'singular_name'      => _x( 'Coupon', 'post type singular name', 'ew' ),
		'menu_name'          => _x( 'Coupons', 'admin menu', 'ew' ),
		'name_admin_bar'     => _x( 'Coupon', 'add new on admin bar', 'ew' ),
		'add_new'            => _x( 'Add New', 'coupon', 'ew' ),
		'add_new_item'       => __( 'Add New Coupon', 'ew' ),
		'new_item'           => __( 'New Coupon', 'ew' ),
		'edit_item'          => __( 'Edit Coupon', 'ew' ),
		'view_item'          => __( 'View Coupon', 'ew' ),
		'all_items'          => __( 'All Coupons', 'ew' ),
		'search_items'       => __( 'Search Coupons', 'ew' ),
		'parent_item_colon'  => __( 'Parent Coupons:', 'ew' ),
		'not_found'          => __( 'No Coupons found.', 'ew' ),
		'not_found_in_trash' => __( 'No Coupons found in Trash.', 'ew' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'ew' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'coupon' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'ew_coupon', $args );
	flush_rewrite_rules();
}

function ew_post_meta_boxes_setup()
{
	add_action( 'add_meta_boxes', 'ew_add_post_meta_boxes' );
	add_action( 'save_post', 'ew_save_post_meta', 10, 2 );
}

function ew_add_post_meta_boxes()
{
	add_meta_box(
		'ew-post-metas',
		esc_html__( 'Order Fields', 'ew' ),
		'ew_order_fields_callback',
		'ew_order',
		'normal',
		'default'
	);

	add_meta_box(
		'ew-post-metas',
		esc_html__( 'Coupon Fields', 'ew' ),
		'ew_coupon_fields_callback',
		'ew_coupon',
		'normal',
		'default'
	);
}

function ew_order_fields_callback( $obj, $box )
{
	wp_nonce_field( basename( __FILE__ ), 'nonce' );

	$fields = array(
		"order_date"  => array( "default" => $obj->post_date ),
		"type",
		"delivery"    => array( "input" => "textarea" ),
		"level",
		"changes_interval",
		"standard",
		"length",
		"premier",
		"fullname",
		"email",
		"phone",
		"mobile",
		"coupon",
		"question",
		"area_of_study",
		"referencing",
		"due",
		"suggestedsources",
		"requiredsources",
		"spss",
		"file",
		"address",
		"town",
		"county",
		"country",
		"postcode",
		"cost",
		"currency",
		"delivery_date",
		"status"      => array( "default" => "in-progress" ),
		"is_paid"     => array( "default" => "0" ),
		"attachments" => array( "input" => "textarea" )
	);

	echo '<h1 style="font-size: 50px; line-height: normal;">Order ID#'.$obj->ID.'</h1><h3>Order Summary:</h3>';

	foreach ( $fields as $field => $type ) {

		$input_type = "text";
		$default    = "";

		if ( is_array( $type ) ) {
			if ( isset( $type["input"] ) ) {
				$input_type = $type["input"];
			}
			if ( isset( $type["default"] ) ) {
				$default = $type["default"];
			}
		} else {
			$field = $type;
		}

		$value = $val = get_post_meta( $obj->ID, $field, true );

		if ( is_array( $value ) ) {
			$val = '';

			$value_ = array(
				"title" => $value["title"]
			);

			if ( $value["type"] ) {
				$type = json_decode( $value["type"], true );
				$exc  = array( 'cutoff', 'proofreading_percentage' );
				foreach ( $type as $tk => $tv ) {
					if ( $tk == "date" ) {
						$tk = "days";
					}

					if ( ! in_array( $tk, $exc ) ) {
						$value_[ $tk ] = $tv;
					}
				}
			}

			foreach ( $value_ as $vk => $vv ) {
				if ( count( $value_ ) > 1 ) {
					$val .= $vk . ' = ' . $vv . PHP_EOL;
				} else {
					$val .= $vv;
				}
			}
		}

		if ( empty( $val ) && $default != "" ) {
			$val = $default;
		}
		?>
        <p>
            <label for="ew-post-metas" style="margin-bottom: 5px; display: block;"><strong><?php echo ucwords( __( str_replace( '_', ' ', $field ), 'ew' ) ); ?></strong></label>
			<?php if ( $input_type == "text" ) { ?>
                <input class="widefat" type="text" name="ew[<?php echo $field; ?>]" id="ew-<?php echo $field; ?>"
                       value="<?php echo $val; ?>"/>
			<?php } else if ( $input_type == "textarea" ) { ?>
                <textarea class="widefat" name="ew[<?php echo $field; ?>]" id="ew-<?php echo $field; ?>"
                          rows="10"><?php echo $val; ?></textarea>
			<?php } ?>
        </p>
		<?php
	}
}

function ew_save_post_meta( $post_id, $post )
{
	if ( ( $post->post_type == 'ew_order' || $post->post_type == 'ew_coupon' ) && isset( $_POST['ew'] ) && isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], basename( __FILE__ ) ) ) {

		$post_type = get_post_type_object( $post->post_type );
		$ew        = $_POST['ew'];

		if ( current_user_can( $post_type->cap->edit_post, $post_id ) ) {
			foreach ( $ew as $k => $v ) {
				update_post_meta( $post_id, $k, $v );
			}
		}
	}
}

function ew_coupon_fields_callback( $obj, $box )
{
	wp_nonce_field( basename( __FILE__ ), 'nonce' );

	$fields = array( "code", "amount" );
	foreach ( $fields as $field => $type ) {

		$input_type = "text";
		$default    = "";

		if ( is_array( $type ) ) {
			if ( isset( $type["input"] ) ) {
				$input_type = $type["input"];
			}
			if ( isset( $type["default"] ) ) {
				$default = $type["default"];
			}
		} else {
			$field = $type;
		}

		$value = $val = get_post_meta( $obj->ID, $field, true );

		if ( empty( $val ) && $default != "" ) {
			$val = $default;
		}
		?>
        <p>
            <label for="ew-post-metas"><?php echo ucwords( __( str_replace( '_', ' ', $field ), 'ew' ) ); ?></label>
            <br/>
			<?php if ( $input_type == "text" ) { ?>
                <input class="widefat" type="text" name="ew[<?php echo $field; ?>]" id="ew-<?php echo $field; ?>"
                       value="<?php echo $val; ?>"/>
			<?php } else if ( $input_type == "textarea" ) { ?>
                <textarea class="widefat" name="ew[<?php echo $field; ?>]" id="ew-<?php echo $field; ?>"
                          rows="10"><?php echo $val; ?></textarea>
			<?php } ?>
        </p>
		<?php
	}
}