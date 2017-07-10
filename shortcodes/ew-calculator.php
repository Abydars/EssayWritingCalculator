<div id="calculatorcont" class="always view-lesssteps" style="display: block;">
	<div class="main">
		<div id="confirmation" style="display: <?php echo ((isset($_POST['custom']) && isset($_GET['confirm'])) ? "block" : "none"); ?>">
			<h2 class="page-title">Confirmation</h2>
			<p>Thank you for your order</p>
		</div>
		<div id="calccontparent" style="display: <?php echo ((isset($_POST['custom']) && isset($_GET['confirm'])) ? "none" : "block"); ?>">
			<script>
				var calc = <?php options_json(); ?>;
				var ajx = "<?php echo admin_url('admin-ajax.php'); ?>";
			</script>
			<noscript>You need JavaScript enabled to be able to complete this form.</noscript>
			<form method="post" name="calcform" action="<?php echo get_bloginfo('url'); ?>/prices/" id="calcform" class="validator">
				<input type="hidden" name="currency" value="USD">
				<input type="hidden" name="price" value="210.00">
				<input type="hidden" name="deliverydate" value="8pm on 18th Jan 2017">
				<input type="hidden" name="iscalculator" value="1">
				<input type="hidden" name="paymenttype" value="sagepay_server">
				<?php wp_nonce_field(EW_Order::NONCE, 'nonce'); ?>
				<input type="hidden" name="pageload" value="<?php echo date("m/d/y h:i:s"); ?>">
				<div style="display:none !important">
					<input type="text" name="email_confirm" value="" autocomplete="off">
				</div>
				<div id="calccont" class="calcview view-lesssteps step_1 loading" data-text="Loading">
					<div id="allsteps">
						<div class="stepsvisual">
							<div class="active" data-step="0">
								<h3>1.<span class="more"> Your Details</span></h3>
								<div></div>
							</div>
                            <div class="" data-step="1">
                                <h3>2.<span class="more"> Order Details</span></h3>
                                <div></div>
                            </div>
							<div class="" data-step="2">
								<h3>3.<span class="more"> Make Payment</span></h3>
								<div></div>
							</div>
						</div>
					</div>
					<div id="orderinfo">
						<div class="show" style="display: none;">
							<div class="price-container"><b>Price:</b> <span class="was" title=""></span> <span class="currency">$</span><span class="amount">261.00</span>
							</div>
						</div>
						<div class="show" style="display: block;"><b>Estimated Delivery Date:</b> <span class="calcdate">8pm on 18th Jan 2017</span>
						</div>
					</div>
					<div id="steps" class="stepparent">
						<div class="step step_1" data-step="1" data-submitted="false" data-onsubmit="validate(1);" style="display: block;">
							<div class="title">%NO%.<span class="more"> Your Details</span>
							</div>
							<div class="section">
								<div class="sub">Choose your product options</div>
								<div id="calc" data-focusstep="docalcdate();"> </div>
								<div class="calcinfo">
									<div class="price-container"><b>Price:</b> <span class="was" title=""></span> <span class="currency">�</span><span class="amount">210.00</span>
									</div>
									<div><b>Estimated Delivery Date:</b> <span class="calcdate">8pm on 18th Jan 2017</span>
									</div>
								</div>
								<div id="calcmessage" style="clear: both;">
								</div>
							</div>
							<div class="section hasformitems">
								<div class="sub">Choose your upgrade options</div>
								<p>If you would like a premier service, then upgrade to premier for an additional <span class="currency">�</span><span class="premier">105.00</span>. By upgrading to premier you will be assigned one of our premium researchers from the top 5 in your subject area only, will be able to request changes to your work for three months instead of the standard 7 days and a personal account manager to provide you with a direct point of contact at Essay Writing Service UK. We will even provide their mobile number if you wish to text them.</p>
								<p></p>
								<div class="formitem type-list">
									<label for="premier" style="width: 257px;">Upgrade to our premier service<span class="colon">:</span> </label><span class="element"><select name="premier" id="premier"><option value="0">No</option><option value="1">Yes, please</option></select></span>
								</div>
								<p></p>
							</div>
						</div>
						<div class="step step_2" data-step="2" data-submitted="false" data-onsubmit="validate(2);" style="display: none;">
						  <div class="title">%NO%.<span class="more"> Order Details</span></div>
							<div class="section hasformitems">
							   <div class="sub">About your order</div>
							   <p>The next step is to give us as much detail as possible about your order. If you are not sure of anything or would like some clarification, please don't hesitate to give us a call on 0203 011 0100 and we would be happy to help you.</p>
							   <div class="formitem hasdesc type-textarea"><label for="essayquestion" class="required_label">Essay Question/Details<span class="colon">:</span>  <span class="star">*</span></label><p>Try to provide as much detail as you can on structure, special requirements etc., and if you have any special requests, mention it here. The researcher will receive your instructions and follow them exactly. Make sure you include all that you need.</p><span class="element"><textarea name="essayquestion" id="essayquestion" class="required" required="" data-message="Fill in the question and/or task details" data-help="&lt;strong&gt;Your Essay Question&lt;/strong&gt;&lt;br&gt;&lt;br&gt;Please try to provide as much information as possible so your researcher fully understands what your individual requirements are.&lt;br&gt;&lt;br&gt;&lt;strong&gt;You can ask for anything! For example,&lt;/strong&gt;&lt;br&gt;&lt;br&gt;&lt;ul&gt;&lt;li&gt;Ask the writer to focus on a particular issue or use a particular approach.&lt;/li&gt;&lt;br&gt;&lt;li&gt;Use specific word counts per section&lt;/li&gt;&lt;/ul&gt;&lt;br&gt;If you don&#39;t provide any specific details then your researcher will approach the essay the way they think is best."></textarea></span></div>		   <div class="formitem type-text"><label for="areaofstudy">Area of Study (Subject)<span class="colon">:</span> </label><span class="element"><input type="text" name="areaofstudy" id="areaofstudy" value=""></span></div>           <div class="formitem type-text"><label for="referencing" class="required_label">Referencing Style<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="referencing" id="referencing" value="" class="required" required="" data-message="Fill in the required referencing style" data-help="&lt;strong&gt;Referencing Style Requirements&lt;/strong&gt;&lt;br&gt;&lt;br&gt;Please tell us here about any referencing requirements that you may have.&lt;br&gt;&lt;br&gt;You may wish to stipulate your specific referencing style such as Harvard or APA for example.&lt;br /&gt;&lt;br /&gt;The most commonly used referencing system is Harvard. Harvard is in text referencing with a bibliography at the end.&lt;br/&gt;&lt;br/&gt;When footnotes are used, referencing appears at the bottom of the page. If you are studying Law, you are most likely to use OSCOLA and Oxford. If you don�t know which system you use, take a look at your module guides or attach one and we will take a look for you."></span></div>           <div class="formitem type-text"><label for="due" class="required_label">When is the Work Due?<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="due" id="due" value="" class="date required" required="" data-message="Enter a future date"></span></div>           <div class="formitem hasdesc type-textarea"><label for="suggestedsources">Suggested Sources<span class="colon">:</span> </label><p> </p><span class="element"><textarea name="suggestedsources" id="suggestedsources" data-help="&lt;strong&gt;Suggested Sources&lt;/strong&gt;&lt;br&gt;&lt;br&gt;If you have any sources, such as journals, websites or texts you think may be useful for the researcher, then please add them here. If you have a list of sources, be sure to add them to your order.&lt;br/&gt;&lt;br /&gt;Suggested sources may or may not be used. If you have a source that must be used, then please add this to the �Required Sources� below."></textarea></span></div>		   <div class="formitem hasdesc type-textarea"><label for="requiredsources">Required Sources<span class="colon">:</span> </label><p> </p><span class="element"><textarea name="requiredsources" id="requiredsources" data-help="&lt;strong&gt;Required Sources&lt;/strong&gt;&lt;br&gt;&lt;br&gt;If you have sources, which MUST be used, then please add them here. If you would like the researcher to look at them but they are not essential in the essay, then please add them to the suggested sources section above. Try not to include a full reading list or a lengthy list. The researcher will need to use everything in this list so please make sure only essential sources are here."></textarea></span></div>      	   <div class="formitem type-checkbox"><label class="check"><input type="checkbox" name="spss" id="spss" value="1"> Do you require SPSS analysis as part of this order?</label></div>        </div>
                            <div class="section">
                                <div class="sub">About you</div>
                                <p>How would you like us to contact you?</p>
                                <div class="span12">
                                    <div class="left2right hasformitems">
                                        <div class="formitem type-text"><label for="fullname" class="required_label"
                                                                               style="width: 171px;">Full Name<span
                                                        class="colon">:</span> <span class="star">*</span></label><span
                                                    class="element"><input type="text" name="fullname" id="fullname"
                                                                           value="<?php echo $name; ?>" class="required completed"
                                                                           required=""></span></div>
                                        <div class="formitem type-email"><label for="email" class="required_label"
                                                                                style="width: 171px;">Email Address<span
                                                        class="colon">:</span> <span class="star">*</span></label><span
                                                    class="element"><input type="email" name="email" id="email" value="<?php echo $email; ?>"
                                                                           class="required completed"
                                                                           required=""></span></div>
                                        <div class="formitem type-text"><label for="phone" class="required_label"
                                                                               style="width: 171px;">Telephone
                                                Number<span class="colon">:</span> <span
                                                        class="star">*</span></label><span class="element"><input
                                                        type="text" name="phone" id="phone" value="<?php echo $phone; ?>"
                                                        class="required completed" required=""></span></div>
                                        <div class="formitem type-text"><label for="mobile" style="width: 171px;">Mobile<span
                                                        class="colon">:</span> </label><span class="element"><input
                                                        type="text" name="mobile" id="mobile" value="" class="skipped"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="section">
							  <div class="sub">Help your writer to understand what you want from your order.</div>
							  <p><b>If you have a module guide for this order or a marking scheme, please attach it along with any guidance from your lecturer. This will be beneficial to the researcher.</b></p>
							  <p class="warn">All files are sent to your writer so it�s best no to provide any personal information.</p>
							  <strong>Uploads:</strong><br/><br/>
							  <div>
								<input id="input-700" name="files[]" type="file" multiple class="file-loading">
							  </div>
							</div>
						</div>
						<div class="step step_3" data-step="3" data-submitted="false" data-onsubmit="if(validate(3)) payment();" style="display: none;">
						  <div class="title">%NO%.<span class="more"> Make Payment</span></div>
                            <div class="section">
                                <div class="couponcode">Do you have a discount code?
                                    <input type="text" name="coupon" />
                                    <input type="button" value="Check" />
                                    <div class="couponinfo"></div>
                                </div>
                                <div class="pricecont price-container">
                                    <div id="currency-selection" style="display:none">
                                        <a href="<?php echo get_bloginfo('url'); ?>/prices/#" class="gbp active" rel="GBP" title="Great British Pound"></a>
                                        <a href="<?php echo get_bloginfo('url'); ?>/prices/#" class="usd" rel="USD" title="United States Dollar"></a>
                                        <a href="<?php echo get_bloginfo('url'); ?>/prices/#" class="aud" rel="AUD" title="Australian Dollar"></a>
                                    </div>
                                    <p class="price-container price-amount">Price: <span class="was" title=""></span> <span class="currency">�</span><span class="amount">210.00</span>
                                    </p>
                                </div>
                            </div>
							<div class="billingdetails when true">
								<h4>Bill Payers Information</h4>
								<p>If you paying by credit or debit card, please provide the name and address the card is registered to.</p>
								<div class="span12">
									<div class="left2right billing hasformitems">
									  <div class="formitem type-text"><label for="address" class="required_label" style="width: 92px;">Address<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="address" id="address" value="" class="required" required=""></span></div>                  <div class="formitem type-text"><label for="town" class="required_label" style="width: 92px;">Town<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="town" id="town" value="" class="required" required=""></span></div>                  <div class="formitem type-text"><label for="county" class="required_label" style="width: 92px;">County<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="county" id="county" value="" class="required" required=""></span></div>                  <div class="formitem type-text"><label for="postcode" class="required_label" style="width: 92px;">Postcode<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="postcode" id="postcode" value="" class="required" required=""></span></div>                  <div class="formitem type-list"><label for="country" class="required_label" style="width: 92px;">Country<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><select name="country" id="country" class="required" required=""><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (malvinas)</option><option value="FO">Faroe Islands</option><option value="FM">Federated States Of Micronesia</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GN">Guinea</option><option value="GW">Guinea-bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="VA">Holy See (vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IR">Islamic Republic Of Iran</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="KR">Republic Of Korea</option><option value="MD">Republic Of Moldova</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="KN">Saint Kitts And Nevis</option><option value="LC">Saint Lucia</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome And Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TH">Thailand</option><option value="TP">Timor-leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad And Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="UK" selected="selected">United Kingdom</option><option value="TZ">United Republic Of Tanzania</option><option value="US">United States</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Viet Nam</option><option value="VI">Virgin Islands</option><option value="VG">Virgin Islands</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select></span></div>               </div>
								</div>
							</div>
						</div>
						<div class="stepbuttons">
							<a href="#" class="button next" onclick="" style="float:right">Next</a>
							<a href="#" class="button submit" onclick="" style="float:right; display: none;">Confirm & Pay via PayPal</a>
							<a href="#" class="button prev" onclick="" style="float:left">Previous</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>