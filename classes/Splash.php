<?php

/**
 * 
 */
class Splash {
    function __construct() {
        add_action('template_redirect', array(&$this, 'set_splash'));
    }

    public function set_splash() {
        if (is_admin() && is_user_logged_in()){
            include(PATH_PLUGIN . 'layout/splash/site.php');
        exit;
        } 
    }

}