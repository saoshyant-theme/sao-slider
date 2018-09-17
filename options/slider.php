<?php

add_filter('sao_element_options', 'sao_slider_options');
function sao_slider_options( $element ) {
	$option = array();
	
	$options_sliders = array();
	$options_sliders_obj = get_categories('taxonomy=sao_sliders&type=sao_slides'); 
 	foreach ($options_sliders_obj as $slider) {
    	$options_sliders[$slider->slug] = $slider->cat_name;
	}	 
	 
	
	
 	$item = array(
 		'name'			=> 	esc_html('Sao Slider','sao'),
 		'id'			=> 'sao_slider',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/slider.jpg'
  	); 
   
 
 
  
	$option[]= array( 
		"name"			=> esc_html('Number of Posts to show','sao'),
 		"id"			=> "number",
 		"default"		=> 5,
  		"type"			=> "number",
 		  
	);	    
	
	
	$option[]= array( 
		"name"			=> esc_html('Category','sao'),
 		"id"			=> "sliders",
		"desc"			=>  esc_html('Select "Custom Slides"','sao'),
   		"type"			=> "select",
		"options"		=>  $options_sliders,						
 	); 	
	
	
	$option[]= array( 
		"name"			=> esc_html('Pager','sao'),
 		"id"			=> "pager",
		"default"		=>  1,
 		"group"			=>  esc_html('Slider','sao'),
  		"type"			=> "checkbox",
 	); 		
	
	$option[]= array( 
		"name"			=> esc_html('Position Pager','sao'),
 		"id"			=> "pager_position",
 		"group"			=>  esc_html('Slider','sao'),
		"fold"			=> array( 1 => 'pager'  ),
 		"type"			=> "select",
		"options"		=> array( 
			"top" =>  esc_html('Top','sao'),
			"bottom" =>  esc_html('Bottom','sao')
		),
  		
  	); 	 	
	$option[]= array( 
		"name"			=> esc_html('Arrows','sao'),
 		"id"			=> "arrows",
 		"group"			=>  esc_html('Slider','sao'),
		"default"		=>  1,
 		"type"			=> "checkbox",
 	); 		
		
	$option[]= array( 
		"name"			=> esc_html('Timer','sao'),
 		"id"			=> "timer",
		"default"		=>  1,
 		"group"			=>  esc_html('Slider','sao'),
 		"type"			=> "checkbox",
 	); 		
		

	$option[]= array( 
		"name"			=> esc_html('Auto Play','sao'),
 		"id"			=> "auto",
 		"group"			=>  esc_html('Slider','sao'),
  		"type"			=> "checkbox",
		"default"		=>  1,
	); 	 	  		 
		 
	$option[]= array( 
		"name"			=> esc_html('Slider Effect','sao'),
 		"id"			=> "effect",
 		"group"			=>  esc_html('Slider','sao'),
		"default"		=>  'fade',
  		"type"			=> "select",
    		"options"		=>  array( 
			"slide"			=> esc_html('Slide','sao'),
 			"fade"			=> esc_html('Fade','sao'),
		),
  	); 	 
  	 
	$option[]= array( 
		"name"			=> esc_html('Animation Speed ,Default "5000"','sao'),
 		"id"			=> "speed",
		"default"		=>  '1000',
 		"group"			=>  esc_html('Slider','sao'),
 		"type"			=> "number",
   	); 	 
	
	$option[]= array( 
		"name"			=> esc_html('Animation Pause Time','sao'),
 		"id"			=> "pause",
 		"group"			=>  esc_html('Slider','sao'),
		"default"		=>  '5000',
 		"type"			=> "number",
   		
  	); 	   	
	 
	 
	$height = array(
		'200'				=>	'200px',
		'300'				=>	'300px',
		'400'				=>	'400px',
		'500'				=>	'500px', 
		'600'				=>	'600px',
		'700'				=>	'700px',
		'800'				=>	'800px',
		'900'				=>	'900px',
		'1000'				=>	'1000px',
 		
	);
	$option[]= array( 
		"name"			=> esc_html('Height','sao'),
 		"id"			=> "height",
		"default"		=>  '700',
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "select",
   		"options"		=>  $height,						
   	); 	  
	
  	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  array( 
			"top"			=> '20',
			"left"			=> '20',
			"bottom"		=> '20',
			"right"			=> '20',
 			), 
		
		"type"			=> "multi_options",
 		"options"		=>  sao_multi_array_options('margin'),						
 	);	  
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 
 
add_filter('sao_builder_perview_sao_slider', 'sao_perview_slider_config');
function sao_perview_slider_config( $args ) {
		$key = $args['key'];
		$output='';
		$css='';

	$output ='<img src="'.plugin_dir_url( __DIR__ ).'assets/image/slider.jpg">'; 
	$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
	return $return;
}
add_filter('sao_builder_sao_slider', 'sao_slider_config');
function sao_slider_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
	$script='';
	$option['post_type'] = 'sao_slide';

	$height = !empty($option['height']) ?$option['height'] : '700';
	$desktop_height = !empty($option['desktop_height']) ?$option['desktop_height'] : '600';
	$tablet_height = !empty($option['tablet_height']) ?$option['tablet_height'] : '400';
	$phablet_height = !empty($option['phablet_height']) ?$option['phablet_height'] : '500';
	$phone_height = !empty($option['phone_height']) ?$option['phone_height'] : '300';
    
 	//OutPut
	$layout = !empty($option['layout']) ?$option['layout'] : '';
	if($layout =='horizontal'){
		$class= ' sao-horizontal-thumb sao-bottom-thumb ';
	}elseif($layout =='vertical'){
  		$class= ' sao-vertical-thumb sao-bottom-thumb ';
	
	}else{
  		$class= ' sao-vertical-thumb  ';
	}
 
	  
		
	$output.= '<div class="sao-custom-slider  sao-image-gallery sao-'.esc_attr($height).'px   ">'; 
 	$output.= '<div class="sao-slider-list" >'; 
 		$element = sao_slider_post($option,$key ) ; 
		$output.=!empty($element['output'])?$element['output']:'';
		$css.=!empty($element['css'])?$element['css']:'';
		$script.=!empty($element['script'])?$element['script']:'';
		
	$output.= '</div>'; 
	
 	
	$slider_options = array( 
		"auto"				=> true,
   				
		"responsive"		=>  
 			array( 
				"breakpoint"		=> 1240,
				"settings"			=> 
					array( 
						"controls"		=> true,
					),
			),
			array( 
				"breakpoint"		=> 768,
				"settings"			=> 
					array( 
						"controls"		=> true,
					),
			),
			
 			
	); 	
	
	
 	$slider_options['mode']= !empty($option['effect']) ? $option['effect'] : 'fade';
  	$slider_options['speed']= !empty($option['speed']) ? (int)$option['speed'] : 2000;
  	$slider_options['pause']= !empty($option['pause']) ? (int)$option['pause'] : 5000;;	
 	$slider_options['auto']= !empty($option['auto']) ? $option['auto'] :'';	
  	$slider_options['pager']=  !empty($option['pager']) ? $option['pager'] : '';
  	$slider_options['controls']=!empty($option['arrows']) ? $option['arrows'] : '';
  	$slider_options['timer']= !empty($option['timer']) ? $option['timer'] : '';		
  	
	$number= !empty($option['number']) ? $option['number'] : '';
	$query = sao_query($option);
	$num = $query->post_count;		
   	if($number == '1' || $num == '1'){
		$slider_options['auto']= false;
		$slider_options['pause']= 0;
		$slider_options['pager']= false;
		$slider_options['controls']= false;
		$slider_options['timer']= false;
		$slider_options['enableDrag']= false;
		$slider_options['loop']= false;
		$slider_options['enableTouch']= false;
	}
  
 	$output.= sao_lightslider(1 ,$slider_options);

    $output.='</div>';
 	
  
 
	$css.=sao_element_padding( $key,$option); 
 	
   	$return['script']= $script;
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
function sao_slider_post($option =false,$key = false) { 
  	ob_start(); 
	$output ='';
	$css ='';
	$script ='';
  
  	$query = sao_query($option);
	$output='';
	$count=0;
 	if( $query->have_posts() ) : 
 	while ( $query->have_posts() ) : $query->the_post(); $count++;
		global $post;
		$background_transform = get_post_meta($post->ID, 'sao_slider_background_transform', true);
		$responsive_mode = get_post_meta($post->ID, 'sao_responsive_mode', true);
		$max_width = get_post_meta($post->ID, 'sao_max_width', true);
  		$width = get_post_meta($post->ID, 'sao_show_width', true);
  		$width_unit = get_post_meta($post->ID, 'sao_show_width_unit', true);
   		$height = get_post_meta($post->ID, 'sao_show_height', true);
  		$height_unit = get_post_meta($post->ID, 'sao_show_height_unit', true);
		
		$transform = !empty($background_transform)?' sao-background-transform':'';

		$pager_position = !empty($option['pager_position']) ? ' sao-pager-'.$option['pager_position']: ' sao-pager-top';


		echo '<div class="sao-slider-item sao-slider-item-'.esc_attr($count).'  sao-post-'.esc_attr($post->ID).' '.esc_attr($transform).' '.esc_attr($pager_position).' sao-responsive-'.esc_attr($responsive_mode).'">';
		echo '<div class="sao-slider-post " >';
		sao_slider_background($post->ID);
		$link = get_post_meta($post->ID, 'sao_slide_link', true);
   		$max_width = get_post_meta($post->ID, 'sao_max_width', true); 
 


		echo '<a class="sao-slider-background-color" href="'.esc_url($link).'">';
  		echo '</a>';	
		echo '<div class="sao-slider-details" data-width="'.esc_attr($width.$width_unit).'"  data-max-width="'.esc_attr($max_width).'px"  data-height="'.esc_attr($height.$height_unit).'" >';
		echo '<div class="sao-slider-details-warp sao-auto-width-item" >';
				$element =sao_slider_details($post->ID);
				echo !empty($element['output'])?$element['output']:'';
 				$css.=!empty($element['css'])?$element['css']:'';
				$script.=!empty($element['script'])?$element['script']:'';
  		echo '</div>';	
  		echo '</div>';	
 		echo '</div>';	
		echo '</div>';	
		
		$background_color = get_post_meta($post->ID, 'sao_background_color', true);
		
  		if(isset($background_color['first'])){
				$orientation = !empty($background_color['orientation'])? $background_color['orientation']:'';
				
				if($orientation == "horizontal"){
					$moz = 'left';
					$liner = 'to right';
				}elseif($orientation == "vertical"){
					$moz = 'top';
					$liner = 'to bottom';
					
				}elseif($orientation == "diagonal"){
					$moz = '-45deg';
					$liner = '135deg';
				}else{
					$moz = '45deg';
					$liner = '45deg';						
				}
						
				$bg_color = 'background-color: '.esc_html($background_color['first']).' !important;';
					
				if(!empty($background_color['second'])){
					
					if(!empty($background_color['third'])){
						$bg_color.= ' background: -moz-linear-gradient('.$moz.', '.$background_color['first'].' 0%,'.$background_color['second'].' 50%, '.$background_color['third'].' 100%) !important;';
						$bg_color.= ' background: -webkit-linear-gradient('.$moz.', '.$background_color['first'].' 0%,'.$background_color['second'].' 50%,'.$background_color['third'].' 100%) !important; '; 								
						$bg_color.= ' background: linear-gradient('.$liner.', '.$background_color['first'].' 0%,'.$background_color['second'].' 50%,'.$background_color['third'].' 100%) !important;';
						
					} else{
						
						$bg_color.= ' background: -moz-linear-gradient('.$moz.', '.$background_color['first'].' 0%, '.$background_color['second'].' 100%) !important;';
						$bg_color.= ' background: -webkit-linear-gradient('.$moz.', '.$background_color['first'].' 0%,'.$background_color['second'].' 100%) !important; '; 								
						$bg_color.= ' background: linear-gradient('.$liner.', '.$background_color['first'].' 0%,'.$background_color['second'].' 100%) !important;';
					}
					 
				} 
	 
				$css.= '.sao-element-'.$key.' .sao-post-'.$post->ID.' .sao-slider-background-color{ '.$bg_color.'}';	 
 			}  

			if(!empty($max_width)){
				$css.= '.sao-element-'.$key.' .sao-post-'.$post->ID.' .sao-slider-details{ max-width:'.$max_width.'px;} ';	 
			}
			$css.= sao_builder_item_css(sao_style_repsonsive(''),'.sao-element-'.$key.' .sao-post-'.$post->ID.' .sao-slider-details-warp');	
			$css.= sao_builder_item_css(sao_style_repsonsive('desktop_'),'.sao-element-'.$key.' .sao-responsive-custom.sao-slider-desktop.sao-post-'.$post->ID.' .sao-slider-details-warp');	
			$css.= sao_builder_item_css(sao_style_repsonsive('tablet_'),'.sao-element-'.$key.' .sao-responsive-custom.sao-slider-tablet.sao-post-'.$post->ID.' .sao-slider-details-warp');	
			$css.= sao_builder_item_css(sao_style_repsonsive('phablet_'),'.sao-element-'.$key.' .sao-post-'.$post->ID.' .sao-responsive-custom.sao-slider-phablet .sao-slider-details-warp');	
			$css.= sao_builder_item_css(sao_style_repsonsive('phone_'),'.sao-element-'.$key.' .sao-responsive-custom.sao-slider-phone.sao-post-'.$post->ID.' .sao-slider-details-warp');	
 
 
 

	 endwhile;
 	endif; 
	  
	
	
	$return['output']= ob_get_clean();

	$return['css'] = $css;
 	$return['script']= $script;
  	return $return;	
 
}


function sao_slider_details($post_id) { 
 
	$output='';
	$css='';
	$script ='';
	$element_json = get_post_meta($post_id, 'sao_element', true);
  	$element = sao_options_array_row($element_json);	
	
	if(!empty($element)):
	foreach($element as $element_key=> $element_value):  
 
 
 			$element_option = sao_options_decode(urldecode($element_value['option']));
			$output.= '<aside  class="sao-element-'.esc_attr($element_key).'  sao-slider-element-item sao_element_'.esc_attr($element_value['value']).' sao-auto-width ">';
				$args['key'] = $element_key;
				$args['option'] = $element_option;
				$args['post_id'] = $post_id;
				if(has_filter('sao_slider_'.$element_value['value'])) {
					$filter =apply_filters('sao_slider_'.$element_value['value'], $args);
					$output.=!empty($filter['output'])?$filter['output']:'';
					$css.=!empty($filter['css'])?$filter['css']:'';
					$script.=!empty($filter['script'])?$filter['script']:'';
													 
				}
 						
			$output.= '</aside>';
			
 		   
 
 		$css.= sao_builder_item_css(sao_style_detailes($element_value,''),'.sao-post-'.$post_id.' .sao-element-'.$element_key );	
		$css.= sao_builder_item_css(sao_style_repsonsive('desktop_'),'.sao-responsive-custom.sao-slider-desktop.sao-post-'.$post_id.' .sao-element-'.$element_key );	
		$css.= sao_builder_item_css(sao_style_repsonsive('tablet_'),'.sao-responsive-custom.sao-slider-tablet.sao-post-'.$post_id.' .sao-element-'.$element_key );	
		$css.= sao_builder_item_css(sao_style_repsonsive('phablet_'),'.sao-responsive-custom.sao-slider-phablet.sao-post-'.$post_id.' .sao-element-'.$element_key );	
		$css.= sao_builder_item_css(sao_style_repsonsive('phone_'),'.sao-responsive-custom.sao-slider-phone.sao-post-'.$post_id.' .sao-element-'.$element_key );	
		 
	endforeach;			
	endif;	
 
			 
	$return['css'] = $css;
	$return['output']= $output;
	$return['script']= $script;
  	return $return;				 
  
}  
function sao_style_detailes($element_value,$id =false) { 

			$top = !empty($element_value[$id.'top']) ?  'top:'.$element_value[$id.'top'].'px;' :'';
			$left = !empty($element_value[$id.'left']) ? 'left:'.$element_value[$id.'left'].'px;':'';
 			$width_unit = !empty($element_value[$id.'width_unit']) ? $element_value[$id.'width_unit'] : !empty($element_value['width_unit'])?$element_value['width_unit']:'';
 			if($width_unit == "percentage"){
				$width = !empty($element_value[$id.'width']) ? 'width:'.$element_value[$id.'width'].'%;' :'';
  			}elseif( $width_unit == "auto"){
 				$width = !empty($element_value[$id.'width']) ? 'width:auto;' :'';
			}else {
				$width = !empty($element_value[$id.'width']) ? 'width:'.$element_value[$id.'width'].'px;' :'';
 			} 
 			$height_unit = !empty($element_value[$id.'height_unit']) ? $element_value[$id.'height_unit'] : !empty($element_value['height_unit'])?$element_value['height_unit']:'';
			if($height_unit == "percentage"){
				$height = !empty($element_value[$id.'height']) ? 'height:'.$element_value[$id.'height'].'%;' :'';
  			}elseif( $height_unit == "auto"){
 				$height = !empty($element_value[$id.'height']) ? 'height:auto;' :'';
			}else {
				$height = !empty($element_value[$id.'height']) ? 'height:'.$element_value[$id.'height'].'px;' :'';
 			} 
			
 			$object = !empty($element_value[$id.'object']) ? $element_value[$id.'object']:''; 
			if($object == "show"){
				$display ='display:inline-block;';
			}elseif($object == "hide"){
				$display ='display:none !important;';
			}else{
				$display ='';
			}
 
		return $top.$left.$width.$height.$display;			
}


function sao_style_repsonsive($id) {
	global $post;
	$css='';
	$width = get_post_meta($post->ID, 'sao_show_'.$id.'width', true);
	$width_unit = get_post_meta($post->ID, 'sao_show_'.$id.'width_unit', true);
	$height = get_post_meta($post->ID, 'sao_show_'.$id.'height', true);
	$height_unit = get_post_meta($post->ID, 'sao_show_'.$id.'height_unit', true);
			
	if(!empty($width)&& !empty($width_unit)){
		$css.='width:'.$width.$width_unit.';';
	}
	if(!empty($height)&& !empty($height_unit)){
		$css.='height:'.$height.$height_unit.';';
	}
 
	return $css; 			

}
  
?>