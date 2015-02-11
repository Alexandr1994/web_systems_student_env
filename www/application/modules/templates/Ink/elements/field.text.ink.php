<?php
class viewInkTextField extends BaseTemplate{
       
    protected $field = null;
    
    public function __construct($field) {
        parent::__construct(__DIR__);
        $this->field = $field;
    }
    
    public function render(){
        $this->smarty->assign('label',$this->field->label());
        $this->smarty->assign('name',$this->field->name());
        $this->smarty->assign('value',$this->field->value());
        $this->smarty->assign('required',$this->filed->required());
        return $this->smarty->fetch('textField.tpl');
    }    
}
/*

Defines the container for a label / form control pair. Used with a <div> element.*/
