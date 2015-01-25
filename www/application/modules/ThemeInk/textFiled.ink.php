<?php
class viewInkTextField extends BaseTheme{
       
    protected $label = null;
    protected $name = null;
    protected $value = null;
    
    public function __construct($label, $name, $value) {
        parent::__construct(__DIR__);
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }
    
    public function render(){
        $this->smarty->assign('label',$this->label);
        $this->smarty->assign('name',$this->name);
        $this->smarty->assign('value',$this->value);
        return $this->smarty->fetch('textField.tpl');
    }    
}
/*

Defines the container for a label / form control pair. Used with a <div> element.*/
