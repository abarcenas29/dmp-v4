$(document).ready(function(){
	show_menu_click('.dmp-menu','#main-container');
	clear_menu('.nav-items',function(){$('.nav-items').slideUp('fast');});
	search('#search-box','#dmp-search','#search-result');
	ajax_search('#search-box','#search-query','#search-result','search_ajax');
	snaptofix('#dmp-navigation');
});

$(window).load(function(){

});
