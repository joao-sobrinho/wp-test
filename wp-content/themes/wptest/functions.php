<?php

add_action( 'wp_enqueue_scripts', 'twentysixteen_parent_theme_enqueue_styles' );

function twentysixteen_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'twentysixteen-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'wptest-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'twentysixteen-style' )
    );
}

add_filter('dynamic_sidebar_params', 'fun_fact_dynamic_sidebar_params');

function fun_fact_dynamic_sidebar_params( $params ) {
	// get widget vars
	$widget_name = $params[0]['widget_name'];
	$widget_id = $params[0]['widget_id'];

	// bail early if this widget is not a Text widget
	if( $widget_id != 'text-5' ) {
		return $params;
	}

	$params[0]['after_widget'] = get_field('fun_fact') . $params[0]['after_widget'];

	$funfact = get_field('fun_fact');



	if(!$funfact){
		$params[0]['class'] = 'hidden';
	}
	
	// return
	return $params;

}