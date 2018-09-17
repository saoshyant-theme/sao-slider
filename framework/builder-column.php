<?php

function sao_slider_builder_column(){
 	
  		global $post;
 
		$element_json = get_post_meta($post->ID, 'sao_element', true);  
		$element= sao_options_array_row($element_json);
		$template_id ='';
	 
 
	 
	
   	 
    
	echo '<li id="sao_column_1" class="sao_column_item sao_builder_column_item   sao_row_item"  data-key="1" data-value="main"  data-child="1">';
 		
			echo '<ul class="sao_slider_element_list">';
				if (!empty($element)) :
				foreach($element as $element_key => $element_value) :
					
 						sao_slider_element($element_key,$element_value);
	 
				endforeach;
				endif;  
						
 						 
 			echo '</ul>';
				
			echo '<div class="sao_row_bottom">';
				echo '<a class="sao_add_element sao_add_row"><i></i>'.esc_html__('Add New Element','sao').'</a>';
				echo '<a class="sao_element_template_add sao_template_add"  data-row="slider_element" data-name="'.esc_html__('Slider Element','sao').'"></a>';
			echo '</div>';
				
	echo '</li> ';
    
          

}


