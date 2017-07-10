<?php
/*
Plugin Name: Essay Writing Order Form
Plugin URI: http://hztech.biz
Description: Essay writing calculator with order/payment form
Version: 0.0.3
Author: Ars
*/

define( 'EW_URL', plugins_url( '', __FILE__ ) );

require_once( 'functions.php' );

require_once( 'class/EW_Order.php' );
require_once( 'class/EW_User.php' );

add_action( 'init', 'ew_register_post_types' );
add_action( 'init', 'ew_ipn_request' );
add_action( 'init', 'ew_upload_request' );
add_action( 'init', 'ew_signin_request' );
add_action( 'init', 'ew_signup_request' );
add_action( 'init', 'ew_signup_confirmation_request' );
add_action( 'template_redirect', 'ew_authorization' );
add_action( 'load-post.php', 'ew_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'ew_post_meta_boxes_setup' );
add_action( 'admin_menu', 'ew_add_options_page' );
add_action( 'admin_init', 'ew_save_options' );
add_action( 'wp_ajax_ew_place_order', 'ew_place_order' );
add_action( 'wp_ajax_nopriv_ew_place_order', 'ew_place_order' );
add_action( 'wp_ajax_ew_pricing', 'ew_pricing' );
add_action( 'wp_ajax_nopriv_ew_pricing', 'ew_pricing' );
add_action( 'wp_ajax_check_coupon', 'check_coupon' );
add_action( 'wp_ajax_nopriv_check_coupon', 'check_coupon' );
add_action( 'wp_ajax_ew_resend_confirmation', 'ew_resend_confirmation' );
add_action( 'wp_ajax_nopriv_ew_resend_confirmation', 'ew_resend_confirmation' );
add_action( 'manage_ew_order_posts_custom_column', 'admin_order_columns_rendering', 10, 2 );
add_action( 'wp_footer', 'footer_scripts' );

add_filter( 'manage_edit-ew_order_columns', 'admin_order_columns' );
add_filter( 'ew_error_message', 'render_ew_error_message_filter' );
add_filter( 'ew_success_message', 'render_ew_success_message_filter' );
add_filter( 'show_admin_bar', 'render_ew_admin_bar' );

add_shortcode( 'ew_calculator', 'render_ew_calculator' );
add_shortcode( 'ew_mini_calculator', 'render_ew_mini_calculator' );
add_shortcode( 'ew_signup', 'render_ew_signup' );
add_shortcode( 'ew_signin', 'render_ew_signin' );