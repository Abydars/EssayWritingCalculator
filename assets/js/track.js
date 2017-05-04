function track(category,action,opt_label,opt_value,interaction) {
	if (typeof(DEV)!='undefined' && console && console.log) {
		console.log('TRACK: ',arguments);
		return;
	}
	if (typeof(opt_label)=='undefined')
		opt_label='';
	opt_value=parseFloat(opt_value);
	if (isNaN(parseFloat(opt_value)))
		opt_value=0;
	interaction=(typeof(interaction)=='undefined' || interaction) ? 1 : 0;
	if (typeof(ga)=='function') {
		(function(category,action,opt_label,opt_value,interaction) {
			ga('send',{
			  'hitType': 'event',          // Required.
			  'eventCategory':category,   // Required.
			  'eventAction':action,      // Required.
			  'eventLabel':opt_label,
			  'eventValue':opt_value,
			  'nonInteraction':interaction,
			  'hitCallback': function() {
				if (typeof(DEV)!='undefined' && console && console.log) {
					console.log('SENT TRACK');
				}					
			  }
			});	
		})(category,action,opt_label,opt_value,interaction);
	} else if (typeof(_gaq)!='undefined') {
		(function(category,action,opt_label,opt_value,interaction) {
			try {
				_gaq.push(['_trackEvent',category,action,opt_label,opt_value,interaction ? true : false]);
			} catch(err) {
	
			};
		})(category,action,opt_label,opt_value,interaction);
	} else {
		if (typeof(DEV)!='undefined' && console && console.log) {
			console.log('Unable to find Google Analytics');
		}
	}
}
jQuery(document).on('error',function(e) {
	track('error','javascript',e.message+' '+e.filename + ':  ' + e.lineno);
});
jQuery(document).ajaxError(function(e, request, settings) {
	track('error','ajax',settings.url+' '+ e.result);
});