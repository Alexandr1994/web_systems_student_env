<?php
class viewCardinalPage extends BaseTemplate{
 
 public $content = null;
 
 public function __construct($content){
     parent::__construct(__DIR__);
     $this->content = $content;
 }
 
 public function render(){
     $this->smarty->assign('title','TITLE');
     $this->smarty->assign('header','I HEAD');
     $this->smarty->assign('content',$this->content);
     $this->smarty->assign('footer','I FOOTER');
     return $this->smarty->fetch('index.tpl');
 }
 
}