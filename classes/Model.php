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
	}

	public function set_option_suporte($dados){
		/*if($dados['_wpnonce'] && $dados['_wp_http_referer'] && $dados['Submit'] && $dados['wp_suporte_config'])
			return false;
		else*/			
		  return update_option("options_suporte_config", $dados);
	}
}