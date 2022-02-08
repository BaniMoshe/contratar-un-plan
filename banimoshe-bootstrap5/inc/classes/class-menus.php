<?php
/*
Register the menus
@package CWTBootstrap5
*/

namespace CWTB5_THEME\Inc;

use CWTB5_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        #We can load classes here
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        #Actions
        add_action( 'init' , [ $this , 'register_menus' ] );
    }

    public function register_menus(){
        register_nav_menus([
            'CWTBootstrap5-top-menu' => esc_html__( 'Top Menu' , 'CWTBootstrap5' ),
            'CWTBootstrap5-header-menu' => esc_html__( 'Header Menu' , 'CWTBootstrap5' ),
            'CWTBootstrap5-footer-menu' => esc_html__( 'Footer Menu' , 'CWTBootstrap5' ),
            'CWTBootstrap5-extra-menu' => esc_html__( 'Extra Menu' , 'CWTBootstrap5' ),
        ]);
    }
}
