<?php
 function sao_slider_element_padding( $key,$post_id,$option) {
	$css="";
	if( !empty($option['padding']['top']) || !empty($option['padding']['left']) || !empty($option['padding']['bottom']) || !empty($option['padding']['right']) ){
		$padding_unit = !empty($option['padding']['unit']) ?$option['padding']['unit'] : 'px';
		$padding_top = intval(isset($option['padding']['top'])) ? 'padding-top:'.$option['padding']['top'].$padding_unit.';': '';
		$padding_left = intval(isset($option['padding']['left'])) ? 'padding-left:'.$option['padding']['left'].$padding_unit.';' : '';
		$padding_bottom = intval(isset($option['padding']['bottom'])) ? 'padding-bottom:'.$option['padding']['bottom'].$padding_unit.';' : '';
		$padding_right = intval(isset($option['padding']['right'])) ? 'padding-right:'.$option['padding']['right'].$padding_unit.';' : '';		
		$css.='.sao-post-'.$post_id. ' .sao-element-'.$key.' .sao-slider-padding{'.$padding_top.$padding_left.$padding_bottom.$padding_right.'}';
	}
	return $css;
}


 function sao_slider_text_shadow( $option,$id) {
	$css="";
	if( !empty($option[$id]['horizontal']) || !empty($option[$id]['vertical']) || !empty($option[$id]['blur']) ){
			$text_shadow_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$text_shadow_horizontal = intval(isset($option[$id]['horizontal'])) ? $option[$id]['horizontal'].$text_shadow_unit.' ': '0 ';
			$text_shadow_vertical = intval(isset($option[$id]['vertical'])) ?  $option[$id]['vertical'].$text_shadow_unit.' ' : '0 ';
			$text_shadow_blur = intval(isset($option[$id]['blur'])) ?  $option[$id]['blur'].$text_shadow_unit.' ' : '0 ';
			$text_shadow_color = isset($option[$id]['color']) ? $option[$id]['color'].' ' : '';		
			$css.=  ' text-shadow:'.$text_shadow_horizontal.$text_shadow_vertical.$text_shadow_blur.$text_shadow_color.' !important;  ';
		}
	return $css;
}

function sao_slider_gradient_background_color( $option,$id ) {
	$background_color='';
	if(isset($option[$id]['first'])){
			$orientation = !empty($option[$id]['orientation'])? $option[$id]['orientation']:'';
			
			
				if($orientation == "horizontal"){
					$type = 'linear';
					$moz = 'left';
					$liner = 'to right';
				}elseif($orientation == "vertical"){
					$type = 'linear';
					$moz = 'top';
					$liner = 'to bottom';
					
				}elseif($orientation == "diagonal"){
					$type = 'linear';
					$moz = '-45deg';
					$liner = '135deg';
				}elseif($orientation == "diagonal"){
					$type = 'linear';
					$moz = '-45deg';
					$liner = '135deg';
				}elseif($orientation == "diagonal-bottom"){
					$type = 'linear';
					$moz = '45deg';
					$liner = '45deg';
				}elseif($orientation == "radial"){
					$type = 'radial';
					$moz = 'center, ellipse cover';
					$liner = 'ellipse at center';
				}else{
					$type = 'linear';
					$moz = '45deg';
					$liner = '45deg';						
				}
					
 			$background_color.= 'background-color: '.esc_html($option[$id]['first']).' !important;';
				
			if(!empty($option[$id]['second'])){
				
				if(!empty($option[$id]['third'])){
					$background_color.= ' background: -moz-'.$type.'-gradient('.$moz.', '.$option[$id]['first'].' 0%,'.$option[$id]['second'].' 50%, '.$option[$id]['third'].' 100%) !important;';
					$background_color.= ' background: -webkit-'.$type.'-gradient('.$moz.', '.$option[$id]['first'].' 0%,'.$option[$id]['second'].' 50%,'.$option[$id]['third'].' 100%) !important; '; 								
					$background_color.= ' background: '.$type.'-gradient('.$liner.', '.$option[$id]['first'].' 0%,'.$option[$id]['second'].' 50%,'.$option[$id]['third'].' 100%) !important;';
					
				} else{
					
  					$background_color.= ' background: -moz-'.$type.'-gradient('.$moz.', '.$option[$id]['first'].' 0%, '.$option[$id]['second'].' 100%) !important;';
					$background_color.= ' background: -'.$type.'-linear-gradient('.$moz.', '.$option[$id]['first'].' 0%,'.$option[$id]['second'].' 100%) !important; '; 								
					$background_color.= ' background: '.$type.'-gradient('.$liner.', '.$option[$id]['first'].' 0%,'.$option[$id]['second'].' 100%) !important;';
				}
				 
			} 
	}
		
	return $background_color;
 
}
function sao_slider_border( $option,$id ) {
	$css="";

		if(!empty($option[$id])){
			$border_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$border_top = intval(isset($option[$id]['top'])) ? 'border-top-width:'.$option[$id]['top'].$border_unit.';': '';
			$border_left = intval(isset($option[$id]['left'])) ? 'border-left-width:'.$option[$id]['left'].$border_unit.';' : '';
			$border_bottom = intval(isset($option[$id]['bottom'])) ? 'border-bottom-width:'.$option[$id]['bottom'].$border_unit.';' : '';
			$border_right = intval(isset($option[$id]['right'])) ? 'border-right-width:'.$option[$id]['right'].$border_unit.';' : '';		
			$border_style = isset($option[$id]['style']) ? 'border-style:'.$option[$id]['style'].';' : '';		
			$border_color = isset($option[$id]['color']) ? 'border-color:'.$option[$id]['color'].';' : '';	
			$css.=  ' border-width: 0px;'.$border_top.$border_left.$border_bottom.$border_right.$border_style.$border_color.'';
		} 
		
	return $css;	
}
function sao_slider_shadow( $option,$id ) {
		$css="";

		if(!empty($option[$id])){
			$shadow_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$shadow_horizontal = intval(isset($option[$id]['horizontal'])) ? $option[$id]['horizontal'].$shadow_unit.' ': '0 ';
			$shadow_vertical = intval(isset($option[$id]['vertical'])) ?  $option[$id]['vertical'].$shadow_unit.' ' : '0 ';
			$shadow_blur = intval(isset($option[$id]['blur'])) ?  $option[$id]['blur'].$shadow_unit.' ' : '0 ';
			$shadow_spread = intval(isset($option[$id]['spread'])) ?  $option[$id]['spread'].$shadow_unit.' ' : '0 ';		
			$shadow_color = isset($option[$id]['color']) ? $option[$id]['color'].' ' : '';		
			$shadow_position = isset($option[$id]['position']) ? $option[$id]['position'] : '';		
			$css.=  ' box-shadow:'.$shadow_horizontal.$shadow_vertical.$shadow_blur.$shadow_spread.$shadow_color.$shadow_position.';';
		}
	return $css;	
		
}
 
function sao_slider_radius( $option,$id ) {
		$css="";
if(!empty($option[$id])){
			$radius_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$radius_top_left = intval(isset($option[$id]['top_left'])) ? $option[$id]['top_left'].$radius_unit.' ': '0 ';
			$radius_top_right = intval(isset($option[$id]['top_right'])) ? $option[$id]['top_right'].$radius_unit.' ' : '0 ';
			$radius_bottom_right = intval(isset($option[$id]['bottom_right'])) ? $option[$id]['bottom_right'].$radius_unit.' ' : '0 ';
			$radius_bottom_left = intval(isset($option[$id]['bottom_left'])) ? $option[$id]['bottom_left'].$radius_unit.' ' : '0 ';		
			$css.=  ' border-radius: '.$radius_top_left.$radius_top_right.$radius_bottom_right.$radius_bottom_left.';';
		}
	return $css;	
}

function sao_slider_font_size( $option,$id ) {
		$css="";

if(!empty($option[$id]['size'])){
		$text_font_size_unit = !empty($option[$id]['unit']) ? $option[$id]['unit'] : 'px';
		$css.= intval(isset($option[$id]['size'])) ? ' font-size:'.$option[$id]['size'].$text_font_size_unit.' !important;': ' ';
	}
	return $css;	
}
?>