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
    function install_suporte_config() {  
        $this->view->template('admin', array('admin'=>$this->notificacoes->admin_view()));
    }

    function config_suport_menu() {
        if (function_exists('add_menu_page')) {
            add_options_page('Configurações do Suporte ', 'Suporte', 'manage_options', self::slug, array(&$this, 'install_suporte_config'));
        }
    }

    function init_suporte_config() {
        // Setup localization
        
        load_plugin_textdomain(self::slug, false, dirname(plugin_basename(__FILE__)) . '/lang');
        // Load JavaScript and stylesheets
        $this->register_scripts_and_styles();


        if (is_admin()) {
            
        } else {
            //Se existir script para front-end vai aqui
        }


        add_action('admin_notices', array(&$this, 'float_notice'));
        add_filter('your_filter_here', array(&$this, 'filter_callback_method_name'));
    }

    function float_notice() {
        // TODO define your action method here
        global $pagenow;
            $notice = "Esse aviso tem o intuito de informá-lo que <strong>falta 3 dia </strong>para o pagamento do suporte do <strong><em>" . get_bloginfo('name') . "</em></strong>.";    
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
    }

    function filter_callback_method_name() {
        // TODO define your filter method here
    }

    private function register_scripts_and_styles() {
        if (is_admin()) {
            $this->load_file(self::slug . '-admin-script', 'js/admin.js', true);
            $this->load_file(self::slug . '-admin-style', 'css/admin.css');
        } else {
            
        } // end if/else
    }

    private function load_file($name, $file_path, $is_script = false) {

        $url = URL_PLUGIN . $file_path;

        $file = PATH_PLUGIN . $file_path;
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