<?php
class Model {
	public function __construct(){
		$configs = get_option("options_suporte_config");
	    if (empty($configs)) {
	        $configs = array(
	            'user_block' => '',
	            'email_suporte' => '',
	            'nome_suporte' => '',
	            'especialidade_suporte' => '',
				'fone_suporte' => '',
	            'vencimento' => '',
	            'carencia' => '',
	            'status_pg' => ''            
	        );
	        add_option("options_suporte_config", $configs, '', 'yes');
	    }
	    $status_block = get_option("options_status_config");
	    if (empty($status_block)) {
	        $status_block = array(
	            'status_bloqueio' => ''                        
	        );
	        add_option("options_status_config", $status_block, '', 'yes');
	    }
	}

	public function set_option_suporte($dados){

		unset($dados['_wpnonce']); 
		unset($dados['_wp_http_referer']);
		unset($dados['Submit']); 
		unset($dados['wp_suporte_config']);

		return update_option("options_suporte_config", $dados);
	}

	public function set_status_block($dados){
		return update_option("options_status_config", $dados);
	}

}