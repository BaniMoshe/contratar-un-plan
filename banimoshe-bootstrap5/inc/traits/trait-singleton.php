<?php
/*
TRAIT-Singleton file
@package CWTBootstrap5
*/
namespace CWTB5_THEME\Inc\Traits;

trait Singleton {
    public function __construct(){
        #Construct
    }

    public function __clone(){
        #Clone
    }

    final public static function get_instance() {
        #Final because it won't be overwritter by any other further class
        static $instance = []; #Associative array to store the objects (instantiated classes)
        $called_class = get_called_class(); #Gets the name of the previously called class
        if ( ! isset( $instance[ $called_class ] ) ) {
            $instance[ $called_class ] = new $called_class(); #If it isn't stored, then instantiates it and stores it, whatever class it might be
            do_action( sprintf( 'cwtb5_theme_singleton_init%s' , $called_class ) ); #This can be used by my custom plugins to hook in here
        }
        return $instance[ $called_class ];
    }
}