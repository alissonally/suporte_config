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
        $this->model = new Model();
        $this->splash = new Splash();
        register_activation_hook(__FILE__, array(&$this, 'install_suporte_config'));

        //Hook up to the init action
        add_action('init', array(&$this, 'init_suporte_config'));
        add_action('admin_menu', array(&$this, 'config_suport_menu'));
    }

    function install_suporte_config() {
        if ($_POST["wp_suporte_config"] == 'sim') {
            check_admin_referer("wp_suporte_config_ref");
            if ($this->model->set_option_suporte($_POST)) {
                $mensagem = '<div class="updated" ><p> Confiurações Salvas com Sucesso!</p></div>';
            } else {
                $mensagem = '<div class="error" ><p> Erro ao salvar configurações!</p></div>';
            }
        }
        $this->view->template('admin', array(
            'admin' => $this->notificacoes->admin_view(),
            'url_admin' => ADMIN_URL,
            'nonce_field' => wp_nonce_field("wp_suporte_config_ref"),
            'mensagem' => $mensagem,
            'valores' => $this->notificacoes->get_notificacoes(),
            'status' => $this->notificacoes->get_notificacoes()->status_pg == 'pago' ? true : false,
            'user_blog' => $this->notificacoes->get_user_bloqueado()
                )
        );
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
            $this->splash->set_splash();
        } else {
            //Se existir script para front-end vai aqui
        }
        if ($this->notificacoes->get_notificacoes()->user_block == $this->notificacoes->user_logado()->user_login) {
            add_action('admin_notices', array(&$this, 'float_notice'));
        }
    }

    function float_notice() {
        // TODO define your action method here
        global $pagenow;
        //$dataLimite = dataDif($hj ,$bloqueio,'d');
        if ($pagenow === 'index.php') {
//                            if($wp_config_notice['status_pg'] !='pago' && strtotime($hj) === $timeNotice or $dataLimite > 0 ){
//                                    add_action( 'admin_notices', 'wp_suport_notice' );
//                             }
            $this->view->template('notificacao', array('valores_options' => $this->notificacoes->get_floater()));
        }
    }

    private function register_scripts_and_styles() {
        if (is_admin()) {
            $this->load_file(self::slug . '-admin-script', 'assets/js/admin.js', true);
            $this->load_file(self::slug . '-admin-style', 'assets/css/admin.css');
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