<?php
/**
 * @file
 * Wrapper for Smarty Template Engine
 */
 
require_once('smarty/Smarty.class.php');
require_once('smtemplate_config.php');
 
class SMTemplate{
     
    private $_smarty;
     
    function __construct(){
        $this->_smarty = new Smarty();
         
        global $smtemplate_config;
        $this->_smarty->template_dir = $smtemplate_config['template_dir'];
        $this->_smarty->compile_dir = $smtemplate_config['compile_dir'];
        $this->_smarty->cache_dir = $smtemplate_config['cache_dir'];
        $this->_smarty->configs_dir = $smtemplate_config['configs_dir'];
    }

		function render($template, $data = array()){
			foreach($data as $key => $value){
					$this->_smarty->assign($key, $value);
			}
			$this->_smarty->display($template . '.tpl');
		}

}
