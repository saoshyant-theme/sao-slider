<?php

add_filter('sao_slider_element_options', 'sao_slider_text_block_options');
function sao_slider_text_block_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Text Block','sao'),
 		'id'			=> 'text_block',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/text_block.jpg'
  	); 
 
	$option[]= array( 
		"name"			=> "Content",
  		"id"			=> "content",
  		"default"		=> "<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim</p>",
		"type"			=> "editor", 
	);  
	 
  
	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"desc"			=>  esc_html('Padding around the entire ,Default "0"','sao'),
 		"group"			=>  esc_html('Layout','sao'),
 		"default"		=>  array( 
				"top"		=> 20,
				"left"		=> 20,
				"bottom"	=> 20,
				"right"		=> 20,
  						) ,  
 		"type"			=> "multi_options",
  		"options"		=>  sao_multi_array_options('margin'),						
		  
	);	
 
	$option[]= array( 
		"name"			=> esc_html('Text Shadow','sao'),
 		"id"			=> "text_shadow",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('text_shadow'),						
 	); 		
	$option[]= array( 
		"name"			=> esc_html('Background Color','sao'),
 		"id"			=> "background_color",
 		"group"			=>  esc_html('Design','sao'),
		"type"			=> "color_rgba", 
		
  	); 	 
	
	
	$option[]= array( 
		"name"			=> esc_html('Border','sao'),
 		"id"			=> "border",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('border'),						
	); 	
	
	
	$option[]= array( 
		"name"			=> esc_html('Box Shadow','sao'),
 		"id"			=> "shadow",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('shadow'),						
 	); 	
	 	
 	$option[]= array( 
		"name"			=> esc_html('Border Radius','sao'),
 		"id"			=> "radius",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('radius'),						
	 
	); 	 		
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 

 

add_filter('sao_slider_text_block', 'sao_slider_text_block_config');
function sao_slider_text_block_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css ='';
 	if(!empty($option['content'])){
	$output.= '<article class="sao_text_block sao-slider-padding ">';
 	$output.= wp_kses_post($option['content']);
	$output.='</article>';
	}
 	$background='';
 	if(!empty($option['background_color'])){
		$background.='background:'.$option['background_color'].';'; 
	}	
	
  	$item='.sao-post-'.$post_id.' .sao-element-'.$key.' .sao_text_block';
	//Border
	$css.= $item.' {'.
	$background.
		sao_slider_text_shadow( $option,'text_shadow').
		sao_slider_border( $option,'border').
		sao_slider_shadow( $option,'shadow').
		sao_slider_radius($option,'radius').
	'}';	
		
	$css.=sao_slider_element_padding( $key,$post_id,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}


?>