jQuery(function($) {
	'use strict';
	jQuery(document).ready(function() {
 

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
	 
	 
	 
	 
	function auto_start_slider(this_element){
				$(this_element).stop();
					
					var start = $(this_element).find('.sao-slider-effect').attr('data-start');
					var end = $(this_element).find('.sao-slider-effect').attr('data-end');
					
					var effect = $(this_element).find('.sao-slider-effect').attr('data-effect');
					
					var initial = $(this_element).find('.sao-slider-effect').attr('data-initial');
					var scale = $(this_element).find('.sao-slider-effect').attr('data-scale');
					var id = $(this_element).attr('data-id');
 
 					var time =  end - start;
				
  
					$(this_element).removeAttr('style');
  					if( effect ==='move'){
						var style = $(this_element).parent().attr('style');
						$(this_element).parent().attr('style','');
 						var width = $(this_element).width();
						var height = $(this_element).height();
   						var top = $(this_element).position().top;
						var left = $(this_element).position().left;
						
 						if(initial === 'top'){
							$(this_element).css({top: '-' + height + 'px'});
						 	$(this_element).parent().attr('style',style);
							$(this_element).delay(start).animate({ top: top +'px'},time,function() {
   								$(this_element).removeAttr('style');
							}); 							 
 
 						}else if(initial === 'left'){
							$(this_element).css({left: '-' + width + 'px',right:'auto'});
							$(this_element).parent().attr('style',style);
 							$(this_element).delay(start).animate({ left: left +'px'},time,function() {
   								$(this_element).removeAttr('style');
							}); 	
							
							
						}else if(initial === 'bottom'){
							$(this_element).css({bottom: '-' + height + 'px',top:'auto'});
							var bottom_top = $(this_element).position().top;
							$(this_element).css({bottom: 'auto',top:bottom_top});
						 	$(this_element).parent().attr('style',style);
							$(this_element).delay(start).animate({ top: top +'px'},time,function() {
   								$(this_element).removeAttr('style');
							}); 							 
  
						}else if(initial === 'right'){
 
 
  							$(this_element).css({right: '-' + width + 'px',left:'auto'});
							
  							var right_left = $(this_element).position().left;
  							 $(this_element).css({right: 'auto',left:right_left});
							 
						 	 $(this_element).parent().attr('style',style);
							
 							  $(this_element).delay(start).animate({ left: left +'px'},time,function() {
   								$(this_element).removeAttr('style');
							});
						} 			 
					 
					}else if( effect ==='fade'){
		
						$(this_element).css({display:'none'});
		
						$(this_element).delay(start).fadeIn(time,function() {
						$(this_element).removeAttr('style');
						});
						 
					}else if( effect ==='scale'){
							$(this_element).fadeOut(0);
							$(this_element).scale(scale);
							$(this_element).delay(start).fadeIn(0).animate({scale:1},time,function() {
							});
					}
					
		 	 
	}
	 $('.sao-slider-featured,.sao-slider-post').each(function(index, element) {
 			 $(this).attr('style', ' position: fixed;width:1920px');
	}); 
 
	function auto_end_slider(this_element,time){
				$(this_element) .stop();
 
 					
					var start = $(this_element).find('.sao-slider-effect').attr('data-start');
					var end = $(this_element).find('.sao-slider-effect').attr('data-end');
					
					var effect = $(this_element).find('.sao-slider-effect').attr('data-effect');
					
					var initial = $(this_element).find('.sao-slider-effect').attr('data-initial');
					var scale = $(this_element).find('.sao-slider-effect').attr('data-scale');
					var id = $(this_element).attr('data-id');
					$(this_element).removeAttr('style');
 
 					
 				 
							
							
							
					if( effect ==='move'){
						
						var style = $(this_element).parent().attr('style');
						$(this_element).parent().attr('style','');
						var width = $(this_element).width();
						var height = $(this_element).height();
						var top = $(this_element).position().top;
						var left = $(this_element).position().left;
						if(initial === 'top'){ 
							$(this_element).parent().attr('style',style);
 							$(this_element).animate({ top:'-' + height +'px'},time,function() {
								$(this_element).fadeOut(0);
   							});
 							
						}else if(initial === 'left'){
							$(this_element).parent().attr('style',style);
 							$(this_element).animate({ left:'-' + width +'px'},time,function() {
								$(this_element).fadeOut(0);
   							});							
							
						}else if(initial === 'bottom'){
							$(this_element).css({bottom: '-' + height + 'px',top:'auto'});
							var bottom_top = $(this_element).position().top;
 							$(this_element).css({top:top,bottom:'auto'});
							$(this_element).parent().attr('style',style);
							$(this_element).animate({ top: bottom_top+'px'},time,function() {
   								$(this_element).fadeOut(0);
							}); 		
				
						}else if(initial === 'right'){
		
		
		
				 
							$(this_element).css({right: '-' + width + 'px',left:'auto'});
							var right_left = $(this_element).position().left;
 							$(this_element).css({left:left,right:'auto'});
							$(this_element).parent().attr('style',style);
							
							$(this_element).animate({ left: right_left+'px'},time,function() {
   								$(this_element).fadeOut(0);
							}); 		
		
						} 			 
					
					
					}
					if( effect ==='fade'){
						
 						$(this_element).fadeOut(time,function() {
							$(this_element).fadeOut(0);

						});
					}
					if( effect ==='scale'){
						
						$(this_element).scale(1);
						$(this_element).animate({scale:scale},time,function() {
  						});
					}
 	 
			 
	} 
	 
	 

  	$('.sao-custom-slider').each(function(index, block) {	 
 
 
		var data_slider = jQuery.parseJSON( $(this).find('.sao-slider-options').html());
		
			$(this).find('.sao-slider-element-item').each(function(index, block) {	
				$(this).fadeOut(0);
 			}); 
		
		 
	 
 		data_slider['onSliderLoad']= function ($el, scene) {
 				 
 			$el.find('.sao-slider-element-item').each(function(index, block) {	
				if($(this).parents('.sao-slider-item').hasClass('sao-slider-item-1')){
					 
		
  					auto_start_slider(this);

 		 		} 
 			}); 
		};
	 
		 
		data_slider['onBeforeSlide']= function ($el, scene) {
			
  				$el.find('.sao-slider-element-item').each(function(index, block) {	
				if(!$(this).parents('.sao-slider-item').hasClass('active')){
					auto_start_slider(this);

 		 		}else{
					auto_end_slider(this,data_slider['speed']);

 				}
		}); 
		};
 		 
	 
	 
	 
		$(this).show().find('.sao-slider-options').prev('.sao-slider-list').sao_lightSlider(data_slider);
 
 			
	});
	 
	 
	function auto_width_slider_warp(){
		var windowW = $(document).width();

  		$('.sao-slider-item').each(function() {
	 
		
 			if (1200 < windowW ){
				$(this).addClass('sao-slider-main');
			
			}else if (992  < windowW && windowW <= 1199){
				$(this).addClass('sao-slider-desktop');
			
			}else if (768 < windowW && windowW <= 991 ){
				$(this).addClass('sao-slider-tablet');
			
			}else if (502  < windowW && windowW <= 767){
				$(this).addClass('sao-slider-phablet');
			
			}else if (0 < windowW && windowW <= 501){
				$(this).addClass('sao-slider-phone');
				 
			} 	 
 		});
	}
	/***********************************************
	Remove Auto Width Builder Warp
	************************************************/
 
 	function remove_auto_width_slider_warp( ){
		$('.sao-slider-item').each(function() {
  				$(this).removeClass('sao-slider-main').removeClass('sao-slider-desktop').removeClass('sao-slider-tablet').removeClass('sao-slider-phablet').removeClass('sao-slider-phone');
 	 
		
 		});
	}	  
		remove_auto_width_slider_warp();	 	

	auto_width_slider_warp();	 	
	$(window).resize(function () { 
	remove_auto_width_slider_warp()	;	 	
	auto_width_slider_warp();	 	
	});
   
	
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
	sao_slider_item();	
	
	
	
	
	$('.sao-slider-featured,.sao-slider-post').each(function(index, element) {
  			var main_width = $(this).find('.sao-slider-details').attr("data-width");
			var main_height = $(this).find('.sao-slider-details').attr("data-height");
			var max_width = $(this).find('.sao-slider-details ').attr("data-max-width");
			$(this).find('.sao-slider-details ').attr('style', '  width:' + main_width + ';height:' + main_height + ' ;max-width:' + max_width + ';');
 			
 	});
  
	$('.sao-slider-details').each(function(index, element) {
		var  d_width = $(this).width();
   		var  d_height = $(this).height();
 		  $(this).attr('width',d_width).attr('height',d_height);
	});
 	
 
	 $('.sao-slider-featured,.sao-slider-post ').each(function(index, element) {
 			 $(this).attr('style', '');
	}); 
	
 	$('.sao-slider-featured,.sao-slider-post').each(function(index, element) {
		var max_width = $(this).find('.sao-slider-details ').attr("data-max-width");
  		 $(this).find('.sao-slider-details ').attr('style',  'max-width:' + max_width + ';');
	}); 
 
 
 	 $('body').each(function(index, element) {
 			 $(this).addClass('body-full-width');
	}); 
	 
 	
	
	
	$('.sao-slider-item').each(function(index, element) {
		var  d_width = $(this).find('.sao-slider-details ').width();
    		var  d_height = $(this).find('.sao-slider-details ').height();
 
		var ratio = d_width / d_height;
  		var d_ratio = ratio.toFixed(2);
		$(this).attr('data-ratio',d_ratio);
 	});
	 $('body').each(function(index, element) {
 			 $(this).removeClass('body-full-width');
 			// $(this).attr('style', '');
	});  
 
	 
	function sao_slider_item_responsive(){
		$('.sao-slider-item').each(function(index, block) {
		var swidth = $(this).find('.sao-slider-details').width();
 		var ratio = $(this).attr('data-ratio');
		var sheight = swidth /ratio;
		$(this).height(sheight);
 	});  
	}
 		 
	function sao_slider_featured_responsive(){ 

		$('.sao-slider-featured,.sao-responsive-auto .sao-slider-post').each(function(index, element) {
			var pageWidth, pageHeight;
						
			var $page = $(this).find('.sao-slider-details-warp');
			var maxWidth = $(this).find('.sao-slider-details').attr('width');
			var maxHeight = $(this).find('.sao-slider-details').attr('height');
						
			var basePage = {
					  width: $(this).find('.sao-slider-details').width(),
					  height: $(this).find('.sao-slider-details').height(),
					  scale: 1,
					  scaleX: 1,
					  scaleY: 1
			};
			var scaleX = 1, scaleY = 1;                      
			scaleX = basePage.width  / maxWidth;
			scaleY = basePage.height / maxHeight ;
					  
			var res_width =   (maxWidth /basePage.width)*100 ;
			var res_height = (maxHeight  / basePage.height)*100 ;
					  
			basePage.scaleX = scaleX;
			basePage.scaleY = scaleY;
			basePage.scale = (scaleX > scaleY) ? scaleY : scaleX;
					
			var newLeftPos = Math.abs(Math.floor(((basePage.width * basePage.scale) - maxWidth)/2));
			var newTopPos = Math.abs(Math.floor(((basePage.height * basePage.scale) - maxHeight)/2));
						
			$page.attr('style', 'transform:translate(-50%,-50%) scale(' + basePage.scale + ');-webkit-transform:translate(-50%,-50%) scale(' + basePage.scale + ');-moz-transform:translate(-50%,-50%) scale(' + basePage.scale + ');-o-transform:translate(-50%,-50%) scale(' + basePage.scale + ');-ms-transform:translate(-50%,-50%) scale(' + basePage.scale + ');width:' + res_width + '%;height:' + res_height + '%;');
			 
 		});
	}
	sao_slider_item_responsive();
	sao_slider_featured_responsive();
		sao_slider_item();	

	$(window).resize(function () { 
		sao_slider_featured_responsive();
		sao_slider_item_responsive();
			sao_slider_item();	

 	});
	 window.setInterval(function(){
	sao_slider_item_responsive();
	sao_slider_featured_responsive();
		sao_slider_item();	

}, 1000);
	
	 
 	 
	  
	});
	 
});
 