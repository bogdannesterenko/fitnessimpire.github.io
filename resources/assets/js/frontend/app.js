
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');
require('../plugins');

window.Vue = require('vue');

jQuery(function(){
	jQuery(document).ready(function(){
		jQuery(document).on('click','#return-to-top',function() {      // When arrow is clicked
		    jQuery('body,html').animate({
		        scrollTop : 0                       // Scroll to top of body
		    }, 500);
		});
		if (jQuery(this).scrollTop() >= 50) {        
			jQuery('.header').addClass("scroll");
		    jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
		} else {
		    jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
			jQuery('.header').removeClass("scroll");
		}
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() >= 50) {       
		        jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
				jQuery('.header').addClass("scroll");
			} else {
				jQuery('.header').removeClass("scroll");
		        jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
			}
		});
		jQuery('.slider').owlCarousel({
			items:1
		});
		jQuery(document).on('click','.close',function(){
		 	jQuery('.modal').removeClass('active');
			jQuery('.shadow').removeClass('active');
		});
		jQuery(document).on('click','.slide a', function(){
		 	jQuery('.modal').addClass('active');
			jQuery('.shadow').addClass('active');
		});

		jQuery(document).on('click','.callback-button', function(e){
			e.preventDefault();
			var form = jQuery(this).parents('form');
			var data = form.serialize();
		 	jQuery.ajax({
				method: "POST",
				url: "/callback",
				dataType: "json",
				data: data,
				success: function(callback){
					if (callback.success) {
						jQuery('.result',form).removeClass('static').addClass('mt-2 alert alert-success').html('Сообщение отправлено');
						setTimeout(function() {
							jQuery('.close').click();
						}, 5000);
					} else {
						jQuery('.result',form).removeClass('static').addClass('mt-2 alert alert-danger').html('Заполните все поля');
					}
				}
		 	});
		});

		jQuery(document).on('click','.contact-button', function(e){
			e.preventDefault();
			var form = jQuery(this).parents('form');
			var data = form.serialize();
		 	jQuery.ajax({
				method: "POST",
				url: "/contact-us",
				dataType: "json",
				data: data,
				success: function(callback){
					if (callback.success) {
						jQuery('.result',form).removeClass('static').addClass('mt-2 alert alert-success').html(callback.message);
						setTimeout(function() {
							jQuery('.close').click();
						}, 5000);
					} else {
						jQuery('.result',form).removeClass('static').addClass(' mt-2 alert alert-danger').html(callback.message);
					}
				}
		 	});
		});

		jQuery(document).on('click','.assign-button', function(e){
			e.preventDefault();
			var form = jQuery(this).parents('form');
			var data = form.serialize();
		 	jQuery.ajax({
				method: "POST",
				url: "/assign",
				dataType: "json",
				data: data,
				success: function(callback){
					if (callback.success) {
						jQuery('.result',form).removeClass('static').addClass('mt-2 alert alert-success').html(callback.message);
						setTimeout(function() {
							jQuery('.close').click();
						}, 5000);
					} else {
						jQuery('.result',form).removeClass('static').addClass('mt-2 alert alert-danger').html(callback.message);
					}
				}
		 	});
		});

	});
});
