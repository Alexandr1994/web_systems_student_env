<?php
class viewCardinalTextField extends BaseTheme{
       
    protected $label = null;
    protected $name = null;
    protected $value = null;
    
    private $smarty = null;
    
    public function __construct($label, $name, $value){
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    
        $name_current_folder = __DIR__;
        $this->smarty->template_dir =''.$name_current_folder.'/templates';
        
    }
    /*Переделать на шаблон вызывающий smarty*/
    
    public function render(){
        $this->smarty->assign('label',$this->label);
        $this->smarty->assign('name',$this->name);
        $this->smarty->assign('value',$this->value);
        return $this->smarty->fetch('textField.tpl');
    }
}