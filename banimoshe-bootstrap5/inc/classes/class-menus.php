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

    public function get_menu_id( $location ) {
        #We'll get all menu locations to use their WP IDs
        $locations = get_nav_menu_locations();
        #Get object id by location
        $menu_id = $locations[ $location ];
        return ! empty( $menu_id ) ? $menu_id : '';
    }

    public function get_child_menu_items( $menu_array , $parent_id ) {
        #To store all child elements from a parent nav-item
        $child_menus = [];
        #Verifying everything's OK with the $menu_array
        if ( ! empty( $menu_array ) and is_array( $menu_array ) ) {
            #Checking all items
            foreach ( $menu_array as $menu ) {
                if ( intval( $menu->menu_item_parent ) === $parent_id ) {
                    #Child item found
                    array_push( $child_menus , $menu ); #We save this child menu item
                }
            }
        }
        return $child_menus;
    }
}
