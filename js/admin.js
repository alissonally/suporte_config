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