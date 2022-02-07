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
        #We can load classes here
        $this->set_hooks();
    }

    protected function set_hooks() {
        #Actions and filters will be placed here
    }
}
