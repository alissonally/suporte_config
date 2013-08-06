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

    /*
    * Retorna configuracoes do suporte
    */
    public function get_notificacoes() {
        return (object) get_option("options_suporte_config");
    }

    public function get_status_acesso() {
        return (object) get_option("options_status_config");
    }

    public function get_user_bloqueado() {
        $user_b = (object) get_option("options_suporte_config");
        $user_bloqueado = new WP_User_Query(array(
            'exclude' => array(1),
            'search' => $user_b->user_block,
            'fields' => array('display_name')
                )
        );
        if($user_b->user_block){
            if ($user_bloqueado->results[0]->data->ID != 1)
                return $user_bloqueado->results;
        } else{
            return false; 
         }  
    }
    
    public function user_logado(){
        global $current_user; 
        return $current_user;
    }

    
    /*
    * Retorna dados para tela de notificacao
    */
    public function get_floater() { 
        $pre = Utils::dataDif(self::get_config_times()->data_atual, self::get_config_times()->vencimento, 'dia');
        $atraso = Utils::dataDif(self::get_config_times()->vencimento, self::get_config_times()->data_atual, 'dia');

        switch (strtotime(self::get_config_times()->data_atual)) {
            case strtotime(self::get_config_times()->data_atual) < strtotime(self::get_config_times()->vencimento):
                if ($pre === 1)
                    $notice .= "Esse aviso tem o intuito de informá-lo que <strong>falta {$pre} dia </strong>para o pagamento do suporte do <strong><em>" . get_bloginfo('name') . "</em></strong>.";
                 else 
                    $notice .= "Esse aviso tem o intuito de informá-lo que <strong>faltam {$pre} dias </strong>para o pagamento do suporte do <strong><em>" . get_bloginfo('name') . "</em></strong>.";
                break;
            case strtotime(self::get_config_times()->data_atual) == strtotime(self::get_config_times()->vencimento):
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
            'data_bloqueio' => date('d/m/Y', self::get_config_times()->data_init_notificacao), //retorna a data do bloqueio
            'prazo_bloqueio' => self::get_config_times()->prazo_bloqueio, //retorna em qnts dias será bloqueado
            'notice' => $notice,
            'avatar' => get_avatar(self::get_notificacoes()->email_suporte, 50),
            'current_user' => self::user_logado()->display_name,
            'dia_notificacao'=> strtotime(self::get_config_times()->dia_vencimento . "-3 days") //mostra tela de cobrança 3 dias antes do dia do pagamento
        );
    }

    /*
    * Retona datas para validacao
    */
    public function get_config_times(){
        $dia_vencimento = self::get_notificacoes()->vencimento ? self::get_notificacoes()->vencimento : 10;
        $carencia = self::get_notificacoes()->carencia ? self::get_notificacoes()->carencia : 20;
        return (object)array (
            'dia_vencimento'=> $dia_vencimento, //Dia do vencimento          
            'carencia'=> $carencia, //Carência para bloqueio         
            'data_atual' => date('Y-m-d'), //Data corrente( data do dia)
            'vencimento' => date('Y-m' . '-' . $dia_vencimento), //Vencimento com mês
            'data_init_notificacao' => strtotime(date('Y-m' . '-' . $dia_vencimento) . "+{$carencia} days"),//prazo pra bloqueio em timestamp Unix
            'data_bloqueio' => date('Y-m-d', strtotime(date('Y-m' . '-' . $dia_vencimento) . "+{$carencia} days")),//Dia do bloqueio amigavel
            'prazo_bloqueio' => Utils::dataDif(date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m' . '-' . $dia_vencimento) . "+{$carencia} days")), 'dia'),//Pra em dia para bloqueio
            'data_block_pre' => strtotime(date('Y-m' . '-' . $dia_vencimento) . "-4 days") //4 dias antes do vencimento em timestamp Unix
        );
    }

}

?>
