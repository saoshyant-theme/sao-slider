<?php 


/*********************************************************************************************
Builder Metabox
*********************************************************************************************/
 
add_action('add_meta_boxes', 'sao_slider_metabox');
function sao_slider_metabox($post_type) {
    $types = array('sao_slide');

    if (in_array($post_type, $types)) {
      add_meta_box(
        'sao_builder_metabox',
        esc_html__('Page Builder','sao'),
        'sao_slider_meta',
        'sao_slide',
        'normal',
        'high'
      );
    }
}
 

function sao_slider_meta($post) {
 	global $post;
	$sao_show_page_builder = get_post_meta($post->ID, 'sao_show_page_builder', true);
 
    $element_json = get_post_meta($post->ID, 'sao_element', true);
  	$element= sao_options_array_row($element_json);
 
	  
	echo '<div class="sao_builder sao_slider_meta">';
		echo '<a class="sao_full_template_full sao_full_screen_page_builder ">'.esc_html__('Full Screen','sao').'</a>';
		echo '<a class="sao_full_template_full_close sao_full_screen_close ">'.esc_html__('Close Full Screen','sao').'</a>';
 		echo '<a class="sao_full_template_save sao_template_save" data-row="full_slider"  data-name="'.esc_html__('Full Slider','sao').'">'.esc_html__('Save Full Template to the library','sao').'</a>';
		echo '<a class="sao_full_template_add sao_template_add"  data-row="full_slider" data-name="'.esc_html__('Full Slider','sao').'">'.esc_html__('Add Full Template From Library','sao').'</a>';

		echo '<ul>';
  			
               sao_slider_builder_section();
			 
   		echo '</ul>';
 
		sao_slider_model_element();
		
		
		
	
	global $post;
	
	$meta = get_post_custom( $post->ID );
 	$responsive_mode = !empty($meta['sao_responsive_mode'][0]) ? $meta['sao_responsive_mode'][0] :'auto';


 	$width = !empty($meta['sao_show_width'][0]) ? $meta['sao_show_width'][0] :'100';
 	$width_unit = !empty($meta['sao_show_width_unit'][0]) ? $meta['sao_show_width_unit'][0] :'%';
 	$height = !empty($meta['sao_show_height'][0]) ? $meta['sao_show_height'][0] :'600';
 	$height_unit = !empty($meta['sao_show_height_unit'][0]) ? $meta['sao_show_height_unit'][0] :'px';
 	
 	$desktop_width =!empty($meta['sao_show_desktop_width'][0]) ? $meta['sao_show_desktop_width'][0] :'992'; 
	$desktop_width_unit = !empty($meta['sao_show_desktop_width_unit'][0]) ? $meta['sao_show_desktop_width_unit'][0] :'px';
	$desktop_height = !empty($meta['sao_show_desktop_height'][0]) ? $meta['sao_show_desktop_height'][0] :'500';
    $desktop_height_unit = !empty($meta['sao_show_desktop_height_unit'][0]) ? $meta['sao_show_desktop_height_unit'][0] :'px';
	
 	$tablet_width =!empty($meta['sao_show_tablet_width'][0]) ? $meta['sao_show_tablet_width'][0] :'767'; 
	$tablet_width_unit = !empty($meta['sao_show_tablet_width_unit'][0]) ? $meta['sao_show_tablet_width_unit'][0] :'px';
	$tablet_height = !empty($meta['sao_show_tablet_height'][0]) ? $meta['sao_show_tablet_height'][0] :'320';
    $tablet_height_unit = !empty($meta['sao_show_tablet_height_unit'][0]) ? $meta['sao_show_tablet_height_unit'][0] :'px';
	
	$phablet_width =!empty($meta['sao_show_phablet_width'][0]) ? $meta['sao_show_phablet_width'][0] :'501'; 
	$phablet_width_unit = !empty($meta['sao_show_phablet_width_unit'][0]) ? $meta['sao_show_phablet_width_unit'][0] :'px';
	$phablet_height = !empty($meta['sao_show_phablet_height'][0]) ? $meta['sao_show_phablet_height'][0] :'300';
    $phablet_height_unit = !empty($meta['sao_show_phablet_height_unit'][0]) ? $meta['sao_show_phablet_height_unit'][0] :'px';
	
 	$phone_width =!empty($meta['sao_show_phone_width'][0]) ? $meta['sao_show_phone_width'][0] :'400'; 
	$phone_width_unit = !empty($meta['sao_show_phone_width_unit'][0]) ? $meta['sao_show_phone_width_unit'][0] :'px';
	$phone_height = !empty($meta['sao_show_phone_height'][0]) ? $meta['sao_show_phone_height'][0] :'250';
    $phone_height_unit = !empty($meta['sao_show_phone_height_unit'][0]) ? $meta['sao_show_phone_height_unit'][0] :'px';
	
		
 	$sao_show['perview_width'] = $width;
 	$sao_show['perview_width_unit'] = $width_unit;
 	$sao_show['perview_height'] = $height;
 	$sao_show['perview_height_unit'] = $height_unit;


 	$object_unit = array('percentage'=> '%' , 'pexel' => 'px', 'auto'=> 'Auto');
	
	
	echo '<div class="sao-slider-perveiw">';
			echo '<div class="sao-slider-perview-title" >';      
			
			 
			echo '<div class="sao-slider-responsive sao-slider-responsive-'.esc_attr($responsive_mode).'" >';      
			echo '<div class="sao-slider-responsive-tab sao-slider-responsive-active" data-id="main" >'.esc_html__('Full Size','sao').'</div>';
			echo '<div class="sao-slider-responsive-tab sao-slider-responsive-custom-item"  data-id="desktop"  >'.esc_html__('Desktop','sao').'</div>';
			echo '<div class="sao-slider-responsive-tab sao-slider-responsive-custom-item"  data-id="tablet"  >'.esc_html__('Tablet','sao').'</div>';
			echo '<div class="sao-slider-responsive-tab sao-slider-responsive-custom-item"  data-id="phablet"  >'.esc_html__('Phablet','sao').'</div>';
			echo '<div class="sao-slider-responsive-tab sao-slider-responsive-custom-item"   data-id="phone" >'.esc_html__('Phone','sao').'</div>';
		 
			echo '</div>';    

			echo '<div class="sao-slider-perview-form" data-id="'.$post->ID.'" >';   
			 
	 			sao_slider_resposive('main','', $width ,$width_unit,$height,$height_unit ); 
	 			sao_slider_resposive('desktop','desktop_', $desktop_width ,$desktop_width_unit,$desktop_height,$desktop_height_unit );
				sao_slider_resposive('tablet','tablet_', $tablet_width ,$tablet_width_unit,$tablet_height,$tablet_height_unit );
				sao_slider_resposive('phablet','phablet_', $phablet_width ,$phablet_width_unit,$phablet_height,$phablet_height_unit );
				sao_slider_resposive('phone','phone_', $phone_width ,$phone_width_unit,$phone_height,$phone_height_unit );
 
						  
		echo '</div>'; 
		
		echo '<div class="sao-slider-play"   >';   
 			echo '<div class="button button-primary sao-slider-play-button " >'.esc_html('Play Animation','sao').'</div>';   

		echo '</div>'; 
		   
 			                
			echo '<div class="sao-slider-position" >';  
			echo '<label>'.esc_html('Element Options:','sao').'</label>';
    
			echo '<label>'.esc_html('Top:','sao').'</label>';
			echo '<input  id="sao_position_top" type="number" value="">';


			echo '<label>'.esc_html('Left:','sao').'</label>';
			echo '<input id="sao_position_left" type="number" value="">';
			
			echo '<label>'.esc_html('Width:','sao').'</label>';
			echo '<input  id="sao_object_width" type="text" value="">';
			echo '<select id="sao_object_width_unit">';
			  foreach($object_unit as $key => $name){
              	echo '<option value="'.$key.'" >'.esc_html($name).'</option>';
			  }
			echo '</select>';


			echo '<label>'.esc_html('Height:','sao').'</label>';
			echo '<input id="sao_object_height" type="text" value="">';
			echo '<select id="sao_object_height_unit">';
			  foreach($object_unit as $key => $name){
              	echo '<option value="'.$key.'" >'.esc_html($name).'</option>';
			  }
			echo '</select>';
			
			
			echo '<label>'.esc_html('Display:','sao').'</label>';
			echo '<select id="sao_object">';
			echo '<option value="">'.esc_html('Default','sao').'</option>';
			echo '<option value="show">'.esc_html('Show','sao').'</option>';
			echo '<option value="hide">'.esc_html('Hide','sao').'</option>';
			echo '</select>';
 		echo '</div>';
		echo '</div>';
         	
            
      
	
		echo '<div class="sao-slider-perveiw-warp">';
		
		sao_slide_perview_ajax($sao_show);

		echo '</div>';
	echo '</div>';		
	
	
 	sao_slide_callback();
		
        
 	echo '</div>';
    
	
 
	$element_json_textarea = !empty( $element_json ) ? $element_json : '';
    echo '<textarea type="hidden" style="width:100%; height:600px;"   name="sao_element" id="sao_slider_element">'.esc_html($element_json).'</textarea>';
	
	$sao_show_page_builder_value = !empty( $sao_show_page_builder ) ? $sao_show_page_builder : '';
    echo '<input type="hidden" style="display:none;"   name="sao_show_page_builder" id="sao_show_page_builder" value="'.$sao_show_page_builder_value.'" >';
     
	ob_start();
	wp_editor( '', 'initialize');
	$editor = ob_get_clean();
	
	
}   
 
add_action('wp_ajax_nopriv_sao_builder_section_list', 'sao_builder_section_list');
add_action('wp_ajax_sao_builder_section_list', 'sao_builder_section_list'); 
function sao_builder_section_list2() {
	$template =	get_option( 'sao_'.$_REQUEST['row_id'].'_template');
  	$section = sao_options_array_row(urldecode($template[$_REQUEST['template_id']]['section']));
  		
		if (!empty($section)) :
           foreach($section as $section_key => $section_value) : 
                 sao_builder_section($section_key,$section_value);
         endforeach;
         endif;
 
	die('');
}
 
add_action('save_post', 'sao_slider_meta_save'); 
function sao_slider_meta_save($post_id) {
 
   	if(!empty($_POST['sao_show_page_builder'])) {
      	update_post_meta($post_id, 'sao_show_page_builder', $_POST['sao_show_page_builder']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_page_builder');
    }
	
  
  	if(!empty($_POST['sao_section'])) {
      	update_post_meta($post_id, 'sao_section', $_POST['sao_section']);
    } else {
     	 delete_post_meta($post_id, 'sao_section');
    }
	
	 
  	if(!empty($_POST['sao_column'])) {
      	update_post_meta($post_id, 'sao_column', $_POST['sao_column']);
    } else {
     	 delete_post_meta($post_id, 'sao_column');
    }	 
 	
  	if(!empty($_POST['sao_element'])) {
      	update_post_meta($post_id, 'sao_element', $_POST['sao_element']);
    } else {
     	 delete_post_meta($post_id, 'sao_element');
    }	 
 
   	if(!empty($_POST['sao_show_width'])) {
      	update_post_meta($post_id, 'sao_show_width', $_POST['sao_show_width']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_width');
    }
	
   	if(!empty($_POST['sao_show_width_unit'])) {
      	update_post_meta($post_id, 'sao_show_width_unit', $_POST['sao_show_width_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_width_unit');
    }
	
	if(!empty($_POST['sao_show_height'])) {
      	update_post_meta($post_id, 'sao_show_height', $_POST['sao_show_height']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_height');
    }	
	
	
   	if(!empty($_POST['sao_show_height_unit'])) {
      	update_post_meta($post_id, 'sao_show_height_unit', $_POST['sao_show_height_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_height_unit');
    }	
	//Desktop
   	if(!empty($_POST['sao_show_desktop_width'])) {
      	update_post_meta($post_id, 'sao_show_desktop_width', $_POST['sao_show_desktop_width']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_desktop_width');
    }
	
   	if(!empty($_POST['sao_show_desktop_width_unit'])) {
      	update_post_meta($post_id, 'sao_show_desktop_width_unit', $_POST['sao_show_desktop_width_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_desktop_width_unit');
    }
	
	if(!empty($_POST['sao_show_desktop_height'])) {
      	update_post_meta($post_id, 'sao_show_desktop_height', $_POST['sao_show_desktop_height']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_desktop_height');
    }	
	
	
   	if(!empty($_POST['sao_show_desktop_height_unit'])) {
      	update_post_meta($post_id, 'sao_show_desktop_height_unit', $_POST['sao_show_desktop_height_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_desktop_height_unit');
    }
	
	
	
	//Tablet
   	if(!empty($_POST['sao_show_tablet_width'])) {
      	update_post_meta($post_id, 'sao_show_tablet_width', $_POST['sao_show_tablet_width']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_tablet_width');
    }
	
   	if(!empty($_POST['sao_show_tablet_width_unit'])) {
      	update_post_meta($post_id, 'sao_show_tablet_width_unit', $_POST['sao_show_tablet_width_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_tablet_width_unit');
    }
	
	if(!empty($_POST['sao_show_tablet_height'])) {
      	update_post_meta($post_id, 'sao_show_tablet_height', $_POST['sao_show_tablet_height']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_tablet_height');
    }	
	
	
   	if(!empty($_POST['sao_show_tablet_height_unit'])) {
      	update_post_meta($post_id, 'sao_show_tablet_height_unit', $_POST['sao_show_tablet_height_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_tablet_height_unit');
    }

	//phablet
   	if(!empty($_POST['sao_show_phablet_width'])) {
      	update_post_meta($post_id, 'sao_show_phablet_width', $_POST['sao_show_phablet_width']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_phablet_width');
    }
	
   	if(!empty($_POST['sao_show_phablet_width_unit'])) {
      	update_post_meta($post_id, 'sao_show_phablet_width_unit', $_POST['sao_show_phablet_width_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_phablet_width_unit');
    }
	
	if(!empty($_POST['sao_show_phablet_height'])) {
      	update_post_meta($post_id, 'sao_show_phablet_height', $_POST['sao_show_phablet_height']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_phablet_height');
    }	
	
	
   	if(!empty($_POST['sao_show_phablet_height_unit'])) {
      	update_post_meta($post_id, 'sao_show_phablet_height_unit', $_POST['sao_show_phablet_height_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_phablet_height_unit');
    }
		
	//phone
   	if(!empty($_POST['sao_show_phone_width'])) {
      	update_post_meta($post_id, 'sao_show_phone_width', $_POST['sao_show_phone_width']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_phone_width');
    }
	
   	if(!empty($_POST['sao_show_phone_width_unit'])) {
      	update_post_meta($post_id, 'sao_show_phone_width_unit', $_POST['sao_show_phone_width_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_phone_width_unit');
    }
	
	if(!empty($_POST['sao_show_phone_height'])) {
      	update_post_meta($post_id, 'sao_show_phone_height', $_POST['sao_show_phone_height']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_phone_height');
    }	
	
	
   	if(!empty($_POST['sao_show_phone_height_unit'])) {
      	update_post_meta($post_id, 'sao_show_phone_height_unit', $_POST['sao_show_phone_height_unit']);
    } else {
     	 delete_post_meta($post_id, 'sao_show_phone_height_unit');
    }
	
	if ( isset($_POST['sao_responsive_mode']) ) {
		update_post_meta($post_id, 'sao_responsive_mode', $_POST['sao_responsive_mode']);
	}else{
		delete_post_meta($post_id, 'sao_responsive_mode');
	} 		
	
	if ( isset($_POST['sao_slide_link']) ) {
		update_post_meta($post_id, 'sao_slide_link', $_POST['sao_slide_link']);
	}else{
		delete_post_meta($post_id, 'sao_slide_link');
	} 
	
		if ( isset($_POST['sao_max_width']) ) {
		update_post_meta($post_id, 'sao_max_width', $_POST['sao_max_width']);
	}else{
		delete_post_meta($post_id, 'sao_max_width');
	} 	
 
	if ( isset($_POST['sao_background_image']) ) {
		update_post_meta($post_id, 'sao_background_image', $_POST['sao_background_image']);
	}else{
		delete_post_meta($post_id, 'sao_background_image');
	} 	
 
	 
	
	if ( isset($_POST['sao_background_color']) ) {
		update_post_meta($post_id, 'sao_background_color', $_POST['sao_background_color']);
	}else{
		delete_post_meta($post_id, 'sao_background_color');
	} 	 
	 
	if ( isset($_POST['sao_background_color']) ) {
		update_post_meta($post_id, 'sao_background_color', $_POST['sao_background_color']);
	}else{
		delete_post_meta($post_id, 'sao_background_color');
	} 	 
		if ( isset($_POST['sao_slider_background_transform']) ) {
		update_post_meta($post_id, 'sao_slider_background_transform', $_POST['sao_slider_background_transform']);
	}else{
		delete_post_meta($post_id, 'sao_slider_background_transform');
	}
	 
	 
	 
}
