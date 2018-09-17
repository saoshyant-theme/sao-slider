<?php
add_action('wp_ajax_sao_template_option_save', 'sao_template_option_save');
add_action('wp_ajax_nopriv_sao_template_option_save', 'sao_template_option_save');
function sao_template_option_save(){
	
	echo '<div class="sao_options sao_options_section sao_active ">';
	echo '<div class="sao_options_middle">';
		//Title
		echo '<div class="sao_options_title">';
			echo '<h3>'.esc_html__('Save','sao').' '.esc_html($_REQUEST['row']).' '.esc_html__('Template','sao').'</h3><i class="sao_options_close"></i>';
		echo '</div>';
		//Content
		echo '<ul class="sao_options_content sao_layout_active">';
			echo'<div class="sao_options_container">';
 			sao_options_function('',esc_html__('Template Name','sao'),'save_template_name','text');
 			echo'</div>';
 		echo '</ul>';
		//Bottom
		echo '<div class="sao_options_bottom">';
				echo '<div class="sao_options_cancel button">'.esc_html__('Cancel','sao').'</div>';
				echo '<div class="sao_options_'.esc_attr($_REQUEST['row']).'_save button-primary">'. esc_html__('Save','sao').'</div>';
				echo '<div class="sao_options_massage"></div>';
		echo '</div>';            
			    
	echo '</div>';
	echo '</div>';
 	die(0);
}
 
add_action('wp_ajax_sao_template_save', 'sao_template_save');
add_action('wp_ajax_nopriv_sao_template_save', 'sao_template_save');  
function sao_template_save() {
	$old_data =	get_option( 'sao_'.$_REQUEST['id'].'_template');
	if( !is_array($old_data)){
		$old_data=array();
	}
 			 
	$old_data[$_REQUEST['key']]['name'] =  $_POST['name'];
	if(!empty($_REQUEST['section'])){
		$old_data[$_REQUEST['key']]['section'] =  $_REQUEST['section'];
	}
	
	if(!empty($_REQUEST['column'])){
		$old_data[$_REQUEST['key']]['column'] =  $_REQUEST['column'];
	}
	
	if(!empty($_REQUEST['element'])){
			$old_data[$_REQUEST['key']]['element'] = $_REQUEST['element'];
	}
 
	update_option( 'sao_'.$_REQUEST['id'].'_template', $old_data );
	die(0);
    
} 
 
add_action('wp_ajax_sao_template_options', 'sao_template_options');
add_action('wp_ajax_nopriv_sao_template_options', 'sao_template_options'); 
function sao_template_options() {
	
	$old_data =	get_option( 'sao_'.$_REQUEST['id'].'_template');
 	
	echo '<div class="sao_model  sao_active sao_model_template  " data-row="'.esc_attr($_REQUEST['id']).'">';
	echo '<div class="sao_model_middle">';
		//Title
		echo '<div class="sao_model_title"><h3>'.esc_html__('Add','sao').' '.esc_attr($_REQUEST['id']).' '.esc_html__('template','sao').'</h3><i class="sao_model_close"></i></div>';
		//Content;
		echo '<ul class="sao_model_content">';
               	
			if (!empty($old_data)) :
			foreach($old_data as $key => $value ):
				echo '<li class="sao_template_item" data-id=" echo esc_attr($key)">';
					echo '<div class="sao_template_name">'.esc_attr($value['name']).'</div>';
					echo '<div class="sao_template_remove button">'.esc_html__('Remove','sao').'</div>';
				echo '</li>';
				echo '<div class="sao-row-1-8"></div>';
	
			endforeach;
			endif;		
		echo '</ul>';
			//Bottom
		echo '<div class="sao_model_bottom">';
			echo '<div class="sao_'.esc_attr($_REQUEST['id']).'_template_add_options button-primary">'.esc_html__('Add','sao').'</div>';
		echo '</div>';
		
	echo '</div>';
 	echo '</div>';
  	die(0);
}   

add_action('wp_ajax_sao_template_remove', 'sao_template_remove');
add_action('wp_ajax_nopriv_sao_template_remove', 'sao_template_remove'); 
function sao_template_remove() {
	
	$old_data =	get_option( 'sao_'.$_REQUEST['id'].'_template');
	unset($old_data[$_REQUEST['key']]);
 	update_option( 'sao_'.$_REQUEST['id'].'_template', $old_data );
	die(0);
	
}  
