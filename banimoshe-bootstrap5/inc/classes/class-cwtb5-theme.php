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
        #We load classes here
        Assets::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        #Actions
    }
}
