<?php
//namespace classes;
class SuporteConfig {
    /* --------------------------------------------*
     * Constants
     * -------------------------------------------- */

    const name = 'Suporte Config';
    const slug = 'suporte_config';

    /**
     * Constructor
     */
    function __construct() {
        //register an activation hook for the plugin
        $this->view = new Views();
        $this->notificacoes = new Notificacao();
        register_activation_hook(__FILE__, array(&$this, 'install_suporte_config'));

        //Hook up to the init action
        add_action('init', array(&$this, 'init_suporte_config'));
        add_action('admin_menu', array(&$this, 'config_suport_menu'));
    }

    /**
     * Runs when the plugin is activated
     */
    function install_suporte_config() {  
        $this->view->template('admin', array('admin'=>$this->notificacoes->admin_view()));
    }

    function config_suport_menu() {
        if (function_exists('add_menu_page')) {
            add_options_page('Configurações do Suporte ', 'Suporte', 'manage_options', self::slug, array(&$this, 'install_suporte_config'));
        }
    }

    /**
     * Runs when the plugin is initialized
     */
    function init_suporte_config() {
        // Setup localization
        global $pagenow;
        $notice = "Esse aviso tem o intuito de informá-lo que <strong>falta 3 dia </strong>para o pagamento do suporte do <strong><em>" . get_bloginfo('name') . "</em></strong>.";
        load_plugin_textdomain(self::slug, false, dirname(plugin_basename(__FILE__)) . '/lang');
        // Load JavaScript and stylesheets
        $this->register_scripts_and_styles();


        if (is_admin()) {
            //$dataLimite = dataDif($hj ,$bloqueio,'d');
            if ($pagenow === 'index.php') {
//                            if($wp_config_notice['status_pg'] !='pago' && strtotime($hj) === $timeNotice or $dataLimite > 0 ){
//                                    add_action( 'admin_notices', 'wp_suport_notice' );
//                             }
                $this->view->template('notificacao',array(
                    'nome' => 'Alisson',
                    'email' => 'alissonsdearaujo@gmail.com',
                    'teste' => 'Teste',
                    'fone' => '8698176475',
                    'avatar' => get_avatar('alissonsdearaujo@gmail.com', 50),
                    'notice' => $notice
                ));
            }
        } else {
            //this will run when on the frontend
        }

        /*
         * TODO: Define custom functionality for your plugin here
         *
         * For more information: 
         * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
         */
        add_action('your_action_here', array(&$this, 'action_callback_method_name'));
        add_filter('your_filter_here', array(&$this, 'filter_callback_method_name'));
    }

    function action_callback_method_name() {
        // TODO define your action method here
    }

    function filter_callback_method_name() {
        // TODO define your filter method here
    }

    /**
     * Registers and enqueues stylesheets for the administration panel and the
     * public facing site.
     */
    private function register_scripts_and_styles() {
        if (is_admin()) {
            $this->load_file(self::slug . '-admin-script', 'js/admin.js', true);
            $this->load_file(self::slug . '-admin-style', 'css/admin.css');
        } else {
            
        } // end if/else
    }

// end register_scripts_and_styles

    /**
     * Helper function for registering and enqueueing scripts and styles.
     *
     * @name	The 	ID to register with WordPress
     * @file_path		The path to the actual file
     * @is_script		Optional argument for if the incoming file_path is a JavaScript source file.
     */
    private function load_file($name, $file_path, $is_script = false) {

        $url = URL_PLUGIN . $file_path;

        $file = PATH_PLUGIN . $file_path;
        // echo $file;
        if (file_exists($file)) {
            if ($is_script) {
                wp_register_script($name, $url, array('jquery')); //depends on jquery
                wp_enqueue_script($name);
            } else {
                wp_register_style($name, $url);
                wp_enqueue_style($name);
            } // end if
        } // end if
    }

// end load_file
}

// end class
?>