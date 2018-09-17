jQuery(function($) {
	'use strict';
	jQuery(document).ready(function() {
	
	   	function sao_slider_item(){ 

	
		$('.sao-slider-item .sao-thumb').each(function(index, block) {
 	  		var width_img = $(this).find('img').attr('width');
			
 	  		var height_img = $(this).find('img').attr('height');
 			var ratio_img = width_img/height_img;		    
 	  		var width = $(this).width();
 	  		var height = $(this).height();
 			var ratio = width/height;
 			if(ratio_img <= ratio ){
				$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
 			}else{
				$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
 			}
		}); 	

	}
 	function remove_add_error_loading(){
			var output ='';
 			output ='<div class="sao-errored">';
			output+= sao_text.error;
  			output+= '</div>';
		 $('.sao-mouse-wait').append(output);
		  setTimeout(function(){ $('.sao-mouse-wait').remove() }, 2500);
 	}
 
	
	
	 
	$(document).ajaxError(function( event, jqxhr, settings, thrownError ) {
		remove_add_error_loading();
	  });
	/*!
	/**
	 * Monkey patch jQuery 1.3.1+ to add support for setting or animating CSS
	 * scale and rotation independently.
	 * https://github.com/zachstronaut/jquery-animate-css-rotate-scale
	 * Released under dual MIT/GPL license just like jQuery.
	 * 2009-2012 Zachary Johnson www.zachstronaut.com*/


	function initData($el) {
        var _ARS_data = $el.data('_ARS_data');
        if (!_ARS_data) {
            _ARS_data = {
                rotateUnits: 'deg',
                scale: 1,
                rotate: 0
            };
            
            $el.data('_ARS_data', _ARS_data);
        }
        
        return _ARS_data;
    }
    
    function setTransform($el, data) {
        $el.css('transform', 'rotate(' + data.rotate + data.rotateUnits + ') scale(' + data.scale + ',' + data.scale + ')');
    }
    
    $.fn.rotate = function (val) {
        var $self = $(this), m, data = initData($self);
                        
        if (typeof val == 'undefined') {
            return data.rotate + data.rotateUnits;
        }
        
        m = val.toString().match(/^(-?\d+(\.\d+)?)(.+)?$/);
        if (m) {
            if (m[3]) {
                data.rotateUnits = m[3];
            }
            
            data.rotate = m[1];
            
            setTransform($self, data);
        }
        
        return this;
    };
    
    // Note that scale is unitless.
    $.fn.scale = function (val) {
        var $self = $(this), data = initData($self);
        
        if (typeof val == 'undefined') {
            return data.scale;
        }
        
        data.scale = val;
        
        setTransform($self, data);
        
        return this;
    };

    // fx.cur() must be monkey patched because otherwise it would always
    // return 0 for current rotate and scale values
    var curProxied = $.fx.prototype.cur;
    $.fx.prototype.cur = function () {
        if (this.prop == 'rotate') {
            return parseFloat($(this.elem).rotate());
            
        } else if (this.prop == 'scale') {
            return parseFloat($(this.elem).scale());
        }
        
        return curProxied.apply(this, arguments);
    };
    
    $.fx.step.rotate = function (fx) {
        var data = initData($(fx.elem));
        $(fx.elem).rotate(fx.now + data.rotateUnits);
    };
    
    $.fx.step.scale = function (fx) {
        $(fx.elem).scale(fx.now);
    };
    
    /*
    
    Starting on line 3905 of jquery-1.3.2.js we have this code:
    
    // We need to compute starting value
    if ( unit != "px" ) {
        self.style[ name ] = (end || 1) + unit;
        start = ((end || 1) / e.cur(true)) * start;
        self.style[ name ] = start + unit;
    }
    
    This creates a problem where we cannot give units to our custom animation
    because if we do then this code will execute and because self.style[name]
    does not exist where name is our custom animation's name then e.cur(true)
    will likely return zero and create a divide by zero bug which will set
    start to NaN.
    
    The following monkey patch for animate() gets around this by storing the
    units used in the rotation definition and then stripping the units off.
    
    */
    
    var animateProxied = $.fn.animate;
    $.fn.animate = function (prop) {
        if (typeof prop['rotate'] != 'undefined') {
            var $self, data, m = prop['rotate'].toString().match(/^(([+-]=)?(-?\d+(\.\d+)?))(.+)?$/);
            if (m && m[5]) {
                $self = $(this);
                data = initData($self);
                data.rotateUnits = m[5];
            }
            
            prop['rotate'] = m[1];
        }
        
        return animateProxied.apply(this, arguments);
};
		 function online_change_size() {

			var data_width = $('.sao-slider-responsive-size-active').find('.sao-slider-perview-width').val();
			var data_width_unit =  $('.sao-slider-responsive-size-active').find('.sao-slider-perview-width-unit').val();
			var data_height =  $('.sao-slider-responsive-size-active').find('.sao-slider-perview-height').val();
			var data_height_unit =  $('.sao-slider-responsive-size-active').find('.sao-slider-perview-height-unit').val();
			$('.sao-slider-item').css({ width:data_width+data_width_unit, height:data_height+data_height_unit});
		 }
		 
		online_change_size();
		sao_slider_item();
		function online_change_color() {
 
			var background_first = $('[name="sao_background_color[first]"]').val();
			var background_second = $('[name="sao_background_color[second]"]').val();
			var background_third = $('[name="sao_background_color[third]"]').val();
			var orientation = $('[name="sao_background_color[orientation]"]').val();
				
				if(orientation === "horizontal"){
					var moz = 'left';
					var liner = 'to right';
				}else if(orientation === "vertical"){
					var moz = 'top';
					var liner = 'to bottom';
					
				}else if(orientation === "diagonal"){
					var moz = '-45deg';
					var liner = '135deg';
				}else{
					var moz = '45deg';
					var liner = '45deg';						
				}
			 $(".sao-slider-background-color").css("background-color", background_first); 
			 if(background_second){
				 
				 if(background_third){
					$(".sao-slider-background-color").css({
						"background": ' -moz-linear-gradient('+moz+', '+ background_first +' 0%, '+background_second+' 50%, '+background_third+' 100%)',
						"background": ' -webkit-linear-gradient('+moz+', '+ background_first +' 0%, '+background_second+' 50%, '+background_third+' 100%)',
						"background": ' linear-gradient('+liner+', '+ background_first +' 0%, '+background_second+' 50%, '+background_third+' 100%)'
					}); 
						
				}else{
					$(".sao-slider-background-color").css({
						"background": ' -moz-linear-gradient('+moz+', '+ background_first +' 0%, '+background_second+' 100%)',
						"background": ' -webkit-linear-gradient('+moz+', '+ background_first +' 0%, '+background_second+' 100%)',
						"background": ' linear-gradient('+liner+', '+ background_first +' 0%, '+background_second+' 100%)'
					}); 
				}
			 }		 
		 }
		  
		online_change_color(); 		 
		 
		 
		 
		 

		function sao_add_hander(classs = false){ 
 
			$(classs).find('.sao-editor-hander').each(function() {
			var initID_editor  = 'initialize';
			var preInitSaved = null ;
 			var id_name = $(this).attr('data-id');
			  
 			/*
			Plugin Name: Ajax Editor
			Author: Harmeet Sembhi
			Author URI: http://www.themefossil.com
			Description: Load WP Using AJAX Request
			Version: 1.0
			Text Domain: ajax_editor
			*/
			
			if( !preInitSaved ) {
				preInitSaved = jQuery.extend(true, {}, tinyMCEPreInit);

				preInitSaved.mceInit[initID_editor].selector = '#placeholder';
				preInitSaved.mceInit['placeholder'] = preInitSaved.mceInit[initID_editor];
				delete preInitSaved.mceInit[initID_editor];

				preInitSaved.qtInit[initID_editor].id_name = 'placeholder';
				preInitSaved.qtInit['placeholder'] = preInitSaved.qtInit[initID_editor];
				delete preInitSaved.qtInit[initID_editor];
			}
 				 

					var rebuilder = jQuery.extend(true, {}, preInitSaved);

					rebuilder.mceInit['placeholder'].selector = '#' + id_name;
					rebuilder.mceInit[id_name] = rebuilder.mceInit['placeholder'];
					delete rebuilder.mceInit['placeholder'];

					rebuilder.qtInit['placeholder'].id_name = id_name;
					rebuilder.qtInit[id_name] = rebuilder.qtInit['placeholder'];
					delete rebuilder.qtInit['placeholder'];

					var init = rebuilder.mceInit[id_name];

					var $wrap = tinymce.$( '#wp-' + id_name + '-wrap' );

					if ( ( $wrap.hasClass( 'tmce-active' ) || ! rebuilder.qtInit.hasOwnProperty( id_name ) ) && ! init.wp_skip_init ) {

						tinymce.init( init );

						if ( ! window.wpActiveEditor ) {
							window.wpActiveEditor = id_name;
						}
					}

					if ( typeof quicktags !== 'undefined' ) {
				 
						quicktags( rebuilder.qtInit );

						if ( ! window.wpActiveEditor ) {
							window.wpActiveEditor = id_name;
						}

						QTags( {'id': id_name } );
                		QTags._buttonsInit();
					}
					 
 		});

 	};
	
	$(document).on('click', '.sao_slider_element_item a.sao_slider_element_remove', function(e) {
		e.preventDefault();
 		
		var  key = $(this).parents('.sao_slider_element_item').attr('data-key');
		 $('.sao-element-' + key).remove();
 
		$(this).parents('.sao_slider_element_item').animate({ opacity: 0 }, 200, function() {
			$(this).remove();
			sao_output_online();
 		});
	});	
	
	/***********************************************
	Sortable Tabs
	************************************************/
  	function sao_sortable_tabs(){ 
		$('.sao_options_tabs .sao_options_setting ').sortable({
			opacity: 0.6,
			stop: function() {}
		}); 
	
		$('.sao_options_list .sao_options_setting ').sortable({
			opacity: 0.6,
			stop: function() {}
			}); 	
								
		$('.sao_gallery_list').sortable({
			opacity: 0.6,
			stop: function() {}
		}); 
		$(".sao_list_item").each(function() { 
			var val =$(this).find('.sao_list_options_item input,.sao_list_options_item textarea').val();               // When the email is changed
			$(this).find('.sao_title_list').html(val);                 // copy it over to the mail
		});		
								
	}	
 	/***********************************************
	Fold Hide
	************************************************/
 	function sao_animate_effect(){ 

		$('.sao-element-draggable').each(function() {
			var width = $(this).width();
			var height = $(this).height();
			
 			var start = $(this).find('.sao-slider-effect').attr('data-start');
			var end = $(this).find('.sao-slider-effect').attr('data-end');
			
			var effect = $(this).find('.sao-slider-effect').attr('data-effect');
			
			var initial = $(this).find('.sao-slider-effect').attr('data-initial');
			var scale = $(this).find('.sao-slider-effect').attr('data-scale');
			var id = $(this).attr('data-id');
 			var top = $(this).position().top;
			var left = $(this).position().left;

 
			
			var time =  end - start;
			
			if( effect ==='move'){
				if(initial === 'top'){
					$(this).css({top: '-' + height + 'px',bottom:'auto'});
					
				}else if(initial === 'left'){
					$(this).css({left: '-' + width + 'px',right:'auto'});
					
				}else if(initial === 'bottom'){
					$(this).css({bottom: '-' + height + 'px',top:'auto'});
					var bottom_top = $(this).position().left;
					$(this).css({bottom: 'auto',top:bottom_top});


				}else if(initial === 'right'){
					$(this).css({right: '-' + width + 'px',left:'auto'});
					var right_left = $(this).position().left;

					$(this).css({right: 'auto',left:right_left});

				} 			 
			
				$(this).delay(start).animate({ left: left+'px' ,top: top +'px'},time,function() {
						$(this).css({bottom: 'auto',right:  'auto'});
  				   });
			}else if( effect ==='fade'){

			$(this).css({display:'none'});

				$(this).delay(start).fadeIn(time);
				 
			}else if( effect ==='scale'){
					$(this).fadeOut(0);
					$(this).scale(scale);
					$(this).delay(start).fadeIn(0).animate({scale:1},time,function() {
						
				});
			}
			


		});
	}
	$(document).on('click', '.sao-slider-play-button', function(e) {
		sao_animate_effect();
	});
	/***********************************************
	Fold Hide
	************************************************/
 	function sao_fold_hide(items){ 

 		$('.sao_slider_options_element').find('.sao_options_fold').each(function() {
			var show;
			$(this).find('.sao_options_fold_item').each(function() {
				var data_name = $(this).attr('data-name'); 			
				var data_value = $(this).attr('data-value');
				var type = $('[name="'+data_name+'"]').attr('type');
				if(type == 'radio'){
					var checked = $('[name="'+data_name+'"][value="'+data_value+'"]').attr('checked');
					if( checked == 'checked' ){
						show = 'checked';
					}
				}else{
					var val =$('[name="'+data_name+'"]').val();
						if(data_value == val){
						show = 'checked';
					}
				}
 
			});
			
			if( show == 'checked' ){
				$(this).parent().attr('data-active','show');
			}else{
				$(this).parent().attr('data-active','hide');
			}
 		});	
 
		$('.sao_options_fold_item').each(function() {
			var data_name = $(this).attr('data-name');
			var actives  = $('[name="'+data_name+'"]').parents(items).attr('data-active');
			if(	 actives == 'hide' ){
				$(this).parent().parent().attr('data-active','hide');
			}
 		});
		 
 		
		$(document).on("click",function() {
			$('.sao_slider_options_element').find('.sao_options_fold').each(function() {
				var show;
				$(this).find('.sao_options_fold_item').each(function() {
				var data_name = $(this).attr('data-name'); 			
				var data_value = $(this).attr('data-value');
				var type = $('[name="'+data_name+'"]').attr('type');
					if(type == 'radio'){
					var checked = $('[name="'+data_name+'"][value="'+data_value+'"]').attr('checked');
						if( checked == 'checked' ){
								show = 'checked';
						}
					}else{
						var val =$('[name="'+data_name+'"]').val();
						if(data_value == val){
							show = 'checked';
						}
						
					}
										
				});
					if( show == 'checked' ){
						$(this).parent().attr('data-active','show');
					}else{
						$(this).parent().attr('data-active','hide');
					}
			 });	
	 
	 
			$('.sao_options_fold_item').each(function() {
				var data_name = $(this).attr('data-name');
				var actives  = $('[name="'+data_name+'"]').parents(items).attr('data-active');
				if(	 actives == 'hide' ){
					$(this).parent().parent().attr('data-active','hide');
				}
 			});
		});
		 
  	}
	 

	/***********************************************
	Output Online
 	************************************************/
	function sao_output_online() {
		 var section =  [];
		 var column =  [];
		 var element =  [];
		 
		
		$('.sao_slider_element_item').each(function() {
			var key = $(this).attr('data-key');
 			var option = $(this).attr('data-option');
			var value = $(this).attr('data-value');
  			var top = $(this).attr('data-top');
			var left = $(this).attr('data-left');
 			var width = $(this).attr('data-width');
 			var width_unit = $(this).attr('data-width_unit');
			var height = $(this).attr('data-height');			
			var height_unit = $(this).attr('data-height_unit');			
			var object = $(this).attr('data-object');
			
 			var desktop_top = $(this).attr('data-desktop_top');
			var desktop_left = $(this).attr('data-desktop_left');
 			var desktop_width = $(this).attr('data-desktop_width');
 			var desktop_width_unit = $(this).attr('data-desktop_width_unit');
			var desktop_height = $(this).attr('data-desktop_height');
			var desktop_height_unit = $(this).attr('data-desktop_height_unit');
 			var desktop_object = $(this).attr('data-desktop_object');
 			
			
			var tablet_top = $(this).attr('data-tablet_top');
			var tablet_left = $(this).attr('data-tablet_left');
			var tablet_width = $(this).attr('data-tablet_width');
			var tablet_width_unit = $(this).attr('data-tablet_width_unit');
			var tablet_height = $(this).attr('data-tablet_height');
			var tablet_height_unit = $(this).attr('data-tablet_height_unit');
			var tablet_object = $(this).attr('data-tablet_object');
			
 			
			var phablet_top = $(this).attr('data-phablet_top');
			var phablet_left = $(this).attr('data-phablet_left');
			var phablet_width = $(this).attr('data-phablet_width');
			var phablet_width_unit = $(this).attr('data-phablet_width_unit');
			var phablet_height = $(this).attr('data-phablet_height');
			var phablet_height_unit = $(this).attr('data-phablet_height_unit');
			var phablet_object = $(this).attr('data-phablet_object');
			
			var phone_top = $(this).attr('data-phone_top');
			var phone_left = $(this).attr('data-phone_left');
			var phone_width = $(this).attr('data-phone_width');
			var phone_width_unit = $(this).attr('data-phone_width_unit');
			var phone_height = $(this).attr('data-phone_height');
			var phone_height_unit = $(this).attr('data-phone_height_unit');
			var phone_object = $(this).attr('data-phone_object');
			
									 				
 			var element_key  = {};
			element_key[key] = {'value' : value    , 'option':option, 
 			'left':left,'top':top,'object':object,
			'width':width,'height':height,
			'width_unit':width_unit,'height_unit':height_unit,

			'desktop_left':desktop_left,'desktop_top':desktop_top,
			'desktop_width':desktop_width,'desktop_height':desktop_height,
			'desktop_width_unit':desktop_width_unit,'desktop_height_unit':desktop_height_unit,
 			'desktop_object':desktop_object,
			
  			'tablet_left':tablet_left,'tablet_top':tablet_top,
			'tablet_width':tablet_width,'tablet_height':tablet_height,
			'tablet_width_unit':tablet_width_unit,'tablet_height_unit':tablet_height_unit,
 			'tablet_object':tablet_object,
			
  			'phablet_left':phablet_left,'phablet_top':phablet_top,
			'phablet_width':phablet_width,'phablet_height':phablet_height,
			'phablet_width_unit':phablet_width_unit,'phablet_height_unit':phablet_height_unit,
 			'phablet_object':phablet_object,
			
  			'phone_left':phone_left,'phone_top':phone_top,
			'phone_width':phone_width,'phone_height':phone_height,
			'phone_width_unit':phone_width_unit,'phone_height_unit':phone_height_unit,
 			'phone_object':phone_object,
			
			
			};
			element.push(element_key); 
				
	 
 		});
		 
		$('#sao_slider_element').val( JSON.stringify(element));
		 
	}
	
	
	
	
	/***********************************************
	Slider Dragrable
 	************************************************/
	var coordinates = function(element) {
			element = $(element);
			var top = element.position().top;
			var left = element.position().left;
			var id = element.attr('data-id');
	 
			if($('.sao-slider-item').hasClass('sao-slider-desktop')){
				$('#sao_element_' + id).attr('data-desktop_top',Math.round(top));
				$('#sao_element_' + id).attr('data-desktop_left',Math.round(left));
				
			}else if($('.sao-slider-item').hasClass('sao-slider-tablet')){
				$('#sao_element_' + id).attr('data-tablet_top',Math.round(top));
				$('#sao_element_' + id).attr('data-tablet_left',Math.round(left));
				
			}else if($('.sao-slider-item').hasClass('sao-slider-phablet')){
				$('#sao_element_' + id).attr('data-phablet_top',Math.round(top));
				$('#sao_element_' + id).attr('data-phablet_left',Math.round(left));
				
			}else if($('.sao-slider-item').hasClass('sao-slider-phone')){
				$('#sao_element_' + id).attr('data-phone_top',Math.round(top));
				$('#sao_element_' + id).attr('data-phone_left',Math.round(left));
			}else{
				$('#sao_element_' + id).attr('data-top',Math.round(top));
				$('#sao_element_' + id).attr('data-left',Math.round(left));
			}
			
			
			
			$("#sao_position_top").attr('value',Math.round(top));
 	 		$("#sao_position_left").attr('value',Math.round(left));	
			sao_output_online() ;
			
	  };
	  
	  
	  	var resizes = function(element) {
			element = $(element);
			var id = element.attr('data-id');
 

			if($('.sao-slider-item').hasClass('sao-slider-desktop')){
				var width_unit = $('#sao_element_' + id).attr('data-desktop_width_unit');
				var height_unit = $('#sao_element_' + id).attr('data-desktop_height_unit');
 				
			}else if($('.sao-slider-item').hasClass('sao-slider-tablet')){
				
				var width_unit = $('#sao_element_' + id).attr('data-tablet_width_unit');
				var height_unit = $('#sao_element_' + id).attr('data-tablet_height_unit');
				
			}else if($('.sao-slider-item').hasClass('sao-slider-phablet')){
				var width_unit = $('#sao_element_' + id).attr('data-phablet_width_unit');
				var height_unit = $('#sao_element_' + id).attr('data-phablet_height_unit');
				
			}else if($('.sao-slider-item').hasClass('sao-slider-phone')){
				var width_unit = $('#sao_element_' + id).attr('data-phone_width_unit');
				var height_unit = $('#sao_element_' + id).attr('data-phone_height_unit');
			}else{
				var width_unit = $('#sao_element_' + id).attr('data-width_unit');
				var height_unit = $('#sao_element_' + id).attr('data-height_unit');
			}
			if(width_unit !=''){
				var  w_unit = width_unit;
 			}else{
				var  w_unit = $('#sao_element_' + id).attr('data-width_unit');
			}
 
 			if(height_unit !='' ){
				var  h_unit = height_unit;
 			}else{
				var  h_unit = $('#sao_element_' + id).attr('data-height_unit');
			}
  			
			$("#sao_object_width_unit").val(w_unit);
 	 		$("#sao_object_height_unit").val(h_unit);
			
			if(w_unit == 'percentage'){
				var width = ($(element).width() / $(element).parent().width())*100;
			}else if(w_unit == 'auto'){
				var width = 'auto';
 			}else {
				var width = element.width();
 			}
			
			if(h_unit == 'percentage'){
				var height = ($(element).height() / $(element).parent().height())*100;
			}else if(h_unit == 'auto'){
				var height = 'auto';
 			}else {
				var height = element.height();
 			}

	 
			if($('.sao-slider-item').hasClass('sao-slider-desktop')){
				$('#sao_element_' + id).attr('data-desktop_width',Math.round(width));
				$('#sao_element_' + id).attr('data-desktop_height',Math.round(height));
				
			}else if($('.sao-slider-item').hasClass('sao-slider-tablet')){
				$('#sao_element_' + id).attr('data-tablet_width',Math.round(width));
				$('#sao_element_' + id).attr('data-tablet_height',Math.round(height));
				
			}else if($('.sao-slider-item').hasClass('sao-slider-phablet')){
				$('#sao_element_' + id).attr('data-phablet_width',Math.round(width));
				$('#sao_element_' + id).attr('data-phablet_height',Math.round(height));
				
			}else if($('.sao-slider-item').hasClass('sao-slider-phone')){
				$('#sao_element_' + id).attr('data-phone_width',Math.round(width));
				$('#sao_element_' + id).attr('data-phone_height',Math.round(height));
			}else{
				$('#sao_element_' + id).attr('data-width',Math.round(width));
				$('#sao_element_' + id).attr('data-height',Math.round(height));
			}
			
			
			
			$("#sao_object_width").attr('value',Math.round(width));
 	 		$("#sao_object_height").attr('value',Math.round(height));
				sao_output_online();	  };
 	function sao_draggable(){ 
		$('.sao-element-draggable').draggable(
			{
				 start: function() {
				coordinates(this);
				sao_output_online();
		
			},
			stop: function() {
				coordinates(this);
					sao_output_online();
	
			}
			 
		});
		
		$('.sao-element-draggable').resizable(
 			{
				 start: function() {
				resizes(this);
				sao_output_online();
		
			},
			stop: function() {
				resizes(this);
					sao_output_online();
	
			}
		
 			});
		
		
	}
	sao_draggable();



	function sao_loading_slider_details(){ 
		
		$('body').append('<div class="sao-mouse-wait"></div>');
 		var data_responsive = $('.sao-slider-responsive-active').attr('data-id');
		var data_id = $('.sao-slider-perview-form').attr('data-id');
 
 		var data_element = $('#sao_slider_element').val();
  		$.ajax({
 			url: slider_js.ajaxurl,
			type: "POST",
			dataType: "html",
			data : {
 				action : 'sao_slide_perview_details',
				element : data_element,
				responsive : data_responsive,
				post_id : data_id,

 			},
			success:function(data) { 
			
  				if( data.length){
					$('.sao-slider-details').html('');
					$('.sao-slider-details').append(data);
 					$('.sao-mouse-wait').remove();
 					sao_draggable();
					sao_slider_item();
 				 }else{
					remove_add_error_loading();
 				 }
				 
   			}
			
		});
	
	}	

	function sao_loading_slider(classs){ 
		
		if($(classs).parent().hasClass('sao-slider-responsive')){
			$('.sao-slider-responsive-active').removeClass('sao-slider-responsive-active');
			$('.sao-slider-responsive-size-active').removeClass('sao-slider-responsive-size-active');
			var id = $(classs).attr('data-id');
			$('#sao-slider-responsive-'+ id).addClass('sao-slider-responsive-size-active');
			$(classs).addClass('sao-slider-responsive-active');	 	
		}
		$('.sao-element-draggable-active').each(function(index, element) {
            $(this).removeClass('sao-element-draggable-active');
        });
 	 
		$('.sao-slider-position-active').removeClass('sao-slider-position-active');
		//$('body').append('<div class="sao-mouse-wait"></div>');


 		var data_id = $('.sao-slider-perview-form').attr('data-id');
		
		var data_responsive = $('.sao-slider-responsive-active').attr('data-id');
		
		$('.sao-slider-item').removeClass('sao-slider-main').removeClass('sao-slider-desktop').removeClass('sao-slider-tablet').removeClass('sao-slider-phablet').removeClass('sao-slider-phone');

		$('.sao-slider-item').addClass('sao-slider-'+data_responsive);
		
		
		var data_width = $('.sao-slider-responsive-size-active').find('.sao-slider-perview-width').val();
		var data_width_unit =  $('.sao-slider-responsive-size-active').find('.sao-slider-perview-width-unit').val();
 		var data_height =  $('.sao-slider-responsive-size-active').find('.sao-slider-perview-height').val();
		var data_height_unit =  $('.sao-slider-responsive-size-active').find('.sao-slider-perview-height-unit').val();
		
	 
		$('.sao-slider-item').css({ width:data_width+data_width_unit, height:data_height+data_height_unit});
		
		sao_loading_slider_details();
	
	}
	
	 
		
	/***********************************************
	Sortable Child
 	************************************************/
	function sao_slider_sortable() {
		
 		$('.sao_slider_element_list').sortable({
			opacity: 0.6,
			connectWith: ".sao_slider_element_list",
			update: function() {
				sao_output_online();

				sao_loading_slider_details();
 			}
		});
		
	};
	sao_slider_sortable();
	/***********************************************
	Remove Hander
	************************************************/
 	function sao_remove_hander(){ 
 		$('.sao-editor-hander').each(function() {
			var id_name = $(this).attr('data-id');
			tinymce.execCommand('mceRemoveEditor', false, id_name);
  		});
  	} 
 
   $(document).on('mousedown', '.sao-element-draggable', function(e) {
	   var this_key = $(this).attr('data-id');

		var this_element = $("#sao_element_" + this_key);
	   
		$("#sao_position_top").attr('value','');
 	 	$("#sao_position_left").attr('value','');
		$("#sao_object_width").attr('value','');
 	 	$("#sao_object_width_unit").attr('value','');
		$("#sao_object_height").attr('value','');
 	 	$("#sao_object_height_unit").attr('value','');
 		$("#sao_object").val('');
				
		
		$('.sao-element-draggable-active').each(function(index, block) {	 
			 $(this).removeClass('sao-element-draggable-active');

		});	
		$('.sao-slider-position').addClass('sao-slider-position-active');

		 
		$(this).addClass('sao-element-draggable-active');
		this_element.addClass('sao-element-draggable-active');
	 
		coordinates(this);
		resizes(this);
 	 
	  
		var object = this_element.attr('data-display');

 		 
		$("#sao_object").val(object);
		
		sao_draggable();
 
   	});	
	
	
  $(document).on('mousedown', '.sao_slider_element_item ', function(e) {
		var this_key = $(this).attr('data-key');
  
		var this_element = $(".sao-element-" + this_key);
		$("#sao_position_top").attr('value','');
 	 	$("#sao_position_left").attr('value','');
		$('.sao-element-draggable-active').each(function(index, block) {	 
			 $(this).removeClass('sao-element-draggable-active');

		});	
		$('.sao-slider-position').addClass('sao-slider-position-active');

		 
		this_element.addClass('sao-element-draggable-active');
		$(this).addClass('sao-element-draggable-active');
	  
		var object = this_element.attr('data-display');
		var id = $(this).attr('data-key');
		 
			
		coordinates(this_element);
		resizes(this_element);
 
		$("#sao_object").val(object);

		
		
 		sao_draggable();
 
   	});		
	
	 
	   
	 
	 
	
   	$(document).on('click', '.sao_refresh,.sao-slider-responsive-tab', function(e) {
		 sao_loading_slider(this);
   	});	
	
	
	// Add Elements	
	$('.sao_slider_meta .sao_model_element').on('click', '.sao_model_add', function(e) {
		$('body').append('<div class="sao-mouse-wait"></div>');
		var data_action	= 'sao_slider_element';
	 
		var data_key = Math.floor(Math.random() * 9999999999);
		var data_childern = $(this).parents('.sao_model_element').attr('data-childern');
		var data_value = $('.sao_model_element').find('.selected').attr('data-element');
		var data_id = $('.sao-slider-perview-form').attr('data-id');

		$.ajax({
 			url: slider_js.ajaxurl,
			data : {
				action : data_action,
				key : data_key,
				childern :  data_childern,
				value :  data_value,
				default :  '1',
 			},
			success:function(data) {
 				if( data.length){
					$('#sao_column_'+data_childern+' .sao_slider_element_list').append(data);
 					$('.sao_model').hide();
					$('.sao-mouse-wait').remove(); 
					$( ".sao_slider_element_list" ).sortable({ disabled: false }); 
					sao_draggable();
					$('body').removeClass('sao-body-panel');
					sao_output_online(); 
					sao_loading_slider_details();
  				} else{
					remove_add_error_loading();
 				 }
   			}  
		});  
		
		
	}); 		
	
  	 
	//Elements Options
 	$('.sao_slider_meta').on('click','.sao_element_options', function() {
		
  		$('body').append('<div class="sao-mouse-wait"></div>');
		var data_key = $(this).parents('.sao_element_item').attr('data-key');
		var data_value = $(this).parents('.sao_element_item').attr('data-value');
		var data_element = $(this).parents('.sao_element_item');
		var data_option = $(this).parents('.sao_element_item').attr('data-option');
		var data_this = $(this);
  
		var data_action	= 'sao_slider_element_options';
 
		// Ajax Call
		$.ajax({
			url: slider_js.ajaxurl,
			data: {
				action: data_action,
				value :  data_value, 
				key :  data_key,  
				option :  data_option 
			},
			success: function(data) {
				if( data.length){
					$('body').append(data);
					$(".sao-color").cs_wpColorPicker();
					$('.sao-mouse-wait').remove(); 
					$('body').addClass('sao-body-panel');
					sao_add_hander('#sao_options_' +data_key);
					sao_sortable_tabs();					
					sao_fold_hide( '.sao_options_item');
					sao_draggable();
 				}else{
					remove_add_error_loading();
				}

			}
		});
	});	
	//Elements Update
	$(document).on('click', '.sao_slider_options_element .sao_options_update', function(e) {
		$('.sao-editor-hander').each( function() {
			var data_attr =  $(this).attr('data-id');
			var tinymce = tinyMCE.get(data_attr).getContent();
			$(this).find('textarea.wp-editor-area').val(tinymce);
		});
 		
		$('body').append('<div class="sao-mouse-wait"></div>');
		var data_option= $(this).parents('.sao_options').serializeJSON();
		var data_key = $(this).parents('.sao_options').attr('data-key');
		var data_this = $(this);
		var data_value = $(this).parents('.sao_options').attr('data-value');
		var data_id = $('.sao-slider-perview-form').attr('data-id');
		$.ajax({
 			url: slider_js.ajaxurl,
 			data : {
				action : 'sao_options_encode',
 				 option:  data_option,
			},
			success:function(data) {
				if( data.length){
					$('#sao_element_'+data_key).attr('data-option',data);
					sao_remove_hander();
					$(data_this).parents('.sao_options').remove();
					$('.sao-mouse-wait').remove(); 	
					$('body').removeClass('sao-body-panel');	
					sao_output_online();	
					sao_draggable();
					sao_loading_slider_details();
				}else{
					remove_add_error_loading();
				}
			} 
		});  
   		 
 
		 
	
 	}); 
		function sao_duplicate(row,key,adress) {	
		$(adress).attr('data-key',key).attr('id',"sao_"+row+"_"+ key);
 	}
		
	jQuery(document).on("click",".sao_slider_element_duplicate",function(){
   
   		var duplicate = $(this).parents(".sao_slider_element_item").addClass('sao_duplicate').clone();
		$(this).parents('.sao_duplicate').removeClass('sao_duplicate');
		$(this).parents(".sao_slider_element_item").after(duplicate);
 		var element_key = Math.floor(Math.random() * 9999999999);
  		sao_duplicate('element',element_key,'.sao_duplicate');
 		$('.sao_duplicate').removeClass('sao-element-draggable-active').removeClass('sao_duplicate');
		sao_slider_sortable();
 		sao_output_online();
 		sao_loading_slider(0);
		
 
		 
		
 
	}); 		 
		
function sao_find_template_save(id) {
		
		var element =  [];
	
			
		$(id +'.sao_slider_element_item').each(function() {
var key = $(this).attr('data-key');
 			var option = $(this).attr('data-option');
			var value = $(this).attr('data-value');
  			var top = $(this).attr('data-top');
			var left = $(this).attr('data-left');
 			var width = $(this).attr('data-width');
 			var width_unit = $(this).attr('data-width_unit');
			var height = $(this).attr('data-height');			
			var height_unit = $(this).attr('data-height');			
			var object = $(this).attr('data-object');
			
 			var desktop_top = $(this).attr('data-desktop_top');
			var desktop_left = $(this).attr('data-desktop_left');
 			var desktop_width = $(this).attr('data-desktop_width');
 			var desktop_width_unit = $(this).attr('data-desktop_width_unit');
			var desktop_height = $(this).attr('data-desktop_height');
			var desktop_height_unit = $(this).attr('data-desktop_height_unit');
 			var desktop_object = $(this).attr('data-desktop_object');
 			
			
			var tablet_top = $(this).attr('data-tablet_top');
			var tablet_left = $(this).attr('data-tablet_left');
			var tablet_width = $(this).attr('data-tablet_width');
			var tablet_width_unit = $(this).attr('data-tablet_width_unit');
			var tablet_height = $(this).attr('data-tablet_height');
			var tablet_height_unit = $(this).attr('data-tablet_height_unit');
			var tablet_object = $(this).attr('data-tablet_object');
			
 			
			var phablet_top = $(this).attr('data-phablet_top');
			var phablet_left = $(this).attr('data-phablet_left');
			var phablet_width = $(this).attr('data-phablet_width');
			var phablet_width_unit = $(this).attr('data-phablet_width_unit');
			var phablet_height = $(this).attr('data-phablet_height');
			var phablet_height_unit = $(this).attr('data-phablet_height_unit');
			var phablet_object = $(this).attr('data-phablet_object');
			
			var phone_top = $(this).attr('data-phone_top');
			var phone_left = $(this).attr('data-phone_left');
			var phone_width = $(this).attr('data-phone_width');
			var phone_width_unit = $(this).attr('data-phone_width_unit');
			var phone_height = $(this).attr('data-phone_height');
			var phone_height_unit = $(this).attr('data-phone_height_unit');
			var phone_object = $(this).attr('data-phone_object');
			
									 				
 			var element_key  = {};
			element_key[key] = {'value' : value    , 'option':option, 
 			'left':left,'top':top,'object':object,
			'width':width,'height':height,
			'width_unit':width_unit,'height_unit':height_unit,

			'desktop_left':desktop_left,'desktop_top':desktop_top,
			'desktop_width':desktop_width,'desktop_height':desktop_height,
			'desktop_width_unit':desktop_width_unit,'desktop_height_unit':desktop_height_unit,
 			'desktop_object':desktop_object,
			
  			'tablet_left':tablet_left,'tablet_top':tablet_top,
			'tablet_width':tablet_width,'tablet_height':tablet_height,
			'tablet_width_unit':tablet_width_unit,'tablet_height_unit':tablet_height_unit,
 			'tablet_object':tablet_object,
			
  			'phablet_left':phablet_left,'phablet_top':phablet_top,
			'phablet_width':phablet_width,'phablet_height':phablet_height,
			'phablet_width_unit':phablet_width_unit,'phablet_height_unit':phablet_height_unit,
 			'phablet_object':phablet_object,
			
  			'phone_left':phone_left,'phone_top':phone_top,
			'phone_width':phone_width,'phone_height':phone_height,
			'phone_width_unit':phone_width_unit,'phone_height_unit':phone_height_unit,
 			'phone_object':phone_object,
			
			
			
			};
			element.push(element_key); 
				
	 
 		});
		return encodeURIComponent(JSON.stringify(element));
		
 	};		
		
	 //Elements Save
	$('.sao_builder').on('click', '.sao_options_full_slider_save', function(e) {
		var data_key = Math.floor(Math.random() * 9999999999);
 
 		var data_id = 'full_slider';
		var data_this = $(this).parents('.sao_options');
    	var data_name = data_this.find('[name="save_template_name"]').val();
 		var data_element = sao_find_template_save('');
 		if(data_name){
		$('body').append('<div class="sao-mouse-wait"></div>');
 		
		 
  		$.ajax({
 			url: slider_js.ajaxurl,
 			type: 'POST',
 			data : {
				action : 'sao_template_save',
				element : data_element,
				name : data_name, 
 				 key : data_key,
				id : data_id,
  			},
			success:function(data) {
 
 				$( " .sao_slider_element_list" ).sortable({ disabled: false });
				$('.sao_options').remove();
				$('.sao-mouse-wait').remove();
				$('body').removeClass('sao-body-panel'); 
				sao_output_online();
						
     			},
    	 });	
		
		}else{
			$('.sao_options_massage').text('').append(sao_text.empty);
		}
   	 });	
	 
	  //Elements Save
	$('.sao_builder').on('click', '.sao_options_slider_element_save', function(e) {
		var data_key = Math.floor(Math.random() * 9999999999);
 
 		var data_id = 'slider_element';
		var data_this = $(this).parents('.sao_options');
		var data_this_element = $(this).parents('.sao_slider_element_item').attr("id");
    		var data_name = data_this.find('[name="save_template_name"]').val();
  		var data_element = sao_find_template_save('#'+data_this_element);
 		if(data_name){
		$('body').append('<div class="sao-mouse-wait"></div>');
 		
		 
  		$.ajax({
 			url: slider_js.ajaxurl,
 			type: 'POST',
 			data : {
				action : 'sao_template_save',
				element : data_element,
				name : data_name, 
 				 key : data_key,
				id : data_id,
  			},
			success:function(data) {
 				$( " .sao_slider_element_list" ).sortable({ disabled: false });
				$('.sao_options').remove();
				$('.sao-mouse-wait').remove(); 
				sao_output_online();
				$('body').removeClass('sao-body-panel');
     			},
    	 });	
		
		}else{
			$('.sao_options_massage').text('').append(sao_text.empty);
		}
   	 });	
	 
	 
	 	 //Template ADD
	$('.sao_slider_meta').on('click', '.sao_template_add', function(e) {
		var data_row = $(this).attr('data-row');
		var data_name = $(this).attr('data-name');
		var data_this = $(this);
 		$('body').append('<div class="sao-mouse-wait"></div>');
		
		$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: true });
 		
   		$.ajax({
 			url: slider_js.ajaxurl,
			data : {
				action : 'sao_template_options',
				id : data_row,
				name : data_name,
			},
			success:function(data) {
				if( data.length){
 					$(data_this).parent().append(data);
					$('.sao-mouse-wait').remove(); 
					$('body').addClass('sao-body-panel');
				}else{
					remove_add_error_loading();
				}
		 
  			},
			error : function(jqXHR, textStatus, errorThrown) {
				$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});
  	});				 
		 
	 	 	 
	 	
	 $(document).on('click', '.sao-thumb', function(e) {
		$('.sao-slider-position').removeClass('sao-slider-position-active');
 		$('.sao-element-draggable-active').each(function(index, block) {	 
			 $(this).removeClass('sao-element-draggable-active');

		});	
 		
   	});	
	
	  
// Element Template ADD Select
	$('.sao_builder').on('click', '.sao_slider_element_template_add_options,.sao_full_slider_template_add_options', function(e) {
 		var data_id = $('.sao_template_item.selected').attr('data-id');
		var data_row = $(this).parents('.sao_model_template').attr('data-row');
 		
		 
  		$('body').append('<div class="sao-mouse-wait"></div>');
  		
   		$.ajax({
 			url: slider_js.ajaxurl,
			data : {
				action : 'sao_slider_element_list',
				template_id : data_id,
 				row_id : data_row,
 			},
			success:function(data) {
				if( data.length){
				$('.sao_slider_element_list').append(data);
				jQuery(".sao_new_element").each(function(index, element) {
					var element_key = Math.floor(Math.random() * 9999999999);
 					sao_duplicate('element',element_key,this);
 					$(this).removeClass('sao-element-draggable-active').removeClass('sao_new_element');
			 
  				 });	 
					 $('body').removeClass('sao-body-panel');

				$('.sao-mouse-wait').remove(); 
				$('.sao_model_template').remove();
				$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
 				sao_output_online(); 		
				sao_loading_slider_details();	 
				}else{
					remove_add_error_loading();
 				 }
				
			} 
		});
		
	});		
	   
	   
	
   $('#sao_position_top').on('change keyup mousedown ',function(e) {
	    var valus = $(this).val();
 	 	$(this).parents('.sao_slider_meta').find('.sao-element-item.sao-element-draggable-active').css('top',valus+'px'); 
		var id = $('.sao-slider-responsive-active').attr('data-id');
		if(id === 'desktop' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-desktop_top',valus);
 			
		}else if(id === 'tablet'  ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-tablet_top',valus);
 			
		}else if(id === 'phablet' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phablet_top',valus);
 			
		}else if(id === 'phone' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phone_top',valus);
			
 		}else{
			$('.sao_element_item.sao-element-draggable-active').attr('data-top',valus);
 		}
		sao_output_online();
   }); 
   
	
   $('#sao_position_left').on('change keyup mousedown ',function(e) {
	    var valus = $(this).val();
 	 	$(this).parents('.sao_slider_meta').find('.sao-element-item.sao-element-draggable-active').css('left',valus+'px'); 
		
		var id = $('.sao-slider-responsive-active').attr('data-id');
		if(id === 'desktop' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-desktop_left',valus);
 			
		}else if(id === 'tablet'  ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-tablet_left',valus);
 			
		}else if(id === 'phablet' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phablet_left',valus);
 			
		}else if(id === 'phone' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phone_left',valus);
			
 		}else{
			$('.sao_element_item.sao-element-draggable-active').attr('data-left',valus);
 		}
		
		sao_output_online();
		
    });
	
	
	$('#sao_object').on('change keyup mousedown ',function(e) {
	    var valus = $(this).val();
  	 	$(this).parents('.sao_slider_meta').find('.sao-element-item.sao-element-draggable-active').attr('data-display',valus);

		var id = $('.sao-slider-responsive-active').attr('data-id');
		if(id === 'desktop' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-desktop_object',valus);
 			
		}else if(id === 'tablet'  ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-tablet_object',valus);
 			
		}else if(id === 'phablet' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phablet_object',valus);
 			
		}else if(id === 'phone' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phone_object',valus);
			
 		}else{
			$('.sao_element_item.sao-element-draggable-active').attr('data-object',valus);
 		}
		
		sao_output_online();

    });
	
	
   $('#sao_object_width').on('change keyup mousedown ',function(e) {
	    var value = $(this).val();
		var width_unit = $('#sao_object_width_unit').val();
 		if(width_unit == 'percentage'){
			var action_width = value + '%';
		}else if (width_unit == 'auto'){
			var action_width = 'auto';
		}else if(width_unit == 'pexel'){
			var action_width = value + 'px';
		}
		
 	 	$(this).parents('.sao_slider_meta').find('.sao-element-item.sao-element-draggable-active').css('width',action_width); 
		
		var id = $('.sao-slider-responsive-active').attr('data-id');
		if(id === 'desktop' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-desktop_width',value);
 			
		}else if(id === 'tablet'  ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-tablet_width',value);
 			
		}else if(id === 'phablet' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phablet_width',value);
 			
		}else if(id === 'phone' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phone_width',value);
			
 		}else{
			$('.sao_element_item.sao-element-draggable-active').attr('data-width',value);
 		}
		
		sao_output_online();
		
    });	 	
		
		
		
	$('#sao_object_width_unit').on('change keyup mousedown ',function(e) {
	    var valus = $(this).val();
 		var element = $('.sao-element-item.sao-element-draggable-active');
		if(valus == 'percentage'){
				var width = ($(element).width() / $(element).parent().width())*100;

			}
			else if(valus == 'auto'){
				var width = 'auto';
 			}else {
				var width = $(element).width();
 		}

		var id = $('.sao-slider-responsive-active').attr('data-id');
		if(id === 'desktop' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-desktop_width_unit',valus);
 			
		}else if(id === 'tablet'  ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-tablet_width_unit', valus);
 			
		}else if(id === 'phablet' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phablet_width_unit', valus );
 			
		}else if(id === 'phone' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phone_width_unit', valus );
			
 		}else{
			$('.sao_element_item.sao-element-draggable-active').attr('data-width_unit',valus );
 		}
		$('#sao_object_width').val(Math.round(width));
		
  		if(valus == 'percentage'){
			var action_width = width + '%';
		}else if (valus == 'auto'){
			var action_width = 'auto';
		}else if(valus == 'pexel'){
			var action_width = width + 'px';
		}
 	 	$(this).parents('.sao_slider_meta').find('.sao-element-item.sao-element-draggable-active').css('width',action_width); 
		
		sao_output_online();

    });
	
	

   $('#sao_object_height').on('change keyup mousedown ',function(e) {
	    var value = $(this).val();
		var height_unit = $('#sao_object_height_unit').val();
 		if(height_unit == 'percentage'){
			var action_height = value + '%';
		}else if (height_unit == 'auto'){
			var action_height = 'auto';
		}else if(height_unit == 'pexel'){
			var action_height = value + 'px';
		}
		
 	 	$(this).parents('.sao_slider_meta').find('.sao-element-item.sao-element-draggable-active').css('height',action_height); 
		
		var id = $('.sao-slider-responsive-active').attr('data-id');
		if(id === 'desktop' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-desktop_height',value);
 			
		}else if(id === 'tablet'  ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-tablet_height',value);
 			
		}else if(id === 'phablet' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phablet_height',value);
 			
		}else if(id === 'phone' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phone_height',value);
			
 		}else{
			$('.sao_element_item.sao-element-draggable-active').attr('data-height',value);
 		}
		
		sao_output_online();
		
    });	 	
		
	
	$('#sao_object_height_unit').on('change keyup mousedown ',function(e) {
	    var valus = $(this).val();
		
		  var element = $('.sao-element-item.sao-element-draggable-active');
		if(valus == 'percentage'){
				var height = ($(element).height() / $(element).parent().height())*100;

			}
			else if(valus == 'auto'){
				var height = 'auto';
 			}else {
				var height = $(element).height();
 		}

		var id = $('.sao-slider-responsive-active').attr('data-id');
		if(id === 'desktop' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-desktop_height_unit',valus);
 			
		}else if(id === 'tablet'  ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-tablet_height_unit', valus);
 			
		}else if(id === 'phablet' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phablet_height_unit', valus );
 			
		}else if(id === 'phone' ){
			$('.sao_element_item.sao-element-draggable-active').attr('data-phone_height_unit', valus );
			
 		}else{
			$('.sao_element_item.sao-element-draggable-active').attr('data-height_unit',valus );
 		}
		$('#sao_object_height').val(Math.round(height));
		
		$('#sao_object_height').val(Math.round(height));
		
  		if(valus == 'percentage'){
			var action_height = height + '%';
		}else if (valus == 'auto'){
			var action_height = 'auto';
		}else if(valus == 'pexel'){
			var action_height = height + 'px';
		}
 	 	$(this).parents('.sao_slider_meta').find('.sao-element-item.sao-element-draggable-active').css('height',action_height); 
		
		
		
		sao_output_online();

    });
	
	$('.sao_responsive_mode').on('change keyup mousedown ',function(e) {
		var val = $(this).val();
		
		if(val == 'auto'){
	  		$('.sao-slider-responsive').addClass('sao-slider-responsive-auto');
  		$('.sao-slider-responsive').removeClass('sao-slider-responsive-custom');
		
		if(!$('.sao-slider-responsive-tab[data-id="main"]').hasClass('sao-slider-responsive-active')){
			
		  $( '.sao-slider-responsive-tab[data-id="main"]').trigger( "click" );
		}
		}else{
  		$('.sao-slider-responsive').addClass('sao-slider-responsive-custom');
  		$('.sao-slider-responsive').removeClass('sao-slider-responsive-auto');
		}
		
		
		
		 });
		
$('.sao-max-width-keyup').on('change keyup mousedown ',function(e) {
		var val = $(this).val();
  		$('.sao-slider-details').css('max-width',val+'px')
    }); 
    
	 
   
	$('.sao-slider-perview-width,.sao-slider-perview-height').on('change keyup mousedown ',function(e) {
 		 online_change_size();
		sao_slider_item();
   }); 
   
   	$('.sao-slider-perview-width-unit,.sao-slider-perview-height-unit').on('change keyup mousedown ',function(e) {
 		 online_change_size();
sao_slider_item()   });    
   
   
	$(document).on('mouseup','.sao_body_background_color',function(e) {
		online_change_color();
	 
   });    
   
   
	
 	// the upload image button, saves the id and outputs a preview of the image
	$('.sao_slider_add_image').click(function(event) {
			var imageFrame;

		var that = $(this);
		event.preventDefault();
		
		var options, attachment;
		 var meta_beyond_body_background_image = that.parents('.meta_sao_background_image');
		var $self = $(event.target);
		var $div = $self.closest(meta_beyond_body_background_image);
		
		// if the frame already exists, open it
		if ( imageFrame ) {
			imageFrame.open();
			return;
		}
		
		imageFrame = wp.media({
 
			
			title: $(this).data('uploader-title'),
			button: {
				text: $(this).data('uploader-button-text'),
			},
			multiple: false
		});
		
		// set up our select handler
		imageFrame.on( 'select', function() {
			var selection = imageFrame.state().get('selection');
			
			if ( ! selection )
			return;
			
			// loop through the selected files
			selection.each( function( attachment ) {
				console.log(attachment);
				var src = attachment.attributes.sizes.full.url;
				var width = attachment.attributes.sizes.full.width;
				var height = attachment.attributes.sizes.full.height;
				$('.sao-slider-item .sao-thumb .sao-post-thumbnail img').remove();
 				var data = '<img  src="'+src+'" width="'+width+'" height="'+height+'"/>';
				 
				$div.find('img').remove();
 				$div.find('[name="sao_background_image[src]"]').attr('value',src);	
 				$div.find('[name="sao_background_image[width]"]').attr('value',width);	
 				$div.find('[name="sao_background_image[height]"]').attr('value',height);	
 				$('.sao-slider-item .sao-thumb .sao-post-thumbnail').append(data);
			$('.sao_slider_remove_image').addClass('sao_slider_image_active');
sao_slider_item();
				
   			} );
		});
		
		// open the frame
		imageFrame.open();
	});
	
	$(document).on('click', '.sao_slider_image_active', function(e) {
		$(this).parent().find('[name="sao_background_image[width]"],[name="sao_background_image[src]"],[name="sao_background_image[height]"]').attr('value','');
		
		$('.sao-slider-item .sao-thumb .sao-post-thumbnail img').remove();
		$(this).removeClass('sao_slider_image_active');
  	}); 	  
	  
	   setTimeout(function(){sao_slider_item();}, 1000);
	
			

	});
	 
});
 