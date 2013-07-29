<?php

class notice_tpl_b62efa908190cc6c1f73ca02ea5f4269 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<div id="floater" style="display: none;">
';
        $buffer .= $indent . '    <a href="javascript:void(0)" onclick="javascript:esconde()" class="bt-fecharbanner">Clique aqui para fechar</a>	
';
        $buffer .= $indent . '    <div class="aviso">
';
        $buffer .= $indent . '        <div class="avatar">';
        $value = $this->resolveValue($context->find('avatar'), $context, $indent);
        $buffer .= $value;
        $buffer .= '</div>
';
        $buffer .= $indent . '        <span class="ident"><strong>';
        $value = $this->resolveValue($context->find(''), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</strong></span>
';
        $buffer .= $indent . '        <span class="ident" style="margin-top:3px"><strong></strong></span>
';
        $buffer .= $indent . '        <div class="content">
';
        $buffer .= $indent . '            <p>Olá, <strong>';
        $value = $this->resolveValue($context->find('nome'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</strong><br />
';
        $buffer .= $indent . '            ';
        $value = $this->resolveValue($context->find('notice'), $context, $indent);
        $buffer .= $value;
        $buffer .= '
';
        $buffer .= $indent . '            </p>
';
        $buffer .= $indent . '            <p> Seu acesso será bloqueado em ';
        $value = $this->resolveValue($context->find('teste'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= ' dias.<br />			
';
        $buffer .= $indent . '                Data do bloqueio <em><strong>';
        $value = $this->resolveValue($context->find('teste'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</em></strong><br /><br />
';
        $buffer .= $indent . '                Lembre-se de manter em dia nossa parceria.
';
        $buffer .= $indent . '            </p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <p>Caso já tenha efetuado o pagamento, favor desconsidere este aviso</p>
';
        $buffer .= $indent . '            <div class="ass">
';
        $buffer .= $indent . '                Email:';
        $value = $this->resolveValue($context->find('email'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '<br />
';
        $buffer .= $indent . '                Fone:';
        $value = $this->resolveValue($context->find('fone'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>	
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';

        return $buffer;
    }
}
