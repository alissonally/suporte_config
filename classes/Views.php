<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Views
 *
 * @author alissonaraujo
 */
class Views {

    public function __construct() {
        $this->options = array('extension' => '.html');
        $this->mustache = new Mustache_Engine(array(
                    'template_class_prefix' => 'notice_tpl_',
                    'cache' => PATH_PLUGIN . '/layout/tpm',
                    //'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
                    'loader' => new Mustache_Loader_FilesystemLoader(PATH_PLUGIN . '/layout', $this->options),
                    //'partials_loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views/partials'),
//                    'helpers' => array('i18n' => function($text) {
//                            // do something translatey here...
//                        }),
                    'escape' => function($value) {
                        return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                    },
                    'charset' => 'utf-8',
                    'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
                    'strict_callables' => true,
                ));     
    }

    public function template($template, $data) {
        $tpl = $this->mustache->loadTemplate($template); 
        echo $tpl->render($data);
    }
}

?>
