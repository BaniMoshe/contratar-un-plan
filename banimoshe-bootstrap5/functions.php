<?php
/*
Theme functions
@package CWT-Bootstrap5
*/

function cwt_bootstrap5_enqueue_scripts() {
    #Adding styles to WP the old way -version sensitive args
    wp_enqueue_style( 'stylesheet_cwtb5' , get_template_directory_uri() . '/assets/style.css' , 'bootstrap5_styles' , filemtime( get_template_directory() . '/assets/style.css' ) , 'all' );
    wp_enqueue_style( 'bootstrap5_styles' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' , [] ); #This is loaded first
    #Or the easiest & quickest one
    #wp_enqueue_style( 'style_cwtb5' , get_stylesheet_uri() );
    #And now the script
    wp_enqueue_script( 'main_script_cwtb5' , get_template_directory_uri() . '/assets/main.js' );
    wp_enqueue_script( 'bootstrap5_min_js' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js' );
    wp_enqueue_script( 'bootstrap5_bundle_min_js' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' );
}

add_action( 'wp_enqueue_scripts' , 'cwt_bootstrap5_enqueue_scripts');