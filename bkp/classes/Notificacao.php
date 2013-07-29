<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Noticificacao
 *
 * @author alissonaraujo
 */
class Notificacao {
    
    public function __construct() {
        $this->view = new Views();
        add_action('admin_notices', array( &$this, 'get_noticificacoes' ));
    }
    
    public function get_notificacoes(){
        $this->view->wp_config_notice = array('teste' => 'Teste');
        $this->view->render('notificacao');
    }
    
}

?>
