function vw_eco_nature_menu_open_nav() {
	window.vw_eco_nature_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_eco_nature_menu_close_nav() {
	window.vw_eco_nature_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   	});
});

jQuery(document).ready(function () {
	window.vw_eco_nature_currentfocus=null;
  	vw_eco_nature_checkfocusdElement();
	var vw_eco_nature_body = document.querySelector('body');
	vw_eco_nature_body.addEventListener('keyup', vw_eco_nature_check_tab_press);
	var vw_eco_nature_gotoHome = false;
	var vw_eco_nature_gotoClose = false;
	window.vw_eco_nature_responsiveMenu=false;
 	function vw_eco_nature_checkfocusdElement(){
	 	if(window.vw_eco_nature_currentfocus=document.activeElement.className){
		 	window.vw_eco_nature_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_eco_nature_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_eco_nature_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_eco_nature_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_eco_nature_gotoHome = true;
			} else {
				vw_eco_nature_gotoHome = false;
			}

		}else{

			if(window.vw_eco_nature_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_eco_nature_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_eco_nature_responsiveMenu){
				if(vw_eco_nature_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_eco_nature_gotoClose = true;
				} else {
					vw_eco_nature_gotoClose = false;
				}
			
			}else{

			if(window.vw_eco_nature_responsiveMenu){
			}}}}
		}
	 	vw_eco_nature_checkfocusdElement();
	}
});

(function( $ ) {
	jQuery('document').ready(function($){
	    setTimeout(function () {
    		jQuery("#preloader").fadeOut("slow");
	    },1000);
	});

	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});
	
	$(document).ready(function () {
		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup i').fadeIn();
		    } else {
		        $('.scrollup i').fadeOut();
		    }
		});
		$('.scrollup i').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});
	});
})( jQuery );

jQuery(document).ready(function () {
  	function vw_eco_nature_search_loop_focus(element) {
	  var vw_eco_nature_focus = element.find('select, input, textarea, button, a[href]');
	  var vw_eco_nature_firstFocus = vw_eco_nature_focus[0];  
	  var vw_eco_nature_lastFocus = vw_eco_nature_focus[vw_eco_nature_focus.length - 1];
	  var KEYCODE_TAB = 9;

	  element.on('keydown', function vw_eco_nature_search_loop_focus(e) {
	    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

	    if (!isTabPressed) { 
	      return; 
	    }

	    if ( e.shiftKey ) /* shift + tab */ {
	      if (document.activeElement === vw_eco_nature_firstFocus) {
	        vw_eco_nature_lastFocus.focus();
	          e.preventDefault();
	        }
	      } else /* tab */ {
	      if (document.activeElement === vw_eco_nature_lastFocus) {
	        vw_eco_nature_firstFocus.focus();
	          e.preventDefault();
	        }
	      }
	  });
	}
	jQuery('.search-box span a').click(function(){
        jQuery(".serach_outer").slideDown(1000);
    	vw_eco_nature_search_loop_focus(jQuery('.serach_outer'));
    });

    jQuery('.closepop a').click(function(){
        jQuery(".serach_outer").slideUp(1000);
    });
});