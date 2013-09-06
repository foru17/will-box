/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/// IE8 ployfill for GetComputed Style (for Responsive Script below)
window.getComputedStyle||(window.getComputedStyle=function(e,t){this.el=e;this.getPropertyValue=function(t){var n=/(\-([a-z]){1})/g;t=="float"&&(t="styleFloat");n.test(t)&&(t=t.replace(n,function(){return arguments[2].toUpperCase()}));return e.currentStyle[t]?e.currentStyle[t]:null};return this});jQuery(document).ready(function(e){var t=e(window).width();t<481&&e(window).scroll(function(){e(window).scrollTop()>e(window).height()?e(".top-bar").fadeOut(500):e(".top-bar").fadeIn(500)});t>481;t>=768&&e(".comment img[data-gravatar]").each(function(){e(this).attr("src",e(this).attr("data-gravatar"))});t>1030});(function(e){function c(){n.setAttribute("content",s);o=!0}function h(){n.setAttribute("content",i);o=!1}function p(t){l=t.accelerationIncludingGravity;u=Math.abs(l.x);a=Math.abs(l.y);f=Math.abs(l.z);!e.orientation&&(u>7||(f>6&&a<8||f<8&&a>6)&&u>5)?o&&h():o||c()}if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1))return;var t=e.document;if(!t.querySelector)return;var n=t.querySelector("meta[name=viewport]"),r=n&&n.getAttribute("content"),i=r+",maximum-scale=1",s=r+",maximum-scale=10",o=!0,u,a,f,l;if(!n)return;e.addEventListener("orientationchange",c,!1);e.addEventListener("devicemotion",p,!1)})(this);var STR_TO_TOP="返回顶部";$(function(){var e=$('<a href="#" id="to-top" title="'+STR_TO_TOP+'">↑</a>').appendTo("body");$(window).scroll(function(){$(window).scrollTop()>$(window).height()?e.fadeIn(500):e.fadeOut(500)});e.click(function(e){e.preventDefault();$("html, body").animate({scrollTop:0},1e3,function(){window.location.hash="#"})})});(function(){$.fn.flexNav=function(e){var t,n,r,i,s,o;o=$.extend({animationSpeed:100},e);t=$(this);i=!1;r=!1;t.find("li").each(function(){if($(this).has("ul").length)return $(this).addClass("item-with-ul").find("ul").hide()});t.data("breakpoint")&&(n=t.data("breakpoint"));s=function(){if($(window).width()<=n){t.removeClass("lg-screen").addClass("sm-screen");$(".one-page li a").on("click",function(){return t.removeClass("show")});return $(".item-with-ul").off()}t.removeClass("sm-screen").addClass("lg-screen");t.removeClass("show");return $(".item-with-ul").on("mouseenter",function(){return $(this).find(">ul").addClass("show").stop(!0,!0).slideDown(o.animationSpeed)}).on("mouseleave",function(){return $(this).find(">ul").removeClass("show").stop(!0,!0).slideUp(o.animationSpeed)})};$(".item-with-ul, .menu-button").append('<span class="touch-button"><i class="navicon">&#9660;</i></span>');$(".menu-button, .menu-button .touch-button").on("touchstart mousedown",function(e){e.preventDefault();e.stopPropagation();console.log(r);return $(this).on("touchmove mousemove",function(e){var t;t=e.pageX;r=!0;return $(window).off("touchmove mousemove")})}).on("touchend mouseup",function(e){var n;e.preventDefault();e.stopPropagation();r=!1;n=$(this).parent();r===!1&&console.log("clicked");if(i===!1){t.addClass("show");return i=!0}if(i===!0){t.removeClass("show");return i=!1}});$(".touch-button").on("touchstart mousedown",function(e){e.stopPropagation();e.preventDefault();return $(this).on("touchmove mousemove",function(e){r=!0;return $(window).off("touchmove mousemove")})}).on("touchend mouseup",function(e){var n;e.preventDefault();e.stopPropagation();n=$(this).parent(".item-with-ul").find(">ul");t.hasClass("lg-screen")===!0&&$(this).parent(".item-with-ul").siblings().find("ul.show").removeClass("show").hide();if(n.hasClass("show")===!0)return n.removeClass("show").slideUp(o.animationSpeed);if(n.hasClass("show")===!1)return n.addClass("show").slideDown(o.animationSpeed)});$(".item-with-ul *").focus(function(){$(this).parent(".item-with-ul").parent().find(".open").not(this).removeClass("open").hide();return $(this).parent(".item-with-ul").find(">ul").addClass("open").show()});s();return $(window).on("resize",s)}}).call(this);