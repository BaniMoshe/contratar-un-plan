<?php
/*
Theme functions
@package CWT-Bootstrap5
*/

function cwt_bootstrap5_enqueue_scripts() {
    #Adding styles to WP the old way -version sensitive args
    wp_enqueue_style( 'style_cwtb5' , get_template_directory_uri() . '/style.css' , [ ] , filemtime( get_template_directory() . '/style.css' ) , 'all' );
    #wp_enqueue_style( 'second_stylesheet' , get_template_directory_uri() . '/style.css' , [ 'style_cwtb5' ] ); #It first loads 'style_cwtb5'
    #Or the easiest & quickest one
    #wp_enqueue_style( 'style_cwtb5' , get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts' , 'cwt_bootstrap5_enqueue_scripts');