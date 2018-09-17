<?php
/********************************************************************
sao Options Encode
*********************************************************************/
add_action('wp_ajax_sao_options_encode', 'sao_options_encode');
add_action('wp_ajax_nopriv_sao_options_encode', 'sao_options_encode');
function sao_options_encode($opt=false){
	
	if(!empty($opt)){
  		$option = $opt;
	}else{
  		$option = $_REQUEST['option'];
		 
	}
	
	$output='';
	if(!empty($option)){
	foreach($option as $key => $value) :
		if(!empty($value)):
		$rand = rand(100000, 999999);
		
 		$output.='[sao_'.$rand.' attr_key="'.sanitize_title($key).'"]';
		
			if(is_array($value)){
				foreach($value as $key_2 => $value_2) :
					if(!empty($value_2)):
					$rand_2 = rand(100000, 999999);
					
  						$output.='[sao_'.$rand.'_'.$rand_2.' attr_key="'.sanitize_title($key_2).'"]';
	
						if(is_array($value_2)){
							foreach($value_2 as $key_3 => $value_3) :
									if(!empty($value_3)):

									$rand_3 = rand(100000, 999999);
									$output.='[sao_'.$rand.'_'.$rand_2.'_'.$rand_3.' attr_key="'.sanitize_title($key_3).'"]';
									
									if(is_array($value_3)){
										foreach($value_3 as $key_4 => $value_4) :
										if(!empty($value_4)):

												$rand_4 = rand(100000, 999999);
												$output.='[sao_'.$rand.'_'.$rand_2.'_'.$rand_3.'_'.$rand_4.' attr_key="'.sanitize_title($key_4).'"]';
  												$output.= stripslashes($value_4) ;
												$output.='[/sao_'.$rand.'_'.$rand_2.'_'.$rand_3.'_'.$rand_4.']';
												
										endif;
  										endforeach;
									}else{
										$output.=stripslashes($value_3);
									}									
 									
 									$output.='[/sao_'.$rand.'_'.$rand_2.'_'.$rand_3.']';
							endif;
 							endforeach;
						}else{
							$output.=stripslashes($value_2);
						}
						
						
						$output.='[/sao_'.$rand.'_'.$rand_2.']';
 				 
				endif;
				endforeach;
			}else{
				$output.= stripslashes($value);
			}
			
	 	$output.= '[/sao_'.$rand.']';
	endif;
	endforeach;
	 
	}
				
 		
	if( !empty($opt)){
 		return  urlencode($output);	  
	}else{
		echo urlencode($output);	
 	die();
		 
	}
 }

/********************************************************************
sao Options DeCode
*********************************************************************/
function sao_options_decode($data){
	$option = sao_serialize_code(stripslashes( $data),'sao');
	$array =array();
	if(is_array($option)){
	
	foreach($option as $value) :
	 
	$option_2 = sao_serialize_code(stripslashes($value['value']),stripslashes($value['name']));

	if(is_array($option_2)){
			foreach($option_2 as $value_2) :
				
				$option_3 = sao_serialize_code(stripslashes($value_2['value']),stripslashes($value_2['name']));
				if(is_array($option_3)){
   					foreach($option_3 as $value_3) :
						$option_4 = sao_serialize_code(stripslashes($value_3['value']),stripslashes($value_3['name']));
						
						if(is_array($option_4)){
							foreach($option_4 as $value_4) :
								$array[stripslashes($value['key'])][stripslashes($value_2['key'])][stripslashes($value_3['key'])][stripslashes($value_4['key'])] = stripslashes($value_4['value']);
							endforeach;
						}else{
							$array[stripslashes($value['key'])][stripslashes($value_2['key'])][stripslashes($value_3['key'])] = stripslashes($value_3['value']);
						}
						
 					endforeach;
				}else{
					$array[stripslashes($value['key'])][stripslashes($value_2['key'])] = stripslashes($value_2['value']);
				}
			endforeach;
		
		
 	}else{
	 $array[stripslashes($value['key'])] = stripslashes($value['value']);
	}
   	
	endforeach;
	}
	return $array;
}
/********************************************************************
sao Options Array Row
*********************************************************************/
function sao_options_array_row($row){
	$options = json_decode($row,true);
  	$array = array();
	
	if(!empty($options)){
	foreach($options as $key => $value) :
		if(!empty($value)){
		foreach($value as $key => $value) :
				$array[$key] = $value;
		  
		endforeach;
		}
	endforeach;
	}
	return $array;
}
?>