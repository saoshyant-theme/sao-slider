<?php

add_filter('sao_slider_element_options', 'sao_slider_text_options');
function sao_slider_text_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Text','sao'),
 		'id'			=> 'slider_text',
 		'width_unit'	=> 'pexel',
 		'height_unit'	=> 'pexel',
 		'id'			=> 'slider_text',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/text.jpg'
  	); 
   
	
 
	$option[]= array( 
		"name"			=> esc_html('Text','sao'),
 		"default"		=> 'Lorem ipsum dolor sit amet',
 		"id"			=> "text",
 		"type"			=> "textarea",
 		  
	); 
 
  
	$option[]=array(
  				"name"		=>  esc_html('Icon','sao'),
  				"id"		=> "icon",
 				"type"		=> "icon",
	);	
			
	
	$option[]= array( 
		"name"			=> esc_html('Link','sao'),
 		"id"			=> "link",
   		"type"			=> "text",
 		  
	); 
 
	$option[] = array(
  				"name"		=>  esc_html('Open in new window','sao'),
  				"id"		=> "widows",
 				"type"		=> "checkbox",
				
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
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  array( 
			"top"			=> '0',
			"left"			=> '0',
			"bottom"		=> '0',
			"right"			=> '0',
 			), 
		
		"type"			=> "multi_options",
 		"options"		=>  sao_multi_array_options('margin'),						
 	); 
	
	
	
	
	
	$option[]= array(
  				"name"		=>  esc_html('Text Color','sao'),
  				"id"		=> "text_color",
				"default"		=>  array( 
					"main"			=> '#ffffff',
 				),
 				"group"			=>  esc_html('Design','sao'),
				"type"		=> "multi_options",
 				"options"		=>	array(
					array(
						"name"		=>  esc_html('Main Text Color','sao'),
						"id"		=> "main",
						"type"		=> "color_rgba",
  					),array(
						"name"		=>  esc_html('Icon Color','sao'),
						"id"		=> "icon",
						"type"		=> "color_rgba",
  					),	
				
 				),
	);
	

	$option[]= array(
		"name"		=>  esc_html('Hover Text Color','sao'),
		"id"		=> "text_color_hover",
		"group"			=>  esc_html('Design','sao'),
		"type"		=> "multi_options",
		"options"		=>	array(
			array(
				"name"		=>  esc_html('Main Text Color','sao'),
				"id"		=> "main",
				"type"		=> "color_rgba",
			),array(
				"name"		=>  esc_html('Icon Color','sao'),
				"id"		=> "icon",
				"type"		=> "color_rgba",
			),	
				
		),
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
		"name"			=> esc_html('Background Color Hover','sao'),
 		"id"			=> "background_color_hover",
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
		"name"			=> esc_html('Icon Size','sao'),
 		"id"			=> "icon_size",
		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select", 	 	
		"options"		=>   
  			array( 
 				"1.0em"		=> '1.0em', 
 				"1.1em"		=> '1.1em',
 				"1.3em"		=> '1.2em',
 				"1.3em"		=> '1.3em',
 				"1.4em"		=> '1.4em',
 				"1.5em"		=> '1.5em',
				"1.6em"		=> '1.6em',
 				"1.7em"		=> '1.7em',
 				"1.8em"		=> '1.8em',
 				"1.9em"		=> '1.9em',
 				"2.0em"		=> '2.0em',
				
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
		"name"			=> esc_html('Text Font Decoration','sao'),
 		"id"			=> "text_font_decoration",
		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select", 	 	
		"options"		=>   
  			array( 
 				""					=> esc_html('None','sao'),
 				"overline"			=> 	esc_html('Overline','sao'),
 				"line-through"		=> esc_html('Line-Through','sao'),
  				"underline"			=> esc_html('Underline','sao'),
  			),		
 		
  	);   
	
	$option[]= array( 
		"name"			=> esc_html('Text Font Style','sao'),
 		"id"			=> "text_font_style",
		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select", 	 	
		"options"		=>   
  			array( 
 				""					=> esc_html('None','sao'),
 				"normal"			=> 	esc_html('Normal','sao'),
 				"italic"			=> esc_html('italic','sao'),
  				"oblique"			=> esc_html('oblique','sao'),
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




add_filter('sao_slider_slider_text', 'sao_slider_text_config');
function sao_slider_text_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css =''; 
 	
	//text Css
	 
 	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
 	$target = !empty($option['window']) ? 'target="_blank"' : '';
         
	$has_link=!empty($option['link']) ? 'sao-has-link ' :'sao-not-link sao-slider-padding';
	
	
	$output.='<div class="sao-slider-text '.esc_attr($alignment).' '.esc_attr($has_link).' " '.$target.' >';
	
		if(!empty($option['text'])){
 
		if(!empty($option['link'])){
		$output.='<a class=" sao-slider-padding" href="'.esc_url($option['link']).'">';
		} 
		if(!empty($option['icon'])) {
			$output.= '<i class="'.esc_attr($option['icon']).'"  ></i>'; 
		}
		$output.= $option['text']; 
		
		if(!empty($option['link'])){ 
		$output.='</a>';
		}
 		} 
		
		
	$output.='</div>';
	$output.=sao_slider_effect($option);
	 
	 
  	$item='.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text';
 	//Font Css
	$font_css='';
  	$font_css.= sao_builder_color( $option,'text_color','main');
  	$font_css.= sao_builder_font_size( $option,'text_font_size' );
  	$font_css.= sao_builder_font_weight( $option,'text_font_weight' );
  	$font_css.= sao_builder_line_height( $option,'text_line_height' );
  	$font_css.= sao_builder_text_decoration( $option,'text_font_decoration' );
  	$font_css.= sao_builder_font_style( $option,'text_font_style' );
  	$font_css.= sao_builder_text_transform( $option,'text_transform' );
 	$font_css.=sao_slider_text_shadow( $option,'text_shadow');
	
	
	if(!empty($option['text_font_family'])){
		$output.='<link rel="stylesheet" id="'.esc_attr($option['text_font_family']).'-css" href="'.sao_slider_font_url($option['text_font_family']).'" type="text/css" media="all" />';  
		$font_css.=  'font-family:'.$option['text_font_family'].' !important;'; 
	}; 
	$css.= sao_builder_item_css( $font_css,$item.','.$item.' a' );
	
	
	$box_css='';
	$box_css.= sao_builder_background_color( $option,'background_color' );
	$box_css.=sao_builder_border( $option,'border');
	$box_css.=	sao_builder_shadow( $option,'shadow');
	$box_css.=sao_builder_radius($option,'radius');
	$css.= sao_builder_item_css( $box_css,$item );
 	
	$icon_css='';
   	$icon_css.= sao_builder_color( $option,'text_color','icon');
   	$icon_css.= sao_builder_icon_size( $option,'icon_size' );
	$css.= sao_builder_item_css( $icon_css,$item.' i' );
  
   	$css.= sao_builder_item_css( sao_builder_color( $option,'text_color_hover','main'), $item.':hover' ); 
   	$css.= sao_builder_item_css( sao_builder_color( $option,'text_color_hover','icon'), $item.':hover i' ); 
   	$css.=sao_builder_item_css(sao_builder_background_color($option,'background_color_hover'),$item.':hover' );


	$css.= sao_builder_item_css( sao_slider_font_size($option,'text_desktop_font_size'),'.sao-responsive-custom.sao-slider-desktop.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text,.sao-responsive-custom.sao-slider-desktop.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text a' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'text_tablet_font_size'),'.sao-responsive-custom.sao-slider-tablet.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text,.sao-responsive-custom.sao-slider-tablet.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text a' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'text_phablet_font_size'),'.sao-responsive-custom.sao-slider-phablet.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text,.sao-responsive-custom.sao-slider-phablet.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text a' );
	$css.= sao_builder_item_css( sao_slider_font_size($option,'text_phone_font_size'),'.sao-responsive-custom.sao-slider-phone.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text, .sao-responsive-custom.sao-slider-phone.sao-post-'.$post_id.' .sao-element-'.$key.' .sao-slider-text a' );
		 
 	$css.=sao_slider_element_padding( $key,$post_id,$option); 
  	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>