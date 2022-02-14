<?php
/*
Enqueue the theme
@package CWTBootstrap5
*/

namespace CWTB5_THEME\Inc;

use CWTB5_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {
        #We can load classes here
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        #Actions
        add_action( 'wp_enqueue_scripts' , [ $this , 'register_styles' ] );
        add_action( 'wp_enqueue_scripts' , [ $this , 'register_scripts' ] );
    }

    public function register_styles() {
        #Styles registration
        wp_register_style( 'stylesheet_cwtb5' , CWTB5_DIR_URI . '/assets/style.css' , ['bootstrap5_styles'] , filemtime( CWTB5_DIR_PATH . '/assets/style.css' ) , 'all' );
        wp_register_style( 'bootstrap5_styles' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'stylesheet_cwtb5' );
        wp_enqueue_style( 'bootstrap5_styles' );
    }

    public function register_scripts() {
        #Scripts
        wp_register_script( 'main_script_cwtb5' , CWTB5_DIR_URI . '/assets/main.js' , [] , filemtime( CWTB5_DIR_PATH . '/assets/main.js' ) , false );
        #Let's use the bundle instead...
        #wp_register_script( 'bootstrap5_min_js' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js' , [] , '5.1.3', false );
        wp_register_script( 'bootstrap5_bundle_min_js' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' , [] , '5.1.3', true );
        wp_enqueue_script( 'main_script_cwtb5' );
        #Let's use the bundle instead...
        #wp_enqueue_script( 'bootstrap5_min_js' );
        wp_enqueue_script( 'bootstrap5_bundle_min_js' );
    }
}
