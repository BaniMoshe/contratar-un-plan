<?php
/*
Theme functions
@package CWT-Bootstrap5
*/

function cwt_bootstrap5_enqueue_scripts() {
    #Enqueuing styles to WP the old way with dependencies -version sensitive args
    wp_enqueue_style( 'stylesheet_cwtb5' , get_template_directory_uri() . '/assets/style.css' , ['bootstrap5_styles'] , filemtime( get_template_directory() . '/assets/style.css' ) , 'all' );
    #Let's enqueue the Bootstrap5 styles
    wp_enqueue_style( 'bootstrap5_styles' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' ); #This is loaded first
    
    #QUICK NOTE:
        #Or you could've taken the easiest & quickest way
        #wp_enqueue_style( 'style_cwtb5' , get_stylesheet_uri() ); #It searches into the theme's folder (css files)
    #QUICK NOTE:
        #But we could also register its name and under a certain condition either load a style or another. This is cool:
        #wp_register_style( 'style_cwtb5' , get_template_directory_uri() . '/assets/style.css' , [] , filemtime( get_template_directory() . '/assets/style.css' ) , 'all' );
        #if ( $condition ) {
        #   wp_enqueue_style( 'style_cwtb5' );    #The same can be done with the JS files
        #}

    #And now the script with a dependency, just like the first enqueue
    wp_enqueue_script( 'main_script_cwtb5' , get_template_directory_uri() . '/assets/main.js' , [ 'bootstrap5_min_js' ] , filemtime( get_template_directory() . '/assets/main.js' ) , 'false' );
    #Let's enqueue the Bootstrap5 scripts
    wp_enqueue_script( 'bootstrap5_min_js' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js' ); #This is loaded first
    wp_enqueue_script( 'bootstrap5_bundle_min_js' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' ); #This is loaded lastly
}

add_action( 'wp_enqueue_scripts' , 'cwt_bootstrap5_enqueue_scripts');