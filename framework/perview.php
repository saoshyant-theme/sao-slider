<?php
 
 
function sao_slider_data($option=false,$id=false,$def = false){
   	$option_id = !empty( $option[$id] ) ? $option[$id] : $def;
     $ajax_sao_evalue_id = isset($_REQUEST[$id]) ? $_REQUEST[$id] : $option_id; 
	return $ajax_sao_evalue_id;
	
} 
  
function sao_slide_perview_ajax($sao_show=false){
  	
	
	global $post;
	$post_id = $post->ID;

 
	echo '<div class="sao-slider-item sao-responsive-custom sao-slider-main sao-post-'.$post_id.'">';
  	sao_slider_background($post_id);
 	echo '<a class="sao-slider-background-color"  >';
 	echo '</a>';
 	echo '<div class="sao-slider-details sao-auto-width-item">';
	sao_slide_perview_details($post_id);
	echo '</div>';	
		  
 	echo '</div>';	
 
	
		
	
	if(!empty($_REQUEST['element'])){
 		die();
	}
}
add_action('wp_ajax_nopriv_sao_slide_perview_ajax', 'sao_slide_perview_ajax');
add_action('wp_ajax_sao_slide_perview_ajax', 'sao_slide_perview_ajax');



add_action('wp_ajax_nopriv_sao_slide_perview_details', 'sao_slide_perview_details');
add_action('wp_ajax_sao_slide_perview_details', 'sao_slide_perview_details');
function sao_slide_perview_details($post_id =false){
	
	if(!empty($_REQUEST['element'])){
 		$element_json = stripslashes($_REQUEST['element']);
 		$p_id = $_REQUEST['post_id'];
	}else{
 		$element_json = get_post_meta($post_id, 'sao_element', true);
		$p_id = $post_id;

	}
   	$element = sao_options_array_row($element_json);	
 
	$responsive = sao_slider_data('','responsive','main');
	
 	if(!empty($element)):
	foreach($element as $element_key=> $element_value):  
 			$element_option = sao_options_decode(urldecode($element_value['option']));
					$element_top = !empty($element_value['top'] )? $element_value['top']:'';
					$element_left = !empty($element_value['left'] )? $element_value['left']:'';		
					$element_width = !empty($element_value['width'] )? $element_value['width']:'';
					$element_width_unit = !empty($element_value['width_unit'] )? $element_value['width_unit']:'percentage';
					$element_height = !empty($element_value['height'] )? $element_value['height']:'';							
					$element_height_unit = !empty($element_value['height_unit'] )? $element_value['height_unit']:'px';
					$object = !empty($element_value['object'] )? $element_value['object']:'';				
								
				if($responsive == 'desktop'){
					$element_top = !empty($element_value['desktop_top'] )? $element_value['desktop_top']:$element_top;
					$element_left = !empty($element_value['desktop_left'] )? $element_value['desktop_left']:$element_left;		
					$element_width = !empty($element_value['desktop_width'] )? $element_value['desktop_width']:$element_width ;
					$element_width_unit = !empty($element_value['desktop_width_unit'] )? $element_value['desktop_width_unit']:$element_width_unit ;
					$element_height = !empty($element_value['desktop_height'] )? $element_value['desktop_height']:$element_height;							
					$element_height_unit = !empty($element_value['desktop_height_unit'] )? $element_value['desktop_height_unit']:$element_height_unit;
					$object = !empty($element_value['desktop_object'] )? $element_value['desktop_object']:$object;				
				}elseif($responsive == 'tablet'){
					$element_top = !empty($element_value['tablet_top'] )? $element_value['tablet_top']:$element_top;
					$element_left = !empty($element_value['tablet_left'] )? $element_value['tablet_left']:$element_left; 		
					$element_width = !empty($element_value['tablet_width'] )? $element_value['tablet_width']:$element_width ;
					$element_width_unit = !empty($element_value['tablet_width_unit'] )? $element_value['tablet_width_unit']:$element_width_unit ;
					$element_height = !empty($element_value['tablet_height'] )? $element_value['tablet_height']:$element_height;						
					$element_height_unit = !empty($element_value['tablet_height_unit'] )? $element_value['tablet_height_unit']:$element_height_unit;
					$object = !empty($element_value['tablet_object'] )? $element_value['tablet_object']:$object;				
					
					
				}elseif($responsive == 'phablet'){
					$element_top = !empty($element_value['phablet_top'] )? $element_value['phablet_top']:$element_top;
					$element_left = !empty($element_value['phablet_left'] )? $element_value['phablet_left']:$element_left;	
					$element_width = !empty($element_value['phablet_width'] )? $element_value['phablet_width']:$element_width ;
					$element_width_unit = !empty($element_value['phablet_width_unit'] )? $element_value['phablet_width_unit']:$element_width_unit ;
					$element_height = !empty($element_value['phablet_height'] )? $element_value['phablet_height']:$element_height;								
					$element_height_unit = !empty($element_value['phablet_height_unit'] )? $element_value['phablet_height_unit']:$element_height_unit;
					$object = !empty($element_value['phablet_object'] )? $element_value['phablet_object']:$object;				
								
				}elseif($responsive == 'phone'){
					$element_top = !empty($element_value['phone_top'] )? $element_value['phone_top']:$element_top;
					$element_left = !empty($element_value['phone_left'] )? $element_value['phone_left']:$element_left;	
					$element_width = !empty($element_value['phone_width'] )? $element_value['phone_width']:$element_width ;
					$element_width_unit = !empty($element_value['phone_width_unit'] )? $element_value['phone_width_unit']:$element_width_unit ;
					$element_height = !empty($element_value['phone_height'] )? $element_value['phone_height']:$element_height;								
					$element_height_unit = !empty($element_value['phone_height_unit'] )? $element_value['phone_height_unit']:$element_height_unit;
					$object = !empty($element_value['phone_object'] )? $element_value['phone_object']:$object;				
				}else{
					$element_top = !empty($element_value['top'] )? $element_value['top']:'';
					$element_left = !empty($element_value['left'] )? $element_value['left']:'';	
					$element_width = !empty($element_value['width'] )? $element_value['width']:'' ;
					$element_width_unit = !empty($element_value['width_unit'] )? $element_value['width_unit']:'';
					$element_height = !empty($element_value['height'] )? $element_value['height']:'';							
					$element_height_unit = !empty($element_value['height_unit'] )? $element_value['height_unit']:'';
					$object = !empty($element_value['object'] )? $element_value['object']:'';				
								
			}
 			
  			if($element_width_unit == 'percentage'){
		 		$width= 'width:'.$element_width.'%;';
			}elseif( $element_width_unit == 'auto'){
		 		$width= 'width:auto;';
			}else {
		 		$width= 'width:'.$element_width.'px;';
			} 
 			
			if($element_height_unit == 'percentage'){
		 		$height= 'height:'.$element_height.'%;';
			}elseif( $element_height_unit == 'auto'){
		 		$height= 'height:auto;';
			}else {
		 		$height= 'height:'.$element_height.'px;';
				
			} 
   
			echo '<li  id="draggable" class="ui-widget-content  sao-element-draggable    sao-element-'.esc_attr($element_key).' sao-element-item sao_element_'.esc_attr($element_value['value']).' sao-auto-width " data-id="'.esc_attr($element_key).'" style="left: '.$element_left.'px;  top:'.$element_top.'px; '.$width.' '.$height.'  "   
			 data-display="'.$object.'" >';
				$args['key'] = $element_key;
				$args['post_id'] = $p_id ;
				$args['option'] = $element_option;
				if(has_filter('sao_slider_'.$element_value['value'])) {
					$filter =apply_filters('sao_slider_'.$element_value['value'], $args);
					echo !empty($filter['output'])?$filter['output']:'';
 					echo !empty($filter['css'])?'<style>'.$filter['css'].'</style>':'';
  	
 			echo '</li>';
			} 
		
		
		
		
	endforeach;			
	endif;	  
if(!empty($_REQUEST['element'])){
 		die();
	}
}


function sao_slider_effect( $element_option =false ) {

			$effect = !empty($element_option['effect'] )? $element_option['effect']:'';
			$initial = !empty($element_option['initial'] )? $element_option['initial']:'top';
			$start = !empty($element_option['time_start'] )? $element_option['time_start']:'0';
			$end = !empty($element_option['time_end'] )? $element_option['time_end']:'500';
			$scale = !empty($element_option['scale'] )? $element_option['scale']:'2';
			return '<div class="sao-slider-effect" data-effect="'.$effect.'" data-initial="'.$initial.'" 
			data-start="'.$start.'"  data-end="'.$end.'"  data-scale="'.$scale.'" ></div>';
			 

}

 



function sao_slider_resposive($class=false,$classname=false,$width,$width_unit,$height,$height_unit) {
	
 		if($class == 'main'){
			$active= 'sao-slider-responsive-size-active';
		}else{
			$active ='';
		}
		echo '<div id="sao-slider-responsive-'.$class.'"  class="sao-slider-responsive-size '.$active.'">';      
			echo '<label>'.esc_html__('Width','sao').'</label>';
			echo '<input class="sao-slider-perview-width"  type="text"  name="sao_show_'.$classname.'width"  value="'.esc_attr($width).'">';
			
			
			echo '<select class="sao-slider-perview-width-unit"  name="sao_show_'.$classname.'width_unit">';
			  foreach(sao_array_options('unit') as $key => $name){
              	echo '<option value="'.$key.'" '.selected( $width_unit ,  $key).' >'.esc_html($name).'</option>';
			  }
			echo '</select>';
			echo '<label>'.esc_html__('Height','sao').'</label>';

			echo '<input   type="text" class="sao-slider-perview-height"  name="sao_show_'.$classname.'height"  value="'.esc_attr($height).'">';
			
			
			echo '<select class="sao-slider-perview-height-unit"  name="sao_show_'.$classname.'height_unit">';
			  foreach(sao_array_options('unit') as $key => $name){
              	echo '<option value="'.$key.'" '.selected( $height_unit ,  $key).' >'.esc_html($name).'</option>';
			  }
			echo '</select>';
			echo '</div>';
			
	 }		


function sao_slider_background($post_id) {
	
 	$background_image = get_post_meta($post_id, 'sao_background_image', true);
 	$background_image_src = !empty($background_image['src'])?  $background_image['src']:'';
	$background_image_width = !empty($background_image['width'])?  $background_image['width']:'';
	$background_image_height = !empty($background_image['height'])?  $background_image['height']:'';
	
 	
		?>
        <div class="sao-thumb" >
            <a class="sao-post-thumbnail" >
            <?php if(!empty($background_image_src)){?>
             <img src="<?php echo esc_url($background_image_src);?>" width="<?php echo esc_attr($background_image_width);?>" height="<?php echo esc_attr($background_image_height);?>">
             <?php }?>
            </a>
			 
        </div>
	<?php 	
	 
 }
 
 
add_action('save_post', 'sao_slider_perview_save'); 
function sao_slider_perview_save($post_id) {
 
    if (!current_user_can('edit_post', $post_id)) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
 
}
