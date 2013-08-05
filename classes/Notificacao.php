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

    public function admin_view() {
        $blogusers = new WP_User_Query(array(
            'exclude' => array(1),
            'fields' => array('user_login', 'user_nicename', 'user_email', 'display_name')
                )
        );

        return array(
            'icone' => get_screen_icon('edit-comments'),
            'users' => $blogusers->results
        );
    }

    public function get_notificacoes() {
        return (object) get_option("options_suporte_config");
    }

    public function get_user_bloqueado() {
        $user_b = (object) get_option("options_suporte_config");
        $user_bloqueado = new WP_User_Query(array(
            'search' => $user_b->user_block,
            'fields' => array('display_name')
                )
        );
        if ($user_bloqueado->results[0]->data->ID != 1)
            return $user_bloqueado->results;
        else
            return false;
    }
    
    public function user_logado(){
        global $current_user; 
        return $current_user;
    }

    

    public function get_floater() {        
        $dia = self::get_notificacoes()->vencimento ? self::get_notificacoes()->vencimento : 10;
        $carencia = self::get_notificacoes()->carencia ? self::get_notificacoes()->carencia : 20;
        $hj = date('Y-m-d');
        $pa = date('Y-m' . '-' . $dia);
        $timeBlock = strtotime($pa . "+{$carencia} days");
        $timeNotice = strtotime($pa . "-3 days");
        $bloqueio = date('Y-m-d', $timeBlock);
        $prazo_bloqeio = Utils::dataDif($hj, $bloqueio, 'dia');
        $timeStatus = strtotime($pa . "-4 days"); //4 dias antes do vencimento

        $data_bloqeio = date('d/m/Y', $timeBlock);
        $pre = Utils::dataDif($hj, $pa, 'dia');
        $atraso = Utils::dataDif($pa, $hj, 'dia');

        switch ($hj) {
            case $hj < $pa:
                if ($pre == 1)
                    $notice .= "Esse aviso tem o intuito de informá-lo que <strong>falta {$pre} dia </strong>para o pagamento do suporte do <strong><em>" . get_bloginfo('name') . "</em></strong>.";
                else
                    $notice .= "Esse aviso tem o intuito de informá-lo que <strong>faltam {$pre} dias </strong>para o pagamento do suporte do <strong><em>" . get_bloginfo('name') . "</em></strong>.";
                break;
            case $hj == $pa:
                $notice .= "Esse aviso tem o intuito de informá-lo que o <strong>dia do pagamento ao suporte do <strong><em>" . get_bloginfo('name') . "</em></strong> é hoje " . date('d/m/Y') . " </strong>.";
                break;
            default:
                if ($atraso == 1)
                    $notice .= "Esse aviso tem o intuito de informá-lo que o pagamento do suporte do <strong><em>" . get_bloginfo('name') . "</em></strong> está com <strong>{$atraso} dia de atraso</strong>.";
                else
                    $notice .= "Esse aviso tem o intuito de informá-lo que o pagamento do suporte do <strong><em>" . get_bloginfo('name') . "</em></strong> está com <strong>{$atraso} dias de atraso</strong>.";
                break;
        }

        return array(
            'nome_suporte' => self::get_notificacoes()->nome_suporte,
            'email_suporte' => self::get_notificacoes()->email_suporte,
            'fone_suporte' => self::get_notificacoes()->fone_suporte,
            'especialidade_suporte' => self::get_notificacoes()->especialidade_suporte,
            'data_bloqueio' => $data_bloqeio,
            'prazo_bloqueio' => $prazo_bloqeio,
            'notice' => $notice,
            'avatar' => get_avatar(self::get_notificacoes()->email_suporte, 50),
            'current_user' => self::user_logado()
        );
    }

}

?>
