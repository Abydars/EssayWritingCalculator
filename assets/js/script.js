jQuery(document).ready(function($) {
	$('body').addClass('js');
	var s=$('<select/>');
	$('#nav').append(s);
	$('#nav .nav-menu > li > a,#nav .nav-menu > li > span').each(function() {
		var p=$(this).parent().find('ul a');
		if (this.tagName==='SPAN' && p.length==0)
			return;
		var sl=s;
		var i='- '
		if (this.tagName==='SPAN' || (this.tagName=='A' && $(this).attr('href')=='#')) {
			sl=$('<optgroup/>')
			sl.attr('label',$(this).text());
			s.append(sl);
			i='';
		} else {
			var o=$('<option/>');
			if ($(this).parent().hasClass('active')) {
				s.find('[selected]').removeAttr('selected');
				o.attr('selected','selected');
			}
			o.val($(this).attr('href'));
			o.text($(this).text());
			sl.append(o);			
		}		
		p.each(function() {
			var o=$('<option/>');
			if ($(this).parent().hasClass('active')) {
				s.find('[selected]').removeAttr('selected');
				o.attr('selected','selected');
			}
			o.val($(this).attr('href'));
			o.text(i+$(this).text());
			sl.append(o);
		});
	});
	s.change(function() {
		window.location.href=$(this).val();
	});
	$('form :input').blur(function () {
		var name='Form - ' + $(this).parents('form:eq(0)').attr('name');
		if (typeof(this.checkValidity)=='function') {
			if (!this.checkValidity()) {
				track(name,'invalid',$(this).attr('name'));
				return;
			}
		}
		if ($(this).val().length > 0 && !($(this).hasClass('completed'))) {
			track(name,'completed',$(this).attr('name'));
			$(this).addClass('completed');
		} else if(!($(this).hasClass('completed')) && !($(this).hasClass('skipped'))) {
			track(name,'skipped',$(this).attr('name'));
			$(this).addClass('skipped');
		}
	});
	$('a.livechat').click(function() {
		$zopim.livechat.button.hide();
		$zopim.livechat.bubble.show();
		return false;
	});
	
	if (window.location.hash && window.location.hash.substr(0,5)=='#ref=') {
		var r=window.location.hash.substr(5);
		r=r.replace(/[^0-9_\-a-z]/i,'');
		if (r) {
			createCookie('ref',r,30);
			track('ref','visit',r);
		}
	}
	
	function createCookie(name,value,days) {
		var expires;
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			expires="; expires="+date.toGMTString();
		} else {
			expires="";
		}
		document.cookie = escape(name)+"="+escape(value)+expires+"; path=/";
	}
	
	$('.slider[data-slides]').each(function() {
		var transition=1000;
		var interval=8000;
		var s=$(this).data('slides');
		if (s.length<=1)
			return;
		var w=0;
		var t=$(this);
		t.css({position:'relative',overflow:'hidden',width:'100%'});
		var i=$('.slides',t);
		i.css({opacity:0,position:'absolute',left:'100%',bottom:0,top:0,width:'100%',backgroundSize:'cover',backgroundRepeat:'no-repeat',backgroundPosition:'40% 50%',height:'100%'});
		window.setInterval(function() {
			w+=1;
			if (w>=s.length)
				w=0;
			i.css({left:'100%',backgroundImage:'url('+s[w]+')',opacity:0});
			//i.animate({},{duration:transition*0.75,queue:false},'swing');
			i.animate({left:0,opacity:1},transition,'swing',function() {
				t.css({backgroundImage:'url('+s[w]+')'});
				i.css({left:'100%',opacity:0});
			});
			
		},interval+transition);
		var checksize=function() {
			var h=$(window).height()*0.8;
			t.height(h);
		};
		var timeout=null;
		$(window).on('resize orientationchange',function() {
			if (timeout)
				window.clearTimeout(timeout);
			timeout=window.setTimeout(checksize,100);
		});
		checksize();
	}); /* In progress
	$.responsiveMenu=function(opts) {
		var def={
			selectors:[
				'nav ul:first ~ ul > li > a',
				'ul.menu > li > a',
				'ul.menu > li > span'
			],
			'selected':'< li.active',
		};
		opts=$.extend(true,def,opts);
		var alllinks=[];
		var inArray=function() {
			
		};
		for (k in opts.selectors) {
			if (!opts.selectors.hasOwnProperty(k))
				return;
			var s=$(opts.selectors[k]);
			s.each(function() {
				var href=$(this).attr(href);
				if (!href || href=='#')
			});
		}
	};
	$.responsiveMenu({
		selectors:[
			'#menu-menu > li > a:lt(3)',
			'.navsmall a',
			'#menu-menu > li > a:gt(2)',
		],
		'selected':'< li.current-menu-item',
		
	});
	*/
});