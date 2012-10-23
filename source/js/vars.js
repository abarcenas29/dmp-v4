var search = function (btn,item,query){
	$(btn).focusin(function(){
		$('.nav-items').slideUp('fast');
		$(item).slideDown('fast');
	});
	$(btn).focusout(function(){
		if($(btn).val().length <= 3) {
			$(query).html('<h3 id="search-query">Type your search query and hit search</h3>');
		}
		$(btn).val('');
		$(item).slideUp('fast');
	});
}

var ajax_search = function (input,start,op,url) {
	$(input).keyup(function(e){
		if (e.keyCode == 13) {
			$(start).text('Searching...' + $(input).val());
			var form_data = {
				query : $(input).val()
			};
			postAjax(url,form_data,op);
		} else {
			$(start).text($(input).val());
		}
	});
}

var showmenu = function(btn,main) {
	var menu = get_href(btn,'href');
	var item = get_href(menu,'class');
	
	if($(menu).css('display') == 'block') {
		$('.'+item).slideUp('fast');
	} else {
		$('.'+item).slideUp('fast');
		$(menu).stop().slideDown('fast',function(){});
	}
}


var snaptofix = function(elm) {
	var pos = $(elm).offset().top;
	
	$(window).scroll(function(){
		var diff = pos - $(window).scrollTop();
		if (diff <= 0) {
			$(elm).css('position','fixed').css('top',0).css('z-index','1000');
		} else {
			$(elm).removeAttr('style');
		}
	});
}

var ScrollTrigger = {
	triggerScroll: function(executeatscroll,callBack,fallBack) {
						$(window).scroll(function() { 
							var vnum_scrollwinposition = $(window).scrollTop();
							var vnum_scrolldocheight = $(document).height();
							var vnum_scrollwinheight = $(window).height();
				
							var vnum_scrollheight = vnum_scrolldocheight - vnum_scrollwinheight;
							var vnum_scrollcompleteness = (vnum_scrollwinposition/vnum_scrollheight) * 100.00;
						
							if (vnum_scrollcompleteness >= executeatscroll) {
								callBack();
								} else if (vnum_scrollcompleteness <= executeatscroll) {
								fallBack();
								}
						});//end of scroll function
	}//end property function
}//end of object

var postAjax = function(url,form_data,op) {
	jQuery.ajax({
		type:'POST',
		url: ajaxurl,
		data: {'action': url,data:form_data},
		success: function(data){
			$(op).html(data);
		}
	});
}

var clear_menu = function(btn,callback) {
	$(btn).click(function(){
		callback();
	});
}

var show_menu_click = function(btn,main) {
	$(btn).click(function(){
		showmenu($(this),main);
		return false;
	});
}

var debug_val = function (no,val) {
	if (no == 1) {
		$('#debug-val').text(val);
	} else {
		$('#debug-val2').text(val);
	}
}

var get_href = function(btn,att) {
	return $(btn).attr(att);
}
