<?php

class __Mustache_2082e57c01c9ac1cbd8222c09a826a91 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="wrap">
';
        $buffer .= $indent . '	';
        $value = $this->resolveValue($context->findDot('admin.icone'), $context, $indent);
        $buffer .= $value;
        $buffer .= '
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<h2 style=\'margin:0 0 15px\'> Configurações do Suporte </h2>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<script type="text/javascript">
';
        $buffer .= $indent . '	   function troca(){
';
        $buffer .= $indent . '				valor = document.getElementById(\'selectlista\').value;
';
        $buffer .= $indent . '				valortexto = document.getElementById(\'user_block\').value;
';
        $buffer .= $indent . '			if(valor == \'0\'){
';
        $buffer .= $indent . '				document.getElementById(\'user_block\').value = "valor 0";
';
        $buffer .= $indent . '			} else {
';
        $buffer .= $indent . '				document.getElementById(\'user_block\').value = valor;
';
        $buffer .= $indent . '			}
';
        $buffer .= $indent . '		}
';
        $buffer .= $indent . '   </script>
';
        $buffer .= $indent . '   <form method="post" action="options-general.php?page=suporte">
';
        $buffer .= $indent . '		
';
        $buffer .= $indent . '		<input id="user_block"  name="user_block" type="hidden" value="" style="width:100px" />
';
        $buffer .= $indent . '		<table class="form-table">
';
        $buffer .= $indent . '			<tr valign="top">
';
        $buffer .= $indent . '				<th scope="row">Usuário do Sistema</th>
';
        $buffer .= $indent . '				<td>
';
        $buffer .= $indent . '					<select name="" id="selectlista" onchange="troca();" >
';
        $buffer .= $indent . '					<option value="">etest</option> 
';
        $buffer .= $indent . '						<optgroup label="Usuários">
';
        // 'admin.users' section
        $buffer .= $this->sectionB3f0e4b2a72e412ca12e1f149487aa20($context, $indent, $context->findDot('admin.users'));
        $buffer .= $indent . '					  </optgroup>
';
        $buffer .= $indent . '				   </select>
';
        $buffer .= $indent . '			   </td>
';
        $buffer .= $indent . '		   </tr>
';
        $buffer .= $indent . '		   <tr valign="top">
';
        $buffer .= $indent . '				<th scope="row">Nome do Suporte: </th>
';
        $buffer .= $indent . '				<td><input type="text" name="nome_suporte" value="" size="50"/></td>	   
';
        $buffer .= $indent . '		   </tr>
';
        $buffer .= $indent . '		   <tr valign="top">
';
        $buffer .= $indent . '				<th scope="row">Email do Suporte: </th>
';
        $buffer .= $indent . '				<td><input type="text" name="email_suporte" value="" size="50"/></td>	   
';
        $buffer .= $indent . '		   </tr>   
';
        $buffer .= $indent . '		   <tr valign="top">
';
        $buffer .= $indent . '				<th scope="row">Especialidade do Suporte: </th>
';
        $buffer .= $indent . '				<td><input type="text" name="especialidade_suporte" value="" size="50"/></td>	   
';
        $buffer .= $indent . '		   </tr>
';
        $buffer .= $indent . '		   <tr valign="top">
';
        $buffer .= $indent . '				<th scope="row">Fone do Suporte: </th>
';
        $buffer .= $indent . '				<td><input type="text" name="fone_suporte" value="" /></td>	   
';
        $buffer .= $indent . '		   </tr>
';
        $buffer .= $indent . '		   <tr valign="top">
';
        $buffer .= $indent . '				<th scope="row">Dia do vencimento: </th>
';
        $buffer .= $indent . '				<td><input type="text" name="vencimento" value="" size="2"/><br />
';
        $buffer .= $indent . '					<span class="description">Dia do pagamento do suporte</span></td>
';
        $buffer .= $indent . '		   </tr>
';
        $buffer .= $indent . '		   <tr valign="top">
';
        $buffer .= $indent . '				<th scope="row">Carência: </th>
';
        $buffer .= $indent . '				<td><input type="text" name="carencia" value="" size="2"/><br />
';
        $buffer .= $indent . '					<span class="description">Quantos dias após o vencimento será bloqueado o acesso</span></td>
';
        $buffer .= $indent . '		   </tr>
';
        $buffer .= $indent . '		   <tr valign="top">
';
        $buffer .= $indent . '				<th scope="row">Status pagamento: </th>
';
        $buffer .= $indent . '				<td><input type="radio" name="status_pg" id="pago" value="pago"  />
';
        $buffer .= $indent . '					<label for="pago">Pago</label>
';
        $buffer .= $indent . '					<br />
';
        $buffer .= $indent . '					<input type="radio" name="status_pg" id="em_aberto" value="em_aberto" />
';
        $buffer .= $indent . '					<label for="em_aberto">Em aberto</label>
';
        $buffer .= $indent . '					<br />
';
        $buffer .= $indent . '					<span class="description">Informar status do pagamento</span></td>
';
        $buffer .= $indent . '		   </tr>
';
        $buffer .= $indent . '	   <table>
';
        $buffer .= $indent . '		<p class="submit" style="clear: both;">
';
        $buffer .= $indent . '			<input type="submit" name="Submit"  class="button-primary" value="Salvar" />
';
        $buffer .= $indent . '			<input type="hidden" name="wp_suporte_config" value="sim" />
';
        $buffer .= $indent . '		</p>
';
        $buffer .= $indent . '   </form>
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function sectionB3f0e4b2a72e412ca12e1f149487aa20(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
							<option value="">{{display_name}}</option>
						';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '							<option value="">';
                $value = $this->resolveValue($context->find('display_name'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
