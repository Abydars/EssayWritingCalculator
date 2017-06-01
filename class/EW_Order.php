<?php

class EW_Order {
	
	const NONCE = "wpOrderNonce";
	
	private $order_id;
	private $args;
	private $error;
	
	public function __construct() {
	}
	
	public function set_data($args) {
		$this->args = $args;
	}
	
	public function place() {
		
		$title = $this->args["type"];
		if(is_array($this->args["type"])) 
			$title = $this->args["type"]["title"];
		
		$this->order_id = wp_insert_post(array(
				"post_title"		=> 'Order by ' . $this->args["fullname"] . ' for ' . $title,
				"post_type"			=> 'ew_order',
			));
		
		if(is_wp_error($this->order_id)) {
			$this->error = $this->order_id;
			return false;
		} else {
			foreach($this->args as $k => $v) {
				if($k == "attachments") {
					
					$attachments = explode(',', $v);
					$attachments_ = array();
					
					foreach($attachments as $aid) {
						$attachments_[] = wp_get_attachment_url($aid);
					}
					$v = implode(PHP_EOL, $attachments_);
				}
				update_post_meta($this->order_id, $k, $v);
			}
		}
		return true;
	}
	
	public function get_order_id() {
		if(!$this->error)
			return $this->order_id;
		
		return false;
	}
	
	public function get_error_message() {
		if($this->error)
			return $this->error->get_error_message();
		
		return false;
	}
}