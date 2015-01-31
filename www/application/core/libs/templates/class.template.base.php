<?php 

abstract class BaseTemplate {
    
    protected $smarty = null;

    public function __construct($dir){
        $this->smarty = new Smarty();
        $this->smarty->compile_dir = 'tmp/templates_c/';
        $this->smarty->config_dir = 'tmp/configs/';
        $this->smarty->cache_dir = 'tmp/cache';
        $this->smarty->template_dir = $dir . '/templates';
    }
    
    abstract public function render();
    
    public function show(){
        echo $this->render();
    }   
 
}