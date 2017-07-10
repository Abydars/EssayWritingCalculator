<div id="mini-calccontparent" class="ew-mini-calculator">
	<script>
        var calc = <?php options_json(); ?>;
		var ajx = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>
	<noscript>You need JavaScript enabled to be able to complete this form.</noscript>
	<form method="post" name="calc-mini-form" action="<?php echo (!empty($options['signup_page']) ? add_query_arg('redirect', get_permalink($options['calc_page']), get_permalink($options['signup_page'])) : ""); ?>" id="calcform" class="validator">
		<input type="hidden" name="currency" value="USD">
		<input type="hidden" name="price" value="210.00">
		<input type="hidden" name="deliverydate" value="8pm on 18th Jan 2017">
		<input type="hidden" name="iscalculator" value="1">
		<input type="hidden" name="paymenttype" value="sagepay_server">
		<?php wp_nonce_field(EW_Order::NONCE, 'nonce'); ?>
		<input type="hidden" name="pageload" value="<?php echo date("m/d/y h:i:s"); ?>">
		<div id="calccont" class="calcview view-lesssteps step_1 loading" data-text="Loading">
			<div class="section">
				<div class="sub">Calculate the price</div>
				<div id="calc" data-focusstep="docalcdate();" class="section-content"> </div>
				<div class="calcinfo">
					<div class="price-container"><b>Price:</b> <span class="was" title=""></span> <span class="currency">�</span><span class="amount">210.00</span>
					</div>
					<div><b>Estimated Delivery Date:</b> <span class="calcdate">8pm on 18th Jan 2017</span>
					</div>
				</div>
				<div id="calcmessage" style="clear: both;">
				</div>
			</div>
			<div class="clear"></div>
			<input type="submit" value="Continue" class="btn btn-primary" />
		</div>
	</form>
	<div class="clear"></div>
</div>
<div class="clear"></div>