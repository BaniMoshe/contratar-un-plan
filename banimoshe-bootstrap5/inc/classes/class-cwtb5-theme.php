<?php
/*
Bootstraps the theme
@package CWTBootstrap5
*/

namespace CWTB5_THEME\Inc;

use CWTB5_THEME\Inc\Traits\Singleton;

class CWTB5_THEME {
    use Singleton;

    protected function __construct() {
        #This enqueues & registers styles & scripts
        Assets::get_instance();
        #This load all types of menus
        Menus::get_instance();
        #WP sets up the theme hooks
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        #Actions
        add_action( 'after_setup_theme' , [ $this , 'setup_theme' ]);
    }

    public function setup_theme() {
        global $content_width;
        #Check if content max-width is set, or establish it
        if ( ! isset( $content_width ) ) {
            $content_width = CWTB5_MAX_WIDTH;
        }
        #WP adds the title tag automatically
        add_theme_support( 'title-tag' );
        #WP loads the logo and allows to cut it
        add_theme_support( 'custom-logo' , [
            'header-text' => [ 'site-title' , 'site-description' ],
            'height' => 100,
            'width' => 300,
            'flex-height' => true,
            'flex-width' => true,
        ]);
        #WP shows a custom background, could be color + image
        add_theme_support( 'custom-background' , [
            'default-color' => '#fff',
            'default-image' => '',
        ]);
        #WP allows us to load a post thumbnail
        add_theme_support( 'post-thumbnails' );
        #WP refreshes preview areas after customization
        add_theme_support( 'customize-selective-refresh-widgets' );
        #WP allows us to load comments&posts feed links in the head section
        add_theme_support( 'automatic-feed-links' );
        #WP gets HTML5-valid info from these elements
        add_theme_support( 'html5' , [
            'search-form',
            'comment-form',
            'comment-list',
            'galery',
            'caption',
            'script',
            'style',
        ] );
        #WP allows us to use content blocks
        add_theme_support( 'wp-block-styles' );
        #WP alignment powered with wide-width + full-width
        add_theme_support( 'align-wide' );
    }
}
