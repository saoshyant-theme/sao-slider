<?php
/*********************************************************************************************
ELEMENT Options
*********************************************************************************************/
 

function sao_slider_options_element() { 
	global  $sao_slider_options_element;

	$slider=array();

 	if(has_filter('sao_slider_element_options')) {
		$sao_slider_options_element = apply_filters('sao_slider_element_options', $slider);
	}
 				 
 
}
add_action('init','sao_slider_options_element');

?>