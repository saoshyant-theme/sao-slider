<?php
add_action('wp_ajax_nopriv_sao_slider_element', 'sao_slider_element');
add_action('wp_ajax_sao_slider_element', 'sao_slider_element');
function sao_slider_element($element_key=false,$element_value=false){
 
	if(!empty($_REQUEST['value'])){
		$value = array();
		$value['value'] = $_REQUEST['value'];
		$value['childern'] = $_REQUEST['childern'];
		 
  	}else{
	  $value= $element_value;
	}
 
	$key = !empty($_REQUEST['key']) ? $_REQUEST['key']: $element_key;
	 
	$collapse = !empty($value['collapse']) ? $value['collapse']: 'show';
	
	
	if(!empty($_REQUEST['default'])) {
		
		global $sao_slider_options_element;
		$value_default = array();
		
		foreach ($sao_slider_options_element as  $element) :
			if( $element['id'] == $_REQUEST['value']) {
				$default_width =!empty($element['width'])? $element['width'] :'';
				$default_width_unit =!empty($element['width_unit'])? $element['width_unit'] :'percentage';
				$default_height =!empty($element['height'])? $element['height'] :'';
				$default_height_unit =!empty($element['height_unit'])? $element['height_unit'] :'pexel';

				if(!empty($element['options'])) :
				foreach ($element['options'] as $option ):
				
					if(!empty($option['default']) && !empty($option['id'])){
						$value_default[$option['id']] = $option['default'];
					}
					
				endforeach;
				endif;
			}
				
		endforeach;

		$value_option =!empty($value_default)? sao_options_encode($value_default) :'';
		
  	}else{
 		$value_option = $value['option'];
		$default_width_unit ='percentage';
		$default_height_unit = 'pexel';	
		
		$default_width ='';
		$default_height = '';
	}
	
 	$template_id = !empty($_REQUEST['template_id']) ? 'sao_new_elemnet':'';



 	$top = !empty($value['top']) ? $value['top'] :'';
  	$left = !empty($value['left']) ? $value['left']:'';
 	$width = !empty($value['width']) ? $value['width'] :$default_width;
 	$width_unit = !empty($value['width_unit']) ? $value['width_unit'] :$default_width_unit;
 	$height = !empty($value['height']) ? $value['height'] :$default_width;
 	$height_unit = !empty($value['height_unit']) ? $value['height_unit'] :$default_height_unit;
   	$object = !empty($value['object']) ? $value['object']:'show';
	
	
 	$desktop_top = !empty($value['desktop_top']) ? $value['desktop_top'] :'';
  	$desktop_left = !empty($value['desktop_left']) ? $value['desktop_left']:'';
 	$desktop_width = !empty($value['desktop_width']) ? $value['desktop_width'] :'';
 	$desktop_width_unit = !empty($value['desktop_width_unit']) ? $value['desktop_width_unit'] :'';
 	$desktop_height = !empty($value['desktop_height']) ? $value['desktop_height'] :'';
 	$desktop_height_unit = !empty($value['desktop_height_unit']) ? $value['desktop_height_unit'] :'';
   	$desktop_object = !empty($value['desktop_object']) ? $value['desktop_object']:'';
	
	
 	$tablet_top = !empty($value['tablet_top']) ? $value['tablet_top'] :'';
  	$tablet_left = !empty($value['tablet_left']) ? $value['tablet_left']:'';
 	$tablet_width = !empty($value['tablet_width']) ? $value['tablet_width'] :'';
 	$tablet_width_unit = !empty($value['tablet_width_unit']) ? $value['tablet_width_unit'] :'';
 	$tablet_height = !empty($value['tablet_height']) ? $value['tablet_height'] :'';
 	$tablet_height_unit = !empty($value['tablet_height_unit']) ? $value['tablet_height_unit'] :'';
   	$tablet_object = !empty($value['tablet_object']) ? $value['tablet_object']:'';
	
	
 	$phablet_top = !empty($value['phablet_top']) ? $value['phablet_top'] :'';
  	$phablet_left = !empty($value['phablet_left']) ? $value['phablet_left']:'';
 	$phablet_width = !empty($value['phablet_width']) ? $value['phablet_width'] :'';
 	$phablet_width_unit = !empty($value['phablet_width_unit']) ? $value['phablet_width_unit'] :'';
 	$phablet_height = !empty($value['phablet_height']) ? $value['phablet_height'] :'';
 	$phablet_height_unit = !empty($value['phablet_height_unit']) ? $value['phablet_height_unit'] :'';
   	$phablet_object = !empty($value['phablet_object']) ? $value['phablet_object']:'';

 	$phone_top = !empty($value['phone_top']) ? $value['phone_top'] :'';
  	$phone_left = !empty($value['phone_left']) ? $value['phone_left']:'';
 	$phone_width = !empty($value['phone_width']) ? $value['phone_width'] :'';
 	$phone_width_unit = !empty($value['phone_width_unit']) ? $value['phone_width_unit'] :'';
 	$phone_height = !empty($value['phone_height']) ? $value['phone_height'] :'';
 	$phone_height_unit = !empty($value['phone_height_unit']) ? $value['phone_height_unit'] :'';
   	$phone_object = !empty($value['phone_object']) ? $value['phone_object']:'';
	
	
 	$template_id = !empty($_REQUEST['template_id']) ? 'sao_new_element':'show';
	
	echo '<li id="sao_element_'.esc_attr($key).'" class="sao_element_item sao_slider_element_item  '.$template_id.' sao_element_'.esc_attr($value['value']).' sao_row_item" data-key="'.esc_attr($key).'"  data-value="'.esc_attr($value['value']).'"   data-option="'.esc_attr($value_option).'" 
	data-top="'.esc_attr($top).'"
	data-left="'.esc_attr($left).'"
	data-width="'.esc_attr($width).'"
	data-width_unit="'.esc_attr($width_unit).'"
	data-height="'.esc_attr($height).'"
	data-height_unit="'.esc_attr($height_unit).'"
	data-object="'.esc_attr($object).'"
	
	
	data-desktop_top="'.esc_attr($desktop_top).'"
	data-desktop_left="'.esc_attr($desktop_top).'"
	data-desktop_width="'.esc_attr($desktop_width).'"
	data-desktop_width_unit="'.esc_attr($desktop_width_unit).'"
	data-desktop_height="'.esc_attr($desktop_height).'"
	data-desktop_height_unit="'.esc_attr($desktop_height_unit).'"
	data-desktop_object="'.esc_attr($desktop_object).'"
	
	data-tablet_top="'.esc_attr($tablet_top).'"
	data-tablet_left="'.esc_attr($tablet_top).'"
	data-tablet_width="'.esc_attr($tablet_width).'"
	data-tablet_width_unit="'.esc_attr($tablet_width_unit).'"
	data-tablet_height="'.esc_attr($tablet_height).'"
	data-tablet_height_unit="'.esc_attr($tablet_height_unit).'"
	data-tablet_object="'.esc_attr($tablet_object).'"
	
	
	data-phablet_top="'.esc_attr($phablet_top).'"
	data-phablet_left="'.esc_attr($phablet_top).'"
	data-phablet_width="'.esc_attr($phablet_width).'"
	data-phablet_width_unit="'.esc_attr($phablet_width_unit).'"
	data-phablet_height="'.esc_attr($phablet_height).'"
	data-phablet_height_unit="'.esc_attr($phablet_height_unit).'"
	data-phablet_object="'.esc_attr($phablet_object).'"
	


	data-phone_top="'.esc_attr($phone_top).'"
	data-phone_left="'.esc_attr($phone_top).'"
	data-phone_width="'.esc_attr($phone_width).'"
	data-phone_width_unit="'.esc_attr($phone_width_unit).'"
	data-phone_height="'.esc_attr($phone_height).'"
	data-phone_height_unit="'.esc_attr($phone_height_unit).'"
	data-phone_object="'.esc_attr($phone_object).'"
	
 	
	>';
  		 sao_slider_element_value($key,$value); 
 
	echo '</li>';
  if(!empty($_REQUEST['value'])){
	  die(0);
  }
	  
 } 
function sao_slider_element_value( $key,$value){
 
	global $sao_slider_options_element;
 
	echo '<div class="sao_row_title sao_element_title">';
		echo '<span class="sao_element_name sao_row_name">';
		 
			if(!empty($sao_slider_options_element)):
			foreach ($sao_slider_options_element as  $options):
				if($options['id'] == $value['value']){
					 if(!empty($options['name'])) echo esc_html($options['name']);
 				} 	
			endforeach;			
			endif;
         
        echo '</span>';
         echo '<a class="sao_row_remove sao_slider_element_remove"></a>';
        echo '<a class="sao_row_options sao_element_options"></a>';
		echo '<a class="sao_row_duplicate sao_slider_element_duplicate"></a>';
		echo '<a class="sao_row_template_save sao_template_save" data-row="slider_element" data-name="'.esc_attr__('Slider Element','sao').'"></a>';

 	echo '</div>';	
	
}

add_action('wp_ajax_nopriv_sao_slider_element_list', 'sao_slider_element_list');
add_action('wp_ajax_sao_slider_element_list', 'sao_slider_element_list');
function sao_slider_element_list() {
	$template =	get_option( 'sao_'.$_REQUEST['row_id'].'_template');
	$element = sao_options_array_row(urldecode($template[$_REQUEST['template_id']]['element']));
  	if (!empty($element)) :
	foreach($element as $element_key => $element_value) : 
		sao_slider_element($element_key,$element_value);
	endforeach;
	endif;
 
	die(0);
} 
function sao_slider_element_tabs(){
	global $sao_slider_options_element;
	$tab= array();
	foreach ($sao_slider_options_element as  $element) :
 		if( $element['id']== $_REQUEST['value']) {
			if($element['options']):
			
			foreach ($element['options'] as $option ) :
				if(!empty($option['group'])){
					$dass = sanitize_title($option['group']);
					if(!array_key_exists($dass,$tab)){
						$tab[sanitize_title($option['group'])] = $option['group'];
					}
				}else{ 	
					$general = esc_html__('General','sao');
					$tab[sanitize_title($general)] = $general;
				}
		
			endforeach;
			endif;
						
			
		}
		
	endforeach;
	return  $tab;
	
}

add_action('wp_ajax_sao_slider_element_options', 'sao_slider_element_options');
add_action('wp_ajax_nopriv_sao_slider_element_options', 'sao_slider_element_options');
function sao_slider_element_options(){
	
	$value_id = !empty($_REQUEST['option'])?sao_options_decode(urldecode($_REQUEST['option'])):'';
 	global $sao_slider_options_element;
 	
	echo '<form id="sao_options_'.esc_attr($_REQUEST['key']).'" class="sao_options sao_options_element sao_slider_options_element  sao_active " data-key="'.esc_attr($_REQUEST['key']).'" data-value="'.esc_attr($_REQUEST['value']).'">';
	echo '<div class="sao_options_middle">';
		//Title
		echo '<div class="sao_options_title"><h3>'.esc_html__('Options','sao').'</h3><i class="sao_options_close"></i>';
			
			foreach ($sao_slider_options_element as  $element):
				if( $element['id']== $_REQUEST['value']):
					echo '<div class="sao_title_tabs">';
						$array_tab = sao_slider_element_tabs();
						$count_tab=0;
						
						foreach ($array_tab as  $key=> $tabs) :
							$count_tab++;
							if($count_tab==1){
								$tab_active = 'sao_layout_active';
							}else{
								$tab_active = '';
							}
							echo'<a class="sao_tab_'.esc_attr($key).' '.esc_attr($tab_active).'" data-id="'.esc_attr($key).'">'.esc_html($tabs).'</a>';
								
						endforeach;

					echo '</div>';
 				endif;
  			endforeach;
                                     
		echo '</div>';
		//Content
		echo '<ul class="sao_options_content">';
		echo '<div class="sao_options_container">';
							 
			foreach ($sao_slider_options_element as  $element):
				if( $element['id']== $_REQUEST['value']) {
					$array_tab = sao_slider_element_tabs();
					$count_container=0;
					
					foreach ($array_tab as  $key=> $tabs):
						$count_container++;
						if($count_container==1){
							$group_active = 'sao_layout_group_active';
						}else{
							$group_active = '';
						}
						
						echo '<section class="sao_options_warp '.esc_attr($group_active).' " data-tab="'.esc_attr($key).'">';
						
							if(!empty($element['options'])):
							foreach ($element['options'] as $option ) :
																	  
								$general = !empty($option['group']) ? sanitize_title($option['group']):sanitize_title(esc_html__('General','sao'));
		
								if($key == $general ){
									if(!empty($option['name']) && !empty($option['id'])  && !empty($option['type'])){
										$data_options = !empty( $option['options'] ) ?  $option['options']  : null;
										$desc = !empty( $option['desc'] ) ?  $option['desc']  : null;
										$placeholder = !empty( $option['placeholder'] ) ?  $option['placeholder']  : null;
										$fold = !empty( $option['fold'] ) ?  $option['fold']  : null;
										sao_options_function($value_id[$option['id']], $option['name'],$option['id'],$option['type'],$data_options,$desc,$placeholder,$fold );
									}
								}
	 
							endforeach;
							endif;
							
						echo '</section>';

					endforeach;
 				}
			endforeach;

		echo '</div>';
		echo '</ul>';
		
		//Bottom
        echo '<div class="sao_options_bottom">';
			echo '<div class="sao_options_cancel button">'.esc_html__('Cancel','sao').'</div>';
			echo '<div class="sao_options_update button-primary">'. esc_html__('Update','sao').'</div>';
		echo '</div>';
		
				 
	echo '</div>';
	echo '</form>';

	die(0);
}

  
function sao_slider_model_element_tabs(){
 	global $sao_slider_options_element;
	$tab= array();
	
	foreach ($sao_slider_options_element as  $element):
		if(!empty($element['group'])){
			$dass = sanitize_title($element['group']);
			if(!array_key_exists($dass,$tab)){
				$tab[sanitize_title($element['group'])] = $element['group'];
			}
		}else{ 	
			$general = esc_html__('General','sao');
			$tab[sanitize_title($general)] = $general;
		}
	endforeach;
 	return  $tab;
	
}

function sao_slider_model_element() {
	global $sao_slider_options_element; 
	$count=0;
	
    echo '<div class="sao_model sao_model_element">';
	echo '<div class="sao_model_middle">';
		
		// Title
		echo '<div class="sao_model_title"><h3>'. esc_html__('Add Element','sao').'</h3><i class="sao_model_close"></i>';
                
			echo'<div class="sao_title_tabs">';
				$array_tab = sao_slider_model_element_tabs();
				$count_tab=0;
				foreach ($array_tab as  $key=> $tabs):
						$count_tab++;
						if($count_tab==1){
							$tab_active = 'sao_layout_active';
						}else{
							$tab_active = '';
						}
						echo'<a class="sao_tab_'.esc_attr($key).' '.esc_attr($tab_active).'" data-id="'.esc_attr($key).'">'.esc_html($tabs).'</a>';
				endforeach;								
			echo'</div>';
				
		echo '</div>';
		//Content         
 		echo '<ul class="sao_model_content">';
			
			$array_tab = sao_slider_model_element_tabs();
			$count_container=0;
			foreach ($array_tab as  $key=> $tabs) :
				$count_container++;
				if($count_container==1){
					$group_active = 'sao_layout_group_active';
				}else{
					$group_active = '';
				}
				
 			
				echo '<section class="sao_options_warp '.esc_attr($group_active).' " data-tab="'.esc_attr($key).'">';
					foreach ($sao_slider_options_element as  $value): 
																						  
						$general = !empty($value['group']) ? sanitize_title($value['group']):sanitize_title(esc_html__('General','sao'));
						if($key == $general ){
							echo '<li class="sao_model_item" data-element="'.esc_attr($value['id']).'" >';
							echo '<img src="'.esc_url($value['img']).'" />';
										
								if(!empty($value['name'])){ 
									echo '<span>'.esc_html($value['name']).'</span>';
								}
										
							echo '</li>';
							echo '<div class="sao-row-1-8"></div>';
		
						}
							
					endforeach;
				echo '</section>';
				
			endforeach;
      
		echo '</ul>';
		//Bottom
		echo '<div class="sao_model_bottom">';
			echo '<div class="sao_model_add button-primary">'.esc_html__('Add','sao').'</div>';
		echo '</div>';
		
		
	echo '</div>';	
	echo '</div>';
  	
}

add_action('wp_ajax_sao_slider_element_perview', 'sao_slider_element_perview');
add_action('wp_ajax_nopriv_sao_slider_element_perview', 'sao_slider_element_perview');
function sao_slider_element_perview($val =false,$opt =false,$key =false){
	 
	if(!empty($_REQUEST['default'])){
		$value = $val;
  		$option = $opt;
  		$key = $_REQUEST['key'];
 		$p_id = $_REQUEST['post_id'];
		
	}elseif(!empty($_REQUEST['value'])){
  		$value = $_REQUEST['value'];
   		$option = sao_options_decode( urldecode(sao_options_encode($_REQUEST['option'])));
  		$key = $_REQUEST['key'];
 		$p_id = $_REQUEST['post_id'];
		
	}else{
  		$value = $val;
  		$option = $opt;
		global $post;
		$p_id = $post->ID;
		$key = '';
  		 
	}	 
 	$args['post_id'] = $p_id;
 	$args['key'] = $key;
	$args['option'] = $option;
	
	if(has_filter('sao_slider_'.$value)) {
		$filter =apply_filters('sao_slider_'.$value, $args) ;	
 		
		if(!empty($_REQUEST['default'])){
		echo '<li  id="draggable" class="ui-widget-content  sao-element-draggable  sao-element-'.esc_attr($key).' sao-element-item sao_element_'.esc_attr($element_value['value']).' sao-auto-width " data-id="'.esc_attr($key).'">'; 
		}
		echo $filter['output'];
		echo '<div class="ui-resizable-handle ui-resizable-e"  ></div><div class="ui-resizable-handle ui-resizable-s" ></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" ></div></li>';
		echo '<style>';		
		echo $filter['css']; 					  						
		echo '</style>';
		if(!empty($_REQUEST['default'])){
		echo '</li>'; 
		}
 		 					  						
	}
	if(!empty($_REQUEST['value'])){
		die(0);
	}
}
  
 
add_action('wp_ajax_nopriv_sao_slider_element_detailst', 'sao_slider_element_details');
add_action('wp_ajax_sao_slider_element_details', 'sao_slider_element_details');
function sao_slider_element_details($element_key=false,$element_value=false){
 
	if(!empty($_REQUEST['value'])){
		$value = array();
		$value['value'] = $_REQUEST['value'];
		$value['childern'] = $_REQUEST['childern'];
		 
  	}else{
	  $value= $element_value;
	}
 
	$key = !empty($_REQUEST['key']) ? $_REQUEST['key']: $element_key;
	 
	$collapse = !empty($value['collapse']) ? $value['collapse']: 'show';
	
	
	if(!empty($_REQUEST['default'])) {
		
		global $sao_slider_options_element;
		$value_default = array();
		
		foreach ($sao_slider_options_element as  $element) :
			if( $element['id'] == $_REQUEST['value']) {
				
				if(!empty($element['options'])) :
				foreach ($element['options'] as $option ):
				
					if(!empty($option['default']) && !empty($option['id'])){
						$value_default[$option['id']] = $option['default'];
					}
					
				endforeach;
				endif;
			}
				
		endforeach;

		$value_option =!empty($value_default)? sao_options_encode($value_default) :'';
		
  	}else{
 		$value_option = $value['option'];
	}
	
 	$template_id = !empty($_REQUEST['template_id']) ? 'sao_new_elemnet':'';

 
	echo sao_slider_element_perview($value['value'],sao_options_decode(urldecode($value_option)));
 
 }  
 