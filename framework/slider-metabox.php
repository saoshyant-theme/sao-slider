<?php
function sao_slide_callback(){
	global $post;
    $values = get_post_custom( $post->ID );
	$link = get_post_meta($post->ID, 'sao_slide_link', true);
	$background_image = get_post_meta($post->ID, 'sao_background_image', true);
	$responsive = get_post_meta($post->ID, 'sao_responsive_mode', true);

 	$background_image_src = !empty($background_image['src'])? $background_image['src']:'';
	$background_image_width = !empty($background_image['width'])? $background_image['width']:'';
	$background_image_height = !empty($background_image['height'])? $background_image['height']:'';



	$background_color = get_post_meta($post->ID, 'sao_background_color', true);


 	$background_color_first = !empty($background_color['first'])? $background_color['first']:'';
	$background_color_second = !empty($background_color['second'])? $background_color['second']:'';
	$background_color_third = !empty($background_color['third'])? $background_color['third']:'';
	$background_color_orientation = !empty($background_color['orientation'])? $background_color['orientation']:'';
	
	$sao_max_width = get_post_meta($post->ID, 'sao_max_width', true);

	$max_width = !empty($sao_max_width)? $sao_max_width : '1200';
	
	$responsive_array  = array(
					"auto"				=>	esc_html('Auto','sao'),
					"custom"			=>  esc_html('Custom','sao'), 
		);
	
	
	$orientation  = array(
					"horizontal"		=>  esc_html('horizontal  →','sao'),
					"vertical"			=>  esc_html('vertical  ↓','sao'),
					"diagonal"			=>  esc_html('diagonal  ↘','sao'),
					"diagonal-bottom"	=>  esc_html('diagonal  ↗','sao'),
					"radial"	=>  esc_html('radial  ○','sao'),
				);
				
	$width  = array(
					"1000"			=>  esc_html('1000px','sao'),
					"1100"			=>  esc_html('1100px','sao'),
					"1200"			=>  esc_html('1200px','sao'),
					"1300"			=>  esc_html('1300px','sao'),
					"1400"			=>  esc_html('1400px','sao'),
					"1500"			=>  esc_html('1500px','sao'),
					"1600"			=>  esc_html('1600px','sao'),
					"1920"			=>  esc_html('1920px','sao'),
 				);
				
				
 
	$slider_background_transform = isset( $values['sao_slider_background_transform'][0] ) ?  $values['sao_slider_background_transform'][0] : '';   
	if($slider_background_transform == "yes"){ $slider_background_transform_checked = 'checked="checked"';}else{$slider_background_transform_checked='';} 
	 
		 
	    $slider_speed = get_post_meta($post->ID, 'sao_slider_speed', true);  
		
    ?><table class="form-table meta_box">     
		<tbody>
        	
            <tr class="meta_responsive_mode meta_sao_color">
                <th style="width:20%"><label for="sao_responsive_mode"><?php echo esc_html__('Responsive Mode','sao');?></label></th>
                <td>
                	<div class="sao_responsive_mode_select">
                	 
                    <select name="sao_responsive_mode" class="sao_responsive_mode" >
                         	<?php foreach ($responsive_array as $key => $name){  ?>
                    			<option value="<?php echo esc_attr($key) ?>" <?php  selected( $responsive, $key )  ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
                    </select>
                    
                    
                     </div>
                    
                    
                 </td>
            </tr>    
            
            
            <tr class="meta_sao_featured_image_meta">
                <th style="width:20%"><label for="sao_featured_image_meta"><?php echo esc_html__('Link','sao');?></label></th>
                <td>
                <p>
                    <input type="text" name="sao_slide_link" id="sao_slide_link"  value="<?php echo esc_attr($link); ?>" style="width:100%;" />
                </p>
                <p><?php echo esc_html__('Add the link of the Slide','sao');?></p>
                
                  </td>
            </tr>  
              
      		<tr class="meta_sao_max_width_color meta_sao_color">
                <th style="width:20%"><label for="sao_sao_max_width"><?php echo esc_html__('Max Width Slider Details','sao');?></label></th>
                <td>
                	<div class="sao_max_width">
                	 
                    <select name="sao_max_width" class="sao-max-width-keyup" >
                         	<?php foreach ($width as $key => $name){  ?>
                    			<option value="<?php echo esc_attr($key) ?>" <?php  selected( $max_width, $key )  ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
                    </select>
                    
                    
                     </div>
                    
                    
                 </td>
            </tr>                 
              
              
         	<tr class="meta_sao_body_background_color meta_sao_color">
                <th style="width:20%"><label for="sao_body_background_color"><?php echo esc_html__('Background Color','sao');?></label></th>
                <td>
                	<div class="sao_body_background_color">
                	<label> <?php echo esc_html__('First','sao');?></label>
					<input  class="cs-wp-color-picker sao-color sao-background-keyup sao_background_color_first"  data-rgba="true" type="text" name="sao_background_color[first]" value="<?php echo esc_attr($background_color_first);?>">
                    </div>
                    
                	<div class="sao_body_background_color">
                	<label> <?php echo esc_html__('Second','sao');?></label>
					<input  class="cs-wp-color-picker sao-color  sao-background-keyup sao_background_color_second"  data-rgba="true" type="text" name="sao_background_color[second]" value="<?php echo esc_attr($background_color_second);?>">
                    </div>
                    
                	<div class="sao_body_background_color">
                	<label> <?php echo esc_html__('Third','sao');?></label>
					<input  class="cs-wp-color-picker sao-color  sao-background-keyup sao_background_color_third"  data-rgba="true" type="text" name="sao_background_color[third]" value="<?php echo esc_attr($background_color_third);?>">
                    </div>
                    
					<div class="sao_body_background_color">
                	<label> <?php echo esc_html__('Orientation','sao');?></label>
                    <select name="sao_background_color[orientation]" class="sao-background-keyup sao_background_color_orientation" >
                         	<?php foreach ($orientation as $key => $name){  ?>
                    			<option value="<?php echo esc_attr($key) ?>" <?php  selected( $background_color_orientation, $key )  ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
                    </select>
                    
                    
                     </div>
                    
                    
                 </td>
            </tr>   
            
            
             <tr class="meta_sao_background_image">
                <th style="width:20%"><label for="sao_background_image"><?php echo esc_html__('Slider Background Image','sao');?></label></th>
                <td> 
 	  	 		<a class="sao_slider_add_image button button-small"  data-uploader-title="<?php echo esc_attr__('Choose Image','sao');?>" data-uploader-button-text="<?php echo esc_attr__('Use This Image','sao');?>"> <?php echo esc_html__('Upload','sao')?></a>
 				<input type="hidden" name="sao_background_image[src]" value="<?php echo esc_url($background_image_src);?>">
 				<input type="hidden" name="sao_background_image[width]" value="<?php echo esc_attr($background_image_width);?>">
 				<input type="hidden" name="sao_background_image[height]" value="<?php echo esc_attr($background_image_height);?>">
 		
        		<?php $image_active = !empty($background_image_src) ? 'sao_slider_image_active':'';?> 
        		 
  	   			<a class="sao_slider_remove_image button <?php echo esc_attr($image_active); ?> button-small" ><?php echo  esc_html__('Remove Image','sao');?></a>
 		 		 
               	</td>
            </tr>               
                           
            
         	  
            
      
			<tr class="meta_sao_slider_background_transform">
                <th style="width:20%"><label for="sao_slider_background_transform"><?php echo esc_html__('Transform Background','sao');?></label></th>
                <td> 
                      <input type="checkbox" name="sao_slider_background_transform"  id="sao_slider_background_transform" value="yes" <?php echo wp_kses_post($slider_background_transform_checked); ?> />
                            
                 </td>
            </tr>                                   
                 
              	  
                 
                        
     	</tbody>
     </table>
     <?php
}
 ?>