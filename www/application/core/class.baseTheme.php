<?php

class BaseTheme{
    
    private $smarty = null;
    
    public function __construct(){
    $this->smarty = new Smarty();
    $this->smarty->compile_dir = 'tmp/templates_c/';
    $this->smarty->config_dir = 'tmp/configs/';
    $this->smarty->cache_dir = 'tmp/cache';
    }
}