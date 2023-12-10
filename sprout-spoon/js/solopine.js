jQuery(document).ready(function($) {

	"use strict";
	
	// Menu
	$('#nav-wrapper .menu').slicknav({
		prependTo:'.menu-mobile',
		label:'',
		allowParentLinks: true
	});
	
	// Sticky Menu
	var $wpAdminBar = $('#wpadminbar');
	if ($wpAdminBar.length) {
		$("#navigation").sticky({topSpacing:$wpAdminBar.height()});
	} else {
		$("#navigation").sticky({topSpacing:0});
	}
	
	$('.post-img .bxslider').bxSlider({
	  adaptiveHeight: true,
	  mode: 'fade',
	  pager: false,
	  captions: true,
	  nextText: '<i class="fa fa-angle-right"></i>',
	  prevText: '<i class="fa fa-angle-left"></i>',
	  onSliderLoad: function(){
			$(".sideslides").css("visibility", "visible");
		}
	});
	
	// Fitvids
	$(document).ready(function(){
		$(".container").fitVids();
	});
	
	// back to top
	$('.to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	
});