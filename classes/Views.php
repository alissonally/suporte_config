<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Views
 *
 * @author alissonaraujo
 */
class Views {

    public function __construct() {
        $this->options = array('extension' => '.html');
        $this->m = new Mustache_Engine(array(
                    'loader' => new Mustache_Loader_FilesystemLoader(PATH_PLUGIN . '/layout', $this->options),
                ));
    }

    public function get_admin($data = array()) {
        echo $this->m->render('admin', $data);
    }
    
    public function get_notificacoes($data = array()){
        $data_obj = (object)$data; 
        //echo get_avatar( 'alissonsdearaujo@gmail.com' , 50 );
        add_action('admin_notices', array( &$this, 'get_notificacoes' ));
        echo $this->m->render('notificacao', $data_obj);
    }

}

?>
