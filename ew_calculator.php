<?php
/*
Plugin Name: Essay Writing Order Form
Plugin URI: http://hztech.biz
Description: A custom developed order form
Version: 0.0.1
Author: Hztech
*/

define('EW_URL', plugins_url('', __FILE__));

require_once('functions.php');
require_once('class/order.php');

add_action('init', 'ew_register_post_types');
add_action('init', 'ew_ipn_request');
add_action('init', 'ew_upload_request');
add_action('load-post.php', 'ew_post_meta_boxes_setup');
add_action('load-post-new.php', 'ew_post_meta_boxes_setup');
add_action('admin_menu', 'ew_add_options_page');
add_action('admin_init', 'ew_save_options');
add_action('wp_ajax_ew_place_order', 'ew_place_order');
add_action('wp_ajax_nopriv_ew_place_order', 'ew_place_order');
add_action('wp_ajax_ew_pricing', 'ew_pricing');
add_action('wp_ajax_nopriv_ew_pricing', 'ew_pricing');
add_action('wp_ajax_check_coupon', 'check_coupon');
add_action('wp_ajax_nopriv_check_coupon', 'check_coupon');
add_action('manage_ew_order_posts_custom_column', 'admin_order_columns_rendering', 10, 2);

add_filter('manage_edit-ew_order_columns', 'admin_order_columns') ;

add_shortcode('ew_calculator', 'render_ew_calculator');
