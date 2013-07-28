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

     public function admin_view(){
        $blogusers = new WP_User_Query(array(
                    'exclude' => array(1),
                    'fields' => array( 'user_login', 'user_nicename', 'user_email', 'display_name' )
                    )
        );

        return array (
            'icone' => get_screen_icon('edit-comments'),
            'users' => $blogusers->results
         );   
        
    }

    public function get_notificacoes() {
        return array(
            array(
                'nome' => 'José',
                'cidade' => 'Teresina'
            ),
            array(
                'nome' => 'Antonio',
                'cidade' => 'Valença'
            ),
            array(
                'nome' => 'João',
                'cidade' => 'Pimenteiras'
            )
        );
    }
}

?>
