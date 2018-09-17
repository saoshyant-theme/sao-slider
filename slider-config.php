<?php
function sao_slider_config_post(){
	global $post;
	 
	ob_start(); 
	$output ='';
	$key ='123';
	$css ='';
	$script ='';
  
 	$output='';
 		$background_transform = get_post_meta($post->ID, 'sao_slider_background_transform', true);
		$responsive_mode = get_post_meta($post->ID, 'sao_responsive_mode', true);
		$max_width = get_post_meta($post->ID, 'sao_max_width', true);
		$transform = !empty($background_transform)?'sao-background-transform':'';

		echo '<div class="sao-slider-item   sao-post-'.$post->ID.' '.esc_attr($transform).' sao-responsive-'.esc_attr($responsive_mode).'">';
		echo '<div class="sao-slider-post " >';
		sao_slider_background($post->ID);
		$link = get_post_meta($post->ID, 'sao_slide_link', true);
   		$max_width = get_post_meta($post->ID, 'sao_max_width', true); 
 


		echo '<a class="sao-slider-background-color" href="'.esc_url($link).'">';
  		echo '</a>';	
		echo '<div class="sao-slider-details" >';
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
				
				if($orientation == 'horizontal'){
					$moz = 'left';
					$liner = 'to right';
				}elseif($orientation == 'vertical'){
					$moz = 'top';
					$liner = 'to bottom';
					
				}elseif($orientation == 'diagonal'){
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


				$css.= '.sao-element-'.$key.' .sao-post-'.$post->ID.' .sao-slider-details{ '.$max_width.'px;}';	 
			} 
	$return['output']= ob_get_clean();
 	$return['css'] = $css;
 	$return['script']= $script;	
	return $return;	
}
?>			 