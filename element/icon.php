<?php

add_filter('sao_slider_element_options', 'sao_slider_icon_options');
function sao_slider_icon_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Icon','sao'),
 		'id'			=> 'slider_icon',
  		'width_unit'	=> 'auto',
  		'height_unit'	=> 'auto',		
 		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/icon.jpg'
  	); 
 
	$option[]= array( 
		"name"			=> "Icon",
  		"id"			=> "icon",
  		"default"		=> "fa-check-circle",
 		"type"			=> "icon", 
	);  

 
  
	$option[]= array( 
		"name"			=> esc_html('Alignment','sao'),
 		"id"			=> "alignment",
		"default"		=>  'center',
 		"group"			=>  esc_html('Layout','sao'),
		"desc"			=>  esc_html('Default "Center"','sao'),
		"type"			=> "select",
		"options"		=>  array( 
			"left"			=> 	esc_html('Left','sao'),
			"center"		=>  esc_html('Center','sao'),
 			"right"			=>  esc_html('Right','sao'),					
			 
		),					
		 
	);
	 
	
	$option[]= array(
		"name"		=>  esc_html('Icon Color','sao'),
		"id"		=> "color",
  		"group"			=>  esc_html('Design','sao'),
		"type"		=> "color_rgba",
	);
	$option[]= array( 
		"name"			=> esc_html('Icon Shadow','sao'),
 		"id"			=> "text_shadow",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('text_shadow'),						
 	); 			
 	
	$option[]= array( 
		"name"			=> esc_html('Icon Size','sao'),
 		"id"			=> "icon_size",
  		"group"			=>  esc_html('Typography','sao'),
		"default"		=>  array( 
 			"size"		=> '80',
			"unit"			=> 'px',
		), 
		
		"type"			=> "multi_options",
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	);
	
	
$option[]= array( 
		"name"			=> esc_html('Text Font Size in Desktop','sao'),
 		"id"			=> "icon_desktop_font_size",
		"desc"			=> esc_html('You can select Font Size in Desktop Devices,Resolution max 1199px and min 992px','sao'),

   		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options", 	 	
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	);  
	 		
			
	$option[]= array( 
		"name"			=> esc_html('Text Font Size in Tablet','sao'),
 		"id"			=> "icon_tablet_font_size",
		"desc"			=> esc_html('You can select Font Size in Tablet Devices,Resolution max 1199px and min 992px','sao'),

   		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options", 	 	
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	);			
			
		
	$option[]= array( 
		"name"			=> esc_html('Text Font Size in Phablet','sao'),
 		"id"			=> "icon_phablet_font_size",
		"desc"			=> esc_html('You can select Font Size in Phablet Devices,Resolution max 1199px and min 992px','sao'),

   		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options", 	 	
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	);			
		

		
	$option[]= array( 
		"name"			=> esc_html('Text Font Size in Phone','sao'),
 		"id"			=> "icon_phone_font_size",
		"desc"			=> esc_html('You can select Font Size in Phone Devices,Resolution max 1199px and min 992px','sao'),
   		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options", 	 	
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
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
		"desc"			=>  esc_html('Example "1000"','sao'),
		"default"		=> "1000",
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
add_filter('sao_slider_slider_icon', 'sao_slider_icon_config');
function sao_slider_icon_config( $args ) {
  
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css =''; 
 	
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
  	if($option['icon']){
		$output.= '<div class="sao-icon '.esc_attr($alignment).'" >';
		  $output.= '<i class="'.esc_attr($option['icon']).'"></i>'; 
		$output.= '</div>';
	}
	$output.=sao_slider_effect($option);
	
	$item = '.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-icon i'; 
 	 
	$icon_css =''; 
  	$icon_css.= sao_builder_color( $option,'color');
  	$icon_css.= sao_builder_font_size( $option,'icon_size');
  	$icon_css.= sao_slider_text_shadow( $option,'text_shadow');
	$css.=sao_builder_item_css($icon_css,$item);

	
	$css.= sao_builder_item_css( sao_slider_font_size($option,'icon_desktop_font_size'),'.sao-responsive-custom.sao-slider-desktop.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-icon i' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'icon_tablet_font_size'),'.sao-responsive-custom.sao-slider-tablet.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-icon i' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'icon_phablet_font_size'),'.sao-responsive-custom.sao-slider-phablet.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-icon i' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'icon_phone_font_size'),'.sao-responsive-custom.sao-slider-phone.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-icon i' );
 
	
  	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}


?>