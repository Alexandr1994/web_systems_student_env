<?php
class viewInkPage{
 public $content = null;
 private $smarty = null;
 
 public function __construct($content){
     $this->content = $content;
     $this->smarty = new Smarty();
     $this->smarty->compile_dir = 'application/modules/smarty_folder/templates_c/';
     $this->smarty->config_dir = 'application/modules/smarty_folder/configs/';
     $this->smarty->cache_dir = 'application/modules/smarty_folder/cache';
     $name_current_folder = __DIR__;
     $this->smarty->template_dir =''.$name_current_folder.'/templates';
 }
 
 /*Вернуть представление*/
 public function render(){
    //$folder = 'index';
     $this->smarty->assign('title','TITLE');
     $this->smarty->assign('header','I HEAD');
     $this->smarty->assign('content',$this->content);
     $this->smarty->assign('footer','I FOOTER');
     return $this->smarty->fetch('index.tpl');
 }
 
 /*Напечатать представление*/
 public function show(){
     echo $this->render();
   
}
}