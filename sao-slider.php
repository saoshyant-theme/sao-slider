<?php
/*
Plugin Name: Sao Slider
Description: The custom slider plugin.
Author: Saoshyant
Version: 1.0

*/ 
 
   
/*********************************************************************************************
Registers Custom Slider Post Type
*********************************************************************************************///
if(function_exists ( "sao_builder_meta" ) ){  

function sao_slide_post_type() {
	$labels = array(
		'name' 					=> __('Slides','sao'),
		'singular_name'			=> __('Slide','sao'),
		'add_new'				=> __('Add New','sao'),
		'add_new_item'			=>__('Add New Slide','sao'),
		'edit_item'				=> __('Edit Slide','sao'),
		'new_item'				=> __('New Slide','sao'),
		'view_item'				=> __('View Slide','sao'),
 		'all_items'				=>__('All Slides','sao'),
 		'search_items'			=> __('Search Slides','sao'),
		'not_found'				=>  __('No slides found','sao'),
		'not_found_in_trash'	=>__('No slides found in trash','sao'),
		'parent_item_colon'		=> '',
		'menu_name'				=> __('Sao Slides','sao')
	);
	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true,
		'rewrite'				=> true,
		'capability_type'		=> 'post',
		'has_archive'			=> false, 
		'hierarchical'			=> false,
		'menu_position'			=> null,
		'supports' => array( 'title' )
	); 

	register_post_type( 'sao_slide', $args );
}
add_action( 'init', 'sao_slide_post_type' );
 
 
add_action( 'init', 'sao_sliders_taxonomy', 0 );
function sao_sliders_taxonomy() {
 
   $labels = array(
    'name'							=> __( 'Sliders','sao' ),
    'singular_name'					=> __( 'Slider','sao'  ),
    'search_items'					=> __( 'Search Sliders' ,'sao' ),
    'popular_items'					=> __( 'Popular Sliders','sao'  ),
    'all_items' 					=> __( 'All Sliders' ,'sao' ),
    'parent_item'					=> __( 'Parent Slider' ,'sao' ),
    'edit_item'						=> __( 'Edit Topic','sao' ), 
    'update_item' 					=> __( 'Update Slider','sao'  ),
    'add_new_item'					=> __( 'Add New Slider','sao'  ),
    'new_item_name'			 		=> __( 'New Topic Name' ,'sao' ),
    'separate_items_with_commas'	=> __( 'Separate Sliders with commas' ,'sao' ),
    'add_or_remove_items'			=> __( 'Add or remove Sliders','sao'  ),
    'choose_from_most_used' 		=> __( 'Choose from the most used Sliders','sao'  ),
    'menu_name' 					=> __( 'Sliders' ,'sao' ),
  ); 


// Now register the taxonomy

  register_taxonomy('sao_sliders','sao_slide', array(
    'hierarchical' 					=> true,
    'labels' 						=> $labels,
    'show_ui' 						=> true,
    'show_admin_column'				=> true,
    'query_var'						=> true,
    'rewrite' 						=> array( 'slug' => 'sao_sliders' ),
  ));

}
add_filter('manage_sao_slide_posts_columns', 'sao_add_thumbnail_column', 5);

function sao_add_thumbnail_column($columns){
  $columns['new_post_excerpt'] = __('Excerpt','sao');
  $columns['new_post_thumb'] = __('Featured Image','sao');
  return $columns;
}

add_action('manage_sao_slide_posts_custom_column', 'sao_display_thumbnail_column', 5, 2);

function sao_display_thumbnail_column($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id =  get_post_meta($post_id, 'sao_background_image', true);
	  
       if (!empty($post_thumbnail_id['src'])) {
         echo '<img width="100" src="' . esc_url($post_thumbnail_id['src']) . '" />';
      }
      break;
  }
}
 
include_once plugin_dir_path(__FILE__) . 'framework/builder.php';
include_once plugin_dir_path(__FILE__) . 'framework/builder-section.php';
include_once plugin_dir_path(__FILE__) . 'framework/builder-column.php';
include_once plugin_dir_path(__FILE__) . 'framework/builder-element.php';
include_once plugin_dir_path(__FILE__) . 'framework/slider-metabox.php';
include_once plugin_dir_path(__FILE__) . 'framework/perview.php';
include_once plugin_dir_path(__FILE__) . 'element/text.php';
include_once plugin_dir_path(__FILE__) . 'element/button.php';
include_once plugin_dir_path(__FILE__) . 'element/image.php';
include_once plugin_dir_path(__FILE__) . 'element/box.php';
include_once plugin_dir_path(__FILE__) . 'element/icon.php';
include_once plugin_dir_path(__FILE__) . 'element/text_block.php';
include_once plugin_dir_path(__FILE__) . 'config-css.php';
include_once plugin_dir_path(__FILE__) . 'options/builder-options-element.php';
include_once plugin_dir_path(__FILE__) . 'options/google-font.php';
include_once plugin_dir_path(__FILE__) . 'options/slider.php';
   
 
add_action('admin_enqueue_scripts', 'sao_slider_builder_enqueue');
function sao_slider_builder_enqueue($hook) {
 
 	wp_register_script('sao_slider',plugin_dir_url(__FILE__) .'assets/js/slider.js',  array('jquery', 'jquery-ui-sortable','jquery-ui-draggable','jquery-ui-resizable')); 
	wp_enqueue_style('sao_slider',plugin_dir_url(__FILE__). 'assets/css/slider.css');  
	wp_enqueue_style('sao_slider_css',plugin_dir_url(__FILE__). 'assets/css/style.css'); 
    wp_register_script('sao_slider_script',plugin_dir_url(__FILE__) .'assets/js/script.js', array( 'jquery')); 
	$array = array( 'ajaxurl' => admin_url( 'admin-ajax.php'  ));
	wp_localize_script( 'sao_slider', 'slider_js', $array  );	
	
   	wp_enqueue_script( 'sao_slider' );
wp_enqueue_script("jquery-ui-draggable");
}
 
add_action( 'wp_enqueue_scripts', 'sao_slider_styles_method' );
function sao_slider_styles_method() {
	wp_enqueue_style('sao_slider_css',plugin_dir_url(__FILE__). 'assets/css/style.css'); 
	wp_register_script('sao_slider_script',plugin_dir_url(__FILE__). 'assets/js/script.js'); 
 	
	 
	
	$array = array( 'ajaxurl' => admin_url( 'admin-ajax.php'  ));
	 wp_localize_script( 'sao_slider_script', 'builder_js', $array  );	
	 wp_enqueue_script( 'sao_slider_script' );
 
} 
add_filter('single_template', 'sao_slider_custom_template');

function sao_slider_custom_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'sao_slide' ) {
        if ( file_exists( plugin_dir_path(__FILE__) . 'single-sao_slide.php' ) ) {
            return plugin_dir_path(__FILE__) . 'single-sao_slide.php';
  		
        }
    }

    return $single;

}
  

require plugin_dir_path(__FILE__).'plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/saoshyant-theme/plugin/master/sao-slider.json',
	__FILE__, 
	'sao-slider'
);
}

?>