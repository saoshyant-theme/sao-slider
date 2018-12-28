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
  		"default"		=> "Lorem ipsum dolor sit amet consectetuer adipiscing elit ",
		"type"			=> "editor", 
	);  
	 
  
	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"desc"			=>  esc_html('Padding around the entire ,Default "0"','sao'),
 		"group"			=>  esc_html('Layout','sao'),
 		"default"		=>  array( 
				"top"		=> 0,
				"left"		=> 0,
				"bottom"	=> 0,
				"right"		=> 0,
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
	
	
	$option[]= array( 
		"name"			=> esc_html('Text Font Family','sao'),
 		"id"			=> "text_font_family",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select", 	 	
		"options"		=>  sao_goooglefont()
		 
		
  	);  	
	
	$option[]= array( 
		"name"			=> esc_html('Text Font Weight','sao'),
 		"id"			=> "text_font_weight",
 		"default"		=> '400',
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select", 	 	
		"options"		=>  
			array( 
				""			=>  esc_html('Default','sao'),			
				"300"			=> '300',			
				"400"			=> '400',			
				"500"			=> '500',			
				"600"			=> '600',			
				"700"			=> '700',			
				"800"			=> '800',			
				"900"			=> '900',			
   			),
 	 
		 
  	); 
		
	
	$option[]= array( 
		"name"			=> esc_html('Text Font Size','sao'),
 		"id"			=> "text_font_size",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options", 
		"default"		=> array( 'size'=>'50','unit'=>'px'),
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
		"name"			=> esc_html('Text Font Line Height','sao'),
 		"id"			=> "text_line_height",
		"default"		=> array( 'size'=>'1.35','unit'=>'em'),
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
		"name"			=> esc_html('Text Transform','sao'),
 		"id"			=> "text_transform",
		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select", 	 	
		"options"		=>   
  			array( 
 				""					=> esc_html('None','sao'),
 				"uppercase"			=> 	esc_html('Uppercase','sao'),
 				"lowercase"			=> esc_html('Lowercase','sao'),
  				"capitalize"			=> esc_html('Capitalize','sao'),
  			),		
 		
  	);   

	
	$option[]= array( 
		"name"			=> esc_html('Text Font Size in Desktop','sao'),
 		"id"			=> "text_desktop_font_size",
		"desc"			=> esc_html('You can select Font Size in Desktop Devices,Resolution max 1199px and min 992px','sao'),

   		"group"			=>  esc_html('Font Size Resolution','sao'),
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
 		"id"			=> "text_tablet_font_size",
		"desc"			=> esc_html('You can select Font Size in Tablet Devices,Resolution max 1199px and min 992px','sao'),

   		"group"			=>  esc_html('Font Size Resolution','sao'),
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
 		"id"			=> "text_phablet_font_size",
		"desc"			=> esc_html('You can select Font Size in Phablet Devices,Resolution max 1199px and min 992px','sao'),

   		"group"			=>  esc_html('Font Size Resolution','sao'),
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
 		"id"			=> "text_phone_font_size",
		"desc"			=> esc_html('You can select Font Size in Phone Devices,Resolution max 1199px and min 992px','sao'),
   		"group"			=>  esc_html('Font Size Resolution','sao'),
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
		"desc"			=>  esc_html('Example "500"','sao'),
		"default"		=> "500",
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

 

add_filter('sao_slider_text_block', 'sao_slider_text_block_config');
function sao_slider_text_block_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css ='';
 	if(!empty($option['content'])){
	$output.= '<article class="sao_text_block sao-slider-padding sao_element_perview ">';
 	$output.= wp_kses_post($option['content']);
	$output.='</article>';
	}
 	$background='';
 	if(!empty($option['background_color'])){
		$background.='background:'.$option['background_color'].';'; 
	}	
	$output.=sao_slider_effect($option);
  	$item='.sao-post-'.$post_id.' .sao-element-'.$key.' .sao_text_block';
	//Border
 

 	//Font Css
	$font_css='';
  	$font_css.= sao_builder_color( $option,'text_color','main');
  	$font_css.= sao_builder_font_size( $option,'text_font_size' );
  	$font_css.= sao_builder_font_weight( $option,'text_font_weight' );
  	$font_css.= sao_builder_line_height( $option,'text_line_height' );
  	$font_css.= sao_builder_font_style( $option,'text_font_style' );
  	$font_css.= sao_builder_text_transform( $option,'text_transform' );
 	$font_css.=sao_slider_text_shadow( $option,'text_shadow');
	
	
	if(!empty($option['text_font_family'])){
		$output.='<link rel="stylesheet" id="'.esc_attr($option['text_font_family']).'-css" href="'.sao_slider_font_url($option['text_font_family']).'" type="text/css" media="all" />';  
		$font_css.=  'font-family:'.$option['text_font_family'].' !important;'; 
	}; 
	$css.= sao_builder_item_css( $font_css,$item.','.$item.','.$item.' *' );
	
	
	$box_css='';
	$box_css.= sao_builder_background_color( $option,'background_color' );
	$box_css.=sao_builder_border( $option,'border');
	$box_css.=	sao_builder_shadow( $option,'shadow');
	$box_css.=sao_builder_radius($option,'radius');
	$css.= sao_builder_item_css( $box_css,$item );
 	

  
	$css.= sao_builder_item_css( $box_css,$item );	
	
		
 		
	$css.=sao_slider_element_padding( $key,$post_id,$option); 

	

	$css.= sao_builder_item_css( sao_slider_font_size($option,'text_desktop_font_size'),'.sao-responsive-custom.sao-slider-desktop.sao-post-'.$post_id.' .sao-element-'.$key.' .sao_text_block' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'text_tablet_font_size'),'.sao-responsive-custom.sao-slider-tablet.sao-post-'.$post_id.' .sao-element-'.$key.'  .sao_text_block' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'text_phablet_font_size'),'.sao-responsive-custom.sao-slider-phablet.sao-post-'.$post_id.' .sao-element-'.$key.' .sao_text_block' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'text_phone_font_size'),'.sao-responsive-custom.sao-slider-phone.sao-post-'.$post_id.' .sao-element-'.$key.' .sao_text_block' );
		 	
	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}


?>