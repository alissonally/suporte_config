 jQuery(document).ready(function() {
        jQuery('#floater').slideDown('slow', function() {
            mostra();
        });
    });
    function esconde() {
        jQuery('#floater').slideUp();
    }
    function mostra() {
        if (jQuery('#floater').css('display') == 'none') {
            jQuery("#floater").css('display', 'block');
        }
    }
    function user_select(){
                valor = document.getElementById('selectlista').value;
                valortexto = document.getElementById('user_block').value;
            if(valor == '0'){
                document.getElementById('user_block').value = "valor 0";
            } else {
                document.getElementById('user_block').value = valor;
            }
        }