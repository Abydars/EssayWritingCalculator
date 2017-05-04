jQuery(document).ready(function($) {

$.dosteps={
	setup:function(options) {
		options=options || {};
		var steps={};
		var stepsorder=[];
		var pstep=this;
		var maxstep=0;
		$('.step',this).each(function() {
			var t=$(this).text();
			if (typeof(t)=='undefined' || t.replace(/^[\r\n\t ]+$/g,'')=='') {
				$(this).remove();
				return;
			}
			t=$(this).data('step');
			if (typeof(steps[t])=='undefined') {
				steps[t]=[];
				stepsorder.push(t);
			}
			$(this).addClass('step_'+t);
			steps[t].push(this);
			if (typeof($(this).data('when'))=='undefined') {
				$(this).addClass('nowhen');
			}
		});
		if (stepsorder.length<=1)
			return;
		var b=$('<div class="stepbuttons"></div>');
		$(this).append(b);
		$(stepsorder).each(function(i) {
			if (i>0)
				$(steps[this]).hide();
		});
		$('input[type="submit"]',this).remove();
		$(this).addClass('stepparent');
		if (options.full) {
			$(this).addClass('stepfull');
		}
		$(this).data('steps',steps);
		$(this).data('stepsorder',stepsorder);
		$(this).data('stepsopts',options);
		$(this).data('firstview',{});
		this.setstep=function(step) {
			$.dosteps.setstep(pstep,step);
		};
		$.dosteps.setstep(this,0);
	},
	getparent:function(e) {
		if ($(e).hasClass('stepparent'))
			return e
		return $(e).parents('.stepparent')[0];	
	},
	setstep:function(element,step) {
		var opt={};
		if (typeof(step)=='object') {
			opt=step;
			step=step.step;
		}
		var f=this.getparent(element);
		var d=$(f).data();
		var cstep=d.currentstep;
		d.moved=step-cstep;
		if (typeof(d.stepsopts.onfirstview)!='undefined' && typeof(d.firstview[step])=='undefined') {
			d.stepsopts.onfirstview.call(f,d.stepsorder[step],d);
			d.firstview[step]=1;
			$(f).data('firstview',d.firstview);
		}
		if (typeof(d.stepsopts.onchange)!='undefined' && step!=d.currentstep) {
			var s=d.stepsopts.onchange.call(f,d.stepsorder[step],d);
			if (s!==null && typeof(s)!=='undefined') {
				if (s===false)
					return false;			
				d.currentstep=s;
				this.setstep(element,s);
				return;
			}
		}
		if (step===false)
			return false;
		if (step<0)
			step=0;
		if (typeof(d.currentstep)!='undefined' && d.currentstep==step)
			return;
		if (step>=d.stepsorder.length) {
			$.dosteps.fin(f);
			return;
		}
		$('.stepbuttons',f).html('');
		var lastbutton=(typeof(d.stepsopts.lastbutton)!='undefined') ? d.stepsopts.lastbutton : 'Finish';
		var full=(typeof(d.stepsopts.full)!='undefined') ? d.stepsopts.full : false;
		var psteps=$('.step_'+d.stepsorder[step]).prevAll('.step:not(.disabled)');
		var nsteps=$('.step_'+d.stepsorder[step]).nextAll('.step:not(.disabled)');
		$('.stepbuttons',f).removeAttr('class').addClass('stepbuttons step_'+d.stepsorder[step]);
		if (psteps.length>0 && !full)
			$('.stepbuttons').append('<a href="#" class="button prev" onclick="return jQuery.dosteps.prev(this)" style="float:left">Previous</a>');
		if (nsteps.length>0 && !full)
			$('.stepbuttons').append('<a href="#" class="button next" onclick="return jQuery.dosteps.next(this)" style="float:right">Next</a>');
		else
			$('.stepbuttons').append('<a href="#" class="button next last" onclick="return jQuery.dosteps.fin(this)" style="float:right">'+lastbutton+'</a>')
		$(f).data('currentstep',step);
		if (typeof(d.currentstep)!='undefined') {
			$('.step',f).hide();
			$('.step_'+d.stepsorder[step]).show();
		}
		if (typeof(d.stepsopts.changed)!='undefined')
			d.stepsopts.changed.call(f,d.stepsorder[step],d);
	},
	next:function(element) {
		var f=this.getparent(element);
		var d=$(f).data();
		var full=(typeof(d.stepsopts.full)!='undefined') ? d.stepsopts.full : false;
		var s=d.currentstep+1;
		while (this.setstep(f,s)===false) {
			s+=1;	
		}
		return false;		
	},
	prev:function(element) {
		var f=this.getparent(element);
		var d=$(f).data();
		var s=d.currentstep-1;
		while (this.setstep(f,s)===false) {
			s-=1;	
		}
		return false;	
	},
	fin:function(element) {
		var f=this.getparent(element);
		var d=$(f).data();
		if (typeof(d.stepsopts.laststep)!='undefined')
			return d.stepsopts.laststep.call(f,d);
		else {
			f.submit();
			return false;
		}
	}
};
$.fn.dosteps=function(options) {
	$(this).each(function() {
		$.dosteps.setup.call(this,options);
	});
}

});