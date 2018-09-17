<?php

add_filter('sao_slider_element_options', 'sao_slider_image_options');

function sao_slider_image_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Image','sao'),
 		'id'			=> 'slider_image',
  		'width_unit'	=> 'pexel',
  		'height_unit'	=> 'pexel',		
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/image.jpg'
  	); 
   

	$option[]= array( 
		"name"			=> esc_html('Upload Image','sao'),
 		"id"			=> "image",
 		"type"			=> "image",
 		   
	);	
	$option[]= array( 
		"name"			=> esc_html('Link','sao'),
 		"id"			=> "link",
 		"type"			=> "text",
 		  
	); 
	 
	
 
	$option[]= array( 
		"name"			=> esc_html('Alignment','sao'),
 		"id"			=> "alignment",
 		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  'center',
		"desc"			=>  esc_html('Default "Center"','sao'),
		"type"			=> "select",
		"options"		=>  array( 
			"left"			=> 	esc_html('Left','sao'),
			"center"		=>  esc_html('Center','sao'),
 			"right"			=>  esc_html('Right','sao'),					
			 
		),					
		 
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
	 
	$option[]= array( 
		"name"			=> esc_html('Time to start Effect','sao'),
 		"id"			=> "time_start",
		"default"		=> "500",
		"desc"			=>  esc_html('Example "500"','sao'),
   		"group"			=>  esc_html('Animation','sao'),
		"type"			=> "number",
   	);	
	
	$option[]= array( 
		"name"			=> esc_html('Time to end Effect','sao'),
 		"id"			=> "time_end",
		"default"		=> "1000",
		"desc"			=>  esc_html('Example "1000"','sao'),
   		"group"			=>  esc_html('Animation','sao'),
		"type"			=> "number",
   	);	
	
	$option[]= array( 
		"name"			=> esc_html('Effect','sao'),
 		"id"			=> "effect",
   		"group"			=>  esc_html('Animation','sao'),
		"type"			=> "select", 
 
		"options"		=> array( 
			""				=> "None",
			"move"			=>  esc_html('Move','sao'),
			"fade"			=> "Fade",
			"scale"			=> "Scale",
 		),
	);
	
	$option[]= array( 
		"name"			=> esc_html('Initial Position','sao'),
 		"id"			=> "initial",
   		"group"			=>  esc_html('Animation','sao'),
		"type"			=> "select", 
		"fold"			=> array( "move" => "effect" ),
		"options"		=> array( 
			"top"			=>  esc_html('Top','sao'),
			"left"			=>  esc_html('Left','sao'),
			"bottom"		=>  esc_html('Bottom','sao'),
			"right"			=>  esc_html('Right','sao'),
  		),
	);	
	
	
	$option[]= array( 
		"name"			=> esc_html('Scale','sao'),
 		"id"			=> "scale",
		"fold"			=> array( "scale" => "effect" ),
   		"group"			=>  esc_html('Animation','sao'),
		"type"			=> "select", 
		"options"		=> array( 
			"0.0"			=> '0.0', 
			"0.1"			=> '0.1', 
			"0.2"			=> '0.2', 
			"0.3"			=> '0.3', 
			"0.4"			=> '0.4', 
			"0.5"			=> '0.5', 
			"0.6"			=> '0.6', 
			"0.7"			=> '0.7', 
			"0.8"			=> '0.8', 
			"0.9"			=> '0.9', 
			"1.1"			=> '1.1', 
			"1.2"			=> '1.2', 
			"1.3"			=> '1.3', 
			"1.4"			=> '1.4', 
			"1.5"			=> '1.5', 
			"1.6"			=> '1.6', 
			"1.7"			=> '1.7', 
			"1.8"			=> '1.8', 
			"1.9"			=> '1.9', 
			"2.0"			=> '2.0', 
			"2.5"			=> '2.5', 
			"3.0"			=> '3.0', 
  		),
	);	
 					 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 

 add_filter('sao_slider_slider_image', 'sao_slider_image_config');
 function sao_slider_image_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css ='';
  	
 	$image =!empty( $option['image'])?$option['image']:'';
  
 
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
 
 
   
 	//OutPut
    $output.='<div class="sao-image '.esc_attr($alignment).'">'; 
   
 	if(!empty($option['link'])){ 
		$output.= '<a href="'.esc_url($option['link']).'">';
	}
	$image = $option['image'];
 
	if(!empty($image['url'])){
		$alt = !empty($image['alt'])?$image['alt']:'';
		$width = !empty($image['width'])?$image['width']:'';
		$height = !empty($image['height'])?$image['height']:'';
		
 		$output.= '<img src="'.esc_url($image['url']).'" width="'.esc_attr($width).'" height="'.esc_attr($height).'" alt="'.esc_attr($alt).'">'; 
	}
	
 	if(!empty($option['link'])){ 
		$output.= '</a>';
	}	
	
    $output.='</div>';
	
	$output.=sao_slider_effect($option);
	$item='.sao-post-'.$post_id.' .sao-element-'.$key.' img';
	
	$img_css='';
	$img_css.= sao_builder_border( $option,'border');
	$img_css.= sao_builder_shadow( $option,'shadow');
	$img_css.= sao_builder_radius( $option,'radius');
  
	$css.= sao_builder_item_css($img_css,$item );
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>