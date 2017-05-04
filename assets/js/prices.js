var date_discounts=[5,7];
var date_discounts_min=[14,21];
var currentdate=0;
var default_selected={2:20};
var facebook=false;
var paytype='';
var emailsgot={};
var currentdiscount=0;
var currentdiscountmax=0;
var docalcdatedone=false;
var skipfirst;
var currentstep = 1;
var totalsteps = 0;
var totalPrice = 0;
var attachments = [];

if (window.location.href.match(/type=modal_answer/gi)) {
	default_selected[1]=9;
}
var r=new RegExp('type=([0-9]+)','gi')
var m=r.exec(window.location.href);
if (m && m[1] && !isNaN(parseInt(m[1]))) {
	default_selected[1]=parseInt(m[1]);
}
var r=new RegExp('level=([0-9]+)','gi')
var m=r.exec(window.location.href);
if (m && m[1] && !isNaN(parseInt(m[1]))) {
	default_selected[2]=parseInt(m[1]);
}
var r=new RegExp('standard=([0-9]+)','gi')
var m=r.exec(window.location.href);
if (m && m[1] && !isNaN(parseInt(m[1]))) {
	default_selected[3]=parseInt(m[1]);
}
function parse_str (str, array) {
  var strArr = String(str).replace(/^&/, '').replace(/&$/, '').split('&'),
    sal = strArr.length,
    i, j, ct, p, lastObj, obj, lastIter, undef, chr, tmp, key, value,
    postLeftBracketPos, keys, keysLen,
    fixStr = function (str) {
      return decodeURIComponent(str.replace(/\+/g, '%20'));
    };

  if (!array) {
    array = this.window;
  }

  for (i = 0; i < sal; i++) {
    tmp = strArr[i].split('=');
    key = fixStr(tmp[0]);
    value = (tmp.length < 2) ? '' : fixStr(tmp[1]);

    while (key.charAt(0) === ' ') {
      key = key.slice(1);
    }
    if (key.indexOf('\x00') > -1) {
      key = key.slice(0, key.indexOf('\x00'));
    }
    if (key && key.charAt(0) !== '[') {
      keys = [];
      postLeftBracketPos = 0;
      for (j = 0; j < key.length; j++) {
        if (key.charAt(j) === '[' && !postLeftBracketPos) {
          postLeftBracketPos = j + 1;
        }
        else if (key.charAt(j) === ']') {
          if (postLeftBracketPos) {
            if (!keys.length) {
              keys.push(key.slice(0, postLeftBracketPos - 1));
            }
            keys.push(key.substr(postLeftBracketPos, j - postLeftBracketPos));
            postLeftBracketPos = 0;
            if (key.charAt(j + 1) !== '[') {
              break;
            }
          }
        }
      }
      if (!keys.length) {
        keys = [key];
      }
      for (j = 0; j < keys[0].length; j++) {
        chr = keys[0].charAt(j);
        if (chr === ' ' || chr === '.' || chr === '[') {
          keys[0] = keys[0].substr(0, j) + '_' + keys[0].substr(j + 1);
        }
        if (chr === '[') {
          break;
        }
      }

      obj = array;
      for (j = 0, keysLen = keys.length; j < keysLen; j++) {
        key = keys[j].replace(/^['"]/, '').replace(/['"]$/, '');
        lastIter = j !== keys.length - 1;
        lastObj = obj;
        if ((key !== '' && key !== ' ') || j === 0) {
          if (obj[key] === undef) {
            obj[key] = {};
          }
          obj = obj[key];
        }
        else { // To insert new dimension
          ct = -1;
          for (p in obj) {
            if (obj.hasOwnProperty(p)) {
              if (+p > ct && p.match(/^\d+$/g)) {
                ct = +p;
              }
            }
          }
          key = ct + 1;
        }
      }
      lastObj[key] = value;
    }
  }
}
function number_format (number, decimals, dec_point, thousands_sep) {
	number=(number+'').replace(/[^0-9+\-Ee.]/g,'');
	var n=!isFinite(+number) ? 0 : +number,
		prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		s = '',
		toFixedFix = function (n, prec) {
			var k = Math.pow(10, prec);
			return '' + Math.round(n * k) / k;
		};
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || '').length < prec) {
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}
function uasort(inputArr, sorter) {
  var valArr = [],
    tempKeyVal, tempValue, ret, k = '',
    i = 0,
    strictForIn = false,
    populateArr = {};

  if (typeof sorter === 'string') {
    sorter = this[sorter];
  } else if (Object.prototype.toString.call(sorter) === '[object Array]') {
    sorter = this[sorter[0]][sorter[1]];
  }
  for (k in inputArr) { // Get key and value arrays
    if (inputArr.hasOwnProperty(k)) {
      valArr.push([k, inputArr[k]]);
      if (strictForIn) {
        delete inputArr[k];
      }
    }
  }
  valArr.sort(function(a, b) {
    return sorter(a[1], b[1]);
  });
  var ret=[];
  for (var n=0,j=valArr.length;n<j;n++) {
	  ret.push(valArr[n][1]);
  }
	return ret;
}

jQuery(document).ready(function($) {
	if ($('#calcform').length===0)
		return;
	
	loadPricingJson($("#nonce").val());
	
	$('.stepbuttons .next, .stepbuttons .submit').on('click', function(e) {
		e.preventDefault();
		
		moveToNextStep();
	});
	$('.stepbuttons .prev').on('click', function(e) {
		e.preventDefault();
		
		moveToPrevStep();
	});
	
	$('input[name="coupon"]').next().on('click', function(e) {
		checkcoupon($('input[name="coupon"]'));
	});
	
});

function disableFormWithMessage(msg) {
	var $ = jQuery;
	
	$("#calccont")
		.addClass("loading")
		.attr("data-text", msg);
}

function enableForm() {
	var $ = jQuery;
	
	$("#calccont")
		.removeClass("loading")
		.attr("data-text", "Loading...");
}

function animateFormTop() {
	var $ = jQuery;
	var div = $("#calccontparent");
	
	$("html, body").animate({
		scrollTop: (div.offset().top - 50)
	}, 500);
}

function initializeForm() {
	var $ = jQuery;
	
	$("#input-700").fileinput({
		uploadUrl: calc.upload_url,
		uploadAsync: true,
		maxFileCount: 5,
		allowedFileExtensions: ['jpg', 'png', 'zip', 'gif'],
		maxFileSize: (1024*1024)
	});
	
	$('#input-700').on('fileuploaded', function(event, data, previewId, index) {
		var form = data.form, files = data.files, extra = data.extra,
			response = data.response, reader = data.reader;
		if(typeof response.attachment_id != "undefined" && attachments.indexOf(response.attachment_id) <= 0) {
			attachments.push(response.attachment_id);
		}
	});
	
	enableForm();
	totalsteps = $("#steps .step").length;

	setcurrency('USD');
	
	calc.children={};
	calc.selected=default_selected;
	calc.obj=$('#calc');
	
	var pch=uasort(calc.prices,function(a,b) {
		if (a.parent==b.parent) {
			if (a.sortorder==b.sortorder) {
				return a.id-b.id;	
			} else {
				return a.sortorder-b.sortorder;	
			}
		} else
			return a.parent-b.parent;
	});
	for (kk in pch) {
		if (!pch.hasOwnProperty(kk))
			continue;
		var k=pch[kk].id;
		var a=calc.prices[k];
		if (a.parent==0) {
			var v=$('<div id="ob'+k+'"><span></span><select/></div>');
			$('select',v).attr('name','ob['+k+']');
			$('span',v).text(a.title+': ');
			v.appendTo(calc.obj);
			if (a.type!='' && a.type)
				calc.children[k]=a.type;
		} else {
			if (typeof(calc.children[a.parent])=='undefined')
				calc.children[a.parent]=[];
			calc.children[a.parent].push(k);
		}
	};
	
	selchanged(0);
	
	$('#calc select').change(selchanged);
	$('input[name="spss"]').change(doprices);

	$('select[name="premier"]').change(doprices);
	$('.stepbuttons .prev').hide();
}

function loadPricingJson(nonce) {
	var $ = jQuery;
	
	disableFormWithMessage("Loading...");
	
	$.ajax({
		url: ajx,
		data: {
			action: 'ew_pricing',
			nonce: nonce
		},
		dataType: "JSON",
		success: function(e) {
			calc = e;
			console.log(e);
			
			initializeForm();
		},
		error: function(e) {
			console.log(e);
		}
	});
}

function moveToNextStep() {
	var $ = jQuery;
	var onsubmit = $("#steps .step[data-step="+currentstep+"]").data("onsubmit");
	
	if(totalsteps > currentstep) {
		if(typeof onsubmit != "undefined") {
			eval(onsubmit);
		} else {
			currentstep++;
			resetStepsVisibility();
			
			animateFormTop();
		}
	} else if(typeof onsubmit != "undefined")
		eval(onsubmit);
}

function moveToPrevStep() {
	var $ = jQuery;
	
	if(currentstep <= totalsteps) {
		currentstep--;
		resetStepsVisibility();
		
		animateFormTop();
	}
}

function resetStepsVisibility() {
	var $ = jQuery;
	
	hideErrorMessage();
	
	$("#steps .step").hide();
	$("#steps .step[data-step="+currentstep+"]").show();
	
	$(".stepsvisual > div").removeClass("active");
	$(".stepsvisual > div[data-step="+(currentstep-1)+"]").addClass("active");
	
	if(totalsteps == 1) {
		$(".stepbuttons .prev").hide();
		$(".stepbuttons .next").hide();
		$(".stepbuttons .submit").show();
	} else if(currentstep == totalsteps) {
		$(".stepbuttons .next").hide();
		$(".stepbuttons .prev").show();
		$(".stepbuttons .submit").show();
	} else if(currentstep > 1) {
		$(".stepbuttons .prev").show();
		$(".stepbuttons .next").show();
		$(".stepbuttons .submit").hide();
	} else {
		$(".stepbuttons .prev").hide();
		$(".stepbuttons .next").show();
		$(".stepbuttons .submit").hide();
	}
}

function moveToPaymentForm(o) {
	var $ = jQuery;
	var url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
	
	if(!calc.is_sandbox)
		url = "https://www.paypal.com/cgi-bin/webscr";
	
	disableFormWithMessage("Submitting...");
	
	if((totalPrice != $(".price-container .amount").first().text()) || (totalPrice != $("input[name=price]").val())) {
		showErrorMessage("Order request failed, please try again by re-submitting the form");
		enableForm();
	} else {
		disableFormWithMessage("Starting payment process...");
		var form = $("<form/>")
						.attr("action", url)
						.attr("method", "POST");
		var args = {
			"type": o.type.title,
			"level": o.level.title,
			"changes_interval": o.changes_interval.title,
			"delivery": o.delivery.title,
			"id": o.id,
			"email": o.email,
			"phone": o.phone
		};
		
		var fields = {
			"cmd": '_xclick',
			"charset": 'utf-8',
			"return": calc.return_url,
			"notify_url": calc.notify_url,
			"item_name": o.type.title,
			"amount": totalPrice,
			"first_name": o.fullname,
			"address1": o.address,
			"email": o.email,
			"night_phone_a": o.phone,
			"business": calc.paypal_email,
			"custom": JSON.stringify(args)
		};
		
		for(var k in fields) {
			var input = $("<input/>")
								.attr("type", "hidden")
								.attr("name", k)
								.attr("value", fields[k]);
			form.append(input);
		}
		
		form.hide();
		form.appendTo($("body"));
		form.submit();
	}
}

function attachFiles() {
	var $ = jQuery;
	var input = $("#calcform").find("input#attachments");
	
	if(input.length <= 0) {
		input = $("<input/>")
					.attr("type", "hidden")
					.attr("id", "attachments")
					.attr("name", "attachments");
		$("#calcform").prepend(input);
	}
	
	input.val(attachments.join());
}

function payment() {
	var $ = jQuery;
	
	attachFiles();
	
	var data = $("#calcform").serialize();
	
	animateFormTop();
	disableFormWithMessage("Placing order...");
	
	$.ajax({
		url: ajx + "?action=ew_place_order",
		data: data,
		dataType: "JSON",
		success: function(e) {
			console.log(e);
			
			enableForm();
			animateFormTop();
			
			if(e.status) {
				e.order.id = e.order_id;
				moveToPaymentForm(e.order);
			} else {
				showErrorMessage("Order request failed, please try again later");
			}
		},
		error: function(e) {
			console.log(e);
		}
	});
}

function validate(step) {
	var $ = jQuery;
	var hasErr = false;
	var errMessage = "";
	
	$("#steps .step[data-step="+currentstep+"]").find(".required").each(function() {
		if($(this).val() == "" && !hasErr) {
			hasErr = true;
			errMessage = "Required fields must be filled";
			
			$(this).addClass("invalid");
		} else {
			$(this).removeClass("invalid");
		}
	});
	
	if(!hasErr && currentstep != totalsteps) {
		currentstep++;
		resetStepsVisibility();
		animateFormTop();
	} else if(errMessage != "") {
		showErrorMessage(errMessage);
		animateFormTop();
	} else {
		hideErrorMessage();
	}
	
	return (hasErr == false);
}

function hideErrorMessage() {
	var $ = jQuery;
	$("#steps > .alert-danger").hide();
}

function showErrorMessage(msg) {
	var $ = jQuery;
	var d = $("<div/>")
					.addClass("alert alert-danger");
	
	if($("#steps").find(".alert-danger").length <= 0)
		$("#steps").prepend(d);
	
	$("#steps > .alert-danger").text(msg).show();
}

function urlencode(str) {
	str = (str + '').toString();
	return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
}
function selchanged(ob) {
	var $=jQuery;
	if (typeof(ob)!='number') {
		var i=parseInt($(this).parents('div:eq(0)').attr('id').replace('ob',''));
		calc.selected[i]=$(this).val();
		$('#calc select').html('');
	}
	sel=[];
	var prem=$('select[name="premier"]');
	prem=(prem.length>0) ? parseInt(prem.val()) : 0;
	
	for (k in calc.children) {
		if (!calc.children.hasOwnProperty(k))
			continue;
		var a=calc.children[k];
		var o=$('#ob'+k+' select');
		if (typeof(a)=='string') {
			a=eval('('+a+')');
			if (typeof(a.type)=='undefined')
				continue;
			
			switch (a.type) {
				case 'range':
					for  (var n=a.min;n<=a.max;n+=a.step) {
						$('<option value="'+n+'"/>').appendTo(o).text(n+a.postfix);
					}
					if (typeof(calc.selected[k])!='undefined')
						$(o).val(calc.selected[k]);					
					break;
			}
		} else {
			for (var n=0,j=a.length;n<j;n++) {
				var t=$('<option value="'+a[n]+'"/>');
				var y=calc.prices[a[n]];
				if (y.showwhen) {
					t.attr('showwhen',y.showwhen);
					var w=y.showwhen.split(/,/g);
					var found=false;
					var neg=true;
					for (wk=0,wj=w.length;wk<wj;wk++) {
						w[wk]=parseInt(w[wk]);
						for (var nn=0,jj=sel.length;nn<jj;nn++) {
							if (sel[nn]==w[wk]) {
								found=true;
							} else if (Math.abs(w[wk])==sel[nn]) {
								found=true;
								neg=false;	
							}
						}
					}
					if (!found || (found && !neg))
						continue;
				}
				var nt=y.title;


				if (y.type) {
					yt=eval('('+y.type+')');
					var pn=getpn();
					if (yt[pn]) {
						nt+=' - ';
						if (!yt.max)
							nt+=' up to ';
						else
							yt[pn]+='+';
						nt+=yt[pn]+' words';
					}
				}
				t.appendTo(o).text(nt);
				if ((typeof(calc.selected[k])=='undefined' && n==0) || (a[n]==calc.selected[k])) {
					a[n]=parseInt(a[n]);
					sel.push(a[n]);
					calc.selected[k]=a[n];
					o.val(a[n]);
					if (y.type && k==5) {
						var change=0;
						if (yt.nopay) {
							if (!calc.nopay)
								change=1;
							calc.nopay=1;
						} else {
							if (calc.nopay)
								change=1;
							calc.nopay=0;
						}
						if (change) {
							if ($('.condition').length==0)
								$('#calc').after('<div class="condition"></div>').after('<input type="hidden" name="nopay" value="0"/>');
							$('.condition').text((calc.nopay) ? yt.condition : '');
							$('input[name="nopay"]').val(calc.nopay);
							doshowsteps();
						}
					}
				}
			}
		}
	}
	doprices();
}
function _doprices(p,w,per) {
	if (per>0)
		p=p+Math.abs(p*(parseFloat(per)/100));
	if (per<0)
		p=p-Math.abs(p*(parseFloat(per)/100));
	var d=0;
	for (k in calc.discountwords) {
		if (!calc.discountwords.hasOwnProperty(k))
			continue;
		if (w>=k)
			d=calc.discountwords[k];
	}
	var t=jQuery('select[name="ob[1]"]').val();
	for (k in calc.discountwordsexclude) {
		if (calc.discountwordsexclude.hasOwnProperty(k) && t==calc.discountwordsexclude[k])
			d=0;
	}
	var prev=p*(w/250);
	if (d && currentdiscount<=10) {
		p-=p*(d/100);	
	}
	p=p*(w/250);
	return {total:p,prev:prev};	
}
function doprices() {
	var $=jQuery;

	var p=0;
	var w=0;
	var per=[];
	var prem=$('select[name="premier"]');
	prem=(prem.length>0) ? parseInt(prem.val()) : 0;
	var premp=0;
	var premper=0;
	var addamount=0;
	var ctype=getpn();
	jQuery('#calc select').each(function(k) {
		// k is -1 of the name
		if (k==3)
			return w=parseInt(jQuery(this).val());
		var v=jQuery(this).val();
		var y=calc.prices[v];
		if (y.addamount)
			addamount+=parseFloat(y.addamount);
		if (y.addprice)
			p+=parseFloat(y.addprice);
		ytype={};
		if (y.type)
			ytype=eval('('+y.type+')');
		if (typeof(ytype[ctype+'_percentage'])!='undefined') {
			var pc=parseFloat(ytype[ctype+'_percentage']);
			if (!isNaN(pc) && pc) {
				per.push(pc);
			}
		}
		if (y.percentage!=0) {
			var pc=parseFloat(y.percentage);
			if (!(currentdiscount>10 && k===4 && pc<0))
				per.push(pc);
		}
		if (k!=5) {
			if (y.addprice)
				premp+=parseFloat(y.addprice);
			if (y.percentage!=0)
				premper+=parseFloat(y.percentage);				
		}
	});
	var prev=_doprices(p,w,per);
	prev=prev.prev;
	for (k in per) {
		p+=(p*(per[k]/100));	
	}
	per=0;
	p=_doprices(p,w,per);
	p=p.total;
	premp=_doprices(premp,w,premper);
	premp=premp.total;
	

	var add=((premp*calc.premier)/100);
	if (!add)
		add=0;
	if (addamount) {
		p+=addamount;
		prev+=addamount;
	}
	if ($('input[name="spss"]').prop('checked')) {
		p+=150;
		prev+=150;	
	}
	if (prem && add) {
		p+=add;	
		prev+=add;
	}
	if (currentdiscount) {
		var dis=((add*currentdiscount)/100);
		if (currentdiscountmax>0 && dis>currentdiscountmax)
			dis=currentdiscountmax;
		add=add-dis;
	}
	$('.premier').text(exchangerate(add));
	
	$('#ob6').toggle(!prem);
	prev=exchangerate(prev);
	p=exchangerate(p);
	setprice(p,prev);
	calcdate();
}
function calcdebug(t) {
	if (typeof(console)=='object' && typeof(console.log)=='function')
		console.log(arguments);
}
function setprice(p,prev) {
	var $=jQuery;
	var datediscount=0;
	var md=mindate();
	var w=(typeof(prev)=='undefined') ? p : prev;
	
	if (currentdate>md) {
		if (md<14) {
			if (currentdate==14)
				datediscount=0.05;
			else if (currentdate>14)
				datediscount=0.07;	
		} else if (md<21) {
			if (currentdate==21)
				datediscount=0.05;
		}
	}
	if (datediscount) {
		p-=p*datediscount;	
	}

	if (currentdiscount) {
		var dis=((p*currentdiscount)/100);
		if (currentdiscountmax>0 && dis>currentdiscountmax)
			dis=currentdiscountmax;
		p=p-dis;
	}
	if (w!=p && p<w) {
		var maxdis=0.2*w;
		if (w-p>maxdis)
			p=w-maxdis;
		pc=(100-Math.floor((p/w)*100));
		$('.was').attr('title',pc+'% Discount Applied').text(number_format(w,0));
		$('.totalpercent').text(pc);
		$('.was').prepend('<span class="currency"/>');
	} else {
		$('.was').attr('title','').html('');
	}
	
	$('input[name="price"]').val(p);
	setcurrency();
	jQuery('.amount').text(number_format(p,2));
	
	totalPrice = p;
}
Date.prototype.addDate = function(x) {
	this.setDate(this.getDate()+x);
}
function testdates() {
	for (var n=0;n<=168;n++) {
		var date=new Date();
		date.setHours(date.getHours()+n);
		var dt=date.toString();
		calcdate(date);
		//console.log(dt+' - '+jQuery('.calcdate:eq(0)').text());
	}
}
function docalcdate() {
	if (docalcdatedone)
		return;
	window.setInterval(function() {
		calcdate();
	},60000);
	docalcdatedone=true;
}
function getpn(d) {
	var def='essay';
	if (typeof(calc.selected)=='undefined' || typeof(calc.prices)=='undefined')
		return def;
	var v=calc.selected[1];
	var p=calc.prices[v];
	if (!p.type)
		return def;
	var d=eval('('+p.type+')');
	if (!d.pn)
		return def;
	return d.pn;	
}
function calcdate(testdate) {
	if (typeof(calc.selected)=='undefined')
		return;
	var v=calc.selected[5];
	var p=calc.prices[v];
	if (!p.type)
		return '';
	var words=parseInt(jQuery('#ob4 select').val());
	var d=eval('('+p.type+')');
	var pn=getpn(d);
	var days=d.date;
	d[pn]=parseInt(d[pn]);
	if (isNaN(d[pn]))
		d[pn]=words;
	if (words>d[pn]) {
		if (d.max) {
			var pd=d[pn]/days;
			var tt=words-d[pn];
			while (tt>0) {
				days+=1;
				tt-=pd;
			}
		} else {
			recalcdate(pn,words);
			return;
			//alert('Invalid Delivery time - try recalculating');	
		}
	}
	var n=(typeof(testdate)=='undefined') ? new Date() : testdate;
	if (n.getDay()==0)
		days+=1;
	else if (n.getHours()>=d.cutoff) {
		days+=1;	
	}
	while (days>0) {
		n.addDate(1);
		if (n.getDay()!=0)
			days-=1;	
	}
	var t=Math.floor(n.getTime()/1000);
	var holiday=0;
	var message_class='';
	var now=new Date();
	now=Math.floor(now.getTime()/1000);
	for (var k in calc.holiday) {
		if (!calc.holiday.hasOwnProperty(k))
			continue;
		if (t>=calc.holiday[k][0] && now<=calc.holiday[k][1]) {
			if (now<=calc.holiday[k][0])
				var diff=calc.holiday[k][1]-calc.holiday[k][0]
			else
				var diff=calc.holiday[k][1]-now;
			holiday=typeof(calc.holiday[k][2]!='undefined') ? calc.holiday[k][2] : '';
			message_class=typeof(calc.holiday[k][3]!='undefined') ? calc.holiday[k][3] : '';
			while (diff>=0) {
				n.addDate(1);
				diff-=24*60*60;
			}
			if (n.getDay()==0)
				n.addDate(1);
		}
	}
	jQuery('#amessage').remove();
	if (holiday) {
		var htext=jQuery('<div id="amessage"/>');
		if (message_class)
			htext.addClass(message_class);
		htext.html(holiday);
		if (jQuery('#calcmessage').length>0)
			jQuery('#calcmessage').append(htext);
		else
			jQuery('#calccont').prepend(htext);
	}
	var f=n.getDate();
	if (f==1 || f==21 || f==31)
		f+='st';
	else if (f==2 || f==22)
		f+='nd';
	else if (f==3 || f==23)
		f+='rd';
	else
		f+='th';
	var mon=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
	var newdate=d.time+' on '+f+' '+mon[n.getMonth()]+' '+n.getFullYear();
	jQuery('.calcdate').text(newdate);
	calcform.deliverydate.value=newdate;
}
function mindate() {
	if (typeof(calc.selected)=='undefined' || typeof(calc.selected[5])=='undefined')
		return 0;
	var v=calc.selected[5];
	var p=calc.prices[v];
	if (!p.type)
		return 0;
	var words=parseInt(jQuery('#ob4 select').val());
	var d=eval('('+p.type+')');
	var pn=getpn(d);
	var m=0;
	var s=0;
	var mind=-1;
	var mins={};
	currentdate=7;
	for (k in calc.children[5]) {
		if (!calc.children[5].hasOwnProperty(k))
			continue;
		var t=eval('('+calc.prices[calc.children[5][k]].type+')');
		t[pn]=parseInt(t[pn]);
		if (t[pn]>words) {
			if (mind==-1 || mind>t.date)
				mind=t.date;
		}
		if (v==calc.children[5][k])
			currentdate=t.date;
	}
	return mind;
}
function recalcdate(pn,words) {
	var m=0;
	var s=0;
	for (k in calc.children[5]) {
		if (!calc.children[5].hasOwnProperty(k))
			continue;
		var t=eval('('+calc.prices[calc.children[5][k]].type+')');
		if (typeof(t.max)!=='undefined' && t.max) {
			m=calc.children[5][k];	
		} else if (t[pn]>=words)
			s=calc.children[5][k];
	}
	if (!s)
		s=m;
	if (!s)
		return;
	jQuery('#ob5 select').val(s);
	jQuery('#ob5 select').change();
	doprices();
	//calcdate();	
}
function exchangerate(p) {
	p=Math.round(calc.exchange[calc.currency]*p)+'.00';
	calcform.price.value=p;
	return p;
}
function setcurrency(c) {
	var s=false;
	if (typeof(c)=='undefined') {
		c=calc.currency;
		s=true;
	} else {
		calc.currency=c;
	}
	if (typeof(calc.symbols[c])=='undefined')
		calc.symbols[c]=c;
	jQuery('.currency').html(calc.symbols[c]);
	if (!s) {
		calcform.currency.value=c;
		jQuery('#currency-selection a').removeClass('active').filter('.'+c.toLowerCase()).addClass('active');
		doprices();
		return false;
	}
	return c;
}

function setdiscount(c,mx) {
	var $=jQuery;
	currentdiscount=parseFloat(c);
	if (isNaN(currentdiscount))
		currentdiscount=0;
	currentdiscountmax=mx;
	var p=parseFloat($(calcform.price).val());
	if (c==0) {
		$('.couponinfo').addClass('no').removeClass('yes').html('');
		$('input[name="coupon"]').val('');
	} else {
		var curr=calc.symbols[calcform.currency.value];
		var n=$('<div><span class="totalpercent">'+c+'</span>% Discount Applied - <span class="was strike"></span> <span class="amount"></span></div>');
		$('span:eq(0)',n).html(curr+number_format(p,2));
		var dis=((p*c)/100);
		if (mx>0 && dis>mx)
			dis=mx;
		$('span:eq(1)',n).html(curr+number_format(p-dis,2));
		$('.couponinfo').removeClass('no').addClass('yes').html('');
		$('.couponinfo').append(n);
	}
	setprice(p);
	doprices();
};

function checkcoupon(input) {
	var $=jQuery;
	var v=input.val();
	
	$('input[name="coupon"]').val(v);
	
	if (v=='')
		return setdiscount(0,0);
	
	$.ajax({
		url: ajx,
		data:{
			action:'check_coupon',
			coupon:v
		},
		dataType: "JSON",
		success:function(a) {
			var am=a.amount ? a.amount : 0;
			var mx=a.max ? a.max : 0;
			
			setdiscount(am,mx);
			console.log(am);
		},
		error:function() {
			setdiscount(0,0);
			console.log("coupon error");
		}
	});
};