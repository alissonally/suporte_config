<?php

class Splash {
    
    function __construct() {
        $this->view = new Views();
        $this->notificacoes = new Notificacao();
        add_action('template_redirect', array(&$this, 'set_splash'));
        $this->blog_name = get_bloginfo('name');
        $this->title = $this->blog_name . ' | ' . 'Aviso de bloqueio';
    }

    public function set_splash() {
        if (is_admin() && is_user_logged_in() && $this->notificacoes->get_notificacoes()->user_block == $this->notificacoes->user_logado()->user_login && $this->notificacoes->get_status_acesso()->status_bloqueio ==1) {
             $this->view->template('splash', self::set_splash_tema());
            exit;
        }
    }

    public function set_splash_tema() {
        return array(
            'tema' => array(
                'blog_name' => $this->blog_name,
                'title' => apply_filters('wp_notice', $this->title),
                'usuario' => $current_user->display_name,
                'aviso'=> 'Aviso de bloqueio',
                'conteudo'=> self::get_conteudo(),
                'aviso_user'=> 'Desculpe '.$this->notificacoes->user_logado()->display_name,
                'url_plugin'=> URL_PLUGIN
            )
        );
    }
    
    public function get_conteudo(){
        $conteudo ="<h3>Você não tem privilégio para acessar o painel administrativo</h3>
		    <p>Seu acesso foi bloqueado por <strong>falta de pagamento</strong>.</p>
		    <p>Entre em contato com o suporte para maiores detalhes.</p>
		    <p>Não se preocupe, seus leitores do <strong> {$this->blog_name} </strong> não têm acesso a este aviso.</p>";
        return $conteudo;                
    }

    public function get_option_suporte(){
        return array(
            'user_block' => $this->notificacoes->get_notificacoes()->user_block,
            'email_suporte' => $this->notificacoes->get_notificacoes()->email_suporte,
            'nome_suporte' => $this->notificacoes->get_notificacoes()->nome_suporte,
            'especialidade_suporte' => $this->notificacoes->get_notificacoes()->especialidade_suporte,
            'fone_suporte' => $this->notificacoes->get_notificacoes()->fone_suporte,
            'vencimento' => $this->notificacoes->get_notificacoes()->vencimento,
            'carencia' => $this->notificacoes->get_notificacoes()->carencia,
            'status_pg' => 'em_aberto'            
            );
    }
}