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

    public function render($name)
    { 
      require dirname( plugin_dir_path( __FILE__ )) .'/layout/' . $name . '.phtml';    

  }
}
?>
