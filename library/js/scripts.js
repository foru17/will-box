/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    
    /* getting viewport width */
    var responsive_viewport = $(window).width();
    
    /* if is below 481px */
    if (responsive_viewport < 481) {
    
    } /* end smallest screen */
    
    /* if is larger than 481px */
    if (responsive_viewport > 481) {
        
    } /* end larger than 481px */
    
    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {
    
        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });
        
    }
    
    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {
        
    }

	// add all your scripts here
	
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );


/* 返回顶部*/
var STR_TO_TOP = '返回顶部';
$(function() {
    var button = $('<a href="#" id="to-top" title="' + STR_TO_TOP + '">↑</a>').appendTo('body');

    $(window).scroll(function() {
        if ($(window).scrollTop() > $(window).height()) button.fadeIn(500);
        else button.fadeOut(500);
    });

    button.click(function(e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: 0
        }, 1000, function() {
            window.location.hash = '#';
        });
    });
});

// 瀑布流Mansoy样式
$(function() {
    $('.home-posts-list').masonry({
        itemSelector: '.post-in-list',
        columnWidth: function(containerWidth) {
            return containerWidth / ($(window).width() > 640 ? 3 : 2);
        }
    });
    // 加载后自动reload瀑布流（仿佛布局混乱
    $(window).load(function(){
        $('.home-posts-list').masonry('reload');
    });
    // 改变窗口后reload瀑布流
    $(window).resize(function() {
        $('.home-posts-list').masonry('reload');
    });
});

//评论栏背景文字



//顶部导航

/*
    FlexNav.js 0.7

    Copyright 2013, Jason Weaver http://jasonweaver.name
    Released under the WTFPL license
    http://sam.zoy.org/wtfpl/

//
*/


(function() {

  $.fn.flexNav = function(options) {
    var $nav, breakpoint, isDragging, nav_open, resizer, settings;
    settings = $.extend({
      'animationSpeed': 100
    }, options);
    $nav = $(this);
    nav_open = false;
    isDragging = false;
    $nav.find("li").each(function() {
      if ($(this).has("ul").length) {
        return $(this).addClass("item-with-ul").find("ul").hide();
      }
    });
    if ($nav.data('breakpoint')) {
      breakpoint = $nav.data('breakpoint');
    }
    resizer = function() {
      if ($(window).width() <= breakpoint) {
        $nav.removeClass("lg-screen").addClass("sm-screen");
        $('.one-page li a').on('click', function() {
          return $nav.removeClass('show');
        });
        return $('.item-with-ul').off();
      } else {
        $nav.removeClass("sm-screen").addClass("lg-screen");
        $nav.removeClass('show');
        return $('.item-with-ul').on('mouseenter', function() {
          return $(this).find('>ul').addClass('show').stop(true, true).slideDown(settings.animationSpeed);
        }).on('mouseleave', function() {
          return $(this).find('>ul').removeClass('show').stop(true, true).slideUp(settings.animationSpeed);
        });
      }
    };
    $('.item-with-ul, .menu-button').append('<span class="touch-button"><i class="navicon">&#9660;</i></span>');
    $('.menu-button, .menu-button .touch-button').on('touchstart mousedown', function(e) {
      e.preventDefault();
      e.stopPropagation();
      console.log(isDragging);
      return $(this).on('touchmove mousemove', function(e) {
        var msg;
        msg = e.pageX;
        isDragging = true;
        return $(window).off("touchmove mousemove");
      });
    }).on('touchend mouseup', function(e) {
      var $parent;
      e.preventDefault();
      e.stopPropagation();
      isDragging = false;
      $parent = $(this).parent();
      if (isDragging === false) {
        console.log('clicked');
      }
      if (nav_open === false) {
        $nav.addClass('show');
        return nav_open = true;
      } else if (nav_open === true) {
        $nav.removeClass('show');
        return nav_open = false;
      }
    });
    $('.touch-button').on('touchstart mousedown', function(e) {
      e.stopPropagation();
      e.preventDefault();
      return $(this).on('touchmove mousemove', function(e) {
        isDragging = true;
        return $(window).off("touchmove mousemove");
      });
    }).on('touchend mouseup', function(e) {
      var $sub;
      e.preventDefault();
      e.stopPropagation();
      $sub = $(this).parent('.item-with-ul').find('>ul');
      if ($nav.hasClass('lg-screen') === true) {
        $(this).parent('.item-with-ul').siblings().find('ul.show').removeClass('show').hide();
      }
      if ($sub.hasClass('show') === true) {
        return $sub.removeClass('show').slideUp(settings.animationSpeed);
      } else if ($sub.hasClass('show') === false) {
        return $sub.addClass('show').slideDown(settings.animationSpeed);
      }
    });
    $('.item-with-ul *').focus(function() {
      $(this).parent('.item-with-ul').parent().find(".open").not(this).removeClass("open").hide();
      return $(this).parent('.item-with-ul').find('>ul').addClass("open").show();
    });
    resizer();
    return $(window).on('resize', resizer);
  };

}).call(this);



