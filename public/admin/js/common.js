$(window).on("resize orientationchange", function (e) {
    if (window.innerHeight > window.innerWidth) {
        var wsw = window.screen.width;
		if (wsw < 767) {
			$("meta[name='viewport']").attr("content", "width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,shrink-to-fit=no");
		} else if (wsw < 1125) {
			$("meta[name='viewport']").attr("content", "width=1124");
		} else {
			$("meta[name='viewport']").attr("content", "width=device-width");
		}
    }else {
		$("meta[name='viewport']").attr("content", "width=1124");
    }

}).trigger("resize");

// accordion.js
$(function() {
	$('.accordion dl dd').hide();
	$('.accordion dl dt.opened').nextUntil('.accordion dl dt').show();
	$('.accordion dl dt').click(function(e) {
		$(this).toggleClass('opened');
		$(this).nextUntil('.accordion dl dt').slideToggle('normal');
	});

});
$(function() {
	$('.drop_menu #NavWrap li.drop_wrap').click(function(e) {
		$(this).toggleClass('opened');
	});
	$('.toggle_switch').click(function(e) {
		$(this).toggleClass('opened');
	});
});
// Page Top Fade
$(function() {
    $(window).on('load scroll', function(){
        
        if ($(window).scrollTop() > 108) {
            $('#fix_menu').addClass('fixedMenu');
            $('#content').addClass('fixed_link');
            $('.page_links').addClass('fixed_link');
        } else {
            $('#fix_menu').removeClass('fixedMenu');
            $('#content').removeClass('fixed_link');
            $('.page_links').removeClass('fixed_link');
        }
        
    });
});

$(function() {
	var topBtn = $('#pageTop');
    topBtn.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 1000);
		return false;
    });
});

$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 1000;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

$(document).ready(function(){
		$(function() {
			$('.action').on('inview', function(event, isInView, visiblePartX, visiblePartY) {
				if(isInView){
					$(this).addClass('once');
		    	} 
			});
		});
});