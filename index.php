<?php
/*
Plugin Name: Suporte Config
Plugin URI: https://github.com/alissonally/suporte_config
Description: Configurações de suporte e cobranças para wordpress
Version: 0.1
Author: Alisson Araújo
Author Email: alissonsdearaujo@gmail.com
License:
 
*/
define('DS', DIRECTORY_SEPARATOR); 
define ('PATH_PLUGIN', plugin_dir_path( __FILE__ ));
define ('URL_PLUGIN', plugins_url(). '/suporte-notice/');
define('ADMIN_URL', get_admin_url());

require_once (PATH_PLUGIN. 'Classes/SuporteConfig.php');
require_once (PATH_PLUGIN .'lib/Utils.php');
require_once (PATH_PLUGIN .'Classes/Views.php');
require_once (PATH_PLUGIN .'Classes/Notificacao.php');
require_once (PATH_PLUGIN .'Classes/Model.php');
require_once (PATH_PLUGIN .'Classes/Splash.php');
require_once (PATH_PLUGIN .'lib/Mustache/Autoloader.php');

Mustache_Autoloader::register();
new SuporteConfig();

?>
